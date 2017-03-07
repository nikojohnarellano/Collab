<?php
  include 'partials/dashboard-header.php';

  $term     = isset($_POST['term'])        ? $_POST['term'] : "";
  $course   = isset($_POST['course'])      ? $_POST['course'] : "";
  $question = isset($_POST['question'])    ? $_POST['question'] : "";
  $answer   = isset($_POST['answer'])      ? $_POST['answer'] : "";
  $UserId   = intval($_SESSION['user_id']);

  $term_filtered = intval(filter_var($term, FILTER_SANITIZE_NUMBER_INT));
  $answer_conv   = htmlentities($answer);
  $question_conv = htmlentities($question);

  $fields_empty = empty($term) || empty($course) || empty($question) || empty($answer);

  if(isset($_POST['submit-post']) && !$fields_empty) {
    $insert_query = "INSERT INTO Note (question, answer, term, course, owner)
                      VALUES('$question_conv', '$answer', $term_filtered, '$course', $UserId)";
    mysqli_query($db, $insert_query) or die(mysqli_error($db));
    unset($_POST);
    header('location:' . $_SERVER['PHP_SELF']);
  }

  $select_query = "select * from note where Owner = '$UserId'";
  $result = mysqli_query($db, $select_query) or die(mysqli_error($db));
  $count  = mysqli_num_rows($result);
?>

<?php if($_SESSION['first_login']): ?>
  <script type="text/javascript">
    $("#loader").fakeLoader();
  </script>
<?php $_SESSION['first_login'] = false; endif;?>

<div class="container dashboard-container">
  <div class="inner-container">
    <h3>My Notes</h3>
    <?php if ($count > 0): ?>
      <div class="well note-list">
        <?php
          $row_count = 0;
          while($row = mysqli_fetch_array($result)):
        ?>
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
        <?php $row_count++; if($count != $row_count): ?><hr /><?php endif;?>
      <?php endwhile; ?>
      </div>
    <?php else: ?>
      <h4>(No notes to show.)</h4>
    <?php endif;?>
  </div>
  <hr />
  <div class="inner-container">
    <h3>Post Note</h3>
    <form class="form-collab" id="note-form" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
      <div class="form-group">
        <label for="answer">Term: </label>
        <br />
        <select id="term-select" onchange="populateCourses()" name="term">
          <option value="" selected disabled>Please select</option>
        </select>
      </div>
      <div class="form-group">
        <label for="answer">Course: </label>
        <br />
        <select id="course-select" name="course">
          <option value="" selected disabled>Please select</option>
        </select>
      </div>
      <div class="form-group">
        <label for="question">Question/Topic: </label>
        <br />
        <textarea rows="7" cols="100" maxlength="500" id="question" name="question" for="note-form"></textarea>
      </div>
      <div class="form-group">
        <label for="answer">Answer/Note: </label>
        <br />
        <textarea rows="4" cols="100" maxlength="500" id="answer" name="answer" for="note-form"></textarea>
      </div>
      <button id="submit-post" class="btn btn-primary btn-primary" type='submit' name='submit-post'>Post</button>
    </form>
  </div>
</div>
<script type="text/javascript" src="./javascript/post-note.js"></script>
<?php
  include 'partials/dashboard-footer.php';
 ?>
