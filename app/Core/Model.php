<?php

namespace App\Core;

use PDO;

class Model {
    
    public $db = NULL;
    
    protected $table = NULL;
    
    protected $fillable = [];
    
    function __construct() {
        try {
            self::openDatabaseConnection();
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }
    
    private function openDatabaseConnection() {
        $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);
        
        $this->db = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET, DB_USER, DB_PASS, $options);
    }
    
    public function find($id) {
        $sql = "SELECT * FROM {$this->table} WHERE id = {$id}";
        $statement = $this->db->prepare($sql);
        $statement->execute();
    
        return $statement->fetch();
    }
    
    public function get() {
        
        $sql = "SELECT * FROM {$this->table}";
        $statement = $this->db->prepare($sql);
        $statement->execute();
        
        return $statement->fetchAll();
    }
    
    public function insert($params) {
        
        $keys = array_map(function ($key) {
            return ':' . $key;
        }, $this->fillable);
        
        $fillable = implode($this->fillable, ', ');
        $keys = implode($keys, ', ');
        
        $sql = "INSERT INTO {$this->table} ({$fillable}) VALUE({$keys})";
    
    
        $statement = $this->db->prepare($sql);
        $statement->execute($params);
        
        return $this->db->lastInsertId();
    }
    
    public function update($id, $params) {
        
        $fillable = $this->fillable;
        foreach($fillable as $key => $val) {
            $fillable[$key] = "{$val} = :{$val}";
        }
        $fillable = implode($fillable, ', ');
        
        $sql = "UPDATE {$this->table} SET {$fillable} WHERE id = {$id}";
        $statement = $this->db->prepare($sql);
    
        return $statement->execute($params);
    }
    
    public function delete($id) {
        
        $sql = "DELETE FROM {$this->table} WHERE id = {$id}";
        $statement = $this->db->prepare($sql);
    
        return $statement->execute();
    }
}
