<?php

    class Like extends DatabaseObject {
        protected static $table = "likes";
        protected static $fields = array('id','user_id','topic_id','likes');
        public $id;
        public $user_id;
        public $topic_id;
        public $likes;
        

        public static function countLikes(){
            global $database;
            $result = static::findBySQL("SELECT * FROM ".static::$table);
            return count($result);
        }

        public static function countLikeByTopic($tid = 0){
            global $database;
            $result = static::findBySQL("SELECT * FROM ".static::$table." WHERE topic_id = $tid");
            return count($result);
        }

        public static function countLikesByTopic($tid = 0){
            global $database;
            $result = static::findBySQL("SELECT * FROM ".static::$table." WHERE topic_id = $tid");
            return count($result);
        }

        public static function findLikeByUser($uid = 0, $fid = 0){
            global $database;
            $arr = static::findBySQL("SELECT * FROM ".static::$table." WHERE user_id = $uid AND topic_id = $fid ");
            return !empty($arr) ? array_shift($arr) : false;
        }
    }





