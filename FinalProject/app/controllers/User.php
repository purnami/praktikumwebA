<?php
session_start();

class User
 extends Controller
 {
	public function index(){
		$iduser=$_SESSION["id"];
		$_SESSION["alert"]="";
		// $data['judul']='Home';
		// $data['nama']=$this->model('User_model')->getUser();
		// $this->view('templates/header', $data);
		$data['buku']=$this->model('Buku_model')->getAllBuku();
		$data['pinjam']=$this->model('Pinjam_model')->getPinjamUser($iduser);
		// echo date("Y-m-d s:i:H");
		// var_dump($data['pinjam']);
		$this->view('user/index', $data);
		// $this->view('templates/footer');
		
        // echo $iduser;
	}
	public function logout(){
		$_SESSION=[];
        session_unset();
        session_destroy();
        header('Location: '. BASEURL . 'home/index');
        exit;
	}
	public function cari1(){
		$_SESSION["alert"]="";
		if($_POST['keyword']==""){
			$data['buku']=$this->model('Buku_model')->getAllBuku();
		}else{
			$data['buku']=$this->model('Buku_model')->getSearchBuku();
		}
		// $cari=$_POST['keyword'];
		// 	echo $cari;
		
		$this->view('user/index', $data);
        
	}
	public function cari2(){
		$_SESSION["alert"]="";
		if($_POST['filter']=="" && $_POST['sort']==""){
			$data['buku']=$this->model('Buku_model')->getAllBuku();
		}else{
			$data['buku']=$this->model('Buku_model')->getFilterSortBuku($_POST);
		}
		$this->view('user/index', $data);
        
	}


	public function getdetailbuku(){
		// $_SESSION["alert"]="";
		echo json_encode($this->model('Buku_model')->getBukuById($_POST['id']));
		// echo 'ok';
	}

	public function pinjam(){
		// var_dump($_POST['idbuku']);
		// var_dump($_POST['iduser']);
		$buku=$this->model('Buku_model')->getStokBuku($_POST['idbuku']);
		// var_dump($buku['stok']);
		// $_SESSION["id"]=$_POST['idbuku'];
		if($buku['stok']>0){
			if( $this->model('Pinjam_model')->tambahDataPinjam($_POST)>0){
				echo "<script>
				alert('Permohonan peminjaman buku akan diverifikasi terlebih dahulu oleh Admin. Silahkan lihat riwayat pinjaman !');
			</script>";
				// $_SESSION["stok"]=$buku['stok'];
				// $_SESSION["alert"]="Permohonan peminjaman buku akan diverifikasi terlebih dahulu oleh Admin. Silahkan lihat riwayat pinjaman !";
				header('Location: '. BASEURL . 'user/index');
				exit;
			}
			// $_SESSION["stok"]=$buku['stok'];
			
			// 	// $_SESSION["alert"]="Permohonan peminjaman buku akan diverifikasi terlebih dahulu oleh Admin. Silahkan lihat riwayat pinjaman !";
			// 	header('Location: '. BASEURL . 'user/index');
			// 	// exit;
			// echo "stok ada";
		}else if($buku['stok']==0){
			// echo "stok kosong";
			// $_SESSION["stok"]=$buku['stok'];
			// $_SESSION["alert"]="Buku tidak dapat dipinjam karena stok kosong";
			echo "<script>
				alert('Buku tidak dapat dipinjam karena stok kosong');
			</script>";
			header('Location: '. BASEURL . 'user/index');
			exit;
		}
        
	}

	public function geteditprofil(){
		echo json_encode($this->model('User_model')->getUserById($_POST['id']));
	}

	public function editProfil(){
		// var_dump($_POST);
		if( $this->model('User_model')->editProfil($_POST)>0){
			$user=$this->model('User_model')->loginUser($_POST);
			$_SESSION["id"]=$user["id"];
			$_SESSION["nama"]=$user["nama"];
			header('Location: '. BASEURL . 'user/index');
			exit;
		}
	}



}