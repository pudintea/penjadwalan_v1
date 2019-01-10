    <!-- Fixed navbar -->
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li class="active"><img  src="<?=base_url('img');?>/test_logo.png" width="50"/></li>
	<li><a href="<?=base_url();?>index.php/welcome/jadwal" target="_blank"><span class="glyphicon glyphicon-dashboard">&nbsp;</span>Kehalaman Jadwal</a></li>
    </ul>
	<ul class="nav navbar-nav navbar-right">
		<li ><a href="<?=base_url();?>welcome/form" class="btn btn-primary">
			<span class="glyphicon glyphicon-calendar"></span>&nbsp;Tambah Jadwal</a></li>
	</ul>
  </div>
</nav>

<div class="container-fluid">
	<div class="page-header"></div>
	<table class="table">
		<thead>
			<tr class="success">
				<th>No.</th>
				<th>Hari</th>
				<th>Tanggal</th>
				<th>Waktu</th>
				<th>Kegiatan</th>
				<th>Lokasi</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$hari = array('','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Ahad');
				$i = 1;
				foreach($tb as $row){
					
			?>
				<tr>
					<td><?=$i++;?></td>
					<td><?=$hari[$row->kode_hari];?></td>
					<td><?=date('d-m-Y',strtotime($row->tanggal));?></td>
					<td><?=$row->waktu;?></td>
					<td><?=$row->kegiatan;?></td>
					<td><?=$row->tempat;?></td>
					<td>
						<a href="<?=base_url();?>welcome/hapus?id=<?=$row->id;?>">
						<span class="glyphicon glyphicon-trash"></span></a>
						|<a href="<?=base_url();?>welcome/edit?id=<?=$row->id;?>">
						<span class="glyphicon glyphicon-edit"></span></a>
					</td>
				</tr>
			<?php
				}
			?>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="7"><?=$pagination;?>&nbsp;Total Record&nbsp;<?=$total_record;?></td>
			</tr>
		</tfoot>
	</table>
</div>