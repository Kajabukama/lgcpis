<?php

    class Upload extends DatabaseObject {

        protected static $table = "uploads";
        protected static $dbFields = array('id','filename','size','type','uploaded','uby','caption');
        public $id;
        public $filename;
        public $size;
        public $type;
        public $uploaded;
        public $uby;
        public $caption;
        
        protected $tempPath;
        protected $uploadDir = "uploads";
        public $errors = array();

        protected $uploadErrors = array(
            UPLOAD_ERR_OK => "NO errors",
            UPLOAD_ERR_INI_SIZE => "Larger than upload max size",
            UPLOAD_ERR_FORM_SIZE => "Larger than form max file size",
            UPLOAD_ERR_NO_FILE => "No file",
            UPLOAD_ERR_PARTIAL => "Partial upload",
            UPLOAD_ERR_NO_TMP_DIR => "No temporary Directory",
            UPLOAD_ERR_CANT_WRITE => "File cant write to disk",
            UPLOAD_ERR_EXTENSION => "File upload stopped by extension"
        );
        public function attachFile($file){
            if (!$file || empty($file) || !is_array($file)) {
                $this->errors[] = "No file was uploaded";
                return false;
            }else if($file['error'] != 0){
                $this->errors[] = $this->uploadErrors[$file['error']];
                return false;
            }else{

                $this->tempPath = $file['tmp_name'];
                $this->filename = basename($file['name']);
                $this->size = $file['size'];
                $this->type = $file['type'];
                return true;
            }
        }
        public function filePath(){
            return $this->uploadDir.DS.$this->filename;
        }
        public function sizeText(){
            if ($this->size < 1024) {
                return "{$this->size} bytes";
            }else if($this->size > 1048576){
                $sizekb = round(($this->size/1024));
                return "{$sizekb} kb";
            }else{
                $sizemb = round(($this->size/1048576),2);
                return "{$sizemb} mb";
            }
        }
        

    }



 
