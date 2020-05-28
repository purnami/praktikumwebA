<?php

class User_model{
    private $table = 'user';
	private $db;
		 
	public function __construct(){
	    $this->db = new Database;
    }
    
    public function getAllUser(){
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE role_id=3');
		return $this->db->resultSet();
    }

    public function getUserById($id){
        $this->db->query(' SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDataUser($data){
        $query = "INSERT INTO user VALUES
        ('', :nama, :email, :pass, :role_id, :is_active)";
        
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
		$this->db->bind('email', $data['email']);
		$this->db->bind('pass', $data['pass']);
		$this->db->bind('role_id', 3);
		$this->db->bind('is_active', 1);
        $this->db->execute();
        return $this->db->rowCount();
	}

	public function getJmlUser(){
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE role_id=3');
        $this->db->execute();
        return $this->db->rowCount();
    }
	
	public function loginUser($data){
		$this->db->query(' SELECT * FROM ' . $this->table . ' WHERE email=:email AND password=:pass');
		$this->db->bind('email', $data['email']);
		$this->db->bind('pass', $data['pass']);
		return $this->db->single();
	}
		 
	public function editProfil($data){
		$query = "UPDATE user SET 
		nama = :nama,
		email = :email,
		password = :password
		WHERE id = :id";
		
		$this->db->query($query);
		$this->db->bind('nama', $data['nama']);
		$this->db->bind('email', $data['email']);
		$this->db->bind('password', $data['pass']);
		$this->db->bind('id', $data['id']);
		$this->db->execute();
		
		return $this->db->rowCount();
	}
		 
		 
		//  public function hapusDataMahasiswa($id){
		// 	 $query = "DELETE FROM mahasiswa WHERE id=:id";
			 
		// 	 $this->db->query($query);
		// 	 $this->db->bind('id', $id);
		// 	 $this->db->execute();
		// 	 return $this->db->rowCount();
		//  }
		 
		//  public function ubahDataMahasiswa($data){
		// 	 $query = "UPDATE mahasiswa SET 
		// 	 nama = :nama,
		// 	 no = :no
		// 	 WHERE id = :id";
			 
		// 	 $this->db->query($query);
		// 	 $this->db->bind('nama', $data['nama']);
		// 	 $this->db->bind('no', $data['no']);
		// 	 $this->db->bind('id', $data['id']);
			 
		// 	 $this->db->execute();
		// 	 return $this->db->rowCount();
		//  }
		//  public function cariDataMahasiswa(){
		// 	 $keyword=$_POST['keyword'];
		// 	 $query="SELECT * FROM mahasiswa WHERE nama LIKE :keyword";
		// 	 $this->db->query($query);
		// 	 $this->db->bind('keyword', "%keyword%");
		// 	 return $this->db->resultSet();
		//  }
}