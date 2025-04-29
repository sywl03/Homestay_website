<?PHP
# Memulakan fungsi session
session_start();

# Menyemak nama fail semasa
$namafail = basename($_SERVER['PHP_SELF']);
# Menguji adakah fail semasa bukan index.php dan pembolehubah session tidak mempunyai nilai
if($namafail !='index.php'and empty($_SESSION['nama_admin']))
{
    die("<script>alert('Sila daftar Masuk');
    window.location.href='../logout.php?id=admin'</script>");
}
?>
<!-- bahagian antaramuka mula -->
<!DOCTYPE html>
<html>
<title>Sistem Pendaftaran Homestay</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="style/w3.css">
<body>

<!-- --- Bahagian antaramuka mula --- -->

<!-- tajuk -->
<div class='w3-container w3-amber'>
    <h1>Sistem Tempahan Homestay</h1>
</div>

<!-- Fungsi resizeText - tujuan fungsi untuk membesarkan saiz tulisan menggunakan id='saiz' -->
<script>
function resizeText(multiplier) {
    var elem = document.getElementById("saiz");
    var currentSize = elem.style.fontSize || 1;
    if(multiplier==2)
    {
        elem.style.fontSize = "1em";
    } 
    else 
    {
    elem.style.fontSize = ( parseFloat(currentSize) + (multiplier * 0.2)) + "em";
    }
}
</script>

<div class="w3-bar w3-black">
<?PHP
# Jika pembolehubah session['nama_admin'] mempunyai nilai (not empty) bermaksud 
# admin telah login dan paparkan senarai menu utama
if(!empty($_SESSION['nama_admin'])) { ?>
        
            |<a href='laman_utama.php'class="w3-bar-item w3-button w3-mobile w3-black">MAIN PAGE</a> 
            <a href='maklumat_homestay.php'class="w3-bar-item w3-button w3-mobile w3-black">HOMESTAY</a> 
            <a href='maklumat_penyewa.php'class="w3-bar-item w3-button w3-mobile w3-black">TENANTS</a> 
            <a href='maklumat_tempahan.php'class="w3-bar-item w3-button w3-mobile w3-black">RESERVATION</a> 
            <a href='maklumat_admin.php'class="w3-bar-item w3-button w3-mobile w3-black">ADMIN PROFILE</a> 
            <a href='analisis.php'class="w3-bar-item w3-button w3-mobile w3-black">MONTHLY ANALYSIS</a> 
            <a href='upload.php'class="w3-bar-item w3-button w3-mobile w3-black">UPLOAD DATA</a> 
            <a href='../logout.php?id=admin'class="w3-bar-item w3-button w3-mobile w3-black">LOGOUT</a> 
            FONT SIZE |
            <input  name='reSize1' type='button' value='RESET' onclick="resizeText(2)" />
            <input  name='reSize' type='button' value='&nbsp;+&nbsp;' onclick="resizeText(1)" />
            <input  name='reSize2' type='button' value='&nbsp;-&nbsp;' onclick="resizeText(-1)" />
    
<?PHP } ?>
</div>

<hr>