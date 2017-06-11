<?php

    class Message extends DatabaseObject {
        protected static $table = "messages";
        protected static $fields = array('id','from_user','to_user','subject','message','created');
        public $id;
        public $from_user;
        public $to_user;
        public $subject;
        public $message;
        public $created;

        public static function fromUserMessage($id = 0){
            global $database;
            $result = static::findBySQL("SELECT * FROM ".static::$table." WHERE from_user = $id ORDER BY id DESC");
            return $result;
        }

        public static function toUserMessage($id = 0){
            global $database;
            $result = static::findBySQL("SELECT * FROM ".static::$table." WHERE to_user = $id ORDER BY id DESC");
            return $result;
        }

        public static function countMessages(){
            $result = static::findBySQL("SELECT * FROM ".static::$table);
            return count($result);
        }

        public static function countMessageTo($uid){
            $result = static::findBySQL("SELECT * FROM ".static::$table." WHERE to_user = $uid");
            return count($result);
        }

        public static function countMessageFrom($uid){
            $result = static::findBySQL("SELECT * FROM ".static::$table." WHERE from_user = $uid");
            return count($result);
        }
        
    }





