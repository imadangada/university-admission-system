<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(strlen($_SESSION['uid'])==0){
header('location:logout.php');
} else {

if (isset($_POST['submit'])) {
$uid=$_SESSION['uid'];
$pin =$_POST['pin'];





$query3="SELECT * FROM codes WHERE pin='$pin'";
$result3=mysqli_query($con,$query3) or die(mysqli_error($con));
$count3=mysqli_num_rows($result3);
if ($count3 == 0){

         echo "<script>alert('The pin you entered is invalid. Try another one.')</script>";
           }else{
  while ($row=mysqli_fetch_assoc($result3)){
      $uid=$_SESSION['uid'];
      $status=$row['status'];



      if($status == "1"){
        echo "<script>alert('The pin you entered is already used. Try another one.')</script>";
      }else{
  $status++;
        $sql="UPDATE codes SET reg_no='$uid', status='$status' WHERE pin='$pin'";
        if($con -> query($sql)===true){
          echo "<script>alert('The pin is valid and your payment is successful. Click ok to continue.')</script>";
         echo "<script>document.location='addmission-form.php'</script>";
        }

}
       }
   }
}

 
  



?>
<!DOCTYPE html>
<html>
<head>
 <title>Payment</title>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
  rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
  rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="app-assets/css/vendors.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/app.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu-modern.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/forms/extended/form-extended.css">
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">                   <style type="text/css">
  <style>
  fieldset{
    background-color: white;
    filter: alpha(opacity=60);
    opacity: 0.8;
    margin-top: 5%;
    border: 5.5px solid #fff;
    border-radius: 30px;
    width: 40%;
    height:auto;
  }
 button{
  background-color:#28a745;
  color:#fff;
  width:90%;
  height: 50px;
  margin-left: 2%;
  font-size: 16pt;
  border-style: hidden;
  border-radius: 0px;
  border-bottom: 2.0px solid #28a745;
  outline: none;
 }
 button:hover{
  width: 91%;
  background-color:#28a745;
  color:white;
  font-size: 18pt;
 }
 fieldset{
  color:#28a745;
  border:3.5px solid #28a745;
  width: 90%;
 }
 @media print {
  body{
    padding-top: 15%;
    padding-left: 20%;
    background-color: #fff;
  }
  .main-selector{
    display: none;
  }
  .table_row{
    width: 100%;
  }
  
  .text-fcapt{
    display: none;
  }
  fieldset{
    width: 100%;
  }
  button{
    display: none;
  }
 }
</style>
<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
<?php include('includes/header.php');?>
<?php include('includes/leftbar.php');?>
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">
           STUDENT Admission Form
          </h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a>
                </li>
            
                </li>
                <li class="breadcrumb-item active">PAYMENT
                </li>
              </ol>
            </div>
          </div>
        </div>
   
      </div>
      <style>
        .center{
          width: 50%;
          height: 350px;
          background-color: #fff;
          border-radius: 10px;
          margin-bottom: 20px;
          margin-top: 20px;
          margin-right: auto;
          margin-left: auto;
          box-shadow: 35px 205px 250px 205px #ccd;
        }

      </style>
      
        <br /><br />
        <h3 align="center">BUGEMA UNIVERSITY</h3>
        <?php

$ret=mysqli_query($con,"select FirstName, LastName, MobileNumber, Email from tbluser where ID='$uid'");
$row=mysqli_fetch_array($ret);
$name=$row['FirstName'];
$lname=$row['LastName'];
$bmobile=$row['MobileNumber'];
$bemail=$row['Email'];

?>
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
  <td><?php echo $row['exam_year'];?></td>
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
<?php } } else { ?>
      <form action="payment.php" method="post">
    <div class="row">
      <div class="col-md-4 col-lg-10 col-xl-10 col-sm-10 main-selector" style="margin: auto;">
        
        

    <label align="center">Enter Pin Purchased</label>
    <input type="tel" name="pin" placeholder="Enter Pin Purchased" style="margin-top: 5px;" class="form-control" required="required">
    <div class="my-btn">
    <button type="submit" class="btn btn-sucess" name="submit"  style="margin-top: 5%; border-radius: 5px;">Continue</button>
    </div>
      </form>
      </div></div>
       <?php } ?>
  <?php include('dist/includes/footer.php');?>
</body>
</script>
</html>
<?php } ?>