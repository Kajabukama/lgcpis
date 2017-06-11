<?php

    class Forum extends DatabaseObject {
        protected static $table = "forum";
        protected static $fields = array('id','user_id','region_name','topic_name','description','created','visible');
        public $id;
        public $user_id;
        public $region_name;
        public $topic_name;
        public $description;
        public $created;
        public $visible;

        public static function countForums(){
            global $database;
            $result = static::findBySQL("SELECT * FROM ".static::$table);
            return count($result);
        }

        public static function findForumByUser($id = 0){
            global $database;
            $result = static::findBySQL("SELECT * FROM ".static::$table." WHERE user_id = $id ORDER BY id DESC");
            return $result;
        }

        public static function countTopicByAuthor($aid = 0){
            global $database;
            $result = static::findBySQL("SELECT * FROM ".static::$table." WHERE user_id = $aid");
            return count($result);
        }

        public static function findForumByVisibility(){
            global $database;
            $result = static::findBySQL("SELECT * FROM ".static::$table." WHERE visible = 1 ORDER BY id DESC");
            return $result;
        }

        

        public static function findForumById($id = 0){
            global $database;
            $result = static::findBySQL("SELECT * FROM ".static::$table." WHERE user_id = $id ORDER BY id DESC");
            return $result;
        }
        
    }





