<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['uid']==0)) {
  header('location:logout.php');
  } else{
if(isset($_POST['submit']))
  {
    $uid=$_SESSION['uid'];
    $coursename=$_POST['coursename'];
    $courseapplied2=$_POST['courseapplied2'];
    $fathername=$_POST['fathername'];
    $mothername=$_POST['mothername'];
    $dob=$_POST['dob'];
    $nationality=$_POST['nationality'];
    $gender=$_POST['gender'];
    $category=$_POST['category'];
    $coradd=$_POST['coradd'];
    $peradd=$_POST['peradd'];
    $exam_type=$_POST['exam_type'];
    $year=$_POST['year'];
    $center_no=$_POST['center_no'];
    $exam_no=$_POST['exam_no'];
    $secboard=$_POST['10thboard'];
    $SecondaryBoardyop=$_POST['SecondaryBoardyop'];
    $secper=$_POST['10thpercentage'];
    $secstream=$_POST['10thstream'];
    $ssecboard=$_POST['12thboard'];
    $ssecyop=$_POST['12thpyear'];
    $ssecper=$_POST['12thpercentage'];
    $ssecstream=$_POST['12thstream'];
    $grauni=$_POST['graduation'];
    $grayop=$_POST['graduationpyeaer'];
    $graper=$_POST['graduationpercentage'];
    $grastream=$_POST['graduationstream'];
    $pguni=$_POST['postgraduation'];
    $PGUniyop=$_POST['PGUniyop'];
    $pgper=$_POST['pgpercentage'];
    $pgstream=$_POST['pgstream'];
    $s9=$_POST['s9'];
    $m9=$_POST['m9'];
    $j_no=$_POST['j_no'];
    $j_score=$_POST['j_score'];
    $c1=$_POST['c1'];
    $c2=$_POST['c2'];
    $c3=$_POST['c3'];
    $c4=$_POST['c4'];
    $dec=$_POST['declaration'];
    $sign=$_POST['signature'];
   /* $filename = $_FILES[‘UserPic’][‘name’];
$filetmpname = $_FILES[‘UserPic’][‘tmp_name’];
//folder where images will be uploaded
$folder = ‘userimages/’;
//function for saving the uploaded images in a specific folder
move_uploaded_file($filetmpname, $folder.$filename);*/

    $UserPic = $_FILES["image"]["name"];
        $type = $_FILES["image"]["type"];
        $size = $_FILES["image"]["size"];
        $temp = $_FILES["image"]["tmp_name"];
        $error = $_FILES["image"]["error"];
      
        if ($error > 0){
          die("Error uploading file! Code $error.");
          }
        else{
          if($size > 100000000000) //conditions for the file
            {
            die("Format is not allowed or file size is too big!");
            }
        else
              {
          move_uploaded_file($temp, "userimages/".$UserPic);
              }
          }
    /*$upic=$_FILES["UserPic"]["name"];
     
$extension = substr($upic,strlen($upic)-4,strlen($upic));
// allowed extensions
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{
     move_uploaded_file($_FILES["userpic"]["tmp_name"],"userimages/".$userpic);*/
    $query=mysqli_query($con,"insert into tbladmapplications(UserId,CourseApplied,courseapplied2,FatherName,MotherName,DOB,Nationality,Gender,Category,CorrespondenceAdd,PermanentAdd,exam_type,year,center_no,exam_no,SecondaryBoard,SecondaryBoardyop,SecondaryBoardper,SecondaryBoardstream,SSecondaryBoard,SSecondaryBoardyop,SSecondaryBoardper,SSecondaryBoardstream,GraUni,GraUniyop,GraUnidper,GraUnistream,PGUni,PGUniyop,PGUniper,PGUnistream,s9,m9,j_no,j_score,c1,c2,c3,c4,Signature,UserPic) value('$uid','$coursename','$courseapplied2','$fathername','$mothername','$dob','$nationality','$gender','$category','$coradd','$coradd','$exam_type','$year','$center_no','$exam_no','$secboard','$SecondaryBoardyop','$secper','$secstream','$ssecboard','$ssecyop','$ssecper','$ssecstream','$grauni','$grayop','$graper','$grastream','$pguni','$PGUniyop','$pgper','$pgstream','$s9','$m9','$j_no','$j_score','$c1','$c2','$c3','$c4','$sign','$UserPic')");
    if ($query) {
    $msg="Data has been added successfully.";
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }
}
  ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>

  <title>FCAPT - Admission Form</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
  rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
  rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="app-assets/css/vendors.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/app.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu-modern.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/forms/extended/form-extended.css">
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
     <style>
    .errorWrap {
    padding: 10px;
    margin: 20px 0 0px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
    </style>
</head>
<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
<?php include('includes/header.php');?>
<?php include('includes/leftbar.php');?>
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">
           Admission Application Form
          </h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a>
                </li>
            
                </li>
                <li class="breadcrumb-item active">Application
                </li>
              </ol>
            </div>
          </div>
        </div>
   
      </div>
      <div class="content-body">
<?php 
$stuid=$_SESSION['uid'];
$query=mysqli_query($con,"select * from tbladmapplications where  UserId=$stuid");
$rw=mysqli_num_rows($query);
if($rw>0)
{
while($row=mysqli_fetch_array($query)){
?>
<p style="font-size:16px; color:" align="center">Your Addmission Form already submitted.</p>
<table class="table mb-0">
    <tr>
    <td>

 <center><img src="../img/admin.jfif" width="150" height="150"></center>              
</td>
<td>
<h1><center>BUGEMA UNIVERSITY </h1><h2><center><u>STUDENT APPLICATION FORM</u></center></h2>
 </td>

<td>
<center><img src="userimages/<?php echo $row['UserPic'];?>" width="150" height="150"></center>
                      </td>
                      </tr>
                      </table>
<table class="table mb-0">
  <tr>
  <td>First Name</td>
  <td><?php echo $name; ?></td>
  <td>Last Name</td>
  <td><?php echo $lname; ?></td>
</tr>
<tr>
  <td>Phone Number</td>
  <td><?php echo $bmobile; ?></td>
 
  <td>Email Address</td>
  <td><?php echo $bemail; ?></td>
</tr>
<tr>
  <td>Program</td>
  <td><?php echo $row['Category'];?></td>
  <td>First Choice</td>
  <td><?php echo $row['CourseApplied'];?></td>
</tr>

<tr>
  <td>Second Choice</td>
  <td><?php echo $row['courseapplied2'];?></td>
  <td>State Of Origin</td>
  <td><?php echo $row['FatherName'];?></td>  
</tr>
<tr>
  <td>Nationality</td>
  <td><?php echo $row['Nationality'];?></td>
  <td>Date Of Birth</td>
  <td><?php echo $row['DOB'];?></td>
</tr>
<tr>
  <td>Gender</td>
  <td><?php echo $row['Gender'];?></td>
  <td>Correspondence Address</td>
  <td><?php echo $row['CorrespondenceAdd'];?></td>
</tr>
<tr>
  <td>Local Govt</td>
  <td><?php echo $row['MotherName'];?></td>
 <td>Permanent Address</td>
  <td><?php echo $row['PermanentAdd'];?></td>
  </tr>
</table>
<table class="table mb-0">
  <tr>
    O'level Details
</tr>
<tr>
  <td>Exam Type</td>
  <td><?php echo $row['exam_type'];?></td>
  <td>Exam Year</td>
  <td><?php echo $row['year'];?></td>
</tr>
<tr>
  <td>Center Number</td>
   <td><?php echo $row['center_no'];?></td>
   <td>Exam Number</td>
   <td><?php echo $row['exam_no'];?></td>
</tr>
</table>
<table class="table mb-0">
<tr>
  <th>#</th>
   <th>Subjects</th>
    <th>Grade</th>
    <th>Subjects</th>
    <th>Grade</th>
     
</tr>
<tr>
<th>1</th>
  <td><?php echo $row['SecondaryBoard'];?></td>
  <td><?php echo $row['SecondaryBoardyop'];?></td>
   <td><?php echo $row['SecondaryBoardper'];?></td>
   <td><?php echo $row['SecondaryBoardstream'];?></td>
</tr>
<tr>
  <th>2</th>
  <td><?php echo $row['SSecondaryBoard'];?></td>
   <td><?php echo $row['SSecondaryBoardyop'];?></td>
   <td><?php echo $row['SSecondaryBoardper'];?></td>
    <td><?php echo $row['SSecondaryBoardstream'];?></td>
</tr>
<tr>
  <th>3</th>
  <td><?php echo $row['GraUni'];?></td>
  <td><?php echo $row['GraUniyop'];?></td>
  <td><?php echo $row['GraUnidper'];?></td>
  <td><?php echo $row['GraUnistream'];?></td>
</tr>
<tr>
  <th>4</th>
  <td><?php echo $row['PGUni'];?></td>
  <td><?php echo $row['PGUniyop'];?></td>
  <td><?php echo $row['PGUniper'];?></td>
  <td><?php echo $row['PGUnistream'];?></td>
</tr>
<tr>
  <th>5</th>
  <td><?php echo $row['s9'];?></td>
  <td><?php echo $row['m9'];?></td>
  </tr>
</table>
<table class="table mb-0">
  <tr>Jamb Details
</tr>
<tr>
  <td>Jamb Number</td>
  <td><?php echo $row['j_no'];?></td>

  <td>Jamb Score</td>
  <td><?php echo $row['j_score'];?></td>
</tr>
  <td>Subject 1</td>
  <td><?php echo $row['c1'];?></td>
  <td>Subject 2</td>
  <td><?php echo $row['c2'];?></td>
</tr>
</tr>
  <td>Subject 3</td>
  <td><?php echo $row['c3'];?></td>
  <td>Subject 4</td>
  <td><?php echo $row['c4'];?></td>
</tr>
</table>
<table class="table mb-0">
<tr>
  <th>Admin Remark</th>
  <td><?php echo $row['AdminRemark'];?></td>
</tr>
<tr>
  <th>Admin Status</th>
 <td><?php 
 if($row['AdminStatus']==""){
echo "admin remark is pending";
} 

 if($row['AdminStatus']=="1"){
  echo "Selected";
}
    
if($row['AdminStatus']=="2"){
  echo "Rejected";
}
                    ?></td>
</tr>
<tr>
  <th>Admin Remark Date</th>
  <td><?php echo $row['AdminRemarkDate'];?></td>
</tr>
  <tr>
    <th colspan="2"><font color="red">Declaration : </font>I hereby state that the facts mentioned above are true to the best of my knowledge and belief.<br />
(<?php  echo $row['Signature'];?>)
    </th>
  </tr>
</table>
<a href="slip.php"><button class="btn btn-info">Print Payment Slip</button></a>
<?php } } else { ?>
<form name="submit" method="post" enctype="multipart/form-data">        
        <section class="formatter" id="formatter">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Addimission Form</h4>

                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                  
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                      
                    </ul>
                  </div>
                </div>
                <div class="card-content">
                  <div class="card-body">
 <?php if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>



<div class="row">
<div class="col-xl-6 col-lg-12">
 <fieldset>
  <h5>Fisrt Choice Course Of Study                   </h5>
   <div class="form-group">
   <select name='coursename' id="coursename" class="form-control white_bg">
     <option value="">Course Applied</option>
      <?php $query=mysqli_query($con,"select * from tblcourse");
              while($row=mysqli_fetch_array($query))
              {
              ?>    
              <option value="<?php echo $row['CourseName'];?>"><?php echo $row['CourseName'];?></option>
                  <?php } ?>  
   </select>
    </div>
</fieldset>
                   
</div>
<div class="col-xl-6 col-lg-12">
 <fieldset>
  <h5>Second Choice Course Of Study                   </h5>
   <div class="form-group">
   <select name='courseapplied2' id="courseapplied2" class="form-control white_bg">
     <option value="">Course Applied</option>
      <?php $query=mysqli_query($con,"select * from tblcourse");
              while($row=mysqli_fetch_array($query))
              {
              ?>    
              <option value="<?php echo $row['CourseName'];?>"><?php echo $row['CourseName'];?></option>
                  <?php } ?>  
   </select>
    </div>
</fieldset>
                   
</div>
</div>
<div class="row">
<div class="col-xl-12 col-lg-12">
 <fieldset>
  <h5>Student Pic                   </h5>
   <div class="form-group">
    <input class="form-control white_bg" id="image " name="image"  type="file" required>
    </div>
</fieldset>                  
</div>
 </div>               
 <div class="row">
<div class="col-xl-6 col-lg-12">
 <fieldset>
  <h5>State Of Origin                  </h5>
   <div class="form-group">
   <input class="form-control white_bg" id="fathername" name="fathername"  type="text" required>
    </div>
</fieldset>               
</div>
<div class="col-xl-6 col-lg-12">
 <fieldset>
  <h5>Local Govt                 </h5>
   <div class="form-group">
   <input class="form-control white_bg" id="mothername" name="mothername"  type="text" required>
                          </div>
                        </fieldset>
                      </div>
                    </div>
<div class="row">
<div class="col-xl-4 col-lg-12">
 <fieldset>
  <h5>DOB                   </h5>
   <div class="form-group">
   <input class="form-control white_bg" id="dob" name="dob"  type="text" required>
          <small class="text-muted">DOB Must be in this format (YYYY-MM-DD)</small>
    </div>

</fieldset>                  
</div>
<div class="col-xl-4 col-lg-12">
 <fieldset>
  <h5>Nationality                </h5>
   <div class="form-group">
   <input class="form-control white_bg" id="nationality" name="nationality"  type="text" required>
                          </div>

                        </fieldset>
                      </div>
<div class="col-xl-4 col-lg-12">
 <fieldset>
  <h5>Gender                </h5>
   <div class="form-group">

   <select class="form-control white_bg" id="gender" name="gender"  required>
    <option value="">Select</option>
<option value="Male">Male</option>
<option value="Female">Female</option>
<option value="Transgender">Transgender</option>
   </select>
                          </div>
                        </fieldset>
                      </div>

                    </div>
<div class="row">
  <div class="col-xl-12 col-lg-12">
    <h5>Programme : 
   <input  id="category" name="category"  type="radio" value="Certificate" required> Certificate &nbsp;&nbsp;<input  id="category" name="category"  type="radio" value="Diploma" required> Diploma &nbsp;&nbsp;<input  id="category" name="category" value="Degree" type="radio" required> Degree&nbsp;&nbsp;<input  id="category" name="category"  type="radio" value="Masters" required> Masters &nbsp;&nbsp;<input  id="category" name="category" value="PhD" type="radio" required> PhD</h5>
  </div>
</div>
<div class="row" style="margin-top:1%">
  <div class="col-xl-6 col-lg-12">
    <fieldset>
  <h5>Correspondence Address                  </h5>
   <div class="form-group">
   <input class="form-control white_bg" id="coradd" name="coradd"  type="text" required>
    </div>
</fieldset>
  </div>
  <div class="col-xl-6 col-lg-12">
    <fieldset>
  <h5>Permanent Address                  </h5>
   <div class="form-group">
   <input class="form-control white_bg" id="peradd" name="peradd"  type="text" required>
    </div>
</fieldset>
  </div>
</div>
<div class="row" style="margin-top: 2%">
  <div class="col-xl-12 col-lg-12"><h4 class="card-title">O'level Details</h4>
<hr />
  </div>
</div>
<div class="row" style="margin-top:1%">
  <div class="col-xl-3 col-lg-12">
    <fieldset>
  <h5>Exam Type                  </h5>
   <div class="form-group">
    <select class="form-control white_bg" id="exam_type" name="exam_type"  required>
    <option value="">Select Exam Type</option>
<option value="WAEC">WAEC</option>
<option value="NECO">NECO</option>
<option value="NABTEB">NABTEB</option>
   </select>
    </div>
</fieldset>
  </div>
  <div class="col-xl-3 col-lg-12">
    <fieldset>
  <h5>Exam Year                  </h5>
   <div class="form-group">
   <input class="form-control white_bg" id="year" name="year"  type="text" required>
    </div>
</fieldset>
  </div>
  <div class="col-xl-3 col-lg-12">
    <fieldset>
  <h5>Center Number                  </h5>
   <div class="form-group">
   <input class="form-control white_bg" id="center_no" name="center_no"  type="text" required>
    </div>
</fieldset>
  </div>
  <div class="col-xl-3 col-lg-12">
    <fieldset>
  <h5>Exam Number                  </h5>
   <div class="form-group">
   <input class="form-control white_bg" id="center_no" name="exam_no"  type="text" required>
    </div>
</fieldset>
  </div>
</div>
<div class="row">
<div class="col-xl-12 col-lg-12">
<table class="table mb-0">
<tr>
  <th>#</th>
   <th>Subjects</th>
    <th>Grades</th>
     <th>Subjects</th>
       <th>Grade</th>
</tr>
<tr>
<th>1</th>
<td>   
<select name='10thboard' id="10thboard" class="form-control white_bg">
    <option value="">Course Subject</option>
   <?php $query1=mysqli_query($con,"select * from subjects order by subject asc");
              while($row1=mysqli_fetch_array($query1))
              {
              ?>    
              <option value="<?php echo $row1['subject'];?>"><?php echo $row1['subject'];?></option>
                  <?php } ?>  
   </select>
 </td>
<td>  
 <select class="form-control white_bg" id="SecondaryBoardyop" name="SecondaryBoardyop"  required>
<option value="">Select Grade</option>
<option value="A1">A1</option>
<option value="B2">B2</option>
<option value="B3">B3</option>
<option value="C4">C4</option>
<option value="C5">C5</option>
<option value="C6">C6</option>
<option value="D7">D7</option>
<option value="E8">E8</option>
<option value="F9">F9</option>
   </select>

</td>
<td>   
<select name='10thpercentage' id="10thpercentage" class="form-control white_bg">
    <option value="">Course Subject</option>
   <?php $query1=mysqli_query($con,"select * from subjects order by subject asc");
              while($row1=mysqli_fetch_array($query1))
              {
              ?>    
              <option value="<?php echo $row1['subject'];?>"><?php echo $row1['subject'];?></option>
                  <?php } ?>  
   </select>
</td>
<td>  
<select class="form-control white_bg" id="10thstream" name="10thstream"  required>
<option value="">Select Grade</option>
<option value="A1">A1</option>
<option value="B2">B2</option>
<option value="B3">B3</option>
<option value="C4">C4</option>
<option value="C5">C5</option>
<option value="C6">C6</option>
<option value="D7">D7</option>
<option value="E8">E8</option>
<option value="F9">F9</option>
   </select>
</td>
</tr>
<tr>
<th>2</th>
<td>   
<select name='12thboard' id="12thboard" class="form-control white_bg">
    <option value="">Course Subject</option>
   <?php $query1=mysqli_query($con,"select * from subjects order by subject asc");
              while($row1=mysqli_fetch_array($query1))
              {
              ?>    
              <option value="<?php echo $row1['subject'];?>"><?php echo $row1['subject'];?></option>
                  <?php } ?>  
   </select>
</td>
<td>  
<select class="form-control white_bg" id="12thboard" name="12thpyear"  required>
<option value="">Select Grade</option>
<option value="A1">A1</option>
<option value="B2">B2</option>
<option value="B3">B3</option>
<option value="C4">C4</option>
<option value="C5">C5</option>
<option value="C6">C6</option>
<option value="D7">D7</option>
<option value="E8">E8</option>
<option value="F9">F9</option>
   </select>

</td>
<td>  
<select name='12thpercentage' id="12thpercentage" class="form-control white_bg">
    <option value="">Course Subject</option>
   <?php $query1=mysqli_query($con,"select * from subjects order by subject asc");
              while($row1=mysqli_fetch_array($query1))
              {
              ?>    
              <option value="<?php echo $row1['subject'];?>"><?php echo $row1['subject'];?></option>
                  <?php } ?>  
   </select>
 </td>
<td>   
<select class="form-control white_bg" id="12thstream" name="12thstream"  required>
<option value="">Select Grade</option>
<option value="A1">A1</option>
<option value="B2">B2</option>
<option value="B3">B3</option>
<option value="C4">C4</option>
<option value="C5">C5</option>
<option value="C6">C6</option>
<option value="D7">D7</option>
<option value="E8">E8</option>
<option value="F9">F9</option>
   </select>
</td>
</tr>
<tr>
<th>3</th>
<td>   
<select name='graduation' id="graduation" class="form-control white_bg">
    <option value="">Course Subject</option>
   <?php $query1=mysqli_query($con,"select * from subjects order by subject asc");
              while($row1=mysqli_fetch_array($query1))
              {
              ?>    
              <option value="<?php echo $row1['subject'];?>"><?php echo $row1['subject'];?></option>
                  <?php } ?>  
   </select>
</td>
<td>  
<select class="form-control white_bg" id="graduationpyeaer" name="graduationpyeaer"  required>
<option value="">Select Grade</option>
<option value="A1">A1</option>
<option value="B2">B2</option>
<option value="B3">B3</option>
<option value="C4">C4</option>
<option value="C5">C5</option>
<option value="C6">C6</option>
<option value="D7">D7</option>
<option value="E8">E8</option>
<option value="F9">F9</option>
   </select>
</td>
<td>  
<select name='graduationpercentage' id="graduationpercentage" class="form-control white_bg">
    <option value="">Course Subject</option>
   <?php $query1=mysqli_query($con,"select * from subjects order by subject asc");
              while($row1=mysqli_fetch_array($query1))
              {
              ?>    
              <option value="<?php echo $row1['subject'];?>"><?php echo $row1['subject'];?></option>
                  <?php } ?>  
   </select>
</td>
<td>   
<select class="form-control white_bg" id="graduationstream" name="graduationstream"  required>
<option value="">Select Grade</option>
<option value="A1">A1</option>
<option value="B2">B2</option>
<option value="B3">B3</option>
<option value="C4">C4</option>
<option value="C5">C5</option>
<option value="C6">C6</option>
<option value="D7">D7</option>
<option value="E8">E8</option>
<option value="F9">F9</option>
   </select>
</td>
</tr>
<tr>
<th>4</th>
<td> 
<select name='postgraduation' id="postgraduation" class="form-control white_bg">
    <option value="">Course Subject</option>
   <?php $query1=mysqli_query($con,"select * from subjects order by subject asc");
              while($row1=mysqli_fetch_array($query1))
              {
              ?>    
              <option value="<?php echo $row1['subject'];?>"><?php echo $row1['subject'];?></option>
                  <?php } ?>  
   </select>
 </td>
<td>   
<select class="form-control white_bg" id="PGUniyop" name="PGUniyop"  required>
<option value="">Select Grade</option>
<option value="A1">A1</option>
<option value="B2">B2</option>
<option value="B3">B3</option>
<option value="C4">C4</option>
<option value="C5">C5</option>
<option value="C6">C6</option>
<option value="D7">D7</option>
<option value="E8">E8</option>
<option value="F9">F9</option>
   </select>
 </td>
<td>  
<select name='pgpercentage' id="pgpercentage" class="form-control white_bg">
    <option value="">Course Subject</option>
   <?php $query1=mysqli_query($con,"select * from subjects order by subject asc");
              while($row1=mysqli_fetch_array($query1))
              {
              ?>    
              <option value="<?php echo $row1['subject'];?>"><?php echo $row1['subject'];?></option>
                  <?php } ?>  
   </select>
 </td>
<td>   
<select class="form-control white_bg" id="pgstream" name="pgstream"  required>
<option value="">Select Grade</option>
<option value="A1">A1</option>
<option value="B2">B2</option>
<option value="B3">B3</option>
<option value="C4">C4</option>
<option value="C5">C5</option>
<option value="C6">C6</option>
<option value="D7">D7</option>
<option value="E8">E8</option>
<option value="F9">F9</option>
   </select>

</td>
<tr>
<th>5</th>
<td> 
<select name='s9' id="s9" class="form-control white_bg">
    <option value="">Course Subject</option>
   <?php $query1=mysqli_query($con,"select * from subjects order by subject asc");
              while($row1=mysqli_fetch_array($query1))
              {
              ?>    
              <option value="<?php echo $row1['subject'];?>"><?php echo $row1['subject'];?></option>
                  <?php } ?>  
   </select>
 </td>
<td>   
<select class="form-control white_bg" id="m9" name="m9"  required>
<option value="">Select Grade</option>
<option value="A1">A1</option>
<option value="B2">B2</option>
<option value="B3">B3</option>
<option value="C4">C4</option>
<option value="C5">C5</option>
<option value="C6">C6</option>
<option value="D7">D7</option>
<option value="E8">E8</option>
<option value="F9">F9</option>
   </select>
 </td>
</tr>
</table>
</div>
</div>
<div class="row" style="margin-top:1%">
  <div class="col-xl-12 col-lg-12"><h4 class="card-title"><b>JAMB Details</b></h4> <hr /></div>
  <div class="col-xl-6 col-lg-12">
    <fieldset>
  <h5>Jamb Number                  </h5>
   <div class="form-group">
   <input class="form-control white_bg" id="j_no" name="j_no"  type="text" required>
    </div>
</fieldset>
  </div>
  <div class="col-xl-6 col-lg-12">
    <fieldset>
  <h5>Jamb Score                  </h5>
   <div class="form-group">
   <input class="form-control white_bg" id="j_score" name="j_score"  type="number" required>
    </div>
</fieldset>
  </div>
</div>
<div class="row">
<div class="col-xl-12 col-lg-12">
<table class="table mb-0">
<tr>
  <th>#</th>
   <th>Subject Combination 1</th>
    <th>Subject Combination 2</th>
     <th>Subject Combination 3</th>
       <th>Subject Combination 4</th>
</tr>
<tr>
<th>1</th>
<td>   
<select name='c1' id="c1" class="form-control white_bg">
    <option value="">Select Subject</option>
   <?php $query2=mysqli_query($con,"select * from subjects order by subject asc");
              while($row2=mysqli_fetch_array($query2))
              {
              ?>    
              <option value="<?php echo $row2['subject'];?>"><?php echo $row2['subject'];?></option>
                  <?php } ?>  
   </select>
 </td>
<td>  
 <select name='c2' id="c2" class="form-control white_bg">
    <option value="">Select Subject</option>
   <?php $query2=mysqli_query($con,"select * from subjects order by subject asc");
              while($row2=mysqli_fetch_array($query2))
              {
              ?>    
              <option value="<?php echo $row2['subject'];?>"><?php echo $row2['subject'];?></option>
                  <?php } ?>  
   </select>

</td>
<td>   
<select name='c3' id="c3" class="form-control white_bg">
    <option value="">Select Subject</option>
   <?php $query2=mysqli_query($con,"select * from subjects order by subject asc");
              while($row2=mysqli_fetch_array($query2))
              {
              ?>    
              <option value="<?php echo $row2['subject'];?>"><?php echo $row2['subject'];?></option>
                  <?php } ?>  
   </select>
</td>
<td>  
<select name='c4' id="c4" class="form-control white_bg">
    <option value="">Select Subject</option>
   <?php $query2=mysqli_query($con,"select * from subjects order by subject asc");
              while($row2=mysqli_fetch_array($query2))
              {
              ?>    
              <option value="<?php echo $row2['subject'];?>"><?php echo $row2['subject'];?></option>
                  <?php } ?>  
   </select>
</td>
</tr>
<tr>
  </tr></table>
</hr>
<div class="row" style="margin-top: 2%">
  
<div class="col-xl-12 col-lg-12"><h4 class="card-title"><b>Declartion</b></h4> <hr />
</div>
</div>
 <div class="row">
<div class="col-xl-12 col-lg-12">
<h5><b>I hereby state that the facts mentioned above are true to the best of my knowledge and belief.</b></h5>
 </div>
 </div>               
<div class="row"> 
<div class="col-xl-4 col-lg-12">
<fieldset>
 <input class="form-control white_bg" id="signature" name="signature" placeholder="Signature"  type="text"> 
 </fieldset>  
</div>
</div>
<div class="row" style="margin-top: 2%">
<div class="col-xl-6 col-lg-12">
<button type="submit" name="submit" class="btn btn-info btn-min-width mr-1 mb-1">Submit</button>
</div>
</div>
 </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <?php } ?>
        <!-- Formatter end -->
      </form>  
      </div>
    </div>
  </div>
<?php include('includes/footer.php');?>
  <script src="app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
  <script src="app-assets/vendors/js/forms/extended/typeahead/typeahead.bundle.min.js"
  type="text/javascript"></script>
  <script src="app-assets/vendors/js/forms/extended/typeahead/bloodhound.min.js"
  type="text/javascript"></script>
  <script src="app-assets/vendors/js/forms/extended/typeahead/handlebars.js"
  type="text/javascript"></script>
  <script src="app-assets/vendors/js/forms/extended/inputmask/jquery.inputmask.bundle.min.js"
  type="text/javascript"></script>
  <script src="app-assets/vendors/js/forms/extended/formatter/formatter.min.js"
  type="text/javascript"></script>
  <script src="../../../app-assets/vendors/js/forms/extended/maxlength/bootstrap-maxlength.js"
  type="text/javascript"></script>
  <script src="app-assets/vendors/js/forms/extended/card/jquery.card.js" type="text/javascript"></script>
  <script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
  <script src="app-assets/js/core/app.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/customizer.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/forms/extended/form-typeahead.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/forms/extended/form-inputmask.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/forms/extended/form-formatter.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/forms/extended/form-maxlength.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/forms/extended/form-card.js" type="text/javascript"></script>
</body>
</html>
<?php  } ?>
