<?php
    class DBOperations{

        private $con;

        function __construct(){
            require_once dirname(__FILE__).'/DBConnection.php';

            $db = new DBConnection();

            $this->con = $db->connect();
        }

        function createUser($username, $pword, $email){
            $password = md5($pword);
            $statement = $this->con->prepare("INSERT INTO 'users' ('id', 'username', 'password', 'email')
                                            VALUES (NULL , ?, ?, ?); ");
            $statement->bind_param("sss", $username, $password, $email);

            if ($statement->execute()){
                return true;
            }else{
                return false;
            }
        }

    }
