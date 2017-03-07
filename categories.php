<?php
  include 'partials/dashboard-header.php';

  $term1_courses   = ["Business in a Networked Economy" => "business.png", "Business Communications 1" => "communication.png", "CST Program Fundamentals" => "ooad.png", "Essential Skills for Computing" => "programming.png",
                    "Applied Mathematics" => "math.png", "Programming Methods" => "programming.png", "Intro to Web Development" => "web-dev.png"];

  $term2_courses   = ["Business Communications 2" => "communication.png", "Discrete Mathematics" => "math.png", "Procedural Programming in C" => "programming.png", "Object-Oriented Programming with Java" => "programming.png",
                    "Relational Database Systems" => "database.png", "Computer Organization/Architecture" => "computer-theory.png"];

  $term3_courses   = ["Object-Oriented Programming in C++" => "programming.png", "Object Oriented Analysis and Design" => "ooad.png", "Introduction to Data Communications" => "datacomm.png",
                    "Algorithm Analysis and Design" => "algorithms.png", "Mobile Application Development with Android" => "web-dev.png"];

  $term4_courses   = ["Computers and the Law" => "law.png", "Operating Systems" => "computer-theory.png", "Introduction to Internet Software Development" => "web-dev.png", "Computer Graphics for Computer Systems Technology" => "computer-graphics.png"];

  $web_mobile      = ["Server-side web Scripting with PHP" => "web-mobile.png", "Web Applicaton with ASP.NET" => "web-mobile.png", "iOS Application Development for iPhone and iPad" => "web-mobile.png"];

  $database        = ["Database Systems 1" => "database.png", "Selected Topics in Database Systems" => "database.png", "Database Systems 2" => "database.png"];

  $client_server   = ["Client/Server Computing 1" => "client-server.png", "Client/Server Computing 2" => "client-server.png", "Special Topics in Client/Server" => "client-server.png"];

  $cloud_computing = ["Cloud Computing Platforms" => "cloud-computing.png", "DevOps Engineering (Cloud)" => "cloud-computing.png", "Programming in the Cloud" => "cloud-computing.png"];

  $data_comm      = ["Data Communications/Internetworking 1" => "datacomm.png", "Data Communications/Internetworking 2" => "datacomm.png", "Selected Topics in Data Communications/Internetworking" => "datacomm.png"];

  $digi_pro       = ["Programming Windows" => "digipro.png", "Digital Image, Video and Audio Fundamentals" => "digipro.png", "Advanced Topics in Digital Processing" => "digipro.png", "Gaming Systems" => "digipro.png"];

  $tech_pro       = ["Technical Programming 1" => "techpro.png", "Technical Programming 2" => "techpro.png", "System Programming" => "techpro.png"];

  $is             = ["Information Technology Management" => "is.png", "Intranet Planning and Development" => "is.png", "Managing IS Development" => "is.png", "Special Topics in MIS" => "is.png"];

 ?>

   <ul class="nav nav-tabs center-block">
     <li id="term1button" class="active"><a data-toggle="tab" href="#term1">Term 1</a></li>
     <li id="term2button"><a data-toggle="tab" href="#term2">Term 2</a></li>
     <li id="term3button"><a data-toggle="tab" href="#term3">Term 3</a></li>
     <li id="term4button"><a data-toggle="tab" href="#term4">Term 4</a></li>
     <li id="optionsButton"><a data-toggle="tab" href="#options">Options</a></li>
   </ul>
   <div id="categories-list" class="tab-content">
     <div id="term1" class="tab-pane fade in active">
       <div class="container inner-container">
           <h1>Term 1</h1>
           <?php
             $count = 0;
             foreach($term1_courses as $course => $image):
           ?>
             <?php if($count % 4 === 0): ?>
               <div class="row text-center">
             <?php endif; ?>
               <div class="col-md-3 col-sm-6">
                  <a onclick="spinner_transition(this, '<?php $cs = urlencode($course); echo "./note-list.php?course=$cs"; ?>'); return false;" href="#">
                   <div class="thumbnail">
                       <div class="course">
                         <img src="./images/<?php echo $image;?>" alt="">
                       </div>
                       <div class="caption">
                           <h5><?php echo $course; ?></h5>
                       </div>
                   </div>
                  </a>
               </div>
             <?php $count++;
                   if($count % 4 === 0 || $count === sizeof($term1_courses)):
              ?>
               </div>
             <?php endif; ?>
           <?php endforeach; ?>
       </div>
     </div>
     <div id="term2" class="tab-pane fade">
       <div class="container inner-container">
           <h1>Term 2</h1>
           <?php
             $count = 0;
             foreach($term2_courses as $course => $image):
           ?>
             <?php if($count % 4 === 0): ?>
               <div class="row text-center">
             <?php endif; ?>
               <div class="col-md-3 col-sm-6">
                 <a onclick="spinner_transition(this, '<?php $cs = urlencode($course); echo "./note-list.php?course=$cs"; ?>'); return false;" href="#">
                   <div class="thumbnail">
                       <div class="course">
                         <img src="./images/<?php echo $image;?>" alt="">
                       </div>
                       <div class="caption">
                           <h5><?php echo $course; ?></h5>
                       </div>
                   </div>
                  </a>
               </div>
             <?php $count++; if($count % 4 === 0 || $count === sizeof($term2_courses)): ?>
               </div>
             <?php endif; ?>
           <?php endforeach; ?>
       </div>
     </div>
     <div id="term3" class="tab-pane fade">
       <div class="container inner-container">
           <h1>Term 3</h1>
           <?php
             $count = 0;
             foreach($term3_courses as $course => $image):
           ?>
             <?php if($count % 4 === 0): ?>
               <div class="row text-center">
             <?php endif; ?>
               <div class="col-md-3 col-sm-6">
                  <a onclick="spinner_transition(this, '<?php $cs = urlencode($course); echo "./note-list.php?course=$cs"; ?>'); return false;" href="#">
                   <div class="thumbnail">
                       <div class="course">
                         <img src="./images/<?php echo $image;?>" alt="">
                       </div>
                       <div class="caption">
                           <h5><?php echo $course; ?></h5>
                       </div>
                   </div>
                  </a>
               </div>
             <?php $count++; if($count % 4 === 0 || $count === sizeof($term3_courses)): ?>
               </div>
             <?php endif; ?>
           <?php endforeach; ?>
       </div>
     </div>
     <div id="term4" class="tab-pane fade">
       <div class="container inner-container">
           <h1>Term 4</h1>
           <?php
             $count = 0;
             foreach($term4_courses as $course => $image):
           ?>
             <?php if($count % 4 === 0): ?>
               <div class="row text-center">
             <?php endif; ?>
               <div class="col-md-3 col-sm-6">
                 <a onclick="spinner_transition(this, '<?php $cs = urlencode($course); echo "./note-list.php?course=$cs"; ?>'); return false;" href="#">
                   <div class="thumbnail">
                       <div class="course">
                         <img src="./images/<?php echo $image;?>" alt="">
                       </div>
                       <div class="caption">
                           <h5><?php echo $course; ?></h5>
                       </div>
                   </div>
                  </a>
               </div>
             <?php $count++; if($count % 4 === 0 || $count === sizeof($term4_courses)): ?>
               </div>
             <?php endif; ?>
           <?php endforeach; ?>
       </div>
     </div>
     <div id="options" class="tab-pane fade">
       <div class="container inner-container">
           <h1>Web and Mobile</h1>
           <?php
             $count = 0;
             foreach($web_mobile as $course => $image):
           ?>
             <?php if($count % 4 === 0): ?>
               <div class="row text-center">
             <?php endif; ?>
               <div class="col-md-3 col-sm-6">
                  <a onclick="spinner_transition(this, '<?php $cs = urlencode($course); echo "./note-list.php?course=$cs"; ?>'); return false;" href="#">
                   <div class="thumbnail">
                       <div class="course">
                         <img src="./images/<?php echo 'options/' . $image;?>" alt="">
                       </div>
                       <div class="caption">
                           <h5><?php echo $course; ?></h5>
                       </div>
                   </div>
                  </a>
               </div>
             <?php $count++;
                   if($count % 4 === 0 || $count === sizeof($web_mobile)):
              ?>
               </div>
             <?php endif; ?>
           <?php endforeach; ?>
       </div>
       <div class="container inner-container">
           <h1>Database</h1>
           <?php
             $count = 0;
             foreach($database as $course => $image):
           ?>
             <?php if($count % 4 === 0): ?>
               <div class="row text-center">
             <?php endif; ?>
               <div class="col-md-3 col-sm-6">
                  <a onclick="spinner_transition(this, '<?php $cs = urlencode($course); echo "./note-list.php?course=$cs"; ?>'); return false;" href="#">
                   <div class="thumbnail">
                       <div class="course">
                         <img src="./images/<?php echo 'options/' . $image;?>" alt="">
                       </div>
                       <div class="caption">
                           <h5><?php echo $course; ?></h5>
                       </div>
                   </div>
                  </a>
               </div>
             <?php $count++;
                   if($count % 4 === 0 || $count === sizeof($database)):
              ?>
               </div>
             <?php endif; ?>
           <?php endforeach; ?>
       </div>
       <div class="container inner-container">
           <h1>Client Server</h1>
           <?php
             $count = 0;
             foreach($client_server as $course => $image):
           ?>
             <?php if($count % 4 === 0): ?>
               <div class="row text-center">
             <?php endif; ?>
               <div class="col-md-3 col-sm-6">
                  <a onclick="spinner_transition(this, '<?php $cs = urlencode($course); echo "./note-list.php?course=$cs"; ?>'); return false;" href="#">
                   <div class="thumbnail">
                       <div class="course">
                         <img src="./images/<?php echo 'options/' . $image;?>" alt="">
                       </div>
                       <div class="caption">
                           <h5><?php echo $course; ?></h5>
                       </div>
                   </div>
                  </a>
               </div>
             <?php $count++;
                   if($count % 4 === 0 || $count === sizeof($client_server)):
              ?>
               </div>
             <?php endif; ?>
           <?php endforeach; ?>
       </div>
       <div class="container inner-container">
           <h1>Cloud Computing</h1>
           <?php
             $count = 0;
             foreach($cloud_computing as $course => $image):
           ?>
             <?php if($count % 4 === 0): ?>
               <div class="row text-center">
             <?php endif; ?>
               <div class="col-md-3 col-sm-6">
                  <a onclick="spinner_transition(this, '<?php $cs = urlencode($course); echo "./note-list.php?course=$cs"; ?>'); return false;" href="#">
                   <div class="thumbnail">
                       <div class="course">
                         <img src="./images/<?php echo 'options/' . $image;?>" alt="">
                       </div>
                       <div class="caption">
                           <h5><?php echo $course; ?></h5>
                       </div>
                   </div>
                  </a>
               </div>
             <?php $count++;
                   if($count % 4 === 0 || $count === sizeof($cloud_computing)):
              ?>
               </div>
             <?php endif; ?>
           <?php endforeach; ?>
       </div>
       <div class="container inner-container">
           <h1>Data Communications</h1>
           <?php
             $count = 0;
             foreach($data_comm as $course => $image):
           ?>
             <?php if($count % 4 === 0): ?>
               <div class="row text-center">
             <?php endif; ?>
               <div class="col-md-3 col-sm-6">
                  <a onclick="spinner_transition(this, '<?php $cs = urlencode($course); echo "./note-list.php?course=$cs"; ?>'); return false;" href="#">
                   <div class="thumbnail">
                       <div class="course">
                         <img src="./images/<?php echo 'options/' . $image;?>" alt="">
                       </div>
                       <div class="caption">
                           <h5><?php echo $course; ?></h5>
                       </div>
                   </div>
                  </a>
               </div>
             <?php $count++;
                   if($count % 4 === 0 || $count === sizeof($data_comm)):
              ?>
               </div>
             <?php endif; ?>
           <?php endforeach; ?>
       </div>
       <div class="container inner-container">
           <h1>Digital Processing</h1>
           <?php
             $count = 0;
             foreach($digi_pro as $course => $image):
           ?>
             <?php if($count % 4 === 0): ?>
               <div class="row text-center">
             <?php endif; ?>
               <div class="col-md-3 col-sm-6">
                  <a onclick="spinner_transition(this, '<?php $cs = urlencode($course); echo "./note-list.php?course=$cs"; ?>'); return false;" href="#">
                   <div class="thumbnail">
                       <div class="course">
                         <img src="./images/<?php echo 'options/' . $image;?>" alt="">
                       </div>
                       <div class="caption">
                           <h5><?php echo $course; ?></h5>
                       </div>
                   </div>
                  </a>
               </div>
             <?php $count++;
                   if($count % 4 === 0 || $count === sizeof($digi_pro)):
              ?>
               </div>
             <?php endif; ?>
           <?php endforeach; ?>
       </div>
       <div class="container inner-container">
           <h1>Technical Programming</h1>
           <?php
             $count = 0;
             foreach($tech_pro as $course => $image):
           ?>
             <?php if($count % 4 === 0): ?>
               <div class="row text-center">
             <?php endif; ?>
               <div class="col-md-3 col-sm-6">
                  <a onclick="spinner_transition(this, '<?php $cs = urlencode($course); echo "./note-list.php?course=$cs"; ?>'); return false;" href="#">
                   <div class="thumbnail">
                       <div class="course">
                         <img src="./images/<?php echo 'options/' . $image;?>" alt="">
                       </div>
                       <div class="caption">
                           <h5><?php echo $course; ?></h5>
                       </div>
                   </div>
                  </a>
               </div>
             <?php $count++;
                   if($count % 4 === 0 || $count === sizeof($tech_pro)):
              ?>
               </div>
             <?php endif; ?>
           <?php endforeach; ?>
       </div>
       <div class="container inner-container">
           <h1>Information Systems</h1>
           <?php
             $count = 0;
             foreach($is as $course => $image):
           ?>
             <?php if($count % 4 === 0): ?>
               <div class="row text-center">
             <?php endif; ?>
               <div class="col-md-3 col-sm-6">
                 <a onclick="spinner_transition(this, '<?php $cs = urlencode($course); echo "./note-list.php?course=$cs"; ?>'); return false;" href="#">
                   <div class="thumbnail">
                       <div class="course">
                         <img src="./images/<?php echo 'options/' . $image;?>" alt="">
                       </div>
                       <div class="caption">
                           <h5><?php echo $course; ?></h5>
                       </div>
                   </div>
                  </a>
               </div>
             <?php $count++;
                   if($count % 4 === 0 || $count === sizeof($is)):
              ?>
               </div>
             <?php endif; ?>
           <?php endforeach; ?>
       </div>
     </div>
   </div>
   <div id="spinner">
     <img id='spinner-img' src='./images/spinner2.gif'/>
   </div>
<?php
  include 'partials/dashboard-footer.php';
  ob_end_flush();
?>
