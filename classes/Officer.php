<?php

    class Officer extends DatabaseObject {
        protected static $table = "officers";
        protected static $fields = array('id','region_name','district_name','ward_name','type_name','title','fname','sname','lname','sex','dob','phone','email','suspended','created');
        public $id;
        public $region_name;
        public $district_name;
        public $ward_name;
        public $type_name;
        public $title;
        public $fname;
        public $sname;
        public $lname;
        public $sex;
        public $dob;
        public $phone;
        public $email;
        public $suspended;
        public $created;

        public function fullName(){
            if (isset($this->fname) && isset($this->lname)) {
                return $this->fname." ".$this->init($this->sname).". ".$this->lname;
            }else{
                return "NO names found";
            }
        }

         public function formatDate(){
            $format = date('F ,jS Y',$this->created);
            return $format;
        }

        public function init($string){
            $expr = '/(?<=\s|^)[a-z]/i';
            preg_match_all($expr, $string, $matches);
            $result = implode('', $matches[0]);
            $result = strtoupper($result);
            return $result;
        }

        public static function countOfficers(){
            global $database;
            $result = static::findBySQL("SELECT * FROM ".static::$table);
            return count($result);
        }

        // find a record using a given id
        public static function findByEmail($email = ""){
            global $database;
            $arr = static::findBySQL("SELECT * FROM ".static::$table." WHERE email = {$email} ");
            return !empty($arr) ? true : false;
        }
        
        
    }





