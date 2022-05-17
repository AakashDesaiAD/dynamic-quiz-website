<?php 

 include_once ('Dbconnect.php');
session_start();

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
        $maxQ = count($this->getAllQuestions()->fetch_all());
        $response = [];
        $query = "SELECT * FROM questions WHERE id = '{$postData["qid"]}'";
        $data = $this->connection->query($query);
        $qd = $data->fetch_assoc();
        if ($qd['right_answer'] === $postData['option']) {
            $response['status'] = true;
            $_SESSION['score'] = $_SESSION['score']+1;
        } else {
            $response['status'] = false;
            $response['right_answer'] = $qd['right_answer'];
        }
        if ($maxQ == $postData["qid"]) {
            $response['finalQuestion'] = $this->saveScore();
        }
        return $response;
    }

    public function saveScore()
    {
        $response = true;
        $score = $_SESSION['score'];
        $email = $_SESSION['email'];
        $query = "INSERT INTO score (id, email, score) VALUES (NULL, '{$email}', '{$score}')";
        $data = $this->connection->query($query);

        if ($data !== TRUE) {
            $response = false;
        }
        return $response;
    }
} 
 ?>