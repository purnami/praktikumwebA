<?php

session_start();

class Home 
 extends Controller
 {
	public function index(){
		// $data['judul']='Home';
		// $data['nama']=$this->model('User_model')->getUser();
		// $this->view('templates/header', $data);
		$this->view('home/index');
        // $this->view('templates/footer');
        
	}
	public function login(){
		$user=$this->model('User_model')->loginUser($_POST);
		if( $user ){
			$_SESSION["id"]=$user["id"];
			$_SESSION["nama"]=$user["nama"];
			$_SESSION["email"]=$user["email"];
			$_SESSION["role_id"]=$user["role_id"];
			$_SESSION["is_active"] = $user["is_active"];
			$_SESSION["alert"]="";
			if($user["role_id"]==1){
				header('Location: '. BASEURL . 'superadmin/index');
				exit;
			}
			else if($user["role_id"]==2){
				header('Location: '. BASEURL . 'admin/index');
				exit;
			}
			else if($user["role_id"]==3){
				header('Location: '. BASEURL . 'user/index');
				exit;
			}
			
		}
		// var_dump($user["id"]);
		// $a= count($this->model('User_model')->loginUser($_POST));
		// $id=$user["id"];
		// echo "$id";
	}
	public function regis(){
		// $this->view('home/regis');
		if( $this->model('User_model')->tambahDataUser($_POST)>0){
			$user=$this->model('User_model')->loginUser($_POST);
			$_SESSION["id"]=$user["id"];
			$_SESSION["nama"]=$user["nama"];
			$_SESSION["email"]=$user["email"];
			$_SESSION["role_id"]=$user["role_id"];
			$_SESSION["is_active"] = $user["is_active"];
			$_SESSION["alert"]="";
			header('Location: '. BASEURL . 'user/index');
			exit;
		}
		// var_dump($_POST);
	}
}