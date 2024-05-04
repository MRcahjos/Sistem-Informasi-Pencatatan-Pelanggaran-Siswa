<div class="content-wrapper">
          

<div class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0 text-dark"><?= $title ;?></h1>
                </div><!-- /.col -->
                
            </div><!-- /.container-fluid -->
          </div>
          <!-- Main content -->
          <section class="content ">
            <div class="container-fluid col-sm-8">
              <!-- Default box -->
              <div class="card card-outline card-info">
                <div class="card-header">
                  <h4 class="card-title " text-align="center"><strong><?= $title; ?></strong></h4>
                  <a class="btn btn-secondary btn-sm float-right" href="<?php echo base_url('kategori/pelanggaran');?>">
                    <i class="fas fa-arrow-left"></i>&ensp;Back
                  </a>
                </div>
                <div class="card-body">
                <?php echo form_open_multipart('kategori/PelanggaranAdd'); ?>
                  <!-- <form action="<?= base_url('kategori/PelanggaranAdd')?>" method="post"> -->
                    <div class="row ">

                    <div class="col-md-12">
                    <div class="form-group">
                      <label for="nisn">NISN</label>
                      <input name="nisn" id="nisn" type="text" placeholder="nisn" class="form-control" value="<?= set_value('nisn') ;?>">
                      <?= form_error('nisn', '<small class="text-danger pl-3">', '</small>');?>
                    </div>
                    </div>

                      <div class="col-md-6">

                        <!-- form-group -->

                    <div class="form-group">
                      <label for="kelas">Kategori Kelas</label>
                      <input name="kelas" id="kelas" type="text" placeholder="kelas" class="form-control" readonly value="<?= set_value('kelas') ;?>">
                      <?= form_error('kelas', '<small class="text-danger pl-3">', '</small>');?>


                        <!-- <div class="form-group">
                          <label for="kelas">Kategori Kelas</label>
                          <select id="kelas" name="kelas" class="form-control select2" style="width: 100%;">
                            <option value="I" selected="selected">Pilih Kategori Kelas</option>
                            <option value="X">10</option>
                            <option value="XI">11</option>
                            <option value="XII">12</option>
                          </select>
                          <?= form_error('kelas', '<small class="text-danger pl-3">', '</small>');?> -->
                        </div>
                        <!-- /.form-group -->

                      </div>
                      <div class="col-md-6">

                        <!-- form-group -->
                        <div class="form-group">
                          <label for="namaKelas">Nama Kelas</label>
                          <input name="namaKelas" id="namaKelas" type="text" placeholder="Nama Kelas" class="form-control" readonly >
                          <input type="hidden" name="nama_kls" id="nama_kls" value="" >
                      
                        <?= form_error('nama_kls', '<small class="text-danger pl-3">', '</small>');?>
                        </div>
                        <!-- /.form-group -->

                      </div>

                    </div>
                    <!-- /.row -->

                    <!-- form-group -->

                    <div class="form-group">
                      <label for="namaSiswa">Nama Siswa</label>
                      <input name="namaSiswa" id="namaSiswa" type="text" placeholder="Nama Siswa" class="form-control" readonly  >
                      <input type="hidden" name="nama_mhs" id="nama_mhs" value="<?= set_value('nama_mhs') ?>" >
                      <?= form_error('mhs', '<small class="text-danger pl-3">', '</small>');?>
                      </div>


                    <!-- /.form-group

                  Pelapor -->
                    <div class="form-group">
                      <label for="pelapor">Pelapor</label>
                      <input name="pelapor" id="pelapor" type="text" placeholder="<?= $user['name']; ?>" class="form-control" value="<?= $user['name']; ?>" readonly  >
                      <!-- <input type="hidden" name="pelapor" id="pelapor" value="" > -->
                      <?= form_error('pelapor', '<small class="text-danger pl-3">', '</small>');?>

                      <!-- <label for="pelapor" class="col-form-label">Pelapor</label>
                      <select name="pelapor" id="pelapor" class="form-control select2" style="width: 100%;" >
                        <option value="" selected>Pilih Salah Satu</option>
                        <?php
                        foreach ($guruAll as $guru) {
                          echo '<option value="'.$guru->id.'">'.$guru->guru.'</option>';
                        }
                        ;?>
                      </select>
                      <?= form_error('pelapor', '<small class="text-danger pl-3">', '</small>');?> -->
                    </div>
                    <!-- / Pelapor -->

                    <!-- Kategori Pelanggaran -->
                    <div class="form-group">
                      <label for="pelanggaran" class="col-form-label">Kategori Pelanggaran</label>
                      <select name="pelanggaran" class="form-control select2" style="width: 100%; " >
                        <option value="" selected>Pilih Salah Satu</option>
                        <?php
                        foreach ($pelanggaranAll as $pel) {
                          echo '<option value="'.$pel->id.'">'.$pel->pelanggaran.'</option>';
                        }
                        ;?>
                      </select>
                      <?= form_error('pelanggaran', '<small class="text-danger pl-3">', '</small>');?>
                    </div>
                    <!-- / Kategori Pelanggaran -->

                  <!-- Bukti foto -->
                      <div class="form-group">
                      <label for="catatan" class="col-form-label">Catatan</label>
                      <textarea type="text" name="catatan" class="form-control" id="catatan" placeholder="Catatan"><?= set_value('catatan')?></textarea>
                      <?= form_error('catatan', '<small class="text-danger pl-3">', '</small>');?>
                    </div>
                    <!-- / Bukti Foto -->

                    <!-- Catatan -->
                        
                    <div class="form-group">
                    <label for="catatan" class="col-form-label">Lampirkan Bukti foto</label>
                    <img class="img-preview img-fluid mb-3 col-md-5 ">     
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image" onchange="previewImage()">
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                        </div>
                    <!-- / Catatan -->

                    <div class="form-group text-right">
                      <a class="btn btn-danger btn-sm" href="<?= base_url('kategori/PelanggaranAdd');?>"><i class="fa fa-undo"></i>&ensp;Reset</a>
                      <button type="submit" class="btn btn-primary btn-sm ">Submit &ensp;<i class="fas fa-arrow-right"></i></button>
                    </div> 
                    <?php echo form_close(); ?>
                  <!-- </form> -->

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
        </div>
    
        
     