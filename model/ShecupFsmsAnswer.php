<?php 
require_once ("DBController.php");

class ShecupFsmsAnswer
{
    private $db_handle;
    
    function __construct() {
        $this->db_handle = new DBController();
    }
        
    function addAnswer($answer) {
        // echo "<pre>";
        // print_r($answer);
        // exit;

        $_SESSION['checklist_id'] = 11;

        $list_insert_id = array();

        for($i=0;$i<count($answer['q']);$i++){
            $section_id = (explode(".",$answer['q'][$i]));

            $company_id = 1;
            $audit_id = $_SESSION['checklist_id'];            
            $section_id = $section_id[0];
            $question_no = $answer['q'][$i];
            $score = $answer['score'][$answer['q'][$i]];
            $compliance_status = $answer['a'][$answer['q'][$i]];
            $findings = $answer['findings'][$answer['q'][$i]];

            if($compliance_status == 'Compliance'){
                $point = $score;
            }else{
                $point = 0;
            }

            $query = "INSERT INTO shecup_fsms_answers(`company_id`, `audit_id`, `section_id`, `question_no`, `score`, `point`, `compliance_status`,
                        `finding`, `created`, `updated`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, Now(), Now())
                        ON DUPLICATE KEY UPDATE point = ?, compliance_status = ?";
            $paramType = "iiisiissis";
            $paramValue = array(
                $company_id,
                $audit_id,
                $section_id,
                $question_no,
                $score,
                $point,
                $compliance_status,
                $findings,
                $point,
                $compliance_status
            );

            $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
            // print_r($insertId);
            array_push($list_insert_id, $insertId);

        }

        return $list_insert_id;
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