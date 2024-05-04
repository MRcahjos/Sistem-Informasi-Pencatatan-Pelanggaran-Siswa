

<div class="content-wrapper">

      <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash');?>"></div>

      <?php if ($this->session->flashdata('flash')) : ?>

          <?php endif; ?>

      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark"><?= $title ;?></h1>
              </div><!-- /.col -->
        
              <!--/. Col -->
            </div>
                
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content ">
        <div class="container-fluid col-sm-8">
          <!-- Default box -->
          <div class="card card-outline card-info">
            <div class="card-header">
              <h4 class="card-title " text-align="center"><strong><?= $title ?></strong></h4>
            </div>
            <div class="card-body">

              <form action="<?= base_url('admin/website')?>" method="post">

              <input type="hidden" name="z" value="<?= $oneWeb->id ;?>">

                <!-- Fullname -->
                <div class="form-group">
                  <label for="editPenggunaFullname" class="col-form-label">Nama Sekolah</label>
                  <input type="text" name="sekolah" class="form-control" id="editPenggunaFullname" placeholder="Nama Sekolah" value="<?= $oneWeb->school_name?>" />
                  <?= form_error('sekolah', '<small class="text-danger pl-3">', '</small>');?>
                </div>
                <!-- / Fullname -->

                <!-- Fullname -->
                <div class="form-group">
                  <label for="editPenggunaEmail" class="col-form-label">Point</label>
                  <input type="text" name="point" class="form-control" id="editPenggunaEmail" placeholder="Point" value="<?= $oneWeb->point; ?>"/>
                  <p class="text-danger">*Catatan : Batas point, jika point siswa melebihi batas yang ditentukan, tombol print surat akan keluar</p>
                  <?= form_error('point', '<small class="text-danger pl-3">', '</small>');?>
                </div>
                <!-- / Fullname -->

                <div class="form-group text-right">
                  <button type="submit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>&ensp;Update</button>
                </div> 

              </form>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.Container Fluid -->
      </section>
      <!-- /.content -->
</div>
    </div>
    
    
    
    