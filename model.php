<?php
// require_once("model/DBController.php");
require_once("model/ShecupFsmsQuestion.php");

$db_handle = new DBController();
$FsmsQuestion = new ShecupFsmsQuestion();

// $FsmsQuestion->deleteAttendanceByDate($attendance_date);
// $result = $FsmsQuestion->getAllQuestion();
// $result = $FsmsQuestion->getAllSection('en');
$result = $FsmsQuestion->getAllSection('th');
// echo "<pre>";
// print_r($result);

foreach ($result as $k => $v) {
   echo '<a href="'.$_SERVER['PHP_SELF'].'?section_id='.$result[$k]["question_no"].'">'.$result[$k]["question_no"].'.'.$result[$k]["question"].'</a><br>';
}


$result = $FsmsQuestion->getQuestionBySection('th',$_GET['section']?0);

?>