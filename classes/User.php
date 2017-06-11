<?php

    class User extends DatabaseObject {
        protected static $table = "users";
        protected static $fields = array('id','fname','sname','lname','sex','phone','username','password','token','access','avatar','status','suspended','created');
        public $id;
        public $fname;
        public $sname;
        public $lname;
        public $sex;
        public $phone;
        public $username;
        public $password;
        public $token;
        public $access;
        public $avatar;
        public $status;
        public $suspended;
        public $created;
        

        public function fullName(){
            if (isset($this->fname) && isset($this->lname)) {
                return $this->fname." ".$this->initials($this->sname).". ".$this->lname;
            }else{
                return "NO names found";
            }
        }

        public function formatDate(){
            $format = date('l jS F, Y', $this->created);
            return $format;
        }

        public function profileDate(){
            $format = date('l jS \of F Y h:i:s A',$this->created);
            return $format;
        }
        
        public function initials($string){
            $expr = '/(?<=\s|^)[a-z]/i';
            preg_match_all($expr, $string, $matches);
            $result = implode('', $matches[0]);
            $result = strtoupper($result);
            return $result;
        }
        public static function authenticate($username = "", $password = ""){
            global $database;
            $sql = "SELECT * FROM ".self::$table; 
            $sql .= " WHERE username = '$username' ";
            $sql .= "AND password = '$password' ";
            $sql .= "LIMIT 1 ";

            $result = $database->queryDB($sql);
            return $result;
        }

        public static function findByMobile($mobile = 0){
            global $database;
            $arr = static::findBySQL("SELECT * FROM ".static::$table." WHERE phone = '$mobile' ");
            return !empty($arr) ? array_shift($arr) : false;
        } 
        
        
    }





