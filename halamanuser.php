<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "binvapestore";

$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
    die("Tidak bisa terkoneksi ke database");
}

$id_barang="";
$username="";
$no_hp="";
$email="";
$password="";
$alamat="";
$umur="";
$error="";
$sukses="";

if(isset($_GET['op'])){
     $op=$_GET['op'];
}else{
    $op="";
}

if($op =='delete'){
    $id_barang=$_GET['id_barang'];
    $sql1="delete from pembeli where id_barang='$id_barang'";
    $q1=mysqli_query($koneksi,$sql1);
    if($q1){
        $sukses="berhasil hapus data";
    }else{
        $error="gagal hapus data";
    }
}

if($op=='edit'){
    $id_barang=$_GET['id_barang'];
    $sql1="select * from pembeli where ID = '$id_barang'";
    $q1=mysqli_query($koneksi,$sql1);
    $r1=mysqli_fetch_array($q1);
    $username=$r1['username'];
    $no_hp=$r1['nomer_hp'];
    $email=$r1['email'];
    $password=$r1['password'];
    $alamat=$r1['alamat'];
    $umur=$r1['umur'];

    if($username==''){
        $error="data tidak ditemukan";
    }
}

if(isset($_POST['simpan'])){
    $username=$_POST['username'];
    $no_hp=$_POST['nomer_hp'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $alamat=$_POST['alamat'];
    $umur=$_POST['umur'];

    if($username && $no_hp && $email && $password && $alamat && $umur){

        if($op=='edit'){
            $sql1="update barang set username='$username',no_hp='$no_hp',email='$email',password='$password',alamat='$alamat',umur='umur' where id_barang='$id_barang' ";
            $q1=mysqli_query($koneksi,$sql1);
            if($q1){
                $sukses="data berhasil diupdate";
            }else{
                $error="data gagal diupdate";
            }
        }else{
            $sql1="insert into pembeli(password,nama_pengguna,username) values ('$username','$no_hp','$email','$password','$alamat','$umur')";
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
        <a class="nav-link" href="halamantransaksi.php">Halaman Transaksi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="crud.php">Halaman Barang</a>
          </li>
        <form class="d-flex 
        <"form class="d-flex mt-3" role="search">
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
                 header("refresh:5;url=halamanuser.php");
                }
                ?>
            <div class="card">
                <div class="card-header text-white bg-secondary">
                    data user
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">username</th>
                                <th scope="col">no_hp</th>
                                <th scope="col">email</th>
                                <th scope="col">password</th>
                                <th scope="col">alamat</th>
                                <th scope="col">umur</th>
                                
                                
                            </tr>
                            <tbody>
                                <?php
                                 $sql2="select * from pembeli";
                                 $q2= mysqli_query($koneksi,$sql2);
                                 $urut=1;
                                 while($r2= mysqli_fetch_array($q2)){
                                    $username=$r2['username'];
                                    $no_hp=$r2['nomer_hp'];
                                    $email=$r2['email'];
                                    $password=$r2['password'];
                                    $alamat=$r2['alamat'];
                                    $umur=$r2['umur'];

                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $urut++ ?></th>
                                        <td scope="row"><?php echo $username ?></td>
                                        <td scope="row"><?php echo $no_hp ?></td>
                                        <td scope="row"><?php echo $email?></td>
                                        <td scope="row"><?php echo $password?></td>
                                        <td scope="row"><?php echo $alamat?></td>
                                        <td scope="row"><?php echo $umur?></td>

                                        

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