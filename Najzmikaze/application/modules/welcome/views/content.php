	<section class="content-header">
		<h1>
			JADWAL
			<small>advanced jadwal</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Tables</a></li>
			<li class="active">Data tables</li>
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
				<div class="box">
					<div class="box-body table-responsive">
						<table class="table table-hover" id="mytable">
							<thead>
								<tr>
									<th width="4%">No.</th>
									<th>Nama</th>
									<th width="8%" >Hari</th>
									<th width="10%" >Tanggal</th>
									<th width="10%" >Waktu</th>
									<th>Kegiatan</th>
									<th>Lokasi</th>
									<th width="6%">Action</th>
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
        "url": "<?php echo site_url('welcome/data_json')?>",
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