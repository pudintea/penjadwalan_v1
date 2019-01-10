    <!-- Content Header (Page header) -->
    <section class="content-header">
      
      <h1>
        TAMBAH MEMBER
        <small>Silahkan tambah member</small>
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
            <div class="col-md-4 col-sm-4">
              <form enctype="multipart/form-data" role="form" action="<?=base_url('Member/update');?>" method="post" id="FormNajzmi" onsubmit="return validateForm()" class="form-horizontal">
                <input type="hidden" id="id_member" name="id_member" value="<?=base64_encode($edit_member->id_member);?>" autocomplete="off" />
                <input type="hidden" id="nama_asal" name="nama_asal" value="<?=$edit_member->member_nama;?>" autocomplete="off" />
                <div class="panel panel-default">
                    <div class="panel-body">
                      <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                          <label class="control-label">Nama</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <span class="glyphicon glyphicon-user"></span>
                            </div>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?=$edit_member->member_nama;?>" autocomplete="off" />
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label">Jabatan</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <span class="glyphicon glyphicon-edit"></span>
                            </div>
                            <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?=$edit_member->member_jabatan;?>" autocomplete="off" />
                          </div>
                        </div>

                        <div class="form-group text-right">
                          <button class="btn btn-primary">Simpan</button>  
                        </div>

                      </div>
                    </div>
                </div>
              </form>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  
<script type="text/javascript">
function validateForm() {
    var a = document.forms["FormNajzmi"]["nama"].value;
    if (a == "") {
        alert("Nama Tidak boleh kosong..!");
        return false;
    }
  
  var a1 = document.forms["FormNajzmi"]["jabatan"].value;
    if (a1 == "") {
        alert("Jabatan Tidak boleh kosong..!");
        return false;
    }

}
</script>