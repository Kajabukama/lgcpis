<?php

    class Online extends DatabaseObject {
        protected static $table = "online";
        protected static $fields = array('id','user_id','ip_address');
        public $id;
        public $user_id;
        public $ip_address;

         public static function countOnline(){
            global $database;
            $result = static::findBySQL("SELECT * FROM ".static::$table);
            return count($result);
        }
        
        public static function deleteOnline($uid = 0){
            global $database;
            $sql = "DELETE FROM ".static::$table; 
            $sql .= " WHERE user_id = $uid";

            $database->queryDB($sql);
            return ($database->affectedRows() == 1) ? true : false;
        }
    }





