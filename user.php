<?php
    include "config/koneksi.php";
    include "library/controller.php";

    $go = new controller;
    $tabel = "login";
    @$password = base64_encode($_POST['pass']);//enkripsi pake metode base64
    @$field = array('username'=>$_POST['user'], 'password'=>$password);
    $redirect = "?menu=user";
    @$where = "id =  $_GET[id]";
    
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

<h3 class="text-center mt-5">Don't Let Anyone See Your Password</h3>
<section class="align-items-center">
    <div class="mx-auto text-center">
        <img src="images/user.svg" width="250">
    </div>

    <div>
    <form method="post">
        <table align="center">
            <div class="mb-3">
                <tr>
                    <td><label for="exampleInputEmail1" class="form-label m-2">Username </label></td>
                    <td></td>
                    <td><input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="user" value="<?php echo @$edit['username'] ?>" required></td>
                </tr>
            </div>
            <div class="mb-3">
                <tr>
                    <td><label for="exampleInputPassword1" class="form-label m-2">Password </label></td>
                    <td></td>
                    <td><input name="pass" value="<?php echo base64_decode(@$edit['password']) ?>" type="password" class="form-control" id="showPass" required></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><input type="checkbox" onclick="myFunction()"> Show Password</td>
                </tr>
            </div>
            <tr>
                <td></td>
                <td></td>
                <td class="py-2">
                    <?php if(@$_GET['id']==""){ ?>
                        <input type="submit" name="simpan" value="SIMPAN" class="btn btn-primary">
                    <?php }else{?>
                        <input type="submit" name="ubah" value="UBAH" class="btn btn-primary">
                    <?php } ?>
                </td>
            </tr>
        </table>
    </form>

    <table align="center" border="1" class="table table-stripped table-hover datatab w-25 mb-5">
        <tr class="table-secondary">
            <th>No</th>
            <th>Username</th>
            <th>Password</th>
            <th colspan="2">Aksi</th>
        </tr>
        <?php 
            $data = $go->tampil($con, $tabel);
            $no = 0;
            if($data ==""){
                echo "<tr><td colspan='5'>No Record</td></tr>";
            }else{
                foreach($data as $r){
                    $no++
        ?>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $r['username']; ?></td>
            <td><?php echo $r['password']; ?></td>
            <td><a href="?menu=user&hapus&id=<?php echo $r['id'] ?>" onclick="return confirm('Hapus Data?')" class="btn btn-danger btn-sm">HAPUS</a></td>
            <td><a href="?menu=user&edit&id=<?php echo $r['id'] ?>" class="btn btn-secondary btn-sm">EDIT</a></td>
        </tr>
        <?php } } ?>
    </table>
    </div>
</section>

<!-- SHOW PASSWORD -->
<script>
function myFunction() {
  var x = document.getElementById("showPass");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>