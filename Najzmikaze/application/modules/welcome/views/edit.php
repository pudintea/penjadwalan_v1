    <!-- Content Header (Page header) -->
    <section class="content-header">
      
      <h1>
        TAMBAH JADWAL
        <small>Silahkan tambah jadwal</small>
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
          <?php // Pemberitahuan
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
            <!-- /.box-header -->
            <div style="margin-top: 6%";></div>
            <div class="box-body">
              <form enctype="multipart/form-data" role="form" action="<?=base_url();?>welcome/update" method="post" id="FormNajzmi" onsubmit="return validateForm()" class="form-horizontal">
      <input type="text" name="kode_id" value="<?=base64_encode($jad->id_jadwal);?>" hidden />
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="col-md-4">
                  <div class="form-group">

                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="formGroupInputLarge">Member</label>
                          <div class="input-group col-sm-6">
                              <select class="form-control" type="text" name="member"  >
                                <option value="<?=$jad->id_member;?>">-- <?=$jad->member_nama;?> --</option>
                                <?php foreach ($input_member as $im){ ?>
                                <option value="<?=$im->id_member;?>"><?=$im->member_nama;?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <label class="col-sm-3 control-label" for="formGroupInputLarge">Tanggal</label>
                    <div class="input-group date col-sm-6">
                    <?php
                      $tgl = explode("-", $jad->jadwal_tanggal);
                      $tglan = $tgl[2]."-".$tgl[1]."-".$tgl[0];
                    ?>
                    <input type="text" class="form-control" id="datepicker" 
                    name="tanggal" value="<?=$tglan;?>" autocomplete="off" />
                      <div class="input-group-addon">
                        <span class="glyphicon glyphicon-th"></span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="formGroupInputLarge">Waktu</label>
                      <div class="input-group col-sm-6">
                        <input class="form-control" type="text" name="waktu" value="<?=$jad->jadwal_waktu;?>"  />
                        
                      </div>
                  </div>
                </div>
                <!-- Batas Kiri Dan Kanan --> 
                <div class="col-md-8">
                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Tempat</label>
                      <div class="input-group col-sm-8">
                        <input class="form-control" type="text" name="tempat" value="<?=$jad->jadwal_tempat;?>" />
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Kegiatan</label>
                      <div class="input-group col-sm-8">
                        <textarea class="form-control" name="kegiatan" rows="3"><?=$jad->jadwal_kegiatan;?></textarea>  
                      </div>
                  </div>                        
                </div>          
              </div>
            </div>
          </div>
        </div>
        <div class="">
          <div class="alert alert-info text-right">
            <a href="<?=base_url('welcome');?>" class="btn btn-danger" role="button">Batal</a>
            <button class="btn btn-primary">Update</button>
          </div>  
        </div>
        <div class="text-right">
          <u><i>EDIT, <?=$jadwal_siapa;?></i></u>
        </div>                      
      </form>            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  <script>
    $(function() {
    //$('#datepicker').datepicker('getFormattedDate');
      $('#datepicker').datepicker({
      format: 'dd-mm-yyyy',
      //viewMode: "months",
      //minViewMode: "months",
      //format: 'yyyy-mm-dd',
      todayBtn : true, 
      autoclose: true
      });
    });
  </script>
  
  <script type="text/javascript">
function validateForm() {
    var a = document.forms["FormNajzmi"]["tanggal"].value;
    if (a == "") {
        alert("Tanggal Tidak boleh kosong..!");
        return false;
    }
  
  var a1 = document.forms["FormNajzmi"]["kegiatan"].value;
    if (a1 == "") {
        alert("Kegiatan Tidak boleh kosong..!");
        return false;
    }

}
</script>