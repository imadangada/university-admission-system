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

  <title>FCAPT | Admission Letter</title>
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
<?php 
$stuid=$_SESSION['uid'];
$ret=mysqli_query($con,"select AdminStatus from  tbladmapplications join tbluser on tbluser.ID=tbladmapplications.UserID where tbluser.ID='$stuid' ");
$num=mysqli_fetch_array($ret);
$adstatus=$num['AdminStatus'];
if($num>0 && $adstatus=='1' )
{

$query=mysqli_query($con,"select * from tbldocument where  UserID=$stuid");
$rw=mysqli_num_rows($query);
if($rw>0)
{
while($row=mysqli_fetch_array($query)){
?>
<p style="font-size:16px; color:red" align="center">Your document is already uploaded.</p>

<table class="table mb-0">

<tr>
  <th>Transfer Certificate</th>
  <td><a href="userdocs/<?php echo $row['TransferCertificate'];?>" target="_blank">View File </a></td>
</tr>
<tr>
  <th>10th Marksheet</th>
  <td><a href="userdocs/<?php echo $row['TenMarksheeet'];?>" target="_blank">View File </a></td>
</tr>
<tr>
  <th>12th Marksheet</th>
  <td><a href="userdocs/<?php echo $row['TwelveMarksheet'];?>" target="_blank">View File </a></td>
</tr>
<tr>
  <th>Graduation Certificate</th>
  <td>
<?php if($row['GraduationCertificate']==""){ ?>
  NA
<?php } else{ ?>
    <a href="userdocs/<?php echo $row['GraduationCertificate'];?>" target="_blank">View File </a>
<?php } ?>
  </td>
</tr>

<tr>
  <th>Graduation Certificate</th>
  <td>
<?php if($row['PostgraduationCertificate']==""){ ?>
  NA
<?php } else{ ?>
    <a href="userdocs/<?php echo $row['PostgraduationCertificate'];?>" target="_blank">View File </a>
<?php } ?>
  </td>
</tr>




</table>
<?php } } else { ?>
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
  
          <h1>&nbsp;</h1>
  <center><img src="../img/logo.jpg" style="width: 100px; margin-left: auto; margin-right: auto; height: 100px; position: center"></center>

  <center><h1 style="color: purple;"><b>FEDERAL COLLEGE OF AGRICULTURAL <br>PRODUCE TECHNOLOGY, KANO</b></h1></center>
<p class="txt"><center>PMB: 3013, Plot 54 – 56, CBN Quarters Road, Hotoro, Kano <br>www.fcapt.edu.ng</center></p>


 <p class="txt"> Ref: 07013922460 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Date: 29/12/2019<br>
               <?php
$pid=$_SESSION['uid'];
$ret=mysqli_query($con,"select * from tbluser where ID='$pid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>   
<div class="txt" style="text-transform: uppercase;">STUDENT NAME: <?php  echo $row['FirstName'];?> <?php  echo $row['LastName'];?></div>
</p>
<?php  } ?>

<center><p class="txt"><h3>PROVISIONAL ADMISSION INTO COLLEGE OF AGRICULTURE <br><?php echo date("Y",strtotime("-1 year")); echo ("/");  //last year "2013"
echo date("Y"); ?></h3></p></center>
<div class="watermark">
<?php 
$rtp =mysqli_query($con ,"SELECT * from tbladmapplications where UserID='$uid'");
$row=mysqli_fetch_array($rtp);
if($row>0){
  ?>
<p class="txt">I am pleased to inform you that you have been offered provisional admission in to <?php echo $row['subpro'];?> to study 
<?php echo $row['CourseApplied'];?> in the department of <?php echo $row['faculty'];?>.
</p> 
<?php  } ?>

<p class="txt">The offer is subject to the following</p>
<p class="txt">a) That you will be registered only after presenting your original credentials for verification and that all particulars provided on your application form are correct.</p>
<p class="txt">b) That if at the time of registration, during or after the course of your studies, it is discovered that you do not satisfy the minimum requirements prescribed because the qualification you claimed to possess are found to be insufficient , incorrect, or intentionally misquoted or altered or that any other information you provided is false, you will be asked to withdraw/forfeit the certificates as the case may be.</p>
<p class="txt">(c) That if you are provided with accommodation on the campus, you will undertake to be of good behaviour and abide by the rules and regulations of the college;</p>
<p class="txt">d) That you are found to be physically and mentally fit by a government or recognized Medical Officer;</p>
<p class="txt">(e) That you settle in full all registration charges before you are registered;</p>
<p class="txt">f) That you will be responsible for your feeding and note that, accommodation is on the basis of first come first served;</p>
<p class="txt">g) That you pay the sum of N2000 as non-refundable acceptance fee.</p>
<p class="txt"> find attached registration charges for your guidance and note you have two weeks within which to register from the time of receipt of this letter.</p>
<h1>&nbsp;</h1>
_____________________<br>
 &nbsp; &nbsp; &nbsp; &nbsp; Registrar
</div>



  





</div></div>
 </div>
              </div>
              
             <center> <input type="button" class="btn btn-soundcloud" value="Print Admission Letter" onclick="javascript:printDiv('printablediv')" />
               </center>
            </div>
          </div>
        </section>
        <?php } }  else if($num>0 && $adstatus==''){ ?>
<p> Your application is pending with admin  </p>
<?php } else if($num>0 && $adstatus=='2'){ ?>
<p> Your application has been rejected by admin  </p>
<?php } else{?> 
  <p> First fill the application. If you get admission, you will see your admission letter here.  </p>
<?php 
$cnt++;
} ?>          <!-- Formatter end -->
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
