<?php

class Buku_model{
    private $table = 'buku';
	private $db;
		 
	public function __construct(){
	    $this->db = new Database;
    }
    
    public function getAllBuku(){
		$this->db->query('SELECT * FROM ' . $this->table);
		return $this->db->resultSet();
    }

    public function getBukuById($id){
        $this->db->query(' SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
	}
	public function getSearchBuku(){
		$keyword= $_POST['keyword'];
		$query="SELECT * FROM buku WHERE nama_buku LIKE :keyword";
		// $this->db->query(' SELECT * FROM ' . $this->table . ' WHERE nama_buku LIKE :nama ORDER BY nama_buku ASC');
		$this->db->query($query);
		$this->db->bind('keyword', "%$keyword%");
		return $this->db->resultSet();
	}
	
	public function getFilterSortBuku($data){
		$filter=$_POST['filter'];
		if($data['sort']=="namabuku"){
			$this->db->query(' SELECT * FROM ' . $this->table . ' WHERE jenis_buku LIKE :jenisbuku ORDER BY nama_buku ASC');
		}
		else if($data['sort']=="tahunterbit"){
			$this->db->query(' SELECT * FROM ' . $this->table . ' WHERE jenis_buku LIKE :jenisbuku ORDER BY tahun_terbit ASC');
		}else if($data['sort']==""){
			$this->db->query(' SELECT * FROM ' . $this->table . ' WHERE jenis_buku LIKE :jenisbuku');
		}
		$this->db->bind('jenisbuku', "%$filter%");
		return $this->db->resultSet();
		
	}
	public function getStokBuku($id){
        $this->db->query(' SELECT stok FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
	}
	public function editStokBuku($id,$stok){
		$query = "UPDATE buku SET 
			 stok = :stok
			 WHERE id = :id";
			 
			 $this->db->query($query);
			 $this->db->bind('stok', $stok-1);
             $this->db->bind('id', $id);
             $this->db->execute();
             
			 return $this->db->rowCount();
	}

	public function getJmlBuku(){
        $this->db->query('SELECT * FROM ' . $this->table);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function tambahDataBuku($data, $gbr){

        $query = "INSERT INTO buku VALUES
        ('', :nama, :jenis, :penulis, :penerbit, :tahun, :gambar, :rak, :stok)";
        
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
		$this->db->bind('jenis', $data['jenis']);
		$this->db->bind('penulis', $data['penulis']);
		$this->db->bind('penerbit', $data['penerbit']);
		$this->db->bind('tahun', $data['tahun']);
		$this->db->bind('gambar', $gbr);
		$this->db->bind('rak', $data['rak']);
		$this->db->bind('stok', $data['stok']);
        $this->db->execute();
        return $this->db->rowCount();
	}

	public function editBuku($data, $gbr){
		$query = "UPDATE buku SET 
		nama_buku = :nama,
		jenis_buku = :jenis,
		penulis = :penulis,
		penerbit = :penerbit,
		tahun_terbit = :tahun,
		gambar = :gambar,
		no_rak = :rak,
		stok = :stok
		WHERE id = :id";
		
		$this->db->query($query);
		$this->db->bind('nama', $data['nama']);
		$this->db->bind('jenis', $data['jenis']);
		$this->db->bind('penulis', $data['penulis']);
		$this->db->bind('penerbit', $data['penerbit']);
		$this->db->bind('tahun', $data['tahun']);
		$this->db->bind('gambar', $gbr);
		$this->db->bind('rak', $data['rak']);
		$this->db->bind('stok', $data['stok']);
		$this->db->bind('id', $data['id']);
		$this->db->execute();
		
		return $this->db->rowCount();
	}

	public function hapusBuku($id){
			 $query = "DELETE FROM buku WHERE id=:id";
			 
			 $this->db->query($query);
			 $this->db->bind('id', $id);
			 $this->db->execute();
			 return $this->db->rowCount();
		 }

	// public function editBuku($data, $gbr){
	// 	$query = "UPDATE buku SET 
	// 	nama_buku = :nama,
	// 	jenis_buku = :jenis,
	// 	penulis = :penulis,
	// 	penerbit = :penerbit,
	// 	tahun_terbit = :tahun,
	// 	gambar = :gambar,
	// 	no_rak = :rak,
	// 	stok = :stok,
	// 	WHERE id = :id";
		
	// 	$this->db->query($query);
	// 	$this->db->bind('nama', $data['nama']);
	// 	$this->db->bind('jenis', $data['jenis']);
	// 	$this->db->bind('penulis', $data['penulis']);
	// 	$this->db->bind('penerbit', $data['penerbit']);
	// 	$this->db->bind('tahun', $data['tahun']);
	// 	$this->db->bind('gambar', $gbr);
	// 	$this->db->bind('rak', $data['rak']);
	// 	$this->db->bind('stok', $data['stok']);
	// 	$this->db->bind('id', $data['id']);
	// 	$this->db->execute();
		
	// 	return $this->db->rowCount();
	// }

	function upload($gbr){
		$namaFile=$gbr['gambar']['name'];
		$ukuranFile=$gbr['gambar']['size'];
		$error=$gbr['gambar']['error'];
		$tmpName=$gbr['gambar']['tmp_name'];

		if($error === 4){
			echo "<script>
				alert('pilih gambar terlebih dahulu!');
			</script>";
			return false;
		}

		$ekstensiGambarValid= ['jpg', 'jpeg', 'png'];
		$ekstensiGambar = explode('.', $namaFile);
		$ekstensiGambar = strtolower(end($ekstensiGambar));

		if(!in_array($ekstensiGambar, $ekstensiGambarValid)){
			echo "<script>
				alert('File yang diupload bukan gambar');
			</script>";
			return false;
		}

		if($ukuranFile>1000000){
			echo "<script>
				alert('Ukuran gambar terlalu besar');
			</script>";
			return false;
		}

		move_uploaded_file($tmpName, 'http://localhost/PraktikumWebA/FinalProject/public/img/Buku/' . $namaFile);

		return $namaFile;
	}

	
	// public function loginUser($data){
	// 	$this->db->query(' SELECT * FROM ' . $this->table . ' WHERE email=:email AND password=:pass');
	// 	$this->db->bind('email', $data['email']);
	// 	$this->db->bind('pass', $data['pass']);
	// 	return $this->db->single();
	// }
		 
		 
		 
		 
		 
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