<?php 

$conn = mysqli_connect('localhost','root','','db_universitas');

if (mysqli_error($conn)) {
    echo "Database Gagal Diakses";
}

function query($query){
    global $conn;

    $result = mysqli_query($conn,$query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data){
    global $conn;

    $nama = $_POST['nama'];
    $npm = $_POST['npm'];
    $email = $_POST['email'];
    $usia = $_POST['usia'];
    $prodi = $_POST['prodi'];

    $query = "INSERT into mahasiswa values ('', '$nama', '$npm', '$email', '$usia', '$prodi')";
    
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function edit($data){
    global $conn;
    
    $id_mhs = $_GET['id'];
    $nama = $_POST['nama'];
    $npm = $_POST['npm'];
    $email = $_POST['email'];
    $usia = $_POST['usia'];
    $prodi = $_POST['prodi'];
    
    $query = "UPDATE mahasiswa set nama_mhs='$nama', npm='$npm', email='$email', usia='$usia', kode_prodi='$prodi' where id_mhs='$id_mhs'";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($data){
    global $conn;

    $id_mhs = $_GET['id'];

    $query = "DELETE from mahasiswa where id_mhs = $id_mhs";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword){
    
    $query = "SELECT * from mahasiswa where npm like '%$keyword%'";

    return query($query);
}

?>