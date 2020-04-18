<?php if (!defined('OFFDIRECT')) include '../error404.php';?>
<body class="nav-md">
<div class="container body">
<div class="main_container">
		
<?php
include_once "library/inc.seslogin.php";
include_once "library/inc.library.php";
include "menu.php";
include "base_template_topnav.php";
?>
<!--HEADER TITLE BERMASALAH OTHERS -->
<link href="<?php echo $baseURL;?>assets/others/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="<?php echo $baseURL;?>assets/others/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
<!-- PRINTING-->
<link href="<?php echo $baseURL; ?>assets/css/printing.css" rel="stylesheet">
	<div class="right_col" role="main" id="section-to-print">
	<div class="">
	<div class="page-title section-not-to-print">
	<div class="title_left">
		<h3>General<small>Barang</small></h3>
	</div>
	</div>
	<div class="clearfix"></div>
	<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
	<div class="x_title">
		<h2>Data Barang<small></small></h2>
		<div class="clearfix"></div>
	</div>
	<div class="x_content">
<!-- BATAS HEADER TITLE-->
<!-- DIGUNAKAN UNTUK PROSES PENCARIAN BERDASARKAN KATEGORI (DISESUAIKAN DENGAN PENCARIAN) -->
<?php 
#deklarasi tanggal
$filterSQL = "";
$tglAwal = "01-".date('m-Y');
$tglAkhir = date('d-m-Y');

#SET TANGGAL SEKARANG
$tglAwal = isset($_POST['txtTanggalAwal']) ? $_POST['txtTanggalAwal'] : $tglAwal;
$tglAkhir = isset($_POST['txtTanggalAkhir']) ? $_POST['txtTanggalAkhir'] : $tglAkhir; 

if(isset($_REQUEST['txtTanggal'])){
list($tglAwal,$tglAkhir) = explode(' s/d ', trim($_REQUEST['txtTanggal']));
}
//jika filter tombol tanggal tampil diklik
$filterSQL = "WHERE (DATE_FORMAT(`timestamp`, '%d-%m-%Y') BETWEEN '".($tglAwal)."' AND '".($tglAkhir)."')";
	?>

<form action ="" method ="post" name="form1" class="form-horizontal form-label-left" id="section-not-to-print">
	<div class="form-group">	
		<label class="control-label col-md-3 col-sm-3 col-xs-12" for="aaa">Periode</label>
		<div class="col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<div class="controls">
					<div class="input-prepend input-group">
						<span class="add-on input-group-addon">
							<!-- SALAH fa-calender harusnya fa-calendar -->
							 <i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
							 
							<input type="text" name="txtTanggal" id="txtTanggal" class="form-control" value="" />
						</div>
					</div>
				</div>
			</div>
			<input name="btnTampil" class="btn btn-succes" type="submit" value="submit"/>
		</div>
	</form>

	<div id="only-on-print">
		<h4>Periode: <?php echo "$tglAwal s/d $tglAkhir" ;?></h4>
	</div>

<!--BATAS DIGUNAKAN UNTUK PROSES PENCARIAN
	BERDASARKAN KATEGORI (DISESUAIKAN DENGAN PENCARIAN) -->
	
<!-- FORM PENCARIAN BERDASARKAN KATEGORI-->
<!-- BATAS FORM PENCARIAN BERDASARKAN KATEGORI -->
<div class="ln_solid"></div>
<!--DATAGRID BERDASARKAN DATA YANG AKAN KITA TAMPILKAN-->
<table id="datatable" class="table table-striped table-bordered">
	<thead>
		<tr>
			<th width="40" align="center"><strong>No <i class="glyphicon glyphicon-sort"></i></strong></th>
			<th width="51"><strong>Kode <i class="glyphicon glyphicon-sort"></i></strong></th>
			<th width="417" align="center"><strong>Nama Barang <i class="glyphicon glyphicon-sort"></i></strong></th>
			<th width="132" align="center">Merek <i class="fa fa-long-arrow-down"></i><i class="fa fa-long-arrow-up"></i></th>
			<th width="70" align="center"><strong>Jumlah <i class="glyphicon glyphicon-sort"></i></strong></th>
			
		</tr>
	</thead>
	
	<?php
	/* PENCARIAN BERDASARKA DATA DI TABEL*/
	
	$mySql ="SELECT * FROM barang $filterSQL ORDER BY timestamp DESC, kd_barang DESC";
	$myQry = mysqli_query($koneksidb, $mySql);
	$nomor = $hal;
	//PERULANGAN DATA
	while ($myData = mysqli_fetch_array($myQry)) {
		$nomor++;
		$Kode = $myData ['kd_barang'];
		?>
		
	<!--MENAMPILKAN HASIL PENCARIAN DATABASE-->
	<tr>
		<td align="center"><?php echo $nomor;?></td>
		<td><?php echo $myData['kd_barang']?></td>
		<td><?php echo $myData['nm_barang']?></td>
		<td><?php echo $myData['merek']?></td>
		<td align="center"><?php echo $myData['jumlah'];?></td>

		
				
	</tr>              
<?php }?>
<!--BATAS PERULANGAN DATA-->
</table>

<!--button print dan excel-->
<div id="section-not-to-print">
	<form action="<?php echo $baseURL;?>report_xls/officer" method="post" name="form2">
			<input type="hidden" name="tglAwal" value="<?php echo $tglAwal; ?>" />
			<input type="hidden" name="tglAkhir" value="<?php echo $tglAkhir; ?>" />
		<button type="button" class="btn btn-succes goPrint">Print</button>
		<button type="submit" class="btn btn-primary">Excel</button>
	</form>
</div>

<!--BATAS DATAGRID BERDASARKA DATA YANG AKAN KITA TAMPILKAN-->
</div>
</div>
</div>
</div>
</div>
</div>

<?php include "base_template_footer.php";?>
</div>
</div>


<!--Datatables PEMBENTUKAN TABLE BERDASARKAN DATABASE-->
<script src="<?php echo $baseURL;?>assets/others/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo $baseURL;?>assets/others/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!--<script src="<?php echo $baseURL;?>assets/others/dataTables.net-buttons/js/dataTables.bootstrap.buttons.min.js"></script>
DATA RANGEPICKER-->
<script src="<?php echo $baseURL;?>assets/js/moment/moment.min.js"></script>

<script type="text/javascript" src="<?php echo $baseURL;?>assets/others/bootstrap-daterangepicker/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $baseURL;?>assets/others/bootstrap-daterangepicker/daterangepicker.css"/>




<!-- Datatables-->
<script>
	pagename='report/officer';
     $(document).ready(function() {    
    		$('#datatable').DataTable({
					 "columnDefs": [
							{ "orderable": false, "targets": 4 }
			 		 ],    		
					 aLengthMenu: [
									[10, 25, 50, 100, -1],					 				
									[10, 25, 50, 100, "All"]
							]    		
    		});
    		
    		$('.goPrint').click(function(){
					window.print();
				});
				
				$('#txtTanggal').daterangepicker({
						"autoApply": true,
						startDate: '<?php echo $tglAwal; ?>',
    				endDate: '<?php echo $tglAkhir; ?>',
						locale: {
							format: 'DD-MM-YYYY',
							separator: " s/d ",
						},    
				}, function(start, end, label) {
					console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
				});
        
    	});
</script>
</body>