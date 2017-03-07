<?php
include 'partials/head.php';
include 'config/config.php';

if(!isset($_SESSION['user_id'])) {
  header("location:./login.php");
}

?>
<?php if($_SESSION['first_login']): ?>
  <div id="loader">
  </div>
<?php endif;?>
<div id="wrapper">
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <img height="30px" width="125px" src="./images/collab-logo.png" />
                </li>
                <li>
                    <a href="dashboard.php">Dashboard</a>
                </li>
                <li>
                    <a href="categories.php">Courses</a>
                </li>
                <li>
                    <a href="search.php">Search</a>
                </li>
                <li>
                    <a href="logout.php">Log-out</a>
                </li>
            </ul>
        </div>
        <div id="page-content-wrapper">
        <div id="dashboard">
