<?php
include_once('user/includes/dbconnection.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Bugema University</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  
  <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="css/landing-page.min.css" rel="stylesheet">
  <style type="text/css">
    body {
  background: linear-gradient(rgba(253, 200, 299, 0.7), rgba(200, 71, 90, 0.5)), url("img/admin.jfif") center center no-repeat;
  
/*  below values are optional */
  background-attachment:fixed;
  background-size: cover;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    font-family: 'Petit Formal Script', cursive;
    font-size: 70px;
    text-align: center;
    color: white;
    text-shadow: 0 0 2px black;
}
  </style>
</head>

<body background="admin.jfif">

  <!-- Navigation -->
 

  <!-- Masthead -->

  

<hr />
  <!-- Image Showcases -->
  <p>Welcome To Bugema University<br>Student Admission Portal</p>
  <div style="margin-top: 25px;">&nbsp;</div>
   <a class="btn btn-success" href="user/login.php">Existant Applicant</a>
        <a class="btn btn-info" href="user/signup.php">New Applicant</a>
        <a class="btn btn-warning" href="selected-application.php">Admission List</a>
          <a class="btn btn-primary" href="admin/login.php">Admin Login</a>
  <!--
  <section class="showcase">
    <div class="container-fluid p-0">
      <div class="row no-gutters">

        <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('img/college.jpg');"></div>

        <div class="col-lg-6 order-lg-1 my-auto showcase-text">
        
       <h2>Latest notification</h2>
<ul>
<?php $query=mysqli_query($con,"select * from tblnotice");
while ($row=mysqli_fetch_array($query)) {
?>
<li><a href="notice-details.php?nid=<?php echo $row['ID'];?>" target="_blank"><?php echo $row['Title'];?></li>
<?php } ?>
</ul>

        </div>
      </div>
 
      </div>
    </div>
  </section>


-->

  <!-- Footer -->
 

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
