	<section class="content-header">
		<h1>
			CETAK JADWAL
			<small>advanced cetak jadwal</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Jadwal</a></li>
			<li class="active">Cetak Jadwal</li>
		</ol>
    </section>
    

    <!-- Main content -->
    <section class="content">
		<div class="row">
			<div class="col-xs-12">
				<?php
				  if ($this->session->flashdata('success')) {
					echo '<div class="alert alert-dismissable alert-success">'
					  .'  <button type="button" class="close" data-dismiss="alert">×</button>'
					  .   $this->session->flashdata('success')
					  .'</div>';
				  }
				  if ($this->session->flashdata('error')) {
					echo '<div class="alert alert-dismissable alert-danger">'
					  .'  <button type="button" class="close" data-dismiss="alert">×</button>'
					  .   $this->session->flashdata('error')
					  .'</div>';
				  }
				?>
				<div class="row">
					<div class="col-md-12">
						<form action="<?=base_url('welcome/cetak');?>" class="" id="FormMaterial" id="SearchNajzmi" onsubmit="return searchForm()" target="_blank" enctype="multipart/form-data" method="post" accept-charset="utf-8">
							<div class="col-sm-2">
									<div class="input-group">
										<span class="input-group-addon">Dari Tgl</span>
										<input class="form-control" name="dari_tgl" id="dari_tgl" type="text" placeholder="Dari Tanggal" value="<?=date('d-m-Y');?>" autocomplete="off" />
									</div>
							</div>
							<div class="col-sm-2">
								<div class="input-group">
									<span class="input-group-addon">Sampai Tgl</span>
									<input class="form-control" name="sampai_tgl" id="sampai_tgl" type="text" placeholder="Sampai Tanggal" value="<?=date('d-m-Y');?>" autocomplete="off" />
								</div>
							</div>
							<div class="col-sm-1">
								<div class="form-group">
									<button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-print">&nbsp;</i>Cetak</button>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="box">
					<div class="box-body table-responsive">
						<table class="table table-hover" id="mytable">
							<thead>
								<tr>
									<th width="4%" >No.</th>
									<th>Nama</th>
									<th width="8%" >Hari</th>
									<th width="10%" >Tanggal</th>
									<th width="10%" >Waktu</th>
									<th>Kegiatan</th>
									<th>Lokasi</th>
								</tr>
							</thead>
							<tbody>
						
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
    </section>
	
<script type="text/javascript">
    
/* Datatables */

    var humas_it = $("#mytable").DataTable({
    "order"       : [], //Initial no order.
      "ordering"    : true,
      "info"      : true,
      "scrollX"     : false,
      "searching"   : true,
    "bLengthChange"   : true,
      "processing"    : true,
      "serverSide"    : true,
    "Filter"          : true,
      "Sort"            : true,
    "AutoWidth"       : false,
      "paging"          : true,
    "serverSide"    : true,
      "Sorting"         : [],
      "ajax"      : {
        "url": "<?php echo site_url('welcome/json_print')?>",
        "type":'POST',
      },
    "oLanguage"        : {
            "sProcessing":   "Sedang memproses...",
      "sLengthMenu":   "Tampilkan _MENU_ entri data",
      "sZeroRecords":  "Tidak ditemukan data yang sesuai",
      "sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri data",
      "sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 entri",
      "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
      "sInfoPostFix":  "",
      "sSearch":       "Cari:",
      "sUrl":          "",
      "oPaginate": {
        "sFirst":    "Pertama",
        "sPrevious": "Sebelumnya",
        "sNext":     "Selanjutnya",
        "sLast":     "Terakhir"
      }
        },
    
    "columnDefs"  : [{
            "sClass": "text-center",
      "targets": [ 0, 6 ],
            "orderable": false
        }
    ],
  });
</script>

<script type="text/javascript">
  	$(function() {
    	$('#dari_tgl').datepicker({
			format: 'dd-mm-yyyy',
			todayBtn : true, 
			autoclose: true
			});
  	});
 </script>
 
<script type="text/javascript">
  	$(function() {
    	$('#sampai_tgl').datepicker({
			format: 'dd-mm-yyyy',
			todayBtn : true, 
			autoclose: true
			});
  	});
 </script>
