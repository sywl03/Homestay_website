
<?PHP
 
# Memanggil fail header_admin.php
include('header_admin.php');

# Memanggil fail background_admin.php
include('background_admin.php');
 
# Memanggil fail connection dari folder luaran
include('../connection.php');

# -----------------------------------------------------------------------------
# arahan SQL untuk mencari bilangan homestay
$arahan_sql_bilhomestay="select count(no_rumah) as bil_homestay from homestay";

# Laksanakan arahan mencari bilangan homestay yang ada yang pernah berdaftar
$laksana_sql_bilhomestay=mysqli_query($condb,$arahan_sql_bilhomestay);

# pembolehubah $rekod_bilhomestay mengambil data bilangan homestay yang pernah berdaftar
$rekod_bilhomestay=mysqli_fetch_array($laksana_sql_bilhomestay) ;

#------------------------------------------------------------------------------
# arahan SQL untuk mencari bilangan homestay yang telah kosong di hari ini
$arahan_sql_bilhomestaykosong="select count(no_rumah) as bil_homestaykosong from homestay,jenis_rumah
where 
homestay.no_rumah not in(select no_rumah from tempahan where 
tarikh_keluar >= '".date('Y-m-d')."')
and homestay.id_jenis=jenis_rumah.id_jenis";

# laksanakan arahan  mencari bilangan homestay yang telah kosong di hari ini
$laksana_sql_bilhomestaykosong=mysqli_query($condb,$arahan_sql_bilhomestaykosong);

# pembolehubah $rekod_bilhomestaykosong mengambil data bilangan homestay yang telah kosong di hari ini
$rekod_bilhomestaykosong=mysqli_fetch_array($laksana_sql_bilhomestaykosong);

# -----------------------------------------------------------------------------
# arahan SQL untuk mengira pendapatan bulanan
$arahan_sql_untung="select sum(jumlah_bayaran) as untung from tempahan
where tarikh_keluar LIKE '%".date('-m-')."%'";

# laksanakan arahan mengira jumlah bayaran yang telah dibuat
$laksana_sql_untung=mysqli_query($condb,$arahan_sql_untung);

# pemboleh ubah $rekod_untung mengambil data jumlah keuntungan
$rekod_untung=mysqli_fetch_array($laksana_sql_untung);

# -----------------------------------------------------------------------------
?>

<!-- memaparkan maklumat hasil carian di atas -->
<div class="w3-row w3-card-4 w3-third w3-container w3-margin w3-display-middle w3-round-xlarge w3-black" >
<h4>laman utama admin</h4>
<p><b>Bilangan homestay : </b> <?PHP echo $rekod_bilhomestay['bil_homestay']; ?> buah</p>
<p><b>Bilangan yang belum disewa hari ini: </b> <?PHP echo $rekod_bilhomestaykosong['bil_homestaykosong']; ?> buah</p>
<p><b>Jumlah keuntungan : </b>RM <?PHP echo $rekod_untung['untung']; ?></p>
</div>