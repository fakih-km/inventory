<?php 
/*menerima hasil parsing file login.php, dan dilakukan eksekusi ketika tombol Log in dipilih 
	dan diberi nama btnLogin */
if(isset($_POST['btnLogin'])){
	$txtUser 		= $_POST['txtUser'];
	$txtUser 		= str_replace("'","&acute;",$txtUser); // menghalangi penulisan tanda petik satu (')
	$txtPassword	= $_POST['txtPassword'];
	$txtPassword	= str_replace("'","&acute;",$txtPassword); // menghalangi penulisan tanda petik satu (')
	
	/*mencari database dari table petugas dengan username dan password hasil entry login */	
	$mySql = "SELECT * FROM petugas WHERE username='$txtUser' AND password=md5($txtPassword)";
	$myQry = mysqli_query( $koneksidb, $mySql);
	$myData= mysqli_fetch_array($myQry);
	
	/* jika data yang dicari ditemukan */
	if(mysqli_num_rows($myQry) >=1) {
		$_SESSION['SES_LOGIN'] = $myData['kd_petugas']; // proses simpan session untuk kode petugas
		$_SESSION['SES_USER'] = $myData['username']; // proses simpan session untuk username
		$_SESSION['SES_NAME'] = $myData['nm_petugas']; // proses simpan session untuk nama petugas
		
		/* digunakan untuk pemberian level akses pada masing-masing tingkatan Admin, Petugas, Pengguna */
		if($myData['level']=="Admin") {
			$_SESSION['SES_ADMIN'] = "Admin";
		}
		
		if($myData['level']=="Petugas") {
			$_SESSION['SES_PETUGAS'] = "Petugas";
		}
		
		if($myData['level']=="User") {
			$_SESSION['SES_PENGGUNA'] = "Pengguna";
		}
		
		/* dikembalikan pada page "main" */
		echo "<meta http-equiv='refresh' content='0; url=main'>";
	}
	else {
		/* jika data yg dimasukkan tidak ditemukan */
		 $errormsg = "Invalid Username or Password.";
		 include "login.php";
	}
} 
?>
 
