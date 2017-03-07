<?php
  include 'partials/dashboard-header.php';

  if(!isset($_GET['course'])) {
    echo "Error";
  }

  $course = urldecode($_GET['course']);
  $select_query = "SELECT * FROM Note JOIN User on Owner = Userid WHERE course = '$course'";
  $result = mysqli_query($db, $select_query) or die(mysqli_error($db));
  $count  = mysqli_num_rows($result);
?>

<div class="container dashboard-container">
  <div id="list-header">
  <h2><?php echo (trim($course, '\'')); ?></h2>
  <hr />
  </div>
  <?php if($count > 0): ?>
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
  <?php else: ?>
    <h3>No notes to show.</h3>
  <?php endif;?>
</div>


<?php
  include 'partials/dashboard-footer.php';
?>
