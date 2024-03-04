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
   echo '<a href="'.$_SERVER['PHP_SELF'].'?sid='.$result[$k]["question_no"].'">'.$result[$k]["question_no"].'.'.$result[$k]["question"].'</a><br>';
}


$result = $FsmsQuestion->getQuestionBySection('th', isset($_GET['sid']) ? $_GET['sid'] : 1);


// echo "<pre>";
// print_r($result);
// $result = $FsmsQuestion->getQuestionBySection('th', isset($_GET['sid']) ? $_GET['sid'] : 1);


echo "<pre>";
print_r($_POST);

$section_question_list = "";

foreach ($result as $k => $v) {
   // echo $result[$k]["question_no"]."<br>"; 
   // echo $result[$k]["question"]."<br>";


   // // [id] => 88
   // // [parent_id] => 1
   // // [question_lang] => th
   // // [question_no] => 1.1
   // // [question] => อุณหภูมิในการจัดส่งและการดำเนินการแก้ไขจะได้รับการบันทึกไว้/รักษาไว้ที่โรงงาน
   // // [risk_level] => C
   // // [score] => 5
   // // [created] => 2024-02-06 21:46:07
   // // [updated] => 2024-02-27 16:25:58

   $section_question_list .= '
      <label for="fname">'.$result[$k]["question_no"].' '. $result[$k]["question"].'</label><br>
      <input type="text" id="fname" name="qusetion[]" value="'.$result[$k]["question_no"].'"><br>
      <input type="radio" id="html" name="answer['.$result[$k]["question_no"].']" value="N/A" checked >
      <label for="html">N/A</label><br>
      <input type="radio" id="css" name="answer['.$result[$k]["question_no"].']" value="Compliance">
      <label for="css">Compliance</label><br>
      <input type="radio" id="javascript" name="answer['.$result[$k]["question_no"].']" value="Not compliance">
      <label for="javascript">Not compliance</label> 
      <input type="text" id="fname" name="id['.$result[$k]["question_no"].']" value="'.$result[$k]["id"].'"><br>
      <input type="text" id="fname" name="risk_level['.$result[$k]["question_no"].']" value="'.$result[$k]["risk_level"].'"><br>
      <input type="text" id="fname" name="score['.$result[$k]["question_no"].']" value="'.$result[$k]["score"].'"><br>

      <input type="text" id="fname" name="findings['.$result[$k]["question_no"].']" value="findings'.rand(1000,2000).'"><br>
      <input type="text" id="fname" name="standard['.$result[$k]["question_no"].']" value="standard'.rand(1000,2000).'"><br>
      <input type="text" id="fname" name="root_cause['.$result[$k]["question_no"].']" value="root_cause'.rand(1000,2000).'"><br>
      <input type="text" id="fname" name="correction['.$result[$k]["question_no"].']" value="correction'.rand(1000,2000).'"><br>
      <input type="text" id="fname" name="corrective_action['.$result[$k]["question_no"].']" value="corrective_action'.rand(1000,2000).'"><br>

      <br>
      <hr>
    ';

}






?>

<!DOCTYPE html>
<html>
<body>

<h2>HTML Forms</h2>

<form action="" method="post">
   <?php echo $section_question_list;?>
   <input type="submit" value="Submit">
</form> 

</body>
</html>