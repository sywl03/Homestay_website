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

<!-- menu --> 
<div class="w3-bar w3-black">
  
  <a href="index.php" class="w3-bar-item w3-button w3-mobile w3-black">Home</a>
  <a href="#" class="w3-bar-item w3-button w3-mobile">Link 1</a>
  
  
  <div class="w3-dropdown-hover w3-mobile">
    <button class="w3-button">Dropdown <i class="fa fa-caret-down"></i></button>
    <div class="w3-dropdown-content w3-bar-block w3-dark-grey">
      <a href="penyewa_daftar.php" class="w3-bar-item w3-button w3-mobile">Daftar Pengguna Baru</a>
      <a href="penyewa_login.php" class="w3-bar-item w3-button w3-mobile">Daftar Masuk</a>
      <a href="#" class="w3-bar-item w3-button w3-mobile">Link 3</a>
    </div>
  </div>

  <a href="logout.php" class="w3-bar-item w3-button w3-mobile">logout</a>

</div>

<!-- isikandungan -->
<div class='w3-container w3-amber'>
    <h1>Isi Kandungan</h1>
</div>

<!-- iklan -->

<?php include ('slideshow.php') ?>
<div class="w3-row ">
<div>
<img src='images/promosi/a1.jpg' class="w3-images w3-quarter w3-container">
</div>
<div>
<img src='images/promosi/a2.jpg' class="w3-images w3-quarter w3-container">
</div>
<div class="w3-row">
  <div class="w3-third w3-container ">
    <h2>Sewa lah homestay kami</h2>
  </div>
  <div class="w3-third w3-container">
    <h2>Dasar murah sekali</h2>
  </div>
  <div class="w3-third w3-container">
    <h2>Sewa sekali comfirm nk lagi</h2>
  </div>
</div>







<!-- --- Bahagian antaramuka tamat -- -->

</body>
</html> 

