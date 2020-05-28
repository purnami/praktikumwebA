<?php

class Admin_model{
    private $table = 'user';
	private $db;
		 
	public function __construct(){
	    $this->db = new Database;
    }
    
    public function getAllAdmin(){
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE role_id=2');
		return $this->db->resultSet();
    }

    public function getAdminById($id){
        $this->db->query(' SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function editIsActive($id, $is_active){
        if($is_active==1){
            $active=0;
        }else if($is_active==0){
            $active=1;
        }
        	 $query = "UPDATE user SET 
			 is_active = :active
			 WHERE id = :id";
			 
			 $this->db->query($query);
             $this->db->bind('active', $active);
             $this->db->bind('id', $id);
			 
             $this->db->execute();
             
			 return $this->db->rowCount();
    }

    public function tambahDataAdmin($data){
        $query = "INSERT INTO user VALUES
        ('', :nama, :email, :pass, :role_id, :is_active)";
        
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
		$this->db->bind('email', $data['email']);
		$this->db->bind('pass', $data['pass']);
		$this->db->bind('role_id', 2);
		$this->db->bind('is_active', 1);
        $this->db->execute();
        return $this->db->rowCount();
    }
    
    public function getJmlAdmin(){
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE role_id=2');
        $this->db->execute();
        return $this->db->rowCount();
    }
	
}