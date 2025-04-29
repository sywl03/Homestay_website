<!-- Memanggil fail header_admin.php-->
<?PHP include('header_admin.php'); 
include('background_admin.php');
?>
<!-- form untuk upload fail data-->
<div class="w3-row w3-card-4 w3-table w3-third w3-container w3-margin w3-black w3-round-xxlarge">
<form  action='' method='POST' enctype='multipart/form-data'>
<h4>Sila Pilih Fail txt yang ingin diupload</h4>
    <input type='file' name='data_admin' >
    <button  type='submit' name='btn-upload' class='w3-margin w3-btn w3-round-xlarge w3-amber'>Muat Naik</button>
</form>
</div>       
<?PHP 
if (isset($_POST['btn-upload']))
{
    # memanggil fail connection.php dari folder luaran
     include ('../connection.php');

    # mengambil nama sementara fail
    $namafailsementara=$_FILES["data_admin"]["tmp_name"];

    # mengambil nama fail
    $namafail=$_FILES['data_admin']['name'];

    # mengambil jenis fail
    $jenisfail=pathinfo($namafail,PATHINFO_EXTENSION); 

    # menguji jenis fail dan saiz fail
    if($_FILES["data_admin"]["size"]>0 AND $jenisfail=="txt")
    {
        # membuka fail yang diambil
        $fail_data =fopen($namafailsementara,"r");

        # mendapatkan data dari fail baris demi baris
        while (!feof($fail_data)) 
        {   
            # mengambil data sebaris sahaja bg setiap pusingan
            $ambilbarisdata = fgets($fail_data);
    
            #memecahkan baris data mengikut tanda pipe
            $pecahkanbaris = explode("|",$ambilbarisdata);

            # selepas pecahan tadi akan diumpukan kepada 3
            list($nokp_admin,$nama_admin,$katalaluan_admin) = $pecahkanbaris;
            
            # arahan SQl untuk menyimpan data
            $arahan_sql_simpan="insert into  
            (nokp_admin,nama_admin,katalaluan_admin) values
            ('$nokp_admin','$nama_admin','$katalaluan_admin')";            
            
            # memasukkan data kedalam jadual admin
            $laksana_arahan_simpan=mysqli_query($condb,$arahan_sql_simpan);      
            echo"<script>alert('import fail Data Selesai.');
            window.location.href='maklumat_admin.php';</script>";            
        }                  
    fclose($fail_data);
    }
    else  {
        echo"<script>alert('hanya fail berformat txt sahaja dibenarkan');</script>";
    }
}
?> 
