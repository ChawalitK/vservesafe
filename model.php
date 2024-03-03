<?php
// require_once("model/DBController.php");
require_once("model/ShecupFsmsQuestion.php");
require_once("model/ShecupFsmsAnswer.php");

$db_handle = new DBController();

$FsmsQuestion = new ShecupFsmsQuestion();

if(isset($_POST) && count($_POST)>0){
   // print_r($_POST);
   $FsmsAnswer = new ShecupFsmsAnswer();
   $answer =  $FsmsAnswer->addAnswer($_POST);
}

$sections = $FsmsQuestion->getAllSection('th');
foreach ($sections as $k => $v) {
   echo '<a href="'.$_SERVER['PHP_SELF'].'?sid='.$sections[$k]["question_no"].'">'.$sections[$k]["question_no"].'.'.$sections[$k]["question"].'</a><br>';
}

$question = $FsmsQuestion->getQuestionBySection('th', isset($_GET['sid']) ? $_GET['sid'] : 1);

$section_question_list = "";

foreach ($question as $k => $v) {
   $section_question_list .= '<label for="fname">'.$question[$k]["question_no"].' '. $question[$k]["question"].'</label><br>
   <input type="text" id="fname" name="q[]" value="'.$question[$k]["question_no"].'" ><br>
   <input type="radio" id="html" name="a['.$question[$k]["question_no"].']" value="HTML" checked >
    <label for="html">HTML</label><br>
    <input type="radio" id="css" name="a['.$question[$k]["question_no"].']" value="CSS">
    <label for="css">CSS</label><br>
    <input type="radio" id="javascript" name="a['.$question[$k]["question_no"].']" value="JavaScript">
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