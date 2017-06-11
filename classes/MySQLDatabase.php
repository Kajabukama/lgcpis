<?php

    class MySQLDatabase {

        public $link = null;
        public $lastQuery = null;

        function __construct(){
          $this->openConnection();
        }

        public function openConnection(){
            $this->link = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
                if (!$this->link) {
                    die("There was an error : ".mysqli_error($this->link));
                }
            return $this->link;
        }

        public function closeConnection(){
            if (isset($this->link)) {
                unset($this->link);
            }
        }
        public function escape($string = null){
            return mysqli_real_escape_string($this->link,$string);
        }
        public function queryDB($query){
            $this->lastQuery = $query;
            $result = mysqli_query($this->link,$query);
            $this->confirmQuery($result);

            return $result;
        }
        public function fetchArray($result){
            return mysqli_fetch_array($result);
        }
        public function fetchAssoc($result){
            return mysqli_fetch_assoc($result);
        }

        private function confirmQuery($result){
            if (!$result) {
                $output = "Database query failed : ".mysqli_error($this->link)."<br/>";
                $output .= "Last query was : ".$this->lastQuery;
                die($output);
            }
        }
        public function numRows($result){
            return mysqli_num_rows($result);  
        }
        public function insertId(){
            return mysqli_insert_id($this->link);
        }
        public function affectedRows(){
            return mysqli_affected_rows($this->link);
        }


  }

