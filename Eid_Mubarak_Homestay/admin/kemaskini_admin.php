<!-- Memanggil fail header_admin.php -->
<?PHP include('header_admin.php') ?>
<div class=" w3-card-4 w3-container w3-third w3-margin w3-round-large " >
<!-- menyediakan borang untuk mengemaskini data admin-->
<form action='' method='POST'>
nama admin <input class="w3-input w3-animate-input" type='text' name='nama_baru' style="width:30%" value='<?PHP echo $_GET['nama']; ?>'><br>
nokp admin <input class="w3-input w3-animate-input" type='text' name='nokp_baru' style="width:30%" value='<?PHP echo $_GET['nokp']; ?>'><br>
katalaluan admin <input class="w3-input w3-animate-input" type='password' name='katalaluan_baru' style="width:30%" value='<?PHP echo $_GET['katalaluan']; ?>'><br>
<input type='submit' value='kemaskini' class='w3-margin w3-btn w3-round-xlarge w3-amber' >
</form>
</div>
<?PHP 
# menyemak kewujudan data POST
if(!empty($_POST))
{
    # Memanggil fail connection dari folder luaran
    include ('../connection.php');

    # mengambil data POST
    $nama_baru= $_POST['nama_baru'];
    $nokp_baru= $_POST['nokp_baru'];
    $katalaluan_baru= $_POST['katalaluan_baru'];

    # mengambil data get['nokp']
    $nokp_lama=$_GET['nokp'];

    # Arahan untuk mengemaskini data ke dalam jadual admin
    $arahan_sql_update="update admin set 
    nama_admin='$nama_baru',
    nokp_admin='$nokp_baru',
    katalaluan_admin='$katalaluan_baru'
    where
    nokp_admin='$nokp_lama'";

    # melaksanakan proses mengemaskini dalam syarat IF
    if(mysqli_query($condb,$arahan_sql_update))
    {
        # peroses mengemaskini berjaya.
        echo "<script>alert('Kemaskini Berjaya');
        window.location.href='maklumat_admin.php';
        </script>";
    }
    else
    {
        # proses mengemaskini gagal
        echo "<script>alert('Kemaskini gagal');
        window.history.back();</script>";
    }
}

?>