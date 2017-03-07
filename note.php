<?php
  include 'partials/dashboard-header.php';
  $owner = $_GET['owner'];
  $note  = $_GET['note'];

  $user_id = intval($_SESSION['user_id']);

  if(isset($_POST['submit-post'])) {
    $content = mysqli_real_escape_string($db, $_POST['comment']);
    $insert_query = "INSERT INTO Comment (Content, PostedBy, NoteId)
                      VALUES('$content', $user_id, $note)";

    mysqli_query($db, $insert_query) or die(mysqli_error($db));
    unset($_POST);
    header('location:' . $_SERVER['REQUEST_URI']);
  }

  if(!isset($_GET['owner']) && !isset($_GET['note'])) {
    die("Error");
  }

  $fetch_note    = "SELECT * FROM note JOIN user on Owner = UserId WHERE Owner = $owner and NoteId = $note";
  $fetch_comment = "SELECT * FROM comment JOIN user on PostedBy = UserId where NoteId=$note";
  $result = mysqli_query($db, $fetch_note) or die(mysqli_error($db));
  $comments_result = mysqli_query($db, $fetch_comment) or die(mysqli_error($db));
  $row    = mysqli_fetch_array($result,MYSQLI_ASSOC);

?>
<div class="container dashboard-container">
  <h3><?php echo $row['Question'] ?></h3>
  <span>
    Owned by: <?php echo $row['FirstName'] . ' ' . $row['LastName']; ?>
  </span>
  <hr />
  <p>
    <pre><code><?php echo htmlspecialchars($row['Answer']); ?></code></pre>
  </p>
  <h4>Comments: </h4>
  <div class="post">
  <div class="post-footer">
                  <ul class="comments-list">
                    <?php
                      while($row = mysqli_fetch_array($comments_result)):
                    ?>
                      <li class="comment">
                          <a class="pull-left" href="#">
                              <img class="avatar" src="<?php echo $row['Image'] === null ? "https://ssl.gstatic.com/accounts/ui/avatar_2x.png" : $row['Image']; ?>" alt="avatar">
                          </a>
                          <div class="comment-body">
                              <div class="comment-heading">
                                  <h4 class="user"><?php echo $row['FirstName'] . ' ' . $row['LastName']?></h4>
                                  <h5 class="time"><?php echo date('j M g:i A', strtotime($row['DatePosted'])); ?></h5>
                              </div>
                              <p><?php echo htmlspecialchars($row['Content']); ?></p>
                          </div>
                      </li>
                    <?php endwhile; ?>
                  </ul>
        </div>
  </div>

<hr />
<div class="inner-container">
  <h4>Post a Comment: </h4>
  <form id="comment-form" method="POST" action="<?php $_SERVER['REQUEST_URI']; ?>">
    <div class="form-group">
      <textarea rows="4" cols="100" maxlength="500" id="comment" name="comment" for="comment-form"></textarea>
    </div>
    <button id="submit-post" class="btn btn-primary btn-primary" type='submit' name='submit-post'>Post</button>
  </form>
</div>
<?php
  include 'partials/dashboard-footer.php';
?>
