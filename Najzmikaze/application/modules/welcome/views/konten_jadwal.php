<!DOCTYPE html>
<HTML lang="en">
	<HEAD>
		<meta charset="utf-8">
  		<meta name="description" content="">
  		<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
  		<meta name="title" content="Aplikasi Penjadwalan" />
  		<meta name="description" content="Diciptakan dengan sepenuh hati, untuk para pecinta kopi." />
  		<meta name="format-detection" content="telephone=yes">
  		<meta property="og:title" content="Aplikasi Penjadwalan"/>
  		<meta property="og:description" content="Diciptakan dengan sepenuh hati, untuk para pecinta kopi.">
  		<meta property="og:site_name" content="Aplikasi Penjadwalan"/>
  		<meta property="og:url" content="http://sislimalicu.al-azhar.or.id/">
  		<meta property="og:image" content="<?=base_url('/assets/img');?>/test_logo.png">
  		<meta name="viewport" content="width=device-width">
		<meta http-equiv="refresh" content="120">
		<TITLE><?=$jadwal_siapa;?></TITLE>		
		<link rel="icon" href="<?php echo base_url('/assets/img');?>/favicon.ico" type="image/x-icon" />
		<link rel="icon" href="<?php echo base_url('/assets/img');?>/favicon.ico" type="image/x-icon" />
		<link rel="stylesheet" href="<?=base_url('assets');?>/bower_components/bootstrap/dist/css/bootstrap.min.css">
		<script src="<?=base_url('assets');?>/bower_components/jquery/dist/jquery.min.js"></script>
		<script src="<?=base_url('assets');?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
		<style>
			body{
				font-size: 240%;
			}
			.fool{			
				margin: 0;
				border-bottom: 1px solid;
				//border-bottom-color:#333;
				border-bottom-color:#FFF;
				font-size: 24px;
			}
		</style>
	</HEAD>
	<BODY>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <ul class="nav navbar-nav text-center">
		<li style="text-align:center;"><br/><b style="font-size: 170%;"><span  id="Tanggal_Now"></span> | <span  id="jam"></span></b></li>
    </ul>
	<ul class="nav navbar-nav navbar-right">
		<li style="text-align:center;"><br/><b style="font-size: 120%;"><?=$jadwal_siapa;?></b></li>
	</ul>
  </div>
</nav>

<div class="container-fluid"> <!-- Start Container -->
    <!-- Fixed navbar -->
	<?php 
		$bg_thead = '#437891';
		$txt_thead = '#FFFFFF';
		
		$bg_senin = '#A97C50';
		$txt_senin = '#FFFFFF';
		
		$bg_selasa = '#A97C50';
		$txt_selasa = '#FFFFFF';
		
		$bg_rabu = '#A97C50';
		$txt_rabu = '#FFFFFF';
		
		$bg_kamis = '#A97C50';
		$txt_kamis = '#FFFFFF';
		
		$bg_jumat = '#A97C50';
		$txt_jumat = '#FFFFFF';
		
		$bg_sabtu = '#A97C50';
		$txt_sabtu = '#FFFFFF';
		
		$bg_minggu = '#FFFFFF';
		$txt_minggu = '#FFFFFF';
		
	?>
<table class="table table-striped">
	<thead>
		<tr style="background-color:<?=$bg_thead;?>; color:<?=$txt_thead;?>;">
			<th width="10%">Hari</th>
			<th width="20%">Tanggal</th>
			<th >Keterangan</th>
			<th width="15%" class="text-center">Tempat & Waktu</th>
		</tr>
	</thead>
	<tbody style="font-size: 140%;">
		
		<!-- SENIN -->
		<?php if (count($tb[0])  == 1){ ?> 
		<?php 
			foreach($tb[0] as $senin ){
		?>
		<tr>
			<td style="vertical-align: middle; background-color: <?=$bg_senin;?>; color: <?=$txt_senin;?>;" >Senin</td>
			<td style="vertical-align: middle; background-color: <?=$bg_senin;?>; color: <?=$txt_senin;?>;" ><?=date('d-m-Y',strtotime($senin->jadwal_tanggal));?><br/><?=$senin->member_nama;?></td>
			<td style="vertical-align: middle; background-color: <?=$bg_senin;?>; color: <?=$txt_senin;?>;" ><?=$senin->jadwal_kegiatan;?></h4></td>
			<td class="text-center" style="vertical-align: middle; background-color: <?=$bg_senin;?>; color: <?=$txt_senin;?>;" ><?=$senin->jadwal_tempat;?><br/><?=$senin->jadwal_waktu;?></td>
		</tr>
			<?php } ?>
			
		<?php }else{ ?>
		
		<tr>
			<td rowspan="<?=count($tb[0])+1;?>" style="vertical-align: middle; background-color: <?=$bg_senin;?>; color: <?=$txt_senin;?>;" >Senin</td>
		</tr>
		<?php 
			foreach($tb[0] as $senin ){
		?>
		<tr>
			<td style="vertical-align: middle; background-color: <?=$bg_senin;?>; color: <?=$txt_senin;?>;" ><?=date('d-m-Y',strtotime($senin->jadwal_tanggal));?><br/><?=$senin->member_nama;?></td>
			<td style="vertical-align: middle; background-color: <?=$bg_senin;?>; color: <?=$txt_senin;?>;" ><?=$senin->jadwal_kegiatan;?></td>
			<td class="text-center" style="vertical-align: middle; background-color: <?=$bg_senin;?>; color: <?=$txt_senin;?>;" ><?=$senin->jadwal_tempat;?><br/><?=$senin->jadwal_waktu;?></td>
		</tr>
			<?php } ?>
		
		<?php } ?>
		 <!-- End SENIN -->
		
		<!-- SELASA -->
		<?php if (count($tb[1])  == 1){ ?> 
		<?php 
			foreach($tb[1] as $selasa ){
		?>
		<tr>
			<td style="vertical-align: middle; background-color: <?=$bg_selasa;?>; color: <?=$txt_selasa;?>;" >Selasa</td>
			<td style="vertical-align: middle; background-color: <?=$bg_selasa;?>; color: <?=$txt_selasa;?>;" ><?=date('d-m-Y',strtotime($selasa->jadwal_tanggal));?><br/><?=$selasa->member_nama;?></td>
			<td style="vertical-align: middle; background-color: <?=$bg_selasa;?>; color: <?=$txt_selasa;?>;" ><?=$selasa->jadwal_kegiatan;?></td>
			<td class="text-center" style="vertical-align: middle; background-color: <?=$bg_selasa;?>; color: <?=$txt_selasa;?>;" ><?=$selasa->jadwal_tempat;?><br/><?=$selasa->jadwal_waktu;?></td>
		</tr>
			<?php } ?>
			
		<?php }else{ ?>
		
		<tr>
			<td rowspan="<?=count($tb[1])+1;?>" style="vertical-align: middle; background-color: <?=$bg_selasa;?>; color: <?=$txt_selasa;?>;" >Selasa</td>
		</tr>
		<?php 
			foreach($tb[1] as $selasa ){
		?>
		<tr>
			<td style="vertical-align: middle; background-color: <?=$bg_selasa;?>; color: <?=$txt_selasa;?>;" ><?=date('d-m-Y',strtotime($selasa->jadwal_tanggal));?><br/><?=$selasa->member_nama;?></td>
			<td style="vertical-align: middle; background-color: <?=$bg_selasa;?>; color: <?=$txt_selasa;?>;" ><?=$selasa->jadwal_kegiatan;?></td>
			<td class="text-center" style="vertical-align: middle; background-color: <?=$bg_selasa;?>; color: <?=$txt_selasa;?>;" ><?=$selasa->jadwal_tempat;?><br/><?=$selasa->jadwal_waktu;?></td>
		</tr>
			<?php } ?>
		
		<?php } ?>
		 <!-- End SELASA -->
		
		<!-- RABU -->
		<?php if (count($tb[2])  == 1){ ?> 
		<?php 
			foreach($tb[2] as $rabu ){
		?>
		<tr>
			<td style="vertical-align: middle; background-color: <?=$bg_rabu;?>; color: <?=$txt_rabu;?>;" >Rabu</td>
			<td style="vertical-align: middle; background-color: <?=$bg_rabu;?>; color: <?=$txt_rabu;?>;" ><?=date('d-m-Y',strtotime($rabu->jadwal_tanggal));?><br/><?=$rabu->member_nama;?></td>
			<td style="vertical-align: middle; background-color: <?=$bg_rabu;?>; color: <?=$txt_rabu;?>;" ><?=$rabu->jadwal_kegiatan;?></td>
			<td class="text-center" style="vertical-align: middle; background-color: <?=$bg_rabu;?>; color: <?=$txt_rabu;?>;" ><?=$rabu->jadwal_tempat;?><br/><?=$rabu->jadwal_waktu;?></td>
		</tr>
			<?php } ?>
			
		<?php }else{ ?>
		
		<tr>
			<td rowspan="<?=count($tb[2])+1;?>" style="vertical-align: middle; background-color: <?=$bg_rabu;?>; color: <?=$txt_rabu;?>;" >Rabu</td>
		</tr>
		<?php 
			foreach($tb[2] as $rabu ){
		?>
		<tr>
			<td style="vertical-align: middle; background-color: <?=$bg_rabu;?>; color: <?=$txt_rabu;?>;" ><?=date('d-m-Y',strtotime($rabu->jadwal_tanggal));?><br/><?=$rabu->member_nama;?></td>
			<td style="vertical-align: middle; background-color: <?=$bg_rabu;?>; color: <?=$txt_rabu;?>;" ><?=$rabu->jadwal_kegiatan;?></td>
			<td class="text-center" style="vertical-align: middle; background-color: <?=$bg_rabu;?>; color: <?=$txt_rabu;?>;" ><?=$rabu->jadwal_tempat;?><br/><?=$rabu->jadwal_waktu;?></td>
		</tr>
			<?php } ?>
		
		<?php } ?>
		 <!-- End RABU -->
		
		<!-- Kamis -->
		<?php if (count($tb[3])  == 1){ ?> 
		<?php 
			foreach($tb[3] as $kamis ){
		?>
		<tr>
			<td style="vertical-align: middle; background-color: #A97C50; color: #FFF;" >Kamis</td>
			<td style="vertical-align: middle; background-color: #A97C50; color: #FFF;" ><?=date('d-m-Y',strtotime($kamis->jadwal_tanggal));?><br/><?=$kamis->member_nama;?></td>
			<td style="vertical-align: middle; background-color: #A97C50; color: #FFF;" ><?=$kamis->jadwal_kegiatan;?></td>
			<td class="text-center" style="vertical-align: middle; background-color: #A97C50; color: #FFF;" ><?=$kamis->jadwal_tempat;?><br/><?=$kamis->jadwal_waktu;?></td>
		</tr>
			<?php } ?>
			
		<?php }else{ ?>
		
		<tr>
			<td rowspan="<?=count($tb[3])+1;?>" style="vertical-align: middle; background-color: #A97C50; color: #FFF;" >Kamis</td>
		</tr>
		<?php 
			foreach($tb[3] as $kamis ){
		?>
		<tr>
			<td style="vertical-align: middle; background-color: #A97C50; color: #FFF;" ><?=date('d-m-Y',strtotime($kamis->jadwal_tanggal));?><br/><?=$kamis->member_nama;?></td>
			<td style="vertical-align: middle; background-color: #A97C50; color: #FFF;" ><?=$kamis->jadwal_kegiatan;?></td>
			<td class="text-center" style="vertical-align: middle; background-color: #A97C50; color: #FFF;" ><?=$kamis->jadwal_tempat;?><br/><?=$kamis->jadwal_waktu;?></td>
		</tr>
			<?php } ?>
		
		<?php } ?>
		 <!-- End Kamis -->
		
		<!-- Jumat -->
		<?php if (count($tb[4])  == 1){ ?> 
		<?php 
			foreach($tb[4] as $jumat ){
		?>
		<tr>
			<td style="vertical-align: middle; background-color: #A97C50; color: #FFF;" >Jum'at</td>
			<td style="vertical-align: middle; background-color: #A97C50; color: #FFF;" ><?=date('d-m-Y',strtotime($jumat->jadwal_tanggal));?><br/><?=$jumat->member_nama;?></td>
			<td style="vertical-align: middle; background-color: #A97C50; color: #FFF;" ><?=$jumat->jadwal_kegiatan;?></td>
			<td class="text-center" style="vertical-align: middle; background-color: #A97C50; color: #FFF;" ><?=$jumat->jadwal_tempat;?><br/><?=$jumat->jadwal_waktu;?></td>
		</tr>
			<?php } ?>
			
		<?php }else{ ?>
		
		<tr>
			<td rowspan="<?=count($tb[4])+1;?>" style="vertical-align: middle; background-color: #A97C50; color: #FFF;" >Jum'at</td>
		</tr>
		<?php 
			foreach($tb[4] as $jumat ){
		?>
		<tr>
			<td style="vertical-align: middle; background-color: #A97C50; color: #FFF;" ><?=date('d-m-Y',strtotime($jumat->jadwal_tanggal));?><br/><?=$jumat->member_nama;?></td>
			<td style="vertical-align: middle; background-color: #A97C50; color: #FFF;" ><?=$jumat->jadwal_kegiatan;?></td>
			<td class="text-center" style="vertical-align: middle; background-color: #A97C50; color: #FFF;" ><?=$jumat->jadwal_tempat;?><br/><?=$jumat->jadwal_waktu;?></td>
		</tr>
			<?php } ?>
		
		<?php } ?>
		 <!-- End Jumat -->
		
		<!-- SABTU -->
		<?php if (count($tb[5])  == 1){ ?> 
		<?php 
			foreach($tb[5] as $sabtu ){
		?>
		<tr>
			<td style="vertical-align: middle; background-color: #A97C50; color: #FFF;" >Sabtu</td>
			<td style="vertical-align: middle; background-color: #A97C50; color: #FFF;" ><?=date('d-m-Y',strtotime($sabtu->jadwal_tanggal));?><br/><?=$sabtu->member_nama;?></td>
			<td style="vertical-align: middle; background-color: #A97C50; color: #FFF;" ><?=$sabtu->jadwal_kegiatan;?></td>
			<td class="text-center" style="vertical-align: middle; background-color: #A97C50; color: #FFF;" ><?=$sabtu->jadwal_tempat;?><br/><?=$sabtu->jadwal_waktu;?></td>
		</tr>
			<?php } ?>
			
		<?php }else{ ?>
		
		<tr>
			<td rowspan="<?=count($tb[5])+1;?>" style="vertical-align: middle; background-color: #A97C50; color: #FFF;" >Sabtu</td>
		</tr>
		<?php 
			foreach($tb[5] as $sabtu ){
		?>
		<tr>
			<td style="vertical-align: middle; background-color: #A97C50; color: #FFF;" ><?=date('d-m-Y',strtotime($sabtu->jadwal_tanggal));?><br/><?=$sabtu->member_nama;?></td>
			<td style="vertical-align: middle; background-color: #A97C50; color: #FFF;" ><?=$sabtu->jadwal_kegiatan;?></td>
			<td class="text-center" style="vertical-align: middle; background-color: #A97C50; color: #FFF;" ><?=$sabtu->jadwal_tempat;?><br/><?=$sabtu->jadwal_waktu;?></td>
		</tr>
			<?php } ?>
		
		<?php } ?>
		 <!-- End Sabtu -->
		 
		 <!-- Minggu -->
		<?php if (count($tb[6])  ==  1 ){ ?> 
		<?php 
			foreach($tb[6] as $minggu ){
		?>
		<tr>
			<td style="vertical-align: middle; background-color: #A97C50; color: #FFF;" >Ahad</td>
			<td style="vertical-align: middle; background-color: #A97C50; color: #FFF;" ><?=date('d-m-Y',strtotime($minggu->jadwal_tanggal));?><br/><?=$minggu->member_nama;?></td>
			<td style="vertical-align: middle; background-color: #A97C50; color: #FFF;" ><?=$minggu->jadwal_kegiatan;?></td>
			<td class="text-center" style="vertical-align: middle; background-color: #A97C50; color: #FFF;" ><?=$minggu->jadwal_tempat;?><br/><?=$minggu->jadwal_waktu;?></td>
		</tr>
			<?php } ?>
			
		<?php }else{ ?>
		
		<tr>
			<td rowspan="<?=count($tb[6])+1;?>" style="vertical-align: middle; background-color: #A97C50; color: #FFF;" >Ahad</td>
		</tr>
		<?php 
			foreach($tb[6] as $minggu ){
		?>
		<tr>
			<td style="vertical-align: middle; background-color: #A97C50; color: #FFF;" ><?=date('d-m-Y',strtotime($minggu->jadwal_tanggal));?><br/><?=$minggu->member_nama;?></td>
			<td style="vertical-align: middle; background-color: #A97C50; color: #FFF;" ><?=$minggu->jadwal_kegiatan;?></td>
			<td class="text-center" style="vertical-align: middle; background-color: #A97C50; color: #FFF;" ><?=$minggu->jadwal_tempat;?><br/><?=$minggu->jadwal_waktu;?></td>
		</tr>
			<?php } ?>
		
		<?php } ?>
		 <!-- End Minggu -->

	</tbody>
</table>
</div> <!-- End Container -->
		<script type="text/javascript">
		 window.onload = function() { jam(); }

		 function jam() {
			  var e = document.getElementById('jam'),
			  d = new Date(), h, m, s;
			  h = d.getHours();
			  m = set(d.getMinutes());
			  s = set(d.getSeconds());

			  e.innerHTML = h +':'+ m +':'+ s;

			  setTimeout('jam()', 1000);
		 }

		 function set(e) {
			e = e < 10 ? '0'+ e : e;
			return e;
		 }
	</script>
	
	<script type="text/javascript">
	$(document).ready(function(){
		function tanggal_rvs(){
			var hari = ['Ahad', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
			var bulan = ['Januari', 'Februari', 'Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
			
			var tanggal 	= new Date().getDate();
			var xhari 		= new Date().getDay();
			var xbulan 		= new Date().getMonth();
			var xtahun 		= new Date().getYear();
			
			var hari 		= hari[xhari];
			var bulan 		= bulan[xbulan];
			var tahun 		= (xtahun < 1000)?xtahun + 1900 : xtahun;
			
			var tanggal_jadi = hari +', ' + tanggal + ' ' + bulan + ' ' + tahun;
			return document.getElementById("Tanggal_Now").innerHTML = tanggal_jadi;
		}
		
		tanggal_rvs();
	});
	</script>
	</BODY>
</HTML>
