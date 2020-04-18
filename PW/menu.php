<?php
if(!defined('OFFDIRECT')) include 'error404.php';
?>
<div class="col-md-3 left_col">
	<div class="left_col scroll-view">
		<div class="navbar nav_title" style="border: 0;">
		  <a href="" class="site_title">
			<img src="<?php echo $baseURL; ?>assets/images/logo.png" alt="Logo"
			style="margin-left:-10px;width:73px;height:73px;"> <span>Inventory</span>
		  </a>
		</div>
		<div class="clearfix"></div>
		<br />
		<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
		  <div class="menu_section">
			<h3>General</h3>
			<ul class="nav side-menu">
			  <li><a href='<?php echo $baseURL; ?>main' title='Homepage'><i class="fa fa-home"></i> Home </a>
			  </li>
			  <li><a><i class="fa fa-cubes"></i> Tools <span class="fa fa-chevron-down"></span></a>
				<ul class="nav child_menu">
					<!-- sub menu ini akan dieksekusi file data.php pada folder object -->
				  <li><a href="<?php echo $baseURL; ?>petugas/data">Data Petugas</a></li>
				</ul>
			  <li><a><i class="fa fa-cubes"></i> Barang <span class="fa fa-chevron-down"></span></a>
				<ul class="nav child_menu">
					<!-- sub menu ini akan dieksekusi file data.php pada folder object -->
				  <li><a href="<?php echo $baseURL; ?>object/data">Data Barang</a></li>
				  <li><a href="<?php echo $baseURL; ?>Kategori/Kategori">Kategori</a></li>
				  <li><a href="<?php echo $baseURL; ?>suplier/datasup">Suplier</a></li>
				  <li><a href="<?php echo $baseURL; ?>profile/data">Profil</a></li>
				</ul>
			  </li>
			  <li><a><i class="fa fa-cubes"></i> Report <span class="fa fa-chevron-down"></span></a>
				<ul class="nav child_menu">
					<!-- sub menu ini akan dieksekusi file add.php pada folder procurement -->
				  <li><a href="<?php echo $baseURL; ?>report/officer">Data Barang</a></li>
				  <li><a href="<?php echo $baseURL; ?>report/placement_period">Placement Period</a></li>
				</ul>
			  </li>
			  <li><a><i class="fa fa-cubes"></i> Pengadaan <span class="fa fa-chevron-down"></span></a>
				<ul class="nav child_menu">
					<!-- sub menu ini akan dieksekusi file add.php pada folder procurement -->
				  <li><a href="<?php echo $baseURL; ?>procurement/data">Procurement</a></li>
				  <li><a href="<?php echo $baseURL; ?>procurement/penerimaan1">Penerimaan</a></li>
				</ul>
			  </li>
			</ul>
		  </div>
		</div>
	</div>
</div>
