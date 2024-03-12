<?php 
require_once ("DBController.php");

class ShecupFsmsChecklist
{
    private $db_handle;
    
    function __construct() {
        $this->db_handle = new DBController();
    }
        
    function addChecklist($_post) {
        date_default_timezone_set("Asia/Bangkok");
        print_r($_post);
        print_r($_SESSION);
        // Array ( [auditor_name] => Sasikarn Jongsook [checklist_type] => internal [site_name] => [checklist_date] => 2024-03-12 [additional] => xxxx [action] => newchecklist ) 

        $company_id =  1;
        $audit_date =  $_post['checklist_date'].' '.date('H:i:s');
        $name_audit =  $_post['auditor_name'];
        $audit_type =  $_post['checklist_type']; 
        $additional =  $_post['additional']; 




        $query = "INSERT INTO shecup_fsms_audit (company_id, audit_date, name_audit, audit_type, additional) VALUES (?, ?, ?, ?, ?)";
        $paramType = "issss";
        $paramValue = array(
            $company_id, $audit_date, $name_audit, $audit_type, $additional
        );
        
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);

        return $insertId;


        // $query = "INSERT INTO shecup_fsms_answers(`company_id`, `audit_id`, `section_id`, `question_no`, `score`, `point`, `compliance_status`,
        //             `finding`, `created`, `updated`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, Now(), Now())
        //             ON DUPLICATE KEY UPDATE point = ?, compliance_status = ?";
        // $paramType = "iiisiissis";
        // $paramValue = array(
        //     $company_id,
        //     $audit_id,
        //     $section_id,
        //     $question_no,
        //     $score,
        //     $point,
        //     $compliance_status,
        //     $findings,
        //     $point,
        //     $compliance_status
        // );

        // $insertId = $this->db_handle->insert($query, $paramType, $paramValue);

        // return $insertId;
        // return 0;
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