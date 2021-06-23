<?php
$output="";
session_start();
error_reporting(0);
include('includes/dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{

if (isset($_POST['submit'])){
  $numberOfCode= $_POST['code'];
  for ($i=0; $i < $numberOfCode; $i++) {  
    $code= mt_rand(100000000000, 1000000000000);
  $sql ="SELECT pin FROM codes WHERE pin='$code' ";
  $result=mysqli_query($con,$sql) or die(mysqli_error($con));
  $count=mysqli_num_rows($result);
  if($count === 1){
  continue;
} else {
  $query ="INSERT INTO codes (pin) VALUES ('$code')";
  if($con -> query($query)===true){
      $output="Pins has been generated successfully";
            } else{
      echo"error".$sql.$con -> error;
    }
}
  }
}
?>
<!DOCTYPE html>
<html>

<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>FCAPT - Pin Generator</title>
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
</head>
<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
<?php include('includes/header.php');?>
<?php include('includes/leftbar.php');?>
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
               
                
              </ol>
            </div>
          </div>
        </div>
   
      </div>
      <div class="content-body">
        <div class="row">
        <div class="col-md-6 col-xl-12">
                                    
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                  <form action="gen-pin.php" method="post" >
                                        <?php echo $output; ?>
                                            
                                      <select name="code" id="code" required class="form-control">
                                          <option>500</option>
                                          <option>1000</option>
                                          <option>1500</option>
                                          <option>2000</option>
                                          <option>3000</option>
                                          <option selected disabled>How many?</option>
                                        </select>
                                      <p>&nbsp;</p>
                                        <button type="submit" name="submit" onclick="turnOnLoader()" onmouseover="checkCode()" class="btn btn-success">Generate New Pin</button>
                                        
                                  
                                        
                                          </form>
                                      <br>
                                      <br>
                                </div>
                            </div>
                <script type="text/javascript">
                                function turnOnLoader() {
                          var loader = document.getElementById('loader');
                          loader.style.display = "block";
                        }

                        function checkCode() {
                          if (getElementById("code").value == "How many?") {
                            alert("please choose the rate of the code you want to generate.");
                          }
                        }
      </script>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                        <?php include('includes/footer.php');?>
  <!-- BEGIN VENDOR JS-->
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
<?php } ?>