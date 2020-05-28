<?php

class SuperAdmin
 extends Controller
 {
	public function index(){
		$this->view('superadmin/index');
	}
	public function jmladmin(){
		
		echo json_encode($this->model('Admin_model')->getJmlAdmin());
	}
	public function jmluser(){
		
		echo json_encode($this->model('User_model')->getJmlUser());
	}
	public function jmlbuku(){
		
		echo json_encode($this->model('Buku_model')->getJmlBuku());
	}
	public function admin(){
		$data['admin']=$this->model('Admin_model')->getAllAdmin();
		$this->view('superadmin/admin', $data);
	}

	public function editisactive(){
		$admin=$this->model('Admin_model')->getAdminById($_POST['id']);
		$this->model('Admin_model')->editIsActive($_POST['id'], $admin['is_active']);
		echo json_encode($this->model('Admin_model')->getAdminById($_POST['id']));
	}

	public function tambahAdmin(){
		if( $this->model('Admin_model')->tambahDataAdmin($_POST)>0){
			// $admin=$this->model('User_model')->loginUser($_POST);
			header('Location: '. BASEURL . 'superadmin/admin');
			exit;
		}
	}

	public function user(){
		$data['user']=$this->model('User_model')->getAllUser();
		$this->view('superadmin/user', $data);
	}
	public function buku(){
		$data['buku']=$this->model('Buku_model')->getAllBuku();
		$this->view('superadmin/buku', $data);
	}

}