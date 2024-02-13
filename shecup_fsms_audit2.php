<?php
session_start();
include_once("php/database.class.php");

$db = new Database();
$db->connect();
$db->select('shecup_fsms_audit','id, question_no, question',NULL,'parent_id = 0 and question_lang="th"','id ASC'); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
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
                  <div class="card-header bg-purple text-purple-fg">
                    <h3 class="card-title ">1. Supplier Approval</h3>
                  </div>
                  <div class="card-body">

                  <form action="https://httpbin.org/post" method="post" class="card">

                  <div class="card-body">
                    <div class="divide-y">
                      <div>
                        <div class="row">
                          <div class="col-auto">
                            <span class="avatar">1.1</span>
                          </div>
                          <div class="col">
                            <div class="text-truncate" style="white-space: normal;">
                              <strong>Delivery temperatures and corrective actions are documented/maintained at the facility</strong>
                            </div>
                          </div>
                          <div class="col-auto align-self-center">
                            <span class="avatar bg-red text-primary-fg">C</span>
                            <span class="avatar bg-green text-primary-fg">5</span>
                          </div>
                        </div>
                      </div>

                      <div>
                        <div class="row">
                          <div class="mb-3">

                            <label class="form-label"><strong>Compliance Status</strong></label>

                            <label class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="radios-inline" checked="">
                              <span class="form-check-label">Option 1</span>
                            </label>
                            <label class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="radios-inline">
                              <span class="form-check-label">Option 2</span>
                            </label>
                            <label class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="radios-inline">
                              <span class="form-check-label">Option 3</span>
                            </label>

                            <label class="form-label"><strong>Findings</strong></label>
                            <textarea class="form-control" rows="3"></textarea>

                          </div>





                        </div>
                      </div>





                    </div>
                  </div>


                  <div class="card-body">
                    <div class="divide-y">
                      <div>
                        <div class="row">
                          <div class="col-auto">
                            <span class="avatar">1.2</span>
                          </div>
                          <div class="col">
                            <div class="text-truncate" style="white-space: normal;">
                              <strong>Supplier Audit / Evaluation process are established</strong>
                            </div>
                          </div>
                          <div class="col-auto align-self-center">
                            <span class="avatar bg-yellow text-yellow-fg">M</span>
                            <span class="avatar bg-green text-primary-fg">3</span>
                          </div>
                        </div>
                      </div>

                      <div>
                        <div class="row">
                          <div class="mb-3">

                            <label class="form-label"><strong>Compliance Status</strong></label>

                            <label class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="radios-inline" checked="">
                              <span class="form-check-label">Option 1</span>
                            </label>
                            <label class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="radios-inline">
                              <span class="form-check-label">Option 2</span>
                            </label>
                            <label class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="radios-inline">
                              <span class="form-check-label">Option 3</span>
                            </label>

                            <label class="form-label"><strong>Findings</strong></label>
                            <textarea class="form-control" rows="3"></textarea>

                          </div>





                        </div>
                      </div>





                    </div>
                  </div>


                    </form> 


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