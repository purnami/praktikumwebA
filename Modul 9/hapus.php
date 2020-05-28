<?php
require 'functions.php';
$id=$_GET["id"];
if(hapus($id)>0){
    echo "berhasil dihapus";
}else{
    echo "gagal dihapus";
}

?>