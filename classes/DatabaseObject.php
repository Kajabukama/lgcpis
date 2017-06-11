<?php
  // common database methods
  
    class DatabaseObject {

        protected static $table;
        protected static $fields;
        // find all records in a given table
        public static function findAll(){
            global $database;
            $result = static::findBySQL("SELECT * FROM ".static::$table." ORDER BY id DESC");
            return $result;
        }
    
        // find a record using a given id
        public static function findById($id = 0){
            global $database;
            $arr = static::findBySQL("SELECT * FROM ".static::$table." WHERE id = $id ");
            return !empty($arr) ? array_shift($arr) : false;
        }

        public static function findByToken($token = 0){
            global $database;
            $arr = static::findBySQL("SELECT * FROM ".static::$table." WHERE token = '$token' ");
            return !empty($arr) ? array_shift($arr) : false;
        }
        
        // find by any given sql 
        public static function findBySQL($sql = ""){
            global $database;
            $resultSet = $database->queryDB($sql);
            $objectArray = array();
            while ($row = $database->fetchArray($resultSet)) {
                $objectArray[] = static::instantiate($row);
            }
            return $objectArray;
        }
        private static function instantiate($record){

            $object = new static;

            if (is_array($record)) {
                foreach ($record as $attribute => $value) {
                    if ($object->hasAttribute($attribute)) {
                        $object->$attribute = $value;
                    }
                }
                return $object;
            } 
        }
        private function hasAttribute($attribute){
            $objectVars = $this->attributes();
            return array_key_exists($attribute, $objectVars);
        }
        private function attributes(){
            $attributes = array();
            foreach (static::$fields as $field) {
                if (property_exists($this, $field)) {
                    $attributes[$field] = $this->$field;
                }
            }
            return $attributes;
        }
        private function sanitizeAttributes(){
            global $database;
            $cleanedValue = array();
            foreach ($this->attributes() as $key => $value) {
                $cleanedValue[$key] = $database->escape($value);
            }
            return $cleanedValue;
        }
        public function saveRecord(){
            return isset($this->id) ? $this->update() : $this->create();
        }
        public function save(){
            if (isset($this->id)) {
                $this->update();
            }else{
                if (!empty($this->erros)) { 
                    return false;
                }
                if (strlen($this->caption) >= 255) {
                    $this->errors[] = "The caption can only be 255 characters long";
                    return false;
                }
                if (empty($this->filename) && empty($this->temp_path)) {
                    $this->errors[] = "The file location was not available";
                    return false;
                }
                //$this->uploadDir = mkdir(pathname);
                $destination = SITE_ROOT.DS.$this->uploadDir.DS.$this->filename;
                if (file_exists($destination)) {
                    $this->errors[] = "The file {$this->filename} already exists";
                    return false;
                }
                if (move_uploaded_file($this->tempPath, $destination)) {
                    if ($this->create()) {
                        unset($this->tempPath);
                        return true;
                    }
                }else{
                    $this->errors[] = "The file upload failed, possible cause, permissions on the upload folder";
                    return false;
                }
            }
        }
        public function create(){
            global $database;
            $attributes = $this->sanitizeAttributes();
            $sql = "INSERT INTO ".static::$table."(";
            $sql .= join(", ", array_keys($attributes));
            $sql .= ") VALUES('";
            $sql .= join("', '", array_values($attributes));
            $sql .= "' )";

            if ($database->queryDB($sql)) {
                $this->id = $database->insertId();
                return true;
            }else{
                return false;
            }
        }
        public function update(){
            global $database;
            $attributes = $this->sanitizeAttributes();
            $attributePairs = array();
            foreach ($attributes as $key => $value) {
                $attributePairs[] = "{$key} = '{$value}' ";
            }
            $sql = "UPDATE ".static::$table." SET ";
            $sql .= join(", ", $attributePairs);
            $sql .= " WHERE id = ".$database->escape($this->id);
            $database->queryDB($sql);
            return ($database->affectedRows() == 1) ? true : false;
        }
        public function delete(){
            global $database;
            $sql = "DELETE FROM ".static::$table; 
            $sql .= " WHERE id = ".$database->escape($this->id);
            $sql .= " LIMIT 1";
            $database->queryDB($sql);
            return ($database->affectedRows() == 1) ? true : false;
        }
    }




