<?php
$conn = mysqli_connect("localhost","root","","phpdasar");

function query($query){
    global $conn;
    $result=mysqli_query($conn,$query);
    $data=[];
    while($row=mysqli_fetch_assoc($result)){
        $data[]=$row;
    }
    return $data;
}

function tambah($data){
    global $conn;
    $nim=htmlspecialchars($data["nim"]) ;
    $nama=htmlspecialchars($data["nama"]);
     $email=htmlspecialchars($data["email"]);
    $gambar=htmlspecialchars($data["gambar"]);

    $query="INSERT INTO mahasiswa
            VALUES
            ('','$nim','$nama','$email','$gambar')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id=$id");
    return mysqli_affected_rows($conn);
}

function ubah($id, $data){
    global $conn;
    $nim=htmlspecialchars($data["nim"]) ;
    $nama=htmlspecialchars($data["nama"]);
     $email=htmlspecialchars($data["email"]);
    $gambar=htmlspecialchars($data["gambar"]);
    $query="UPDATE mahasiswa
            SET nim='$nim', nama='$nama', email='$email', gambar='$gambar'
            WHERE id=$id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
?>