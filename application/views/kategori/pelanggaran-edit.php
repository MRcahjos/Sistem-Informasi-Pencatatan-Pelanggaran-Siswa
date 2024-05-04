<div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <div class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0 text-dark"><?= $title ;?></h1>
                </div><!-- /.col -->
                
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
                  <a class="btn btn-secondary btn-sm float-right" href="<?php echo base_url('kategori/pelanggaran');?>">
                    <i class="fas fa-arrow-left"></i>&ensp;Back
                  </a>
                </div>
                <div class="card-body">

                <?php echo form_open_multipart('kategori/edit'); ?>
                <!-- <form action="<?= base_url('kategori/edit/')?>" method="post"> -->

                    <!-- <input type="hidden" name="z" value="<?= $onepel->id_pelanggaran ;?>"> -->
                    <input type="hidden" name="z" value="<?= $onepel->pelanggaran_id ;?>">

                    <div class="row ">

                    <div class="col-md-12">
                    <div class="form-group">
                      <label for="nisn">NISN</label>
                      <input name="nisn" id="nisn" type="text" placeholder="nisn" class="form-control" value="<?= $onepel->nisn ;?>">
                      <?= form_error('nisn', '<small class="text-danger pl-3">', '</small>');?>
                    </div>
                    </div>

                      <div class="col-md-6">
                      <div class="form-group">
                      <label for="kelas">Kategori Kelas</label>
                      <input name="kelas" id="kelas" type="text" placeholder="kelas" class="form-control" readonly value="<?= $onepel->kelas ;?>">
                      <?= form_error('kelas', '<small class="text-danger pl-3">', '</small>');?>
                        </div>
                        <!-- /.form-group -->

                      </div>
                      <div class="col-md-6">

                        <!-- form-group -->
                        <div class="form-group">
                          <label for="namaKelas">Nama Kelas</label>
                          <input name="namaKelas" id="namaKelas" type="text" placeholder="Nama Kelas" class="form-control"  value="<?= $onepel->nama_kls ;?>" readonly >
                          <input type="hidden" name="nama_kls" id="nama_kls" value="<?= $this->encrypt->encode($onepel-> id_kelas) ;?>" >
                        <?= form_error('nama_kls', '<small class="text-danger pl-3">', '</small>');?>
                        </div>
                        <!-- /.form-group -->

                      </div>

                    </div>
                    <!-- /.row -->

                    <!-- form-group -->

                     <div class="form-group">
                        <label for="namaSiswa">Nama Siswa</label>
                        <input name="namaSiswa" id="namaSiswa" type="text" placeholder="Nama Siswa" class="form-control" value="<?= $onepel->nama ?>" readonly>
                        <input type="hidden" name="nama_mhs" id="nama_mhs" value="<?=  $this->encrypt->encode($onepel->id_siswa); ?>">
                        <?= form_error('mhs', '<small class="text-danger pl-3">', '</small>');?>
                    </div>

                    <!-- /.form-group -->

                     <!-- / Pelapor -->
                    <div class="form-group">
                      <label for="pelapor">Pelapor</label>
                      <input name="pelapor" id="pelapor" type="text" placeholder="<?= $user['name']; ?>" class="form-control" value="<?= $user['name']; ?>" readonly  >
                      <?= form_error('pelapor', '<small class="text-danger pl-3">', '</small>');?>
                    </div>
                    <!-- / Pelapor -->

                    <!-- Kategori Pelanggaran -->
                    <div class="form-group">
                      <label for="pelanggaran" class="col-form-label">Kategori Pelanggaran</label>
                      <select name="pelanggaran" class="form-control select2" style="width: 100%;" >
                        <option value="" selected>Pilih Salah Satu</option>
                        <?php
                        foreach ($pelanggaranAll as $pel) {

                          if($pel->id == $onepel->tipe_id){
                            echo '<option value="'.$pel->id.'" selected="selected">'.$pel->pelanggaran.'</option>';

                          }else{

                            echo '<option value="'.$pel->id.'">'.$pel->pelanggaran.'</option>';

                          }
                        }
                        ;?>
                      </select>
                      <?= form_error('pelanggaran', '<small class="text-danger pl-3">', '</small>');?>
                    </div>
                    <!-- / Kategori Pelanggaran -->

                    <!-- Catatan -->
                    <div class="form-group">
                      <label for="catatan" class="col-form-label">Catatan</label>
                      <textarea type="text" name="catatan" class="form-control" id="catatan" placeholder="Catatan"><?= $onepel->catatan ;?></textarea>
                      <?= form_error('catatan', '<small class="text-danger pl-3">', '</small>');?>
                    </div>
                    <!-- / Catatan -->

                     <!-- / Bukti Foto -->
                    <div class="form-group">
                    <label for="catatan" class="col-form-label">Lampirkan Bukti foto</label> 
                    
                   <?php if($onepel->image) : ?>
                      <img src="<?= base_url('assets/upload/images/') . $onepel->image; ?>" class="img-preview img-fluid mb-3 col-md-5 d-block ">     
                    <?php else : ?>
                      <img class="img-preview img-fluid mb-3 col-md-5 ">     
                    <?php endif; ?>
                    
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image" onchange="previewImage()">
                                <input type="hidden" name="old_image" value="<?=  $onepel->image; ?>">
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                        </div>
                    <!-- / Bukti Foto -->

                    <div class="form-group text-right">
                      <button type="submit" class="btn btn-warning btn-sm ">Update &ensp;<i class="fas fa-edit"></i></button>
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
        </div>
      