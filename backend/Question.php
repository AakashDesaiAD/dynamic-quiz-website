<?php 

 include_once ('Dbconnect.php');
   
 class Question extends Dbconnect 
 {    
    public function __construct() 
    { 
        parent::__construct();        
    } 

    public function getAllQuestions() 
    { 
        $query = "SELECT * FROM questions"; 
        $data = $this->connection->query($query);
        return $data;
    }

    public function checker($postData)
    {
        $response = [];
        $query = "SELECT * FROM questions WHERE id = '{$postData["qid"]}'";
        $data = $this->connection->query($query);
        $qd = $data->fetch_assoc();
        if ($qd['right_answer'] === $postData['option']) {
            $response['status'] = true;
        } else {
            $response['status'] = false;
            $response['right_answer'] = $qd['right_answer'];
        }
        return $response;
    }        
 } 
 ?>