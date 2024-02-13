<?php
session_start();
include_once("php/database.class.php");

$db = new Database();
$db->connect();
$db->select('shecup_fsms_audit','id, question_no, question',NULL,'parent_id = 0 and question_lang="en"','id ASC'); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
$res = $db->getResult();
// echo "<pre>";
// print_r($res);
$list_step = "";

for($i=0;$i<count($res);$i++){
  $list_step .= '<li class="step-item" style="word-wrap: normal;">'.$res[$i]['question'].'</li>';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once("php/html_head.php");?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Sarabun:ital@0;1&display=swap" rel="stylesheet"> 

<style type="text/css">
  body{
    font-family: 'Sarabun', sans-serif;
  }

  
</style>
</head>
<body>
<script src="js/demo-theme.min.js"></script>
<div class="page">
  <!-- Navbar -->
  <?php //include_once("php/html_menu.php");?>
  <div class="page-wrapper">
    <!-- Page header -->
    <div class="page-header d-print-none">
      <div class="container-xl">
        <div class="row g-2 align-items-center">
          <div class="col">
            <h3 class="page-title" style="font-size:15px;color:#333333;">
              Home 
            </h3>
          </div>
        </div>
      </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
          <div class="container-xl">
            <div class="row row-cards">


            <div class="col-lg-4">
                <div class="card">
                  <div class="card-body">
                    <h3 class="card-title">Section</h3>
                    <ul class="steps steps-counter steps-vertical">

                      <?php echo $list_step;?>
                      <!-- <li class="step-item">Step one</li>
                      <li class="step-item">Step two</li>
                      <li class="step-item active">Step three</li>
                      <li class="step-item">Step four</li>
                      <li class="step-item">Step five</li>
                      <li class="step-item">Step one</li>
                      <li class="step-item">Step two</li>
                      <li class="step-item active">Step three</li>
                      <li class="step-item">Step four</li>
                      <li class="step-item">Step five</li>
                      <li class="step-item">Step one</li>
                      <li class="step-item">Step two</li>
                      <li class="step-item active">Step three</li>
                      <li class="step-item">Step four</li>
                      <li class="step-item">Step five</li>
                      <li class="step-item">Step one</li>
                      <li class="step-item">Step two</li>
                      <li class="step-item active">Step three</li>
                      <li class="step-item">Step four</li>
                      <li class="step-item">Step five</li> -->
                    </ul>
                  </div>
                </div>
              </div>


              <div class="col-lg-8">
                <div class="card">
                  <div class="card-body">
                    <h3 class="card-title">Steps horizontal</h3>
                    <ul class="steps steps-green my-4">
                      <li class="step-item">1</li>
                      <li class="step-item active">2</li>
                      <li class="step-item">3</li>
                    </ul>
                  </div>
                  <div class="card-body">
                    <ul class="steps steps-green steps-counter my-4">
                      <li class="step-item"></li>
                      <li class="step-item active"></li>
                      <li class="step-item"></li>
                    </ul>
                  </div>
                  <div class="card-body">
                    <ul class="steps steps-green steps-counter my-4">
                      <li class="step-item">Cart</li>
                      <li class="step-item active">Billing Information</li>
                      <li class="step-item">Confirmation</li>
                    </ul>
                  </div>
                  <div class="card-body">
                    <ol class="breadcrumb breadcrumb-arrows">
                      <li class="breadcrumb-item"><a href="#">Step one</a></li>
                      <li class="breadcrumb-item active"><a href="#">Step two</a></li>
                      <li class="breadcrumb-item disabled"><a href="#">Step three</a></li>
                      <li class="breadcrumb-item disabled"><a href="#">Step four</a></li>
                    </ol>
                  </div>
                  <div class="card-body">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="#">1. Step one</a></li>
                      <li class="breadcrumb-item"><a href="#">2. Step two</a></li>
                      <li class="breadcrumb-item active"><a href="#">3. Step three</a></li>
                      <li class="breadcrumb-item disabled"><a href="#">4. Step four</a></li>
                      <li class="breadcrumb-item disabled"><a href="#">5. Step five</a></li>
                    </ol>
                  </div>
                  <div class="card-body">
                    <ol class="breadcrumb breadcrumb-muted">
                      <li class="breadcrumb-item"><a href="#">1. Step one</a></li>
                      <li class="breadcrumb-item"><a href="#">2. Step two</a></li>
                      <li class="breadcrumb-item active"><a href="#">3. Step three</a></li>
                      <li class="breadcrumb-item disabled"><a href="#">4. Step four</a></li>
                      <li class="breadcrumb-item disabled"><a href="#">5. Step five</a></li>
                    </ol>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>

    <?php //include_once("php/html_footer.php");?>
  </div>
</div>
<!-- Libs JS -->
<!-- Tabler Core -->
<script src="js/tabler.min.js" defer></script>
<script src="js/demo.min.js" defer></script>
</body>
</html>