
<?PHP
# Memanggil fail header_admin.php
 include('header_admin.php');
# Memanggil fail connection dari folder luaran
 include('../connection.php');

#----------- Bahagian 2 : Proses penyimpan data-------
# Menyemak kewujudan data POST
include('background_admin.php');
if(!empty($_POST))
{
    # mengambil data POST
    $no_rumah= $_POST['no_rumah'];
    $alamat= $_POST['alamat'];
    $id_jenis= $_POST['id_jenis'];
    $harga= $_POST['harga'];


    # memproses maklumat gambar yang di upload
    # proses ini lebih kepada menukar nama fail gambar
    $timestmp=date("Y-m-d");
    $saiz_fail = $_FILES['gambar']['size'];
    $nama_fail=basename($_FILES["gambar"]["name"]);
    $jenis_gambar = pathinfo($nama_fail,PATHINFO_EXTENSION);
    $lokasi = $_FILES['gambar']['tmp_name'];
    $folder = "../images/";    
    $nama_baru_gambar=$no_rumah.$timestmp.".".$jenis_gambar;


    # Arahan untuk menyimpan data ke dalam jadual homestay
    $arahan_sql_simpan="insert into homestay
    values
    ('$no_rumah','$alamat','$id_jenis','$harga','$nama_baru_gambar')";

    # melaksanakan proses menyimpan dalam syarat IF
    if(mysqli_query($condb,$arahan_sql_simpan))
    {
        move_uploaded_file($lokasi,$folder.$nama_baru_gambar);
        # proses menyimpan data berjaya. papar mesej
        echo "<script>alert('Pendaftaran Berjaya');</script>";
    }
    else
    {
        # proses menyimpan data gagal. papar mesej
        echo "<script>alert('Pendaftaran gagal');
        window.history.back();</script>";
    }
    
}

# ----------- bahagian 1 : memaparkan data dalam bentuk jadual

# arahan SQL mencari data homestay 
$arahan_sql_cari="select* from homestay,jenis_rumah where homestay.id_jenis=jenis_rumah.id_jenis";
# melaksanakan arahan sql cari tersebut
$laksana_sql_cari= mysqli_query($condb,$arahan_sql_cari)
?>
<div class=" w3-card-4 w3-table w3-threequarter w3-container w3-margin w3-round-large w3-black " >
<!-- menyediakan header bagi jadual -->
<!-- selepas header akan diselitkan dengan borang untuk mendaftar homestay baru -->
<h4>Senarai Homestay Berdaftar</h4>
<table id='saiz' border='1'>
    <tr>
        <td>Bil</td>
        <td>no rumah</td>
        <td>Alamat</td>
        <td>Jenis Rumah</td>
        <td>Harga</td>
        <td>gambar</td>
        <td></td>
    </tr>
    <tr>
    <!-- menyediakan borang untuk mendaftar homestay baru -->
    <form action='' method='POST' enctype='multipart/form-data' >
        <td>#</td>
        <td><input type='text'      name='no_rumah' class='w3-round-large'></td>
        <td><input type='text'        name='alamat' class='w3-round-large'></td>
        <td>
        <!-- menghasilkan drop down yg dinamik (mengambil data dari jadual jenis_rumah) -->
        <select name='id_jenis' class=' w3-btn w3-round-xlarge w3-amber' required>
                <option disabled selected value>Pilih kategori</option>
                <?PHP
                
                # arahan mencari data dari jadual jenis_rumah 
                $arahan_sql_carijenis= "SELECT* from jenis_rumah";
                # melaksanakan arahan mencari tersebut
                $laksana_sql_carijenis=mysqli_query($condb,$arahan_sql_carijenis);
                # pembolehubah $rekod_model mengambil data baris demi bari 
                while($rekod_jenis=mysqli_fetch_array($laksana_sql_carijenis))
                {
                    # memaparkan nilai pemboleh ubah $rekod_jenis['jenis'] dalam bentuk dropdown list
                    echo"<option value='".$rekod_jenis['id_jenis']."'>
                    ".$rekod_jenis['jenis']."</option>";        
                }
                ?>
            </select>       
        </td>
        <td><input type='text'      name='harga' class='w3-round-large'></td>
        <td><input type='file'      name='gambar' class='w3-round-large'></td>
        <td><input type='submit'     value='simpan' class=' w3-btn w3-round-xlarge w3-amber'></td>
    </form>
    </tr>
    </div>
    <?PHP 

    $bil=0;
    # pemboleh ubah $rekod mengambail semua data yang ditemui oleh $laksana_sql_cari
    while ($rekod=mysqli_fetch_array($laksana_sql_cari))
    {
        # sistem akan memaparkan data $rekod baris demi baris sehingga habis
        echo "
        <tr>
            <td>".++$bil."</td>
            <td>".$rekod['no_rumah']."</td>
            <td>".$rekod['alamat']."</td>
            <td>".$rekod['jenis']."</td>
            <td>".$rekod['harga']."</td>
            <td><img src='../images/".$rekod['gambar']."' width='10%'></td>
            <td><a href='hapus.php?jadual=homestay&medan_kp=no_rumah&kp=".$rekod['no_rumah']."'
            onClick=\"return confirm('Anda pasti ingin padam data ini?')\" >Hapus</a></td>
        </tr>";
    }
    ?>
</table>