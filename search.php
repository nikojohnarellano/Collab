<?php
  include './partials/dashboard-header.php';

  if(isset($_POST['submit'])) {
    $course_filter  =  isset($_POST['course'])  ? $_POST['course']   : "";
    $term_filter    =  isset($_POST['term'])    ? $_POST['term'] : "";

    $term_number    = intval(filter_var($term_filter, FILTER_SANITIZE_NUMBER_INT));
    $search_term    =  $_POST['search-text'];
    $words          =  explode(" ", $search_term);

    $select_query = "SELECT * FROM Note WHERE";

    if(!empty($term_filter)) {
      $select_query .= " term = $term_number";

      if(!empty($course_filter)) {
        $select_query .= " AND course = '$course_filter'";
      }
    }

    if(!empty($search_term)) {
      $select_query .= empty($term_filter) ?  "": " AND ";
      // search for keyword in question
      $select_query .= " (question LIKE '%$words[0]%'";

      for($i = 1; $i < count($words); $i++) {
        $select_query .= " OR question LIKE '%$words[$i]%'";
      }

      // search for keyword in answer
      $select_query .= " OR answer LIKE '%$words[0]%'";

      for($i = 1; $i < count($words); $i++) {
        $select_query .= " OR answer LIKE '%$words[$i]%'";
      }

      $select_query .= ")";
    }

    //echo $select_query;
    $result = mysqli_query($db, $select_query) or die(mysqli_error($db));
    $count  = mysqli_num_rows($result);
  }


  unset($_POST);
?>

<div id="search" class="container dashboard-container">
  <div class="inner-container">
      <h3>Search</h3>
      <hr />
      <form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
      <div class="row">
        <div class="col-md-4">
          <label for="term-select">Filter by Term:</label>
          <select id="term-select" onchange="populateCourses()" name="term">
            <option value="" selected>All Terms</option>
          </select>
        </div>
        <div class="col-md-8">
          <label for="filter-course">Filter by Course:</label>
          <select id="course-select" name="course">
            <option value="" selected>All Courses</option>
          </select>
        </div>
      </div>
      <div class="row">
          <div class="col-md-12">
                <div class="input-group">
                  <input type="text" name="search-text" class="form-control" placeholder="Search for...">
                  <span class="input-group-btn">
                    <button name="submit" class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"></button>
                  </span>
                </div>
          </div>
        </div>
      </form>
	</div>
  <div class="inner-container">
    <?php if(isset($count) && $count > 0): ?>
      <div class="well note-list">
        <?php while($row = mysqli_fetch_array($result)):  ?>
        <div class="row">
            <div class="col-md-12">
              <a href="<?php
                $owner = $row['Owner'];
                $note  = $row['NoteId'];
                echo "./note.php?owner=$owner&note=$note";
              ?>">
              <?php echo $row['Question']; ?></a>
              <span class="pull-right"><?php echo "Term " .  $row['Term']; ?></span>
              <p><?php echo $row['Course']; ?></p>
            </div>
        </div>
        <hr />
      <?php endwhile; ?>
      </div>
    <?php elseif(isset($count) && $count == 0): ?>
      <h3>No notes to show.</h3>
    <?php endif;?>
  </div>
</div>


<script type="text/javascript" src="./javascript/post-note.js"></script>
<?php
  include './partials/dashboard-footer.php';
?>
