<?php

include 'partials/head.php';
include 'config/config.php';

$first_name   = isset($_POST['firstName'])        ? $_POST['firstName'] : "";
$last_name    = isset($_POST['lastName'])         ? $_POST['lastName']  : "";
$email_add    = isset($_POST['email'])            ? $_POST['email']     : "";
$password     = isset($_POST['password'])         ? $_POST['password']  : "";
$confirm_pw   = isset($_POST['confirmPassword'])  ? $_POST['confirmPassword'] : "";
$level        = isset($_POST['level'])            ? intval($_POST['level'])     : "";
$option       = isset($_POST['option'])           ? $_POST['option']    : "";
$insert_query = "";

if(isset($_POST['submit'])) {
  // image stuff
  $target_dir = "./uploads/";
  $target_file = $target_dir . basename($_FILES["image"]["name"]);
  $image_file_type = pathinfo($target_file,PATHINFO_EXTENSION);

  $check_image = getimagesize($_FILES["image"]["tmp_name"]) !== false;
  $check_size  = !($_FILES["image"]["size"] > 500000000);
  $check_type  = !strcasecmp($image_file_type, "jpg") || !strcasecmp($image_file_type, "png") || !strcasecmp($image_file_type, "jpeg") || !strcasecmp($image_file_type, "gif");

  if($check_image && $check_size && $check_type) {
    $insert_query = "INSERT INTO User (FirstName, LastName, EmailAddress, Password, ProgramLevel, CstOption, Image)
                          VALUES('$first_name', '$last_name', '$email_add', '$password', $level, '$option', '$target_file')";
    mysqli_query($db, $insert_query) or die(mysqli_error($db));
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    unset($_POST);
    header('location:./login.php');
  }
}
?>
<body id="register" style="display:none;">
  <div id="register-form" class="container">

      <div class="col-md-6 col-md-offset-3">
        <a href="./login.php"><img class="logo" src="./images/collab-logo.png" /></a>
        <h1 class="display-4 m-b-2"> Register</h1>
        <form method='POST' enctype="multipart/form-data" action='<?php echo $_SERVER['PHP_SELF']; ?>'>
          <div class="form-group">
            <label for='name'>First Name: </label>
            <input id='first-name' class='form-control' type='text' placeholder='First Name' name='firstName' required/>
          </div>
          <div class="form-group">
            <label for='name'>Last Name: </label>
            <input id='last-name' class='form-control' type='text' placeholder='Last Name' name='lastName' required/>
          </div>
          <div class="form-group">
            <label for='name'>E-mail: </label>
            <input id='email' class='form-control' type='text' placeholder='E-mail' name='email' required/>
          </div>
          <div class="form-group">
            <label for='password'>Password: </label>
            <input id='password' class='form-control' type='password' name='password' required/>
          </div>
          <div class="form-group">
            <label for='level'>Level: </label>
            <select id='level' name="level" required>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
            </select>
          </div>
          <div class="form-group">
            <label for='option'>Option: </label>
            <select id='option' name='option' required>
              <option value="Web and Mobile">Web and Mobile</option>
              <option value="Database">Database</option>
              <option value="Data Communications">Data Communications</option>
              <option value="Cloud Computing">Cloud Computing</option>
              <option value="Information Systems">Information Systems</option>
              <option value="Digital Processing">Digital Processing</option>
              <option value="Technical Programming">Technical Programming</option>
              <option value="Client Server">Client Server</option>
            </select>
          </div>
          <div class="form-group">
            <label for="image">Upload Avatar: </label>
            <input type="file" name="image" id="image">
          </div>
          <div class="form-group">
            <div class="row">
            <div class="thumbnail col-sm-4">
                <img id="image-preview"/>
            </div>
          </div>
          </div>
          <div class="form-group">
              <button id="submitBtn" class="btn btn-primary btn-primary" type='submit' name='submit'>Register</button>
          </div>
        </form>
      </div>
  </div>
</body>
<script>
  $("#register-form").validate();

  $(window).on("load",function() {
    $("#register").fadeIn();
  });
</script>
<script src='./javascript/register.js'></script>
<?php ob_end_flush(); ?>
