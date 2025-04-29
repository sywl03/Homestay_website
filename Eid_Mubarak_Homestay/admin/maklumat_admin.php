<?PHP 
# Memanggil fail header_admin.php
include('header_admin.php'); 
# Memanggil fail connection dari folder luaran
 include('../connection.php');


 include('background_admin.php');
#----------- Bahagian 2 : Proses penyimpan data-------
# Menyemak kewujudan data POST
if(!empty($_GET))
{   
    # mengambil data POST
    $nama= $_GET['nama'];
    $nokp= $_GET['nokp'];
    $katalaluan= $_GET['katalaluan'];
    
    # data validation - adakah data POST yang diambil empty
    if(empty($nama) or empty($nokp) or empty($katalaluan))
    {
        die("<script>alert('Lengkapkan maklumat yang dikehendaki.');
        window.history.back();</script>");
    }

    # data validation - format nokp betul atau tidak
    if(strlen($nokp)!=12 or !is_numeric($nokp   ))
    {
        die("<script>alert('Ralat pada nokp');
        window.history.back();</script>");
    }

    # Arahan untuk menyimpan data ke dalam jadual admin
    $arahan_sql_simpan="insert into  
    (nama_admin,nokp_admin,katalaluan_admin)
    values
    ('$nama','$nokp','$katalaluan')";

    # melaksanakan proses menyimpan dalam syarat IF
    if(mysqli_query($condb,$arahan_sql_simpan))
    {
        # proses menyimpan data berjaya. papar mesej
        echo "<script>alert('Pendaftaran Berjaya');
        window.location.href='maklumat_admin.php';
        </script>";
    }
    else
    {
        # proses menyimpan data gagal. papar mesej
        echo "<script>alert('Pendaftaran gagal');
        window.history.back();</script>";
    }
}
# ----------- bahagian 1 : memaparkan data dalam bentuk jadual
    # arahan SQL mencari kereta yang masih belum dijual
    $arahan_sql_cari="select* from admin";

    # melaksanakan arahan sql cari tersebut    
    $laksana_sql_cari= mysqli_query($condb,$arahan_sql_cari);
?>
<!-- menyediakan header bagi jadual -->
<div class=" w3-card-4 w3-table w3-threequarter w3-container w3-margin w3-round-large w3-black w3-round-large" >
<!-- selepas header akan diselitkan dengan borang untuk mendaftar kereta baru -->
<h4>Senarai administrator</h4>
<table id='saiz' border='1'>
    <tr>
        <td>Bil</td>
        <td>nama_admin</td>
        <td>nokp_admin</td>
        <td>katalaluan_admin</td>
        <td></td>
    </tr>
    <tr>
    <!-- menyediakan borang untuk mendaftar kereta baru -->
    <form action='' method='GET'>
        <td>#</td>
        <td><input type='text'      name='nama' class='w3-round-large'></td>
        <td><input type='text'      name='nokp' class='w3-round-large'></td>
        <td><input type='password'      name='katalaluan' class='w3-round-large'></td>
        <td><input type='submit'      value='simpan' class=' w3-btn w3-round-xlarge w3-amber'></td>
    </form>
    </tr>
    </div>
    <?PHP 
    $bil=0;
    # pemboleh ubah $rekod mengambail semua data yang ditemui oleh $laksana_sql_cari
    while ($rekod=mysqli_fetch_array($laksana_sql_cari)          )
    {
        # sistem akan memaparkan data $rekod baris demi baris sehingga habis
        echo "
        <tr>
            <td>".++$bil."</td>
            <td>".$rekod['nama_admin']."</td>
            <td>".$rekod['nokp_admin']."</td>
            <td>".$rekod['katalaluan_admin']."</td>
            
            <td>| <a  href='hapus.php?jadual=admin&medan_kp=nokp_admin&kp=".$rekod['nokp_admin']."' onClick=\"return confirm('Anda pasti ingin padam data ini?')\" >Hapus</a> |
                | <a href='kemaskini_admin.php?nama=".$rekod['nama_admin']."&nokp=".$rekod['nokp_admin']."&katalaluan=".$rekod['katalaluan_admin']."' onClick=\"return confirm('Anda pasti ingin mengubahsuai data ini?')\" >Kemaskini</a> |</td>
        </tr>";
    }
    ?>
</table>