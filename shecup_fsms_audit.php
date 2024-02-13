<?php
session_start();
include_once("php/database.class.php");

if(!isset($_SESSION['lang'])){
  $_SESSION['lang'] = 'th';
}

if(isset($_POST['lang']) && strlen($_POST['lang'])>0){
  $_SESSION['lang'] = $_POST['lang'];

  if($_POST['lang'] == 'en'){
    header("location:shecup_fsms_audit.php?id=1");
  }else{
    header("location:shecup_fsms_audit.php?id=87");
  }
}


$db = new Database();
$db->connect();
$db->select('shecup_fsms_audit','id, question_no, question',NULL,'parent_id = 0 and question_lang="'.$_SESSION['lang'].'"','id ASC'); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
$res = $db->getResult();
// echo "<pre>";
// print_r($res);
$list_step = "";

for($i=0;$i<count($res);$i++){
  $list_step .= '<li class="step-item" style="word-wrap: normal;"><a href="'.$_SERVER["PHP_SELF"].'?id='.$res[$i]['id'].'">'.$res[$i]['question'].'</a></li>';
}

if(isset($_GET['id']) && $_GET['id'] > 0){

  $db->select('shecup_fsms_audit','id, question_no, question',NULL,'id ='.$_GET['id'].'','id ASC'); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
  $res = $db->getResult();
  $section_id = $res[0]['id'];
  $section_no = $res[0]['question_no'];
  $section_question = $res[0]['question'];

// echo "<pre>";
// print_r($res);


  $db->select('shecup_fsms_audit','id, question_no, question,risk_level,score',NULL,'parent_id ='.$_GET['id'].'','id ASC'); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
  $res = $db->getResult();

  $list_question = "";


// echo "<pre>";
// print_r($res);

  for($i=0;$i<count($res);$i++){

    // echo $res[$i]['risk_level'];


    if($res[$i]['risk_level'] == "C"){
      $bgcolor_risk_level = 'bg-red text-primary-fg';
    }else if($res[$i]['risk_level'] == "M"){
      $bgcolor_risk_level = 'bg-yellow text-primary-fg';
    }else{
      $bgcolor_risk_level = 'bg-muted-lt';
    }




    $list_question .= '<div class="card-body"><div class="divide-y">
    <div>
      <div class="row">
        <div class="col-auto">
          <span class="avatar bg-primary text-primary-fg">'.$res[$i]['question_no'].'</span>
        </div>
        <div class="col">
          <div class="text-truncate" style="white-space: normal;">
            <strong>'.$res[$i]['question'].'</strong>
          </div>
        </div>
        <div class="col-auto align-self-center">
          <span class="avatar '.$bgcolor_risk_level.'">'.$res[$i]['risk_level'].'</span>
          <span class="avatar bg-green text-primary-fg">'.$res[$i]['score'].'</span>
        </div>
      </div>
    </div>
    <div>
      <div class="row">
        <div class="mb-3">
          <label class="form-label"><strong>Compliance Status</strong></label>
          <label class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="radios-inline" checked="" />
            <span class="form-check-label">Non Applicant</span>
          </label>
          <label class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="radios-inline" />
            <span class="form-check-label">Compliance</span>
          </label>
          <label class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="radios-inline" />
            <span class="form-check-label">Non Compliance</span>
          </label>
          <label class="form-label"><strong>Findings</strong></label>
          <textarea class="form-control" rows="3"></textarea>
        </div>
      </div>
    </div>
  </div>
  </div>
    ';
  }


// echo "<pre>";
// print_r($res);

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
  <?php include_once("php/html_menu.php");?>
  <div class="page-wrapper">
    <!-- Page header -->
    <div class="page-header d-print-none">
      <div class="container-xl">
        <div class="row g-2 align-items-center">
          <div class="col">
            <h3 class="page-title" style="font-size:15px;color:#333333;">
               Home / SHECUP / FSMS Audit Verification  
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
                    <h3 class="card-title "><?php echo $section_no.". ".$section_question;?></h3>
                  </div>
                  <div class="card-body">

                  <form action="https://httpbin.org/post" method="post" class="card">




                  
                  <?php echo $list_question;?>




                    </form> 


                  </div>
                </div>


              </div>

            </div>
          </div>
        </div>

    <?php include_once("php/html_footer.php");?>
  </div>
</div>
<!-- Libs JS -->
<!-- Tabler Core -->
<script src="js/tabler.min.js" defer></script>
<script src="js/demo.min.js" defer></script>
</body>
</html>