<?php 
    include "config/koneksi.php";
    include "library/controller.php";
    $go = new controller();
    $tabel = "jenis";
    @$field = array('jenis'=>$_POST['jenis']);
    $redirect = '?menu=jenis';
    @$where = "JenisID = $_GET[id]";

    if(isset($_POST['simpan'])){
        $go->simpan($con, $tabel, $field, $redirect);
    }
    if(isset($_GET['hapus'])){
        $go->hapus($con, $tabel, $where, $redirect);
    }
    if(isset($_GET['edit'])){
        $edit = $go->edit($con, $tabel, $where);
    }
    if(isset($_POST['ubah'])){
        $go->ubah($con, $tabel, $field, $where, $redirect);
    }
?>

<h3 class="text-center mb-4 mt-5">Add Something New</h3>
<div class="text-center mb-4">
    <img src="images/jenis.svg" width="250">
</div>

<form method="post">
    <table align="center">
        <tr>
            <td>Jenis</td>
            <td>:</td>
            <td><input type="text" class="form-control" name="jenis" value="<?php echo @$edit['jenis'] ?>" required></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>
            <?php if(@$_GET['id']==""){ ?>
                <input type="submit" class="btn btn-primary my-2" name="simpan" value="SIMPAN">
            <?php }else{ ?>
                <input type="submit" class="btn btn-primary my-2" name="ubah" value="UBAH">
            <?php } ?>
            </td>
        </tr>
    </table>
</form>
<table align="center" border="1" class="table table-stripped table-hover datatab w-25 mb-5">
    <tr class="table-secondary">
        <th>No</th>
        <th>Jenis</th>
        <th colspan="2">Aksi</th>
    </tr>
    <?php 
        $data = $go->tampil($con, $tabel);
        $no = 0;
        if($data==""){
             echo "<tr><td colspan = '4'>No Record</td></tr>";
        }else{
        foreach($data as $r){
        $no++
    ?>
    <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $r['jenis'] ?></td>
        <td><a href="?menu=jenis&hapus&id=<?php echo $r['jenisID'] ?>" onclick="return confirm('Hapus Data?')" class="btn btn-danger btn-sm">HAPUS</a></td>
        <td><a href="?menu=jenis&edit&id=<?php echo $r['jenisID'] ?>" class="btn btn-secondary btn-sm">EDIT</a></td>
    </tr>
    <?php }  } ?>
</table>