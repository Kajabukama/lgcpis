<?php

    class Session {

        private $islogged = false;
        public $userid = 0;

        public function __construct(){
            session_start();
            $this->checkLogin();
        }

        public static function exists($name){
        return (isset($_SESSION[$name])) ? true : false;
        }
        public static function set($name, $value){
            return $_SESSION[$name] = $value;
        }

        public static function get($name){
            return $_SESSION[$name];
        }

        public static function delete($name){
            if (self::exists($name)) {
                unset($_SESSION[$name]);
            }
        }

        public static function flush($name, $string = ''){
            if(self::exists($name)){
                $session = self::get($name);
                self::delete($name);
                return $session;
            }else{
                self::put($name, $string);
            }
        }

        public function isLoggedIn(){
            return $this->islogged;
        }

        public function login($user) {
            if ($user) {
                $this->userid = $_SESSION['userid'] = $user->id;
                $this->islogged = true;
            }
        }

        public function logout(){
            if (isset($_SESSION['userid'])) {
                unset($_SESSION['userid']);
                unset($this->userid);
                $this->islogged = false;
                header("Location:.");
            }
        }

        private function checkLogin(){
            if (isset($_SESSION['userid'])) {
                $this->userid = $_SESSION['userid'];
                $this->islogged = true;
            }else{
                unset($this->userid);
                $this->islogged = false;
            }
        }

    }
