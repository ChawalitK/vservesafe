<?php
class MyAPI
{
    protected $db;

    public function __construct($db, $request_uri, $postData, $origin)
    {
        $this->db = $db;
    }

    public function getUser($id)
    {
        $sql = "SELECT * FROM users where id=?";
        $stmt = $this->db->prepate($sql);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}

// $api = new MyAPI($db, $request_uri, $postData, $origin);
// $user = $api->getUser($_POST['id']);


// https://phppot.com/php/how-to-create-php-crud-using-oops-with-mysqli-in-mvc/

?>