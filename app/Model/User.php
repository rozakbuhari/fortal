<?php

namespace App\Model;

use App\Core\Model;

class User extends Model {
    
    protected $table = 'user';
    
    protected $fillable = ['password', 'fullname', 'email', 'gender', 'security_question_id', 'answer'];
    
    public function getWhere($filter) {
        
        $sql = "SELECT * FROM user WHERE `email` = :email AND `password` = :password LIMIT 1";
        
        $query = $this->db->prepare($sql);
        $parameters = [':email' => $filter['email'], ':password' => $filter['password']];
        $query->execute($parameters);
        
        return $query->fetch();
    }
    
    public function roles($user_id) {
        $sql = "SELECT role.* FROM role LEFT JOIN user_role ON user_role.role_id = role.id WHERE user_role.user_id = :user_id";
        
        $query = $this->db->prepare($sql);
        $parameters = [':user_id' => $user_id];
        $query->execute($parameters);
        
        return $query->fetchAll();
    }
    
    public function search($filters) {
        
        $keys = [];
        foreach ($filters as $key => $val) {
            $keys[] = "{$key} = :{$key}";
        }
        
        $keys = implode($keys, ' AND ');
        
        $sql = "SELECT * FROM user WHERE {$keys}";
    
        $query = $this->db->prepare($sql);
        $query->execute($filters);
    
        return $query->fetch();
    }
    
}
