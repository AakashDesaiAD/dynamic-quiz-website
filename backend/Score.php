<?php 

 include_once ('Dbconnect.php');
 include ('User.php');
   
 class Score extends Dbconnect 
 {    
    public function __construct() 
    { 
        parent::__construct();        
    }

    public function leaderboard()
    {
        $user = new User();
        $response = [];
        $query = "SELECT * FROM score ORDER BY score DESC ";
        $data = $this->connection->query($query);
        $i = 1;
        while ($r = $data->fetch_assoc()) {
            $name = $user->getUserByEmail($r['email'])->fetch_assoc()['name'];
            $response[$i]['name'] = $name;
            $response[$i]['score'] = $r['score'];
            $i++;
        }
        $response = array_unique($response);
        return $response;
    }
} 
 ?>