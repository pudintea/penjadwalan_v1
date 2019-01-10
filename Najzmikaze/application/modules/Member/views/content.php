<div class="container">

  <div class="content">

    <div class="content-container">

      

      <div class="content-header">
        <h2 class="content-header-title">APLIKASI LEMBUR HUMAS DAN IT AL AZHAR </h2>
        <ol class="breadcrumb">
          <li><i>Diciptakan dengan sepenuh hati, untuk para pencinta kopi. - Kopi Hitam</i></li>
        </ol>
      </div> <!-- /.content-header -->
		<div class="row">

			<div class="col-md-12">
			<div class="alert alert-success"><b>Perhatian:</b>
				<ul>
				<li>Data Cuti, Izin, Sakit hanya bisa di print oleh pak ( Isya Samsudin selaku admin Print ).</li>
				<li><span class="label label-success">New</span> Approve data banyak sekaligus di halaman Kasubag dengan ( select all / Unselect ).</li>
				<li><span class="label label-success">New</span> Laporan Berbentuk Grafik Semuanya dan perbulan yaitu dari tanggal 21 sampai tgl 20.</li>
				</ul>
				</div>
			</div> <!-- /.portlet -->
			<!-- TEST -->
			<div class="portlet">
				<div class="portlet-content">
					<!-- Bisa Line atau column -->
					<div class="table-responsive">
						<div class="text-center"><h2><b>Semua Data di Tahun <?=date('Y');?></b></h2></div>
						<hr/>
						<div id="chart-container">
							<canvas id="myPie"></canvas>
						</div>
					</div>
				</div>
			</div>
			
			<div class="portlet">
				<div class="portlet-content">
					<!-- Bisa Line atau column -->
					<div class="table-responsive">
						<div class="text-center"><h2><b>Semua Data Perbulan di tahun <?=date('Y');?></b></h2></div>
						<hr/>
						<div id="chart-container">
							<canvas id="mycanvas"></canvas>
						</div>
					</div>
				</div>
			</div>
		
		
		<!-- TEST -->
        </div> <!-- /.col -->
		
      </div> <!-- /.row -->

    </div> <!-- /.content-container -->
      
  </div> <!-- /.content -->

</div> <!-- /.container -->
<?php if ($this->session->userdata('level') == 1 ){
// jika levelnya Staff
?>
<script type="text/javascript" language="javascript">
 $(document).ready(function(){
	function get_contoh() {
	$.ajax({
		url: "<?php echo site_url('Beranda/data_json')?>",
		method: "POST",
		success: function(data) {
			console.log(data);
			var label_nya = [];
			var isinya_lembur = [];
			var isinya_libur = [];
			var isinya_absensi = [];

			for(var i in data) {
				label_nya.push( data[i].bulan);
				isinya_lembur.push(data[i].lembur);
				isinya_libur.push(data[i].libur);
				isinya_absensi.push(data[i].absensi);
			}

			var chartdata = {
				labels: label_nya,

				datasets : [
					{
							label: 'Data Lembur Kerja',
							backgroundColor: 'DodgerBlue',
							borderColor: 'Orange',
							hoverBackgroundColor: 'Tomato',
							hoverBorderColor: 'Orange',
							data: isinya_lembur
					},
					{
						label: 'Data Libur/Dinas/Absen Sekali',
						backgroundColor: 'MediumSeaGreen',
						borderColor: 'Orange',
						hoverBackgroundColor: 'Tomato',
						hoverBorderColor: 'Orange',
						data: isinya_libur
					},
					{
						label: 'Data Cuti/Izin/Sakit',
						backgroundColor: 'Violet',
						borderColor: 'rgba(200, 200, 200, 0.75)',
						hoverBackgroundColor: 'Tomato',
						hoverBorderColor: 'Orange',
						data: isinya_absensi
					}
				]
			};

			var ctx = $("#mycanvas");

			var barGraph = new Chart(ctx, {
				type: 'bar',
				data: chartdata
			});
		},
		error: function(data) {
			console.log(data);
		}
	});
	};
	
	get_contoh();
	setInterval(get_contoh, 360000);
});
</script>
<?php }else{ 
// Jika levelnya selain Staff
?>
<script type="text/javascript" language="javascript">
 $(document).ready(function(){
	function get_contoh() {
	$.ajax({
		url: "<?php echo site_url('Beranda/data_json')?>",
		method: "POST",
		success: function(data) {
			console.log(data);
			var label_nya = [];
			var isinya_libur = [];
			var isinya_absensi = [];

			for(var i in data) {
				label_nya.push( data[i].bulan);
				isinya_libur.push(data[i].libur);
				isinya_absensi.push(data[i].absensi);
			}

			var chartdata = {
				labels: label_nya,
					datasets : [
					{
						label: 'Data Libur/Dinas/Absen Sekali',
						backgroundColor: 'MediumSeaGreen',
						borderColor: 'Orange',
						hoverBackgroundColor: 'Tomato',
						hoverBorderColor: 'Orange',
						data: isinya_libur
					},
					{
						label: 'Data Cuti/Izin/Sakit',
						backgroundColor: 'Violet',
						borderColor: 'rgba(200, 200, 200, 0.75)',
						hoverBackgroundColor: 'Tomato',
						hoverBorderColor: 'Orange',
						data: isinya_absensi
					}
				]
			};

			var ctx = $("#mycanvas");

			var barGraph = new Chart(ctx, {
				type: 'bar',
				data: chartdata
			});
		},
		error: function(data) {
			console.log(data);
		}
	});
	};
	
	get_contoh();
	setInterval(get_contoh, 360000);
});
</script>

<?php } ?>
<!-- pie Data -->
<script type="text/javascript" language="javascript">
 $(document).ready(function(){
	function get_contoh2() {
		$.ajax({
			url: "<?php echo site_url('Beranda/data_pie')?>",
			method: "POST",
			success: function(data) {
				console.log(data);
				var label_nya = [];
				var jml_data_1 = [];

				for(var i in data) {
					label_nya.push( data[i].nama);
					jml_data_1.push(data[i].jml_data);
				}

				var chartdata = {
					labels: label_nya,
					datasets: [
						{
							label: "Semua data Lembur/Libur/Izin",
							data: jml_data_1,
							backgroundColor: [
								"rgba(59, 100, 222, 1)",
								"rgba(203, 222, 225, 0.9)",
								"rgba(246, 34, 19, 1)"]
						}
					]
				};

				var ctx = $("#myPie");

				var barGraph = new Chart(ctx, {
					type: 'pie',
					data: chartdata
				});
			},
			error: function(data) {
				console.log(data);
			}
		});
	};
	
	get_contoh2();
	setInterval(get_contoh2, 360000);
});
</script>


