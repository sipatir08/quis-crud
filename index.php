<?php
$host    = "localhost";
$user    = "root";
$pass    = "";
$db      = "pegawai";

$koneksi    = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) { //cek koneksi
    die("Tidak bisa terkoneksi ke database");
}
$nim        = "";
$nama       = "";
$alamat     = "";
$gaji       ="";
$sukses     ="";
$error      ="";

if(isset($_POST['simpan'])){
    $nim        =$_POST['nim'];
    $nama       =$_POST['nama'];
    $alamat     =$_POST['alamat'];
    $gaji       =$_POST['gaji'];

    if($nim && $nama && $alamat && $gaji){
        $sql1 =" values ('$nim', '$nama','$alamat', '$gaji')";
        $q1   = mysqli_query($koneksi,$sql1);
        if ($q1){
            $sukses     = "Berhasil memasukkan data baru";
        }else{
            $error      = "Gagal memasukkan data";
        } 
    }else{
        $error = "Silakan masukka semua data";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Karyawan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        .mx-auto {
            width: 800px
        }

        .card {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="max-auto">
        <!-- untuk memasukkan data -->
        <div class="card">
            <div class="card-header">
                Create / Edit Data
            </div>
            <div class="card-body">
                <?php
                if($error){
                    ?>
                    <div class="alert alert-danger" role="alert">
                    </div>
                    <?php
                }
                ?>
                 <?php
                if($sukses){
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $sukses ?>
                    </div>
                    <?php
                }
                ?>
                <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="nim" class="col-sm-2 col-form-label">nim</label>
                        <div class="col-sm-10">
                            <input type="text"  class="form-control" id="nim" name="nim" value="<?php echo $nim ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text"  class="form-control" id="nama" name="nama" value="<?php echo $nama ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text"  class="form-control" id="alamat" name="alamat" value="<?php echo $alamat ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="gaji" class="col-sm-2 col-form-label">Gaji</label>
                        <div class="col-sm-10">
                        <select class="form-control" name ="gaji" id="gaji">
                            <option value="">-Pilih Gaji-</option>
                            <option value="-umr" <?php if($gaji == "-umr") echo "selected"?>>-umr</option>
                            <option value="+umr" <?php if($gaji == "+umr") echo "selected"?>>+umr</option>
                        </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="submit" name="simpan" value="simpan data" class="btn btn-primary">
                    </div>
            </div>
        </div>
        <!-- untuk mengeluarkan data -->
        <div class="card">
            <div class="card-header text-whit bg-secondary">
                Data Karyawan
            </div>
            <div class="card-body">
                
            </div>
        </div>
</body>

</html>