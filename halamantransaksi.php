<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "binvapestore";

$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
    die("Tidak bisa terkoneksi ke database");
}

$id_transaksi="";
$total_barang="";
$total_harga="";
$error="";
$sukses="";

if(isset($_GET['op'])){
     $op=$_GET['op'];
}else{
    $op="";
}

if($op =='delete'){
    $id_transaksi=$_GET['id_transaksi'];
    $sql1="delete from dibeli where total_harga='$total_harga'";
    $q1=mysqli_query($koneksi,$sql1);
    if($q1){
        $sukses="berhasil hapus data";
    }else{
        $error="gagal hapus data";
    }
}

if($op=='edit'){
    $id_transaksi=$_GET['id_transaksi'];
    $sql1="select * from dibeli where total_harga = '$totalharga'";
    $q1=mysqli_query($koneksi,$sql1);
    $r1=mysqli_fetch_array($q1);
    $id_transaksi['id_transaksi'];
    $total_barang=$r1['total_barang'];
    $total_harga=$r1['total_harga'];

    if($merk==''){
        $error="data tidak ditemukan";
    }
}

if(isset($_POST['simpan'])){
    $id_transaksi=$_POST['id_transaksi'];
    $total_barang=$_POST['total_barang'];
    $total_harga=$_POST['total_harga'];

    if($id_transaksi && $total_barang && $total_harga){

        if($op=='edit'){
            $sql1="update dibeli set total_barang='$total_barang',total_harga='$total_harga' where id_transaksi='$id_transaksi' ";
            $q1=mysqli_query($koneksi,$sql1);
            if($q1){
                $sukses="data berhasil diupdate";
            }else{
                $error="data gagal diupdate";
            }
        }else{
            $sql1="insert into dibeli(id_pembeli,id_barang,total) values ('$id_transaksi','$total_barang','$total_harga')";
        $q1=mysqli_query($koneksi,$sql1);
        if($q1){
            $sukses="berhasil memasukan data baru";
        }else{
            $error="gagal memasukan data";
        }
        }
    }else{
        $error="silakan masukan datanya";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data barang</title>
    <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>
    <h1>Hello, world!</h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>
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
<nav class="navbar bg-body-tertiary fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Halaman Admin</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="crud.php">Halaman Barang</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="halamanuser.php">Halaman User</a>
          </li>
        <form class="d-flex mt-3" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </div>
</nav>
    <div class="mx-auto">
        <div class="card">
            <div class="card-header">
                Create / edit data
            </div>
            <div class="card-body">
                <?php
                if($error){
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error ?>
                    </div>                
                <?php
                }
                ?>
            <div class="card-body">
                <?php
                if($sukses){
                ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>                
                <?php
                 header("refresh:5;url=halamantransaksi.php");
                }
                ?>
            <div class="card">
                <div class="card-header text-white bg-secondary">
                    data transaksi
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">id_transaksi</th>
                                <th scope="col">total_barang</th>
                                <th scope="col">total_harga</th>
    
                            </tr>
                            <tbody>
                                <?php
                                 $sql2="select * from dibeli order by id_transaksi desc";
                                 $q2= mysqli_query($koneksi,$sql2);
                                 $urut=1;
                                 while($r2= mysqli_fetch_array($q2)){
                                    $id_transaksi=$r2['id_transaksi'];
                                    $total_barang=$r2['total_barang'];
                                    $total_harga=$r2['total_harga'];
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $urut++ ?></th>
                                        <th scope="row"><?php echo $id_transaksi ?></th>
                                        <td scope="row"><?php echo $total_barang ?></td>
                                        <td scope="row"><?php echo $total_harga ?></td>
                                        <td scope="row">

                                        </td>
                                    </tr>
                                    <?php
                                 }
                                ?>
                            </tbody>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
</body>

</html>