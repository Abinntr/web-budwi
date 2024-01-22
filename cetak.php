<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Binvapestore</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <style>
        @import url('https://fonts.googleapis.com/css?family=Titillium+Web');

        *{
            font-family: 'Titillium Web', sans-serif;
        }
        .product{
            border: 1px solid #eaeaec;
            margin: -1px 19px 3px -1px;
            padding: 10px;
            text-align: center;
            background-color: #efefef;
        }
        table, th, tr{
            text-align: center;
        }
        .title2{
            text-align: center;
            color: #66afe9;
            background-color: #efefef;
            padding: 2%;
        }
        h2{
            text-align: center;
            color: #66afe9;
            background-color: #blue;
            padding: 2%;
        }
        table th{
            background-color: #efefef;
        }
    </style>
</head>
<body>

    <div class="container" style="width: 65%">
    <?php 
        $koneksi = mysqli_connect("localhost","root","","binvapestore");
        $id = $_GET['id'];

        //Menampilkan data pada tabel detail (id transaksi, nama barang dan jumlah barang)
        $transaksi = "SELECT * FROM detail 
        inner join dibeli on detail.id_transaksi = dibeli.id_transaksi 
        where detail.id_transaksi='$id'";
        $query = mysqli_query($koneksi, $transaksi);
        $data = mysqli_fetch_array($query);
        $nama =  "SELECT * FROM dibeli 
        inner join pembeli on dibeli.id_pembeli = pembeli.id_pembeli
        where dibeli.id_transaksi='$id'";
        $query2= mysqli_query($koneksi, $nama);
        $hasil = mysqli_fetch_array($query2);
    ?>
        <div style="clear: both"></div>
        <h3 class="title2">Nota Pembelian</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
            Nama Pembeli :  <?=$data['username'];?><br>
            Alamat :  <?=$hasil['alamat'];?><br>
            No. Invoice : INV-<?=$id?><br>
            Tanggal Pembelian: <?=$hasil['tgl_transaksi'];?>
            <tr>
                <th width="30%">Nama Barang</th>
                <th width="10%">Harga Satuan</th>
                <th width="10%">Jumlah Beli</th>
            </tr>

            <?php
            $produk = "SELECT * FROM detail 
            inner join barang on detail.id_barang = barang.id_barang 
            where detail.id_transaksi='$id'";
            $query2 = mysqli_query($koneksi, $produk);
                while($row = mysqli_fetch_array($query2)){ ?>
                        <tr>   
                            <td><?=$row["merk"]?></td>
                            <td>Rp. <?php echo number_format($row["harga_barang"], 2)?></td>
                            <td><?=$row["quantity"]?></td>
                        </tr>
                        <?php } ?>     
            </table>
            <table class="table table-bordered">
            <tr>
                        <td>Grand Total</td>
                        <td align="right">Rp <?php echo number_format($data['sub'], 2); ?></td>
                    </tr>
            </table>
        </div>

    </div>
    
    <script>window.print();</script>

</body>
</html>