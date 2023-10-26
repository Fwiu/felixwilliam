<?php 
require 'config.php';
$id = $_GET['id'];
$data = query("SELECT * from mahasiswa where id_mhs = $id")[0];
if(isset($_POST['edit'])) {
    if(edit($_POST) > 0 ) {
        echo "<script>
                alert('Data berhasil diubah!')
                window.location.href = 'admin.php'
        </script>";
    }else {
        echo "<script>
                alert('Data  tidak berhasil diubah!')
                window.location.href = 'admin.php'
        </script>";
    }
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

<!-- Form Data -->
<div class="container my-5">
    <h1>Form Ubah Mahasiswa</h1>
    <form method="post" action="">
        <div class="mb-3">
            <label class="form-label">Nama Mahasiswa</label>
            <input type="text" class="form-control" name="nama" value="<?= $data['nama_mhs'] ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">NPM</label>
            <input type="number" class="form-control" name="npm" value="<?= $data['npm'] ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="text" class="form-control" name="email" value="<?= $data['email'] ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Usia</label>
            <input type="number" class="form-control" name="usia" value="<?= $data['usia'] ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Program Studi</label>
            <select name="prodi" class="form-control">
                <?php 
                $data = query("SELECT * from program_studi");
                foreach ($data as $prodi) :
                ?>
                <option value="<?= $prodi['kode_prodi'] ?>"><?= $prodi['nama_prodi'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary" name="edit">Submit</button>
        <a href="admin.php" class="btn btn-secondary">Balik</a>
    </form>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>