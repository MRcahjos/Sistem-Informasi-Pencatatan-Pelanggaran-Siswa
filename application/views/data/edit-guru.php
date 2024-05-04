<div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <div class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0 text-dark"><?= $title ;?></h1>
                </div><!-- /.col -->
                
              </div><!-- /.row -->
                 
            </div><!-- /.container-fluid -->
          </div>
          <!-- /.content-header -->

          <!-- Main content -->
          <section class="content ">
            <div class="container-fluid col-sm-8">
              <!-- Default box -->
              <div class="card card-outline card-info">
                <div class="card-header">
                  <h4 class="card-title " text-align="center"><strong><?= $title; ?></strong></h4>
                  <a class="btn btn-secondary btn-sm float-right" href="<?php echo base_url('data/index/');?>">
                    <i class="fas fa-arrow-left"></i>&ensp;Back
                  </a>
                </div>
                <div class="card-body">

                  <form action="<?= base_url('data/edit_guru/')?>" method="post">

                    <input type="hidden" name="z" value="<?= $oneGuru->id ;?>">
                    <!-- form-group -->
                    <div class="form-group">
                      <label for="editGuruNIK">NIK</label>
                      <input name="nik" id="editGuruNIK" type="text" placeholder="NIK" class="form-control" value="<?= $oneGuru->nik ;?>">
                      <?= form_error('nik', '<small class="text-danger pl-3">', '</small>');?>
                    </div>
                    <!-- /.form-group -->

                    <!-- form-group -->
                    <div class="form-group">
                      <label for="editGuruNama">Nama Guru</label>
                      <input name="nama" id="editGuruNama" type="text" placeholder="Nama Guru" class="form-control" value="<?= $oneGuru->guru ;?>">
                      <?= form_error('nama', '<small class="text-danger pl-3">', '</small>');?>
                    </div>
                    <!-- /.form-group -->
                    
                    <!-- form-group -->
                    <div class="form-group">
                      <label for="editGuruMapel">Mata Pelajaran</label>
                      <input name="mapel" id="editGuruMapel" type="text" placeholder="Mata Pelajaran" class="form-control" value="<?= $oneGuru->plajaran ;?>">
                      <?= form_error('mapel', '<small class="text-danger pl-3">', '</small>');?>
                    </div>
                    <!-- /.form-group -->


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