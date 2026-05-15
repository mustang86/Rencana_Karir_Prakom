<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>dibuat tanggal 27-04-2021</title>
  </head>
  
  	

  
  <body>
    <h1>Aplikasi Proyeksi Awal Untuk Jenjang Karir Pranata Komputer Ahli</h1>
<form class="row g-3" target="_self" method="POST">
 <div class="col-auto">
INPUT NIP : &nbsp;
</div>
  <div class="col-auto">
    <label for="nip" class="visually-hidden"></label>
    <input name ="nip" type="text" class="form-control" id="nip" placeholder="value" value="198603182020121007">
  </div>
  <br>
   <div class="col-auto">
INPUT TAHUN KENAIKAN PANGKAT : &nbsp;
</div>
  <div class="col-auto">
    <label for="tahun_kp" class="visually-hidden"></label>
    <input name ="tahun_kp" type="text" class="form-control" id="tahun_kp" placeholder="value" value="4">
  </div>
   <div class="col-auto">
INPUT USIA PENSIUN : &nbsp;
</div>
  <div class="col-auto">
    <label for="usia_pensiun" class="visually-hidden"></label>
    <input name ="usia_pensiun" type="text" class="form-control" id="usia_pensiun" placeholder="value" value="58">
  </div>
  <div class="col-auto">
    <button type="submit" class="btn btn-primary mb-3">Submit</button>
  </div>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$nip=$_POST['nip'];
$usia_pensiun2=$_POST['usia_pensiun'];
$tahun_kp=$_POST['tahun_kp'];
$total_tahun_kp=$tahun_kp*8;

$jumlah_karakter_nip    =strlen($nip);

$tahun = substr($nip,0,4);
$bulan = substr($nip,4,2);
$tanggal = substr($nip,6,2);
$lahir= $tanggal."-".$bulan."-".$tahun;   

$tahun_tmt = substr($nip,8,4);
$bulan_tmt = substr($nip,12,2);
$tmt="01-".$bulan_tmt."-".$tahun_tmt;

$time_tmt = strtotime($tmt);
$lahir_time_tmt = date('Y-m-d',$time_tmt);

$time = strtotime($lahir);
$lahir_time = date('Y-m-d',$time);
$lahir_time2 = date('d-m-Y',$time);

$tgl_lahir = $lahir_time;
$tahun_pensiun = $usia_pensiun2;
$usia_pensiun = "+ ".$tahun_pensiun." years";
$timeToAdd = $usia_pensiun;
$tgl_pensiun = strtotime($tgl_lahir . $usia_pensiun); 


$objDateTime = new DateTime($lahir_time_tmt);

$retire_date = date('d-m-Y', strtotime($tmt));
$tgl_pns= date('Y', strtotime($tmt));
$usia_sekarang = hitung_umur2($lahir_time);
$sisa = $tahun_pensiun- $usia_sekarang;
$sisa_pensiun = "+ ".$sisa." years";
$objDateTime->modify($sisa_pensiun);
  
	if (isset($nip)) {
		
	 // echo "Variable 'a' is set.<br>";
	 echo "NIP : ".$nip."<br>";
	 //echo "Jumlah karakter/digit NIP : $jumlah_karakter_nip"."<br>";
	 echo "Tanggal Lahir : ".$lahir_time2."<br>";
	 echo "Tanggal Pensiun : ".date ('d-m-Y', $tgl_pensiun)."<br>";
	 echo "Usia Pensiun Minimal : ".$tahun_pensiun ."<br>";
	 echo "Tanggal Tmt : ".$tmt."<br>";
	 echo "Usia Sekarang: ".hitung_umur($lahir_time)."<br>";
	 
	 echo "Tanggal Anda Masuk (Tmt) : $retire_date</br>";
	 print_r('Masa Aktif Anda Bekerja Sampai : ');print_r($objDateTime->format("d-m-Y"));
	 echo "</br>";
	 echo "Sisa Masa Aktif Anda : $sisa tahun </br>";
	 echo "</br>";
	 
	 echo "Jumlah Masa Karir (*jika Kp / ".$tahun_kp."th) : ".$total_tahun_kp." tahun </br>";
	 echo "</br>";	 
	 echo "Tabel Perkiraan Karir <br>(*jika lancar mendapatkan kenaikan pangkat tiap ".$tahun_kp." tahun)</br>";
	 
	 $umur_sekarang=hitung_umur2($lahir_time);
	 include ("template.php");
	}
}


function hitung_umur($tanggal_lahir){
	$birthDate = new DateTime($tanggal_lahir);
	$today = new DateTime("today");
	if ($birthDate > $today) { 
	    exit("0 tahun 0 bulan 0 hari");
	}
	$y = $today->diff($birthDate)->y;
	$m = $today->diff($birthDate)->m;
	$d = $today->diff($birthDate)->d;
	return $y." tahun ".$m." bulan ".$d." hari";
}

function hitung_umur2($tanggal_lahir){
	$birthDate = new DateTime($tanggal_lahir);
	$today = new DateTime("today");
	if ($birthDate > $today) { 
	    exit("0 tahun 0 bulan 0 hari");
	}
	$y = $today->diff($birthDate)->y;

	return $y;
}
?>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>