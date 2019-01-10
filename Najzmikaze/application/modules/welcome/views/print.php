<?php  if ( ! defined('__NAJZMI_PUDINTEA__')) exit('No direct script access allowed'); ?>
<!DOCTYPE HTML>
<html lang="id">
	<head>
	<title>Print <?=$jadwal_siapa;?></title>
	<meta charset="utf-8">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
	<meta name="title" content="Aplikasi Lembur, absen sekali, atau tidak absen, dinas keluar kota, ataupun cuti" />
	<meta name="description" content="Diciptakan dengan sepenuh hati, untuk para pecinta kopi." />
	<meta name="format-detection" content="telephone=yes">
	<meta property="og:title" content="Aplikasi Lembur, absen sekali, atau tidak absen, dinas keluar kota, ataupun cuti"/>
	<meta property="og:description" content="Diciptakan dengan sepenuh hati, untuk para pecinta kopi.">
	<meta property="og:site_name" content="Lembur Al Azhar"/>
	<meta property="og:url" content="http://sislimalicu.al-azhar.or.id/">
	<meta property="og:image" content="http://sislimalicu.al-azhar.or.id/assets/img/Logo-YPIA-250px-hitam.png">
	<meta name="viewport" content="width=device-width">
	</head>
	<!-- 
	<body> 
	<body onload="window.print();" > 
	-->
	<body onload="window.print();" > 
<!-- sini -->
		<div style="
			background-size: contain;
			font-family: Times New Roman, Times, serif;
			position: relative;
			width: 790px;
			margin: auto;
			"
			
			>

			<table width="790" cellspacing="0" cellpadding="0" class="container" style="width: 790px; padding: 20px;" >
				<tr>
					<td >
						<table width="100%" cellspacing="0" cellpadding="0" style="width: 100%; border-collapse: collapse; border-bottom: 1px solid #00CA79;">
							<tbody>
								<tr >
									<td style="padding-bottom: 5px;">
										<table class="" width="100%">
											<thead>
												<tr>
													<td width="18%" class="" style="text-align: center;">
														<img src="<?=base_url('assets/img/logo-hitam-100px.png');?>" class="img-responsive" alt="Logo" width="110px" height="110px" />
													</td>
													<td class="text-center" style="font-family: Arial, Helvetica, sans-serif;">
														<p style="font-size: 20px; font-weight: 600; text-align: center;" ><?=$jadwal_siapa;?></p>
														<p style="font-size: 20px; font-weight: 600; text-align: center;" ><?=$ypia;?></p>
														<p style="font-size: 18px; font-weight: 400; text-align: center;" >Dari tanggal <?=tgl_indo($dari_tgl);?>  s/d  <?=tgl_indo($sampai_tgl);?></p>
													</td>
												</tr>
											</thead>
										</table>
									</td>
								</tr>
							</tbody>
						</table>					
						<table style="width: 100%; text-align: center; padding: 20px 0;" width="100%" cellspacing="0" cellpadding="0" >
							<tbody>
								<tr>
									<td  valign="top" style=" vertical-align: top; padding-left: 3px; ">
										<table width="100%" cellspacing="0" cellpadding="0" style="width: 100%;" >
											<thead>
												<tr  style="font-size: 18px;">
													<th width="3%"  style="width: 3%; padding-left: 5px ; border-bottom: 1px solid #000000;">No</th>
													<th width="10%" style="width: 10%; text-align:center;  padding-left: 5px ; border-bottom: 1px solid #000000;">Hari</th>
													<th width="12%" style=" width: 12%; text-align:center; padding-left: 5px ; border-bottom: 1px solid #000000;">Tanggal</th>
													<th width="20%" style="width: 20%; text-align:center; border-bottom: 1px solid #000000;">Tempat</th>
													<th width="15%" style="width: 15%; text-align:center; border-bottom: 1px solid #000000;">Waktu</th>
													<th style="text-align:center; border-bottom: 1px solid #000000;">Kegiatan</th>
												</tr>
											</thead>
											<tbody>
												<?php 
													if (empty($data_diprint)){
												?>
												<tr>
													<td style="padding: 5px 5px 5px 5px; text-align:center; border-bottom: 1px solid #000000;" colspan="6" >Tidak ada jadwal</td>
												</tr>
												<?php }else{
													$no = 0;
													foreach ($data_diprint as $ddp) {
													$no++;
													$hari = array('','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Ahad');
												?>
												<tr>
													<td style="text-align:center; border-bottom: 1px solid #000000; padding: 5px 5px 5px 5px;" ><?=$no;?></td>
													<td style="text-align:center; border-bottom: 1px solid #000000; padding: 0px 0px 0px 0px;" ><?=$hari[$ddp->jadwal_kode_hari];?></td>
													<td style="text-align:center; border-bottom: 1px solid #000000; padding: 5px 5px 5px 5px;" ><?=date('d-m-Y',strtotime($ddp->jadwal_tanggal)); ?></td>
													<td style="text-align:center; border-bottom: 1px solid #000000; padding: 5px 5px 5px 5px;" ><?=$ddp->jadwal_tempat;?></td>
													<td style="text-align:center; border-bottom: 1px solid #000000; padding: 5px 5px 5px 5px;" ><?=$ddp->jadwal_waktu;?></td>
													<td style="text-align:left; border-bottom: 1px solid #000000; padding: 5px 5px 5px 5px;" ><?=$ddp->jadwal_kegiatan;?></td>
												</tr>
												<?php } } ?>
											</tbody>
										</table>
									</td>
								</tr>
							</tbody>
						</table>
												
												<!-- ---------------------------------------------------TTD By NAJZMITEA --------------------------------- -->
												
						<br/><br/><br/><br/>
						<table width="100%" cellspacing="0" cellpadding="0" style="width: 100%;">
							<tbody>
								<tr>
									<td  valign="top" style=" vertical-align: top; ">
										<table width="100%" cellspacing="0" cellpadding="0" style="width: 100%;">
											<tbody>
												<tr>
													<td width="25%" style=" width: 25%;padding-left: 5px ; text-align:center;"></td>
													<td style="padding-left: 5px ;"></td>
													<td width="35%" style="width: 35%;padding-left: 5px ; text-align:center;">Kepala Sekretariat YPIA</td>
												</tr>
												<tr>
													<td style="padding-left: 5px ;" height="95px"></td>
													<td style="padding-left: 5px ;" height="95px"></td>
													<td style="padding-left: 10px ; text-align:center; vertical-align:middle; background: url(<?=base_url('assets/img/ttd1.png');?>) no-repeat center; background-size: 260px 95px;" ></td>
												</tr>
												<tr>
													<td style="padding-left: 5px ; text-align:center;"></td>
													<td style="padding-left: 5px ;"></td>
													<td style="padding-left: 5px ; text-align:center;">Drs. H. Ono Ruhiana, M.Pd.</td>
													</tr>
											</tbody>
										</table>
									</td>
								</tr>
							</tbody>
						</table>
						
					<!-- ----------------------------------------------------END TTD By NAJZMITEA --------------------------------- -->
					</td>
				</tr>
			</table>
		</div> <!-- End  najzmitea[et]gmail.com  -->
	</body>
</html>