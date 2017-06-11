<?php

    class Comment extends DatabaseObject {
        protected static $table = "comments";
        protected static $fields = array('id','user_id','topic_id','comment','created');
        public $id;
        public $user_id;
        public $topic_id;
        public $comment;
        public $created;

        public static function countComments(){
            global $database;
            $result = static::findBySQL("SELECT * FROM ".static::$table);
            return count($result);
        }

        public static function countCommentByTopic($tid = 0){
            global $database;
            $result = static::findBySQL("SELECT * FROM ".static::$table." WHERE topic_id = $tid");
            return count($result);
        }

        public static function countCommentByAuthor($aid = 0){
            global $database;
            $result = static::findBySQL("SELECT * FROM ".static::$table." WHERE user_id = $aid");
            return count($result);
        }

        public static function findCommentById($id = 0){
            global $database;
            $result = static::findBySQL("SELECT * FROM ".static::$table." WHERE user_id = $id ORDER BY id DESC");
            return $result;
        }

        public static function findCommentByTopic($id = 0){
            global $database;
            $result = static::findBySQL("SELECT * FROM ".static::$table." WHERE topic_id = $id ORDER BY id DESC");
            return $result;
        }
        
    }





