<?php

    class LikeComment extends DatabaseObject {
        protected static $table = "like_comment";
        protected static $fields = array('id','user_id','comment_id','likes');
        public $id;
        public $user_id;
        public $comment_id;
        public $likes;
        

        public static function countLikeComment(){
            $result = static::findBySQL("SELECT * FROM ".static::$table);
            return count($result);
        }

        public static function countLikeByComment($cid = 0){
            $result = static::findBySQL("SELECT * FROM ".static::$table." WHERE comment_id = $cid");
            return count($result);
        }


        public static function findLikeByUser($uid = 0, $cid = 0){
            $arr = static::findBySQL("SELECT * FROM ".static::$table." WHERE user_id = $uid AND comment_id = $cid ");
            return !empty($arr) ? array_shift($arr) : false;
        }
    }





