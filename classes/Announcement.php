<?php

    class Announcement extends DatabaseObject {
        protected static $table = "announcements";
        protected static $fields = array('id','user_id','title','announcement','created');
        public $id;
        public $user_id;
        public $title;
        public $announcement;
        public $created;
        
        public function formatDate(){
            $format = date('l jS \of F Y h:i:s A',$this->created);
            return $format;
        }

        public static function countAnnouncement(){
            global $database;
            $result = static::findBySQL("SELECT * FROM ".static::$table);
            return count($result);
        }
    }





