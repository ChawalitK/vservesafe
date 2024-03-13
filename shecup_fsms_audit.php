<?php
session_start();
require_once("model/ShecupFsmsChecklist.php");
require_once("model/ShecupFsmsQuestion.php");
require_once("model/ShecupFsmsAnswer.php");

$db_handle = new DBController();
$FsmsQuestion = new ShecupFsmsQuestion();
$FsmsChecklist = new ShecupFsmsChecklist();

if(isset($_POST['action']) == 'newchecklist'){
  // print_r($_POST);
  $checklist_id =  $FsmsChecklist->addChecklist($_POST);
  // unset($_POST);
  // print_r($checklist_id)
  $_SESSION['checklist_id'] = $checklist_id;
  header("Location:".$_SERVER['PHP_SELF']."?check=".$checklist_id);
}

if(isset($_POST['lang'])){
  $_SESSION['lang'] = $_POST['lang'];
}

// print_r($_SESSION);
if(isset($_POST['q']) && count($_POST['q'])>0){

   // print_r($_POST);
   // echo "<pre>";
   // print_r($_FILES);

   for($i=0;$i<count($_POST['q']);$i++){
      for($j=1;$j<=count($_FILES);$j++){
         if(isset($_FILES['file'.$j]["name"][$_POST['q'][$i]]))
            print_r($_FILES['file'.$j]["name"][$_POST['q'][$i]]);

            if(move_uploaded_file($_FILES['file'.$j]["tmp_name"][$_POST['q'][$i]],"uploaddir/".$_FILES['file'.$j]["name"][$_POST['q'][$i]]))
            {
                  echo $i . " อัพโหลดไฟล์<br>";
            }
      }
   }

   $FsmsAnswer = new ShecupFsmsAnswer();
   $answerx =  $FsmsAnswer->addAnswer($_POST, $_SESSION['checklist_id']);
}

$sections = $FsmsQuestion->getAllSection($_SESSION['lang'],  $_SESSION['checklist_id']);
$last_section_id = array(1);

$list_step = "";

foreach ($sections as $k => $v) { 

   if($sections[$k]["section_id"] > 0){
      array_push($last_section_id, $sections[$k]["section_id"]+1);
   }

   if (in_array($sections[$k]["question_no"], $last_section_id)) {
      if( $sections[$k]["question_no"] == end($last_section_id)){
         $list_step .= '<li class="step-item active" style="word-wrap: normal;"><a href="'.$_SERVER['PHP_SELF'].'">'.$sections[$k]["question_no"].'.'.$sections[$k]["question"].'</a></li>';
      }else{
         $list_step .= '<li class="step-item" style="word-wrap: normal;"><a href="'.$_SERVER['PHP_SELF'].'?sid='.$sections[$k]["question_no"].'">'.$sections[$k]["question_no"].'.'.$sections[$k]["question"].'</a></li>';
      }
   }else{
      $list_step .= '<li class="step-item" style="word-wrap: normal;"><span>'.$sections[$k]["question_no"].'.'.$sections[$k]["question"].'</span></li>';
   }
}


$question = $FsmsQuestion->getQuestionBySection($_SESSION['lang'], isset($_GET['sid']) ? $_GET['sid'] : end($last_section_id));
$section  = $FsmsQuestion->getSectionById($_SESSION['lang'], isset($_GET['sid']) ? $_GET['sid'] : end($last_section_id));

// echo "<pre>";
// print_r($section);

// $section_question_list = "";
$checklist_record =  $FsmsChecklist->getAuditById($_SESSION['checklist_id']);
// echo "<pre>";
// print_r($checklist_record);


  // [0] => Array
  //     (
  //         [id] => 7
  //         [company_id] => 1
  //         [audit_date] => 2024-03-13 15:21:56
  //         [audit_type] => Internal
  //         [name_keyin] => 
  //         [name_audit] => Sasikarn Jongsook
  //         [total_score] => 8.00
  //         [total_point] => 8.00
  //         [total_answer] => 
  //         [total_na] => 
  //         [additional] => test7
  //         [created] => 2024-03-13 15:21:56
  //         [updated] => 2024-03-13 15:22:14
  //     )


$list_question = "";

foreach ($question as $k => $v) {
  //  $section_question_list .= '<label for="fname">'.$question[$k]["question_no"].' '. $question[$k]["question"].'</label><br>
  //  <input type="text" id="fname" name="q[]" value="'.$question[$k]["question_no"].'" ><br>
  //  <input type="radio" id="html" name="a['.$question[$k]["question_no"].']" value="HTML" checked >
  //   <label for="html">HTML</label><br>
  //   <input type="radio" id="css" name="a['.$question[$k]["question_no"].']" value="CSS">
  //   <label for="css">CSS</label><br>
  //   <input type="radio" id="javascript" name="a['.$question[$k]["question_no"].']" value="JavaScript">
  //   <label for="javascript">JavaScript</label> <br/>

  //   <label for="findings">findings</label> 
  //   <input type="text" id="findings" name="findings['.$question[$k]["question_no"].']" value="findings"><br/><br/>
  //   <input name="file1['.$question[$k]["question_no"].']" type="file" /><br />
  //   <input name="file2['.$question[$k]["question_no"].']" type="file" /><br />
  //   <input name="file3['.$question[$k]["question_no"].']" type="file" /><br />
  //   <br /><br/>
  //   <br><hr>
  //   ';

    if($question[$k]['risk_level'] == "C"){
      $bgcolor_risk_level = 'bg-red text-primary-fg';
    }else if($question[$k]['risk_level'] == "M"){
      $bgcolor_risk_level = 'bg-yellow text-primary-fg';
    }else{
      $bgcolor_risk_level = 'bg-muted-lt';
    }

    $list_question .= '
    
    <div class="card" style="margin-bottom:20px;">
                  <div class="card-header">
                    <div>
                      <div class="row align-items-center">
                        <div class="col-auto">
                          <span class="avatar bg-primary text-primary-fg" style="font-size:17px;">'.$question[$k]['question_no'].'</span>
                        </div>
                        <div class="col">
                          <strong style="font-size:17px;">'.$question[$k]['question'].'</strong>
                        </div>
                      </div>
                    </div>
                    <div class="card-actions" style="min-width:95px;">
                      <span class="avatar '.$bgcolor_risk_level.'">'.$question[$k]['risk_level'].'</span>
                      <span class="avatar bg-green text-primary-fg">'.$question[$k]['score'].'</span>
                    </div>
                  </div>
    
    
    
    
    <div class="card-body"><div class="divide-y">
  
                        <div>
                          <div class="row">
                            <div class="mb-3">
                              <label class="form-label"><strong>Compliance Status</strong></label>
                              <input type="hidden" id="q['.$question[$k]["question_no"].']" name="q[]" value="'.$question[$k]["question_no"].'">
                              <input type="hidden" name="score['.$question[$k]["question_no"].']" value="'.$question[$k]["score"].'" >
                              <label class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="a['.$question[$k]['question_no'].']" value="N/A"/>
                                <span class="form-check-label">N/A</span>
                              </label>
                              <label class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="a['.$question[$k]['question_no'].']" value="Compliance"/>
                                <span class="form-check-label">Compliance</span>
                              </label>
                              <label class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="a['.$question[$k]['question_no'].']" value="Non Compliance"/>
                                <span class="form-check-label">Non Compliance</span>
                              </label>
                              <label class="form-label"><strong>Findings</strong></label>
                              <textarea class="form-control" rows="3" name="findings['.$question[$k]["question_no"].']" value=""></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                      </div>

                      </div>
                      ';


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
        <!-- <div class="row g-2 align-items-center">
          <div class="col">
            <h3 class="page-title" style="font-size:15px;color:#333333;">
               Home / SHECUP / FSMS Audit Verification  
            </h3>
          </div>
        </div> -->

        <div class="row g-2 align-items-center">
              <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                  Shec up
                </div>
                <h2 class="page-title">
                  FSMS Audit Verification
                </h2>
              </div>
              <!-- Page title actions -->
              <div class="col-auto ms-auto d-print-none">
                <div class="btn-list" id="newreports">

                <!-- <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#modal-large">
                    Large modal
                  </a> -->

                  <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-report">
                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 5l0 14"></path><path d="M5 12l14 0"></path></svg>
                    Create new checklist
                  </a>
                </div>
              </div>
            </div>


      </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
          <div class="container-xl">


          <!-- tab -->

          <div class="card">
                  <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs" role="tablist">
                      <li class="nav-item" role="presentation" >
                        <a href="#tabs-home-8" id="tab-bar-trigger_1" class="nav-link <?php if(!isset($_POST['q'])) echo "active";?>" data-bs-toggle="tab" aria-selected="true" role="tab">FSMS Checklist</a>
                      </li>
                      <li class="nav-item" role="presentation">
                        <a href="#tabs-profile-8" id="tab-bar-trigger_2" class="nav-link <?php if(isset($_POST['q'])) echo "active";?>" data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1">FSMS Audit Reports</a>
                      </li>
                    </ul>
                  </div>
                  <div class="card-body">
                    <div class="tab-content">
                      <div class="tab-pane fade <?php if(!isset($_POST['q'])) echo "active show";?>" id="tabs-home-8" role="tabpanel">
                        <!-- <h4>Home tab</h4> -->
                          <!-- ccc -->
                          <table id="example" class="table card-table" style="width:100%">
                              <thead>
                                  <tr>
                                      <th>No. </th>
                                      <th>Audit Date</th>
                                      <th>Audit Type</th>
                                      <th>Audit Name</th>
                                      <th>Total Score</th>
                                      <th>Total Point</th>
                                      <th>Total Answers</th>
                                      <th>Total N/A</th>
                                  </tr>
                              </thead>
                          </table>
                          <!-- ccc -->
                      </div>
                      <div class="tab-pane fade <?php if(isset($_POST['q'])) echo "active show";?>" id="tabs-profile-8" role="tabpanel">
                        <!-- <h4>Profile tab</h4> -->

<!-- ccccccccc -->
                      <!-- xxx -->
                      <div class="row row-cards">
            <div class="col-md-4">
                <div class="card">
                  <div class="card-body">
                    <div class="subheader">Percentage Achievement</div>
                    <div class="h3 m-0" style="font-size:27px;"><?=  number_format(($checklist_record[0]['total_point']/$checklist_record[0]['total_score']) * 100, 2);?>%</div>
                  </div>
                </div>
              </div>
              <div class="col-md-2">
                <div class="card">
                  <div class="card-body">
                    <div class="subheader">Total Score</div>
                    <div class="h3 m-0" style="font-size:27px;"><?=$checklist_record[0]['total_score'];?></div>
                  </div>
                </div>
              </div>
              <div class="col-md-2">
                <div class="card">
                  <div class="card-body">
                    <div class="subheader">Total Point</div>
                    <div class="h3 m-0" style="font-size:27px;"><?=$checklist_record[0]['total_point'];?></div>
                  </div>
                </div>
              </div>
              <div class="col-md-2">
                <div class="card">
                  <div class="card-body">
                    <div class="subheader">Total Answer</div>
                    <div class="h3 m-0" style="font-size:27px;">

                    <?php 
                      $checklist_record[0]['total_answer'] = isset($checklist_record[0]['total_answer']) ? $checklist_record[0]['total_answer']:0;
                      echo $checklist_record[0]['total_answer'];
                    ?>


                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-2">
                <div class="card">
                  <div class="card-body">
                    <div class="subheader">Total N/A</div>
                    <div class="h3 m-0" style="font-size:27px;">
                    <?php 
                      $checklist_record[0]['total_na'] = isset($checklist_record[0]['total_na']) ? $checklist_record[0]['total_na']:0;
                      echo $checklist_record[0]['total_na'];
                    ?></div>
                  </div>
                </div>
              </div>




            <div class="col-lg-4 d-none d-md-block d-lg-block">
                <div class="card">
                  <div class="card-header bg-primary text-purple-fg">
                    <h3 class="card-title " style="font-size:19px;">Verification Section</h3>
                  </div>
                  <div class="card-body">
                    <!-- <h3 class="card-title">Section</h3> -->
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


              <div class="col-lg-8" style="margin-bottom:60px">


                <div class="card">
                  <form action="" method="post" class="card" >
                  <div class="card-header bg-purple text-purple-fg">
                    <h3 class="card-title " style="font-size:19px;"><?php echo $section[0]['question_no'].". ".$section[0]['question'];?></h3>
                  </div>
                  <div class="card-body">






                  
                    <?php echo $list_question;?>







                  </div>
                  <div class="card-footer text-center">
                    <!-- <input type="submit" value="Submit"> -->
                    <!-- <button class="btn btn-primary" type="submit">Submit</button> -->
                    <button class="btn btn-primary" type="submit">Submit</button>
                  </div>
                  </form> 
                </div>


              </div>

            </div>
                      
                      <!-- xxx -->
            
                      </div>





                      </div>
                    </div>
                  </div>
                </div>


          <!-- end tab -->



          <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasStart" aria-labelledby="offcanvasStartLabel">
          <div class="offcanvas-header">
            <h2 class="offcanvas-title" id="offcanvasStartLabel">Start offcanvas</h2>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <div>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab assumenda ea est, eum exercitationem fugiat illum itaque laboriosam magni necessitatibus, nemo nisi numquam quae reiciendis repellat sit soluta unde. Aut!
            </div>
            <div class="mt-3">
              <button class="btn btn-primary" type="button" data-bs-dismiss="offcanvas">
                Close offcanvas
              </button>
            </div>
          </div>
        </div>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEnd" aria-labelledby="offcanvasEndLabel">
          <div class="offcanvas-header">
            <h2 class="offcanvas-title" id="offcanvasEndLabel">End offcanvas</h2>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <div>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab assumenda ea est, eum exercitationem fugiat illum itaque laboriosam magni necessitatibus, nemo nisi numquam quae reiciendis repellat sit soluta unde. Aut!
            </div>
            <div class="mt-3">
              <button class="btn btn-primary" type="button" data-bs-dismiss="offcanvas">
                Close offcanvas
              </button>
            </div>
          </div>
        </div>
        <div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
          <div class="offcanvas-header">
            <h2 class="offcanvas-title" id="offcanvasTopLabel">Top offcanvas</h2>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <div>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab assumenda ea est, eum exercitationem fugiat illum itaque laboriosam magni necessitatibus, nemo nisi numquam quae reiciendis repellat sit soluta unde. Aut!
            </div>
            <div class="mt-3">
              <button class="btn btn-primary" type="button" data-bs-dismiss="offcanvas">
                Close offcanvas
              </button>
            </div>
          </div>
        </div>
        <div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvasBottom" aria-labelledby="offcanvasBottomLabel">
          <div class="offcanvas-header">
            <h2 class="offcanvas-title" id="offcanvasBottomLabel">Bottom offcanvas</h2>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <div>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab assumenda ea est, eum exercitationem fugiat illum itaque laboriosam magni necessitatibus, nemo nisi numquam quae reiciendis repellat sit soluta unde. Aut!
            </div>
            <div class="mt-3">
              <button class="btn btn-primary" type="button" data-bs-dismiss="offcanvas">
                Close offcanvas
              </button>
            </div>
          </div>
        </div>


        </div>

    <?php include_once("php/html_footer.php");?>
  </div>
</div>

    <div class="modal modal-blur fade" id="modal-report" tabindex="-1" style="display: none;" aria-hidden="true">
    <form action="" method="post" id="newchecklist">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">New FSMS Checklist</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-lg-7">
                <div class="mb-3">
                  <label class="form-label">Auditor name</label>
                  <div class="input-group input-group-flat">
                    <!-- <span class="input-group-text">
                      https://tabler.io/reports/
                    </span> -->
                    <input type="text" name="auditor_name" id="auditor_name" class="form-control" value="<?=$_SESSION['firstname']." ".$_SESSION['lastname'];?>" autocomplete="off" disabled="">
                  </div>
                </div>
              </div>

              <div class="col-lg-5">
                <div class="mb-3">
                  <label class="form-label">Checklist type</label>
                  <select class="form-select" name="checklist_type">
                    <option value="Internal">Internal Audit</option>
                    <option value="External">External Audit</option>
                  </select>
                </div>
              </div>


            </div>
            <div class="row">
              <div class="col-lg-7">
                <div class="mb-3">
                  <label class="form-label">Site name</label>
                  <div class="input-group input-group-flat">
                    <!-- <span class="input-group-text">
                      https://tabler.io/reports/
                    </span> -->
                    <input type="text" name="site_name" id="site_name" class="form-control" value="" placeholder="Site name" autocomplete="off" disabled="">
                  </div>
                </div>
              </div>
              <div class="col-lg-5">
                <div class="mb-3">
                  <label class="form-label">Reporting date</label>
                  <!-- <input type="date" class="form-control" value="<?=date("mm/dd/yyyy");?>">
                 -->
                 <div class="input-icon">
                  <span class="input-icon-addon"><!-- Download SVG icon from http://tabler-icons.io/i/calendar -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z"></path><path d="M16 3v4"></path><path d="M8 3v4"></path><path d="M4 11h16"></path><path d="M11 15h1"></path><path d="M12 15v3"></path></svg>
                  </span>
                  <input class="form-control" placeholder="Select a date" name="checklist_date" id="datepicker-icon-prepend" value="<?=date("Y-m-d");?>">
                </div>


                </div>
              </div>


            </div>

            <div class="col-lg-12">
                <div>
                  <label class="form-label">Additional information</label>
                  <textarea class="form-control" rows="3" name="additional"></textarea>
                </div>
              </div>


          </div>

          <div class="modal-footer">
            <!-- <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button> -->

            <!-- <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button> -->
            <!-- <a href="#" class="btn me-auto" data-bs-dismiss="modal">
              Cancel
            </a> -->

            <button type="reset" class="btn  me-auto" data-bs-dismiss="modal">
                Cancel
            </button>
            <input type="hidden" name="action" value="newchecklist">
            <button type="button" id="submit_button" class="btn btn-primary" data-bs-dismiss="modal">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 5l0 14"></path><path d="M5 12l14 0"></path></svg>
                Create new checklist
            </button>

          </div>
        </div>
      </div>
      </form>
    </div>

<!-- Libs JS -->
<!-- Tabler Core -->
<!-- <script src="js/tabler.min.js" defer></script> -->


    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" defer></script>
    <link href="https://cdn.datatables.net/2.0.0/css/dataTables.bootstrap5.css" defer></script>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script> 
    <script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script> 
    <script src="https://cdn.datatables.net/2.0.0/js/dataTables.bootstrap5.js"></script> 

    <script src="js/litepicker.js"></script> 
    <!-- <script src="js/demo.min.js" defer></script> -->
<!-- <script src="js/tabler.min.js" defer></script> -->
    <script>
      $('#example').DataTable({
          ajax: 'staff.php',
          processing: true,
          serverSide: true
      });


      $("#tab-bar-trigger_1").click(changeClass);

        function changeClass() {
  
          $("#newreports").removeClass("d-none");
  
        }

      $("#tab-bar-trigger_2").click(changeClass2);

        function changeClass2() {

          $("#newreports").addClass("d-none");
      }




      $("#submit_button").click(function(){        
        $("#site_name").prop('disabled', false);
        $("#auditor_name").prop("disabled", false);
        $("#newchecklist").submit(); // Submit the form
      });




    </script>


  <script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function () {
    	window.Litepicker && (new Litepicker({
    		element: document.getElementById('datepicker-icon-prepend'),
    		buttonText: {
    			previousMonth: `<!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 6l-6 6l6 6" /></svg>`,
    			nextMonth: `<!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>`,
    		},
    	}));

      $(this).find("input").first().focus()
    });
    // @formatter:on
  </script>

</body>
</html>