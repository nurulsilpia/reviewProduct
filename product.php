<?php
    include "config/koneksi.php";
    include "library/controller.php";
    $go = new controller();
    $tanggal = date('Y-m-d');
    $tabel = "product";
    $redirect = '?menu=product';
    @$where = "productID =  $_GET[id]"; 
    @$tempat = "foto";

    if(isset($_POST['simpan'])){
    $foto =$_FILES['foto'];
    $upload = $go->upload($foto, $tempat);
    @$field = array('nama'=>$_POST['product'],
                    'jenisID'=>$_POST['jenis'],
                    'foto'=> $upload,
                    'tglInput'=> $tanggal,
                    'ket'=> $_POST['ket']);
        $go->simpan($con, $tabel, $field, $redirect);
    }

    if(isset($_GET['hapus'])){
        $go->hapus($con, $tabel, $where, $redirect);
    } 

    if(isset($_GET['edit'])){
        $sql = "SELECT product .*, jenis FROM product
        INNER JOIN jenis on product.jenisID = jenis.jenisID
        WHERE $where";
        $jalan = mysqli_query($con, $sql);
        $edit= mysqli_fetch_assoc($jalan);
    }

    if(isset($_POST['ubah'])){
        $foto = $_FILES['foto'];
        $upload = $go->upload($foto, $tempat);
        if(empty($_FILES['foto'] ['name'])){
            $field = array('nama'=>$_POST['product'],
            'jenisID'=>$_POST['jenis'],
            'tglInput'=> $tanggal,
            'ket'=> $_POST['ket']); 
            $go->ubah($con, $tabel, $field, $where, $redirect);
        }else{
            $field = array('nama'=>$_POST['product'],
            'jenisID'=>$_POST['jenis'],
            'foto' => $upload,
            'tglInput'=> $tanggal,
            'ket'=>$_POST['ket']); 
            $go->ubah($con, $tabel, $field, $where, $redirect);
        }
    }  
?>

<h3 class="text-center mb-4 mt-5">Add The Best Products</h3>
<div class="text-center mb-4">
    <img src="images/product.svg" width="250">
</div>

<form method="post" enctype="multipart/form-data">
    <table align="center">
        <tr>
            <td>Nama Product</td>
            <td>:</td>
            <td><input type="text" class="form-control m-1" name="product" value="<?php echo @$edit['nama']?>" required></td>
        </tr>
        <tr>
            <td>Jenis</td>
            <td>:</td>
            <td><select name="jenis" class="form-control m-1" required>
                    <option selected disabled>Pilih Jenis</option>
                    <!-- <option value="<?php echo $edit['jenisID'] ?>"><?php echo @$edit['jenis'] ?></option> -->
                    <?php 
                    $jenis = $go->tampil($con,"jenis");
                    foreach($jenis as $r) {
                    ?>
                    <option value="<?php echo $r['jenisID'] ?>"><?php echo $r['jenis'] ?></option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Foto</td>
            <td>:</td>
            <td><input type="file" name="foto" class="m-1"></td>
        </tr>
        <tr>
            <td>Keterangan</td>
            <td>:</td>
            <td><textarea name="ket" class="form-control m-1"><?php echo @$edit['ket']?></textarea></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>
            <?php if(@$_GET['id']=="") { ?>
                <input type="submit" name="simpan" value="SIMPAN" class="btn btn-primary my-2">
            <?php }else{ ?>
                <input type="submit" name="ubah" value="UBAH" class="btn btn-primary mt-2">
            <?php } ?>
            </td>
        </tr>
    </table>
</form>

<table align="center" border="1" class="table table-stripped table-hover datatab w-50 mt-2 mb-5">
    <tr class="table-secondary">
        <th>No</th>
        <th>Nama Product</th>
        <th>Jenis</th>
        <th>Foto</th>
        <th>Tanggal Input</th>
        <th>Keterangan</th>
        <th colspan="2">Aksi</th>
    </tr>
    <?php 
        $no = 0;
        $sql = "SELECT product .*, jenis FROM product
        INNER JOIN jenis on product.jenisID = jenis.jenisID";
        $jalan = mysqli_query($con, $sql);
        while($r= mysqli_fetch_assoc($jalan)){
        $no++
    ?>
    <tr>
    <td><?php echo $no ?></td>
    <td><?php echo $r['nama'] ?></td>
    <td><?php echo $r['jenis'] ?></td>
    <td><img src="foto/<?php echo $r['foto'] ?>" width="50" height="50"></td>
    <td><?php echo $r['tglInput'] ?></td>
    <td><?php echo $r['ket'] ?></td>
    <td><a href="?menu=product&hapus&id=<?php echo $r['productID'] ?>" onclick="return confirm('Hapus Data')" class="btn btn-danger btn-sm">
    HAPUS</a></td>
    <td><a href="?menu=product&edit&id=<?php echo $r['productID'] ?>" class="btn btn-secondary btn-sm"> EDIT </a></td>
    </tr>
    <?php } ?>
</table>