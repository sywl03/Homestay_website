<!--Memanggil fail header-->
<?PHP 
include('header.php'); 
include('background.php');
$hari_ini=date("Y-m-d"); 
$esok=date('Y-m-d', strtotime(' +1 day'));
?>

<!--Menyediakan form bagi pengguna untuk mencari kekosongan homestay-->

<div class="w3-row w3-card-4 w3-third w3-container w3-margin w3-cell w3-black " >
<h4>Carian Homestay</h4>
<p>Masukan Tarikh masuk dan tarikh keluar</p>
<form action='tempahan_senarai.php' method='POST'>
<label>tarikh masuk</label> 
<input class="w3-input w3-border" type='date' name='tarikh_masuk' value='<?PHP echo $hari_ini ?>' min='<?PHP echo $hari_ini ?>'>
<br>
<label>tarikh keluar</label> 
<input class="w3-input w3-border" type='date' name='tarikh_keluar' value='<?PHP echo $esok ?>' min='<?PHP echo $esok ?>'>
<br>
<input type='submit' value='Cari' class='w3-margin w3-btn w3-round-xlarge w3-amber'     >
</form>  

</div>
<div class="w3-card w3-black w3-margin w3-row w3-container w3-third">
<?PHP include('slideshow.php'); ?>
</div>

<!-- iklan -->
<div class="w3-row w3-table w3-container w3-margin w3-black">
<div>
<img src='images/promosi/a1.jpg' class="w3-images w3-margin-top w3-quarter w3-container">
</div>
<div>
<img src='images/promosi/a2.jpg' class="w3-images w3-margin-top w3-quarter w3-container">
</div>
<div>
<img src='images/promosi/a3.jpg' class="w3-images w3-margin-top w3-quarter w3-container">
</div>
<div>
<img src='images/promosi/a4.jpg' class="w3-images w3-margin-top w3-quarter w3-container">
</div>
<div class="w3-row">
  <div class="w3-quarter w3-container ">
    <h2>FULL MEMBERSHIP</h2>
  </div>
  <div class="w3-quarter w3-container">
    <h2>2 YEAR DISCOUNT</h2>
  </div>
  <div class="w3-quarter w3-container">
    <h2>LIMITED ONLY</h2>
  </div>
  <div class="w3-quarter w3-container">
    <h2>PROFILE SAFETY #1</h2>
  </div>
</div>
</div>

<?PHP include('footer.php'); ?>