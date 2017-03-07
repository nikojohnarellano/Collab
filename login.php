<?php
include 'partials/head.php';
include 'config/config.php';

if(isset($_SESSION['user_id']))
  header("location:dashboard.php");

$email      = isset($_POST['email'])     ? $_POST['email'] : "";
$password   = isset($_POST['password'])  ? $_POST['password']  : "";

if(isset($_POST['submit'])) {
  $select_query = "SELECT UserId FROM user WHERE EmailAddress = '$email' and Password = '$password'";
  $result = mysqli_query($db, $select_query) or die(mysqli_error($db));
  $row    = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $count  = mysqli_num_rows($result);
  if($count == 1) {
    $_SESSION['user_id']      = $row['UserId'];
    $_SESSION['first_login']  = true;
  } else {
    $error = "Your Login Name or Password is invalid";
  }
  unset($_POST);
}
?>
<script type="text/javascript" src="./javascript/transition.js"></script>
<body style="background-color : black;">
<div id="login" class = "container">
     <div class="row">
       <div class="col-md-6">
         <img class="logo center-block" src="./images/collab-logo.png" />
       </div>
       <div class="col-md-6 login-form">
         <h1 class="display-4 m-b-2">Log In</h1>
         <form method='POST' action="<?php echo $_SERVER['PHP_SELF']; ?>">
           <div class='form-group'>
             <label for='email'>Email</label>
             <input class="form-control" type='text' id='email' placeholder='E-mail' name='email'/>
           </div>
           <div class='form-group'>
             <label for='password'>Password</label>
             <input class="form-control" type='password' id='password' placeholder='Password' name='password'/>
           </div>
           <?php if(isset($error)): ?>
             <div class="error">
               <?php echo $error; ?>
             </div>
             <script>
              shake();
             </script>
             <br  />
          <?php endif; ?>
           <button class="btn btn-primary" type='submit' name='submit'>Log in</button>
           <a href="./register.php">Create an Account</a>
         </form>
       </div>
     </div>
</div>
<?php echo isset($_SESSION['user_id']);  if(isset($_SESSION['user_id'])): ?>
  <script>
    login_transition(document.getElementById('login'), './dashboard.php');
  </script>
<?php endif;?>

</body>
