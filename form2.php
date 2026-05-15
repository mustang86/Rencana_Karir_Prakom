<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$joining_date = $_POST['tanggal'];
$timeToAdd = "+ 53 years";
//$objDateTime = DateTime::createFromFormat("Y-m-d",$joining_date);
$objDateTime = new DateTime($joining_date);
$objDateTime->modify($timeToAdd);
$retire_date = date('d-m-Y', strtotime($joining_date));
$sekarang = date('Y');
$sisa = $objDateTime->format("Y") - $sekarang;

echo "Tanggal Anda Masuk = $retire_date</br>";
print_r('Masa Aktif anda bekerja sampai = ');print_r($objDateTime->format("d-m-Y"));
echo "</br>";
echo "Sisa Masa Aktif anda = $sisa Tahun lagi</br>";
}
?>


<html>
<head>
 <title>Menghitung lama pensiun</title>
</head>
<body style="text-align: center;">
 <h1>Masukan Tanggal lahir anda disini</h1>
 
 <form target="_self" method="POST">
 <input type="text" name="tanggal" placeholder="Format YYYY-MM-DD"></br></br>
 <button type="submit" >submit</button>
 </form>
</body>
</html>