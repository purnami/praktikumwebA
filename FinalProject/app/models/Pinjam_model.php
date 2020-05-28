<?php

class Pinjam_model{
    private $table = 'pinjam';
	private $db;
		 
	public function __construct(){
	    $this->db = new Database;
    }
    
    public function getAllPinjam(){
		$this->db->query('SELECT * FROM ' . $this->table);
		return $this->db->resultSet();
    }

    public function tambahDataPinjam($data){
        $query = "INSERT INTO pinjam VALUES
        ('', :iduser, :idbuku, :sts, :tglpinjam, :tglkembali)";
		$date= new DateTime('0000-00-00');
		// $now= new DateTime('now');
		// $week=new DateTime('+1 week');
		// $now= date('Y-m-d s:i:H');
		
        $this->db->query($query);
        $this->db->bind('iduser', $data['iduser']);
		$this->db->bind('idbuku', $data['idbuku']);
		$this->db->bind('sts', 0);
		// $this->db->bind('tglpinjam', $date->format('d-m-Y H:i:s'));
		$this->db->bind('tglpinjam', $date->format('Y-m-d'));
		$this->db->bind('tglkembali', $date->format('Y-m-d'));
        $this->db->execute();
        return $this->db->rowCount();
	}

    public function getPinjamUser($iduser){
        $this->db->query(' SELECT * FROM pinjam INNER JOIN buku ON pinjam.id_buku=buku.id WHERE id_user=:iduser ');
        $this->db->bind('iduser', $iduser);
        return $this->db->resultSet();
	}
	
	public function getPinjam(){
        $this->db->query(' SELECT * FROM pinjam INNER JOIN buku INNER JOIN user ON pinjam.id_buku=buku.id AND pinjam.id_user=user.id ORDER BY id_pinjam ASC');
        return $this->db->resultSet();
	}
	
	// public function editPinjam($id, $status){
	// 	if($status==1){
    //         $sts=-1;
    //     }else if($status==0){
    //         $sts=1;
    //     }else if($status==-1){
    //         $sts=1;
	// 	}
	// 	$tgl_pinjam= new DateTime('now');
	// 	$tgl_kembali=new DateTime('+1 week');
	// 	$query = "UPDATE pinjam SET 
	// 		 status = :status,
	// 		 tgl_pinjam = :tgl_pinjam,
	// 		 tgl_kembali= tgl_kembali
	// 		 WHERE id_pinjam = :id";
			 
	// 		 $this->db->query($query);
	// 		 $this->db->bind('status', $sts);
	// 		 $this->db->bind('tgl_pinjam', $tgl_pinjam->format('Y-m-d'));
	// 		 $this->db->bind('tgl_kembali', $tgl_kembali->format('Y-m-d'));
    //          $this->db->bind('id', $id);
			 
    //          $this->db->execute();
             
	// 		 return $this->db->rowCount();
	// }
    
    public function getPinjamById($id){
        $this->db->query(' SELECT * FROM ' . $this->table . ' WHERE id_pinjam=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
	}

	public function editPinjam($id, $status){
		$tgl_pinjam= new DateTime('now');
		$tgl_kembali=new DateTime('+1 week');
		if($status==1){
			$tgl_pinjam= new DateTime('0000-00-00');
			$tgl_kembali= new DateTime('0000-00-00');
			        $st=-1;
			    }else if($status==0){
			        $st=1;
			    }else if($status==-1){
					
			        $st=1;
				}
		$query = "UPDATE pinjam SET 
			 status = :sts,
			 tgl_pinjam = :tgl_pinjam,
			 tgl_kembali = :tgl_kbl
			 WHERE id_pinjam = :id";
			 
			 $this->db->query($query);
			 $this->db->bind('sts', $st);
             $this->db->bind('id', $id);
			 $this->db->bind('tgl_pinjam', $tgl_pinjam->format('Y-m-d'));
			 $this->db->bind('tgl_kbl', $tgl_kembali->format('Y-m-d'));
			 
             $this->db->execute();
             
			 return $this->db->rowCount();
	}

	public function getJmlPinjam($status){
		$this->db->query('SELECT * FROM pinjam WHERE status = :status');
		// $this->db->query('SELECT * FROM pinjam');
		$this->db->bind('status', $status);
        $this->db->execute();
        return $this->db->rowCount();
    }
	// public function getSearchPinjam(){
	// 	$keyword= $_POST['keyword'];
	// 	$query="SELECT * FROM pinjam WHERE nama_pinjam LIKE :keyword";
	// 	// $this->db->query(' SELECT * FROM ' . $this->table . ' WHERE nama_pinjam LIKE :nama ORDER BY nama_pinjam ASC');
	// 	$this->db->query($query);
	// 	$this->db->bind('keyword', "%$keyword%");
	// 	return $this->db->resultSet();
	// }
	
	// public function getFilterSortpinjam($data){
	// 	$filter=$_POST['filter'];
	// 	if($data['sort']=="namapinjam"){
	// 		$this->db->query(' SELECT * FROM ' . $this->table . ' WHERE jenis_pinjam LIKE :jenispinjam ORDER BY nama_pinjam ASC');
	// 	}
	// 	else if($data['sort']=="tahunterbit"){
	// 		$this->db->query(' SELECT * FROM ' . $this->table . ' WHERE jenis_pinjam LIKE :jenispinjam ORDER BY tahun_terbit ASC');
	// 	}else if($data['sort']==""){
	// 		$this->db->query(' SELECT * FROM ' . $this->table . ' WHERE jenis_pinjam LIKE :jenispinjam');
	// 	}
	// 	$this->db->bind('jenispinjam', "%$filter%");
	// 	return $this->db->resultSet();
		
	// }

   
}