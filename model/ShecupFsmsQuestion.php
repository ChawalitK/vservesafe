<?php 
require_once ("DBController.php");
class ShecupFsmsQuestion
{
    private $db_handle;
    
    function __construct() {
        $this->db_handle = new DBController();
    }
    
    function getAllSection($lang="th", $checklist_id ) {

        $query = "SELECT shecup_fsms_question.question, shecup_fsms_question.question_no, shecup_fsms_answers.section_id 
                    FROM shecup_fsms_question  
                    LEFT JOIN shecup_fsms_answers ON shecup_fsms_question.question_no = shecup_fsms_answers.section_id 
                    and shecup_fsms_answers.audit_id = ?
                    WHERE shecup_fsms_question.parent_id = 0 and shecup_fsms_question.question_lang = ?
                    group by shecup_fsms_question.id
                    order by shecup_fsms_question.id asc";
        $paramType = "is";
        $paramValue = array(
            $checklist_id,
            $lang
        );
        
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;  
    }

    function getQuestionBySection($question_lang='th', $section_id=1) {
        $query = "SELECT * FROM shecup_fsms_question WHERE question_lang = ? and parent_id = ?";
        $paramType = "si";
        $paramValue = array(
            $question_lang,
            $section_id
        );
        
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }

    function getSectionById($question_lang='th', $question_no=1) {
        $query = "SELECT * FROM shecup_fsms_question WHERE question_lang = ? and question_no = ? limit 1";
        $paramType = "ss";
        $paramValue = array(
            $question_lang,
            $question_no
        );
        
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }




    function addQuestion($name, $roll_number, $dob, $class) {
        $query = "INSERT INTO shecup_fsms_question (name,roll_number,dob,class) VALUES (?, ?, ?, ?)";
        $paramType = "siss";
        $paramValue = array(
            $name,
            $roll_number,
            $dob,
            $class
        );
        
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $insertId;
    }
    
    function editQuestion($name, $roll_number, $dob, $class, $student_id) {
        $query = "UPDATE shecup_fsms_question SET name = ?,roll_number = ?,dob = ?,class = ? WHERE id = ?";
        $paramType = "sissi";
        $paramValue = array(
            $name,
            $roll_number,
            $dob,
            $class,
            $student_id
        );
        
        $this->db_handle->update($query, $paramType, $paramValue);
    }
    
    function deleteQuestion($student_id) {
        $query = "DELETE FROM shecup_fsms_question WHERE id = ?";
        $paramType = "i";
        $paramValue = array(
            $student_id
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }
    
    function getQuestionById($student_id) {
        $query = "SELECT * FROM shecup_fsms_question WHERE id = ?";
        $paramType = "i";
        $paramValue = array(
            $student_id
        );
        
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }
    
    function getAllQuestion() {
        $sql = "SELECT * FROM shecup_fsms_question ORDER BY id";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }
}
?>