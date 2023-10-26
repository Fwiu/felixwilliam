<?php 
require 'config.php';

$data = query("SELECT * from mahasiswa");

if(isset($_POST['cari'])) {
    $data = cari($_POST['keyword']);
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Univ Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body data-bs-theme="dark">


<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme='dark'>
    <div class="container d-flex align-items-center col-12">
        <div class="col-5">
        <a class="navbar-brand" href="#">UNIV PUSAT KEUNGGULAN</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        </div>
        <div class="col-4">
        <form class="d-flex" role="search" method="post" action="">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="keyword">
        <button class="btn btn-outline-success" type="submit" name="cari">Search</button>
        </form>
        </div>
        <div class="collapse navbar-collapse col-3" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin.php">Admin</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<!-- Tabel -->
<div class="container my-5">
<table class="table table-responsive">
    <thead>
        <tr>
        <th scope="col">Id</th>
        <th scope="col">Nama Mahasiswa</th>
        <th scope="col">NPM</th>
        <th scope="col">Email</th>
        <th scope="col">Usia</th>
        <th scope="col">Nama Prodi</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        foreach ($data as $mahasiswa) :
            $nama_prodi = "";
            switch($mahasiswa['kode_prodi']){
                case "P001":
                    $nama_prodi = "Fisika";
                break;
                case "P002":
                    $nama_prodi = "Astronomi";
                break;
                case "P003":
                    $nama_prodi = "Sastra Jepang";
                break;
                case "P004":
                    $nama_prodi = "Teknik Komputer";
                break;
                case "P005":
                    $nama_prodi = "Sistem Informasi";
                break;
            }
        ?>
        <tr>
        <th scope="row"><?= $mahasiswa['id_mhs'] ?></th>
        <td><?= $mahasiswa['nama_mhs'] ?></td>
        <td><?= $mahasiswa['npm'] ?></td>
        <td><?= $mahasiswa['email'] ?></td>
        <td><?= $mahasiswa['usia'] ?></td>
        <td><?= $nama_prodi ?></td>
        </tr>
        <?php 
        endforeach;
        ?>
    </tbody>
</table>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>