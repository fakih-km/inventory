<?php
session_start();
#konek ke web server lokal
$myHost = "localhost"; //nama server
$myUser = "root";// nama user data base
$myPass = "";//password yang digunakan
$myDbs	= "inventory";//nama database yang kita buat

//melakukan proses koneksi database
$koneksidb =mysqli_connect($myHost,$myUser,$myPass,$myDbs);

//include_once "inc.connection.php";
//include_once "inc.seslogin.php";
//include_once "inc.library.php";

$userLogin = $_SESSION['SES_LOGIN'];
$act	=$_POST['act'];
if($userLogin=='') exit(0);
if($act=='') exit(0);

if($act=='add') {
	$cbmBarang =$_POST['cmbBarang'];
	$txtJumlah =$_POST['txtJumlah'];
	$noTransaksi = $_POST['txtKodem'];
	if($cbmBarang=='') exit(0);
	if($txtJumlah=='') exit(0);

	$tmpSql = "INSERT INTO tmp_pengadaan (kd_barang, jumlah, kd_petugas, harga_beli,no_po)
			VALUES ('$cbmBarang','$txtJumlah','$userLogin',(SELECT harga FROM barang WHERE kd_barang='$cbmBarang'),'$noTransaksi')";

			mysqli_query($koneksidb, $tmpSql) or die(0);
			echo mysqli_insert_id($koneksidb);

} else if($act=='delete'){
	$id=$_POST['id'];
	if($id=='') exit(0);
	$tmpSql= "DELETE FROM tmp_pengadaan WHERE id='$id' AND kd_petugas='$userLogin'";
	mysli_query($koneksidb, $tmpSql) or die(0);
	echo(1);
}else {
	exit(0);
}
