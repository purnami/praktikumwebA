<?php

class Admin
 extends Controller
 {
	public function index(){
		// $data['judul']='Home';
		// $data['nama']=$this->model('User_model')->getUser();
		// $this->view('templates/header', $data);
		$this->view('admin/index');
        // $this->view('templates/footer');
	}

	public function pinjam(){
		$data['pinjam']=$this->model('Pinjam_model')->getPinjam();
		// var_dump($data['pinjam']);
		$this->view('admin/pinjam',$data);
	}

	public function editpinjam(){
		// echo $_POST['id'];
		$pinjam=$this->model('Pinjam_model')->getPinjamById($_POST['id']);
		// $this->model('Pinjam_model')->editPinjam($_POST['id'], $pinjam['status']);
		$idbuku=$pinjam['id_buku'];
		$stokbuku=$this->model('Buku_model')->getStokBuku($idbuku);
		
		if($pinjam['status']==1 || $stokbuku['stok']>0){
			$this->model('Pinjam_model')->editPinjam($_POST['id'], $pinjam['status']);
		}
		$pinjam2=$this->model('Pinjam_model')->getPinjamById($_POST['id']);
		$idbuku2=$pinjam2['id_buku'];
		$stokbuku2=$this->model('Buku_model')->getStokBuku($idbuku2);
		// echo $pinjam2['status'];
		if($pinjam2['status']==1 && $stokbuku2['stok']>0){
			
			$this->model('Buku_model')->editStokBuku($idbuku2,$stokbuku2['stok']);
		}
		
		// if($this->model('Pinjam_model')->editPinjam($_POST['id'])>0){
		// 	echo $pinjam['status'];
		// }else{
		// 	echo "ok2";
		// }
		echo json_encode($this->model('Pinjam_model')->getPinjamById($_POST['id']));
		// var_dump($pinjam);
		// echo $stokbuku['stok'];
		
	}
	public function buku(){
		$data['buku']=$this->model('Buku_model')->getAllBuku();
		// var_dump($data['pinjam']);
		$this->view('admin/buku',$data);
	}

	public function tambahBuku(){
		// var_dump($_FILES['gambar']['name']);
		// var_dump($_FILES['gambar']['tmp_name']);
		// var_dump($_POST);

		move_uploaded_file($_FILES['gambar']['tmp_name'], 'C:\xampp\htdocs\PraktikumWebA\FinalProject\public\img\Buku/' . $_FILES['gambar']['name']);
		$gambar=$_FILES['gambar']['name'];
		if( $this->model('Buku_model')->tambahDataBuku($_POST, $gambar)>0){
			header('Location: '. BASEURL . 'admin/buku');
			exit;
		}

	}
	public function geteditbuku(){
		echo json_encode($this->model('Buku_model')->getBukuById($_POST['id']));
	}

	public function editBuku(){
		// var_dump($_POST);
		move_uploaded_file($_FILES['gambar']['tmp_name'], 'C:\xampp\htdocs\PraktikumWebA\FinalProject\public\img\Buku/' . $_FILES['gambar']['name']);
		$gambar=$_FILES['gambar']['name'];
		// $buku=$this->model('Buku_model')->getBukuById($_POST['id']);
		
		if( $this->model('Buku_model')->editBuku($_POST, $gambar)>0){
			header('Location: '. BASEURL . 'admin/buku');
			exit;
		}

		// echo json_encode($this->model('Buku_model')->getBukuById($_POST['id']));
	}
	public function hapusbuku($id){
		// echo $_POST['id'];
		// echo $this->model('Buku_model')->getBukuById($_POST['id']);
		
		if( $this->model('Buku_model')->hapusBuku($id)>0){
			header('Location: '. BASEURL . 'admin/buku');
			exit;
		}
		// echo json_encode($this->model('Buku_model')->getAllBuku);
	}

	public function jmlbuku(){
		
		echo json_encode($this->model('Buku_model')->getJmlBuku());
	}

	public function jmlpinjam(){
		
		echo json_encode($this->model('Pinjam_model')->getJmlPinjam(1));
	}
	
}