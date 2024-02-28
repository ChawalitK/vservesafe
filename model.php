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

   $section_question_list .= '<label for="fname">'.$result[$k]["question_no"].' '. $result[$k]["question"].'</label><br>
   <input type="text" id="fname" name="q[]" value="'.$result[$k]["question_no"].'" ><br>
   <input type="radio" id="html" name="a['.$result[$k]["question_no"].']" value="HTML" checked >
    <label for="html">HTML</label><br>
    <input type="radio" id="css" name="a['.$result[$k]["question_no"].']" value="CSS">
    <label for="css">CSS</label><br>
    <input type="radio" id="javascript" name="a['.$result[$k]["question_no"].']" value="JavaScript">
    <label for="javascript">JavaScript</label> 
    <br><hr>
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