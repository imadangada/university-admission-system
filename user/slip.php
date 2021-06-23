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
        $tc=$_FILES["tcimage"]["name"];
        $tenmarksheet=$_FILES["hscimage"]["name"];
        $twlevemaksheet=$_FILES["sscimage"]["name"];
        $gramarksheet=$_FILES["graimage"]["name"];
        $pgmarksheet=$_FILES["pgraimage"]["name"];
    
$extensiontc = substr($tc,strlen($tc)-4,strlen($tc));
$extensiontm = substr($tenmarksheet,strlen($tenmarksheet)-4,strlen($tenmarksheet));
$extensiontwm = substr($twlevemaksheet,strlen($twlevemaksheet)-4,strlen($twlevemaksheet));

// allowed extensions
$allowed_extensions = array(".jpg","jpeg",".png",".gif",".pdf",".PDF");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extensiontc,$allowed_extensions))
{
echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif/pdf format allowed');</script>";
}
elseif(!in_array($extensiontm,$allowed_extensions))
{
echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif/pdf format allowed');</script>";
}
elseif(!in_array($extensiontwm,$allowed_extensions))
{
echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif/pdf format allowed');</script>";
}


else
{
//rename upload file
$tc=md5($tc).$extensiontc;
$tm=md5($tenmarksheet).$extensiontm;
$twm=md5($twlevemaksheet).$extensiontwm;
if($gramarkshee!=""){
$gra=md5($gramarksheet).$extensiongra;
} else { $gra="";}

if($pgmarksheet!=""){
$pgra=md5($pgmarksheet).$extensionpgra;
} else { $pgra="";}
     move_uploaded_file($_FILES["tcimage"]["tmp_name"],"userdocs/".$tc);
     move_uploaded_file($_FILES["hscimage"]["tmp_name"],"userdocs/".$tm);
     move_uploaded_file($_FILES["sscimage"]["tmp_name"],"userdocs/".$twm);
     move_uploaded_file($_FILES["graimage"]["tmp_name"],"userdocs/".$gra);
     move_uploaded_file($_FILES["pgraimage"]["tmp_name"],"userdocs/".$pgra);
    $query=mysqli_query($con,"insert into tbldocument(UserID,TransferCertificate,TenMarksheeet,TwelveMarksheet,GraduationCertificate,PostgraduationCertificate) value('$uid','$tc','$tm','$twm','$gra','$pgra')");
    if ($query) {
    $msg="Data has been uploaded successfully.";
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }

  
}
}
  ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>

  <title>College Addmission Management System</title>
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
  <!-- jQuery library -->
<script src="js/jquery.min.js"></script>

<!-- jsPDF library -->
<script src="js/jsPDF/dist/jspdf.min.js"></script>

<script src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>

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
      <!-- <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">
           Upload Documents
          </h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a>
                </li>
            
                </li>
                <li class="breadcrumb-item active">Documents
                </li>
                
              </ol>
            </div>
          </div>
        </div>
   
      </div>-->
      <div class="content-body">
        <!-- Input Mask start -->
   
        <!-- Formatter start -->
<!--<form name="submit" method="post" enctype="multipart/form-data">        
        <section class="formatter" id="formatter">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Upload Documents</h4>

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
  <h5>Transfer Certificate(TC)</h5>
   <div class="form-group">
    <input class="form-control white_bg" id="tcimage" name="tcimage"  type="file" required>
    </div>
</fieldset>
                 
</div>
<div class="col-xl-6 col-lg-12">
 <fieldset>
  <h5>10th Marksheet                  </h5>
   <div class="form-group">
    <input class="form-control white_bg" id="hscimage" name="hscimage"  type="file" required>
    </div>
</fieldset>                 
</div>
</div>
 <div class="row">
<div class="col-xl-6 col-lg-12">
 <fieldset>
  <h5>12th Mark Sheet                   </h5>
   <div class="form-group">
    <input class="form-control white_bg" id="sscimage" name="sscimage"  type="file" required>
    </div>
</fieldset>                 
</div>
<div class="col-xl-6 col-lg-12">
  <fieldset>
  <h5>Graduation Certificate(if any)                </h5>
   <div class="form-group">
    <input class="form-control white_bg" id="graimage" name="graimage"  type="file">
    </div>
</fieldset>
 </div>
                    </div>        
 <div class="row">
<div class="col-xl-4 col-lg-12">
  <fieldset>
  <h5>Post Graduation Certificate(if any)                </h5>
   <div class="form-group">
    <input class="form-control white_bg" id="pgraimage" name="pgraimage"  type="file" >
    </div>
</fieldset>
</div>
</div>
<div class="row" style="margin-top: 2%">
<div class="col-xl-6 col-lg-12">
<button type="submit" name="submit" class="btn btn-info btn-min-width mr-1 mb-1">Submit</button>
</div>
</div>
 </div>-->

 <style type="text/css">
  .bg{
    background-color: #fff;
    width: 80%;
    margin: auto;
    }
   .watermark{
    background-image: url(../img/logo.jpg);
    margin-top: 50px;
    background-repeat: no-repeat;
    background-attachment: content;
    background-size: 300px 400px;
    background-position: center;
   }
   .txt{
    font-size: 15px;
    color: #000;
    font-style: bold;
    text-align: justify;
    margin-left: 15px;
    margin-right:15px;
    }
  

 </style>
 <!--
        /*var doc = new jsPDF();
var specialElementHandlers = {
    '#editor': function (element, renderer) {
        return true;
    }
};

$('#cmd').click(function () {
    doc.fromHTML($('#content').html(), 15, 15, {
        'width': 170,
            'elementHandlers': specialElementHandlers
    });
    doc.save('sample-file.pdf');
});*/
-->
<script language="javascript" type="text/javascript">
        function printDiv(divID) {
            //Get the HTML of div
            var divElements = document.getElementById(divID).innerHTML;
            //Get the HTML of whole page
            var oldPage = document.body.innerHTML;

            //Reset the page's HTML with div's HTML only
            document.body.innerHTML = 
              "<html><head><title></title></head><body>" + 
              divElements + "</body>";

            //Print Page
            window.print();

            //Restore orignal HTML
            document.body.innerHTML = oldPage;

          
        }
    </script>
    

 
  
    <div id="printablediv" style="width: 100%; background-color: white; height: auto;">  
 <div class="bg">
  <div id="content">     
  
         <table class="table mb-0">
    <tr>
    
<td>
<h1 align="center">FEDERAL COLLEGE OF AGRICULTURAL PRODUCE TECHNOLOGY(FCAPT) </h1><h3><center><u>STUDENT APPLICATION PAYMENT SLIP</u></center></h3>
<p class="txt"><center>PMB: 3013, Plot 54 – 56, CBN Quarters Road, Hotoro, Kano <br>www.fcapt.edu.ng</center></p>
                     </td>


                      </tr>
                      </table>
  

 



 
               <?php
$pid=$_SESSION['uid'];
$ret=mysqli_query($con,"select * from tbluser where ID='$pid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?> 
<table class="table mb-0">
<tr>
  <th >Name Paid With</th><td> <?php  echo $row['FirstName'];?> <?php  echo $row['LastName'];?>
</td>
</tr>
<tr>
  <th>Amount Paid</th><td>3,500</td>
</tr>
<tr>
  <th>Session</th><td><?php echo date("Y",strtotime("-1 year")); echo ("/");  //last year "2013"
echo date("Y"); ?></td>

<?php  } ?>
<?php 
$rtp =mysqli_query($con ,"SELECT * from tbladmapplications where UserID='$uid'");
$row=mysqli_fetch_array($rtp);
if($row>0){
  ?>
<tr>
  <th>Course Applied</th><td><?php echo $row['CourseApplied'];?></td>
</tr>
<?php  } ?>
<?php 
$rtp =mysqli_query($con ,"SELECT * from codes where reg_no='$uid'");
$row=mysqli_fetch_array($rtp);
if($row>0){
  ?>


<tr>
  <th>Pin Used</th><td><?php echo $row['pin'];?></td>
</tr>

<tr>
  <th>Payment Date And Time</th><td><?php echo $row['date_reg'];?></td>
</tr>
  </tr>
</table>

</p> 
<?php  } ?>




  






 </div>
              </div>
              
             <center> <input type="button" class="btn btn-soundcloud" value="Print Slip" onclick="javascript:printDiv('printablediv')" />
               </center>
               <div style="margin-top: 10px;">&nbsp;</div>
            </div>
          </div>
        </section>
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
