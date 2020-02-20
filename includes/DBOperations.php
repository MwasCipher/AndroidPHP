<?php
    class DBOperations{

        private $con;

        function __construct()
        {
            require_once dirname(__FILE__).'/DBConnection.php';

            $db = new DBConnection();

            $this->con = $db->connect();
        }

    }
