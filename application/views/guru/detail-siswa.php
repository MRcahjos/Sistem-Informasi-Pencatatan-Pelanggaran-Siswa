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
                  <a class="btn btn-secondary btn-sm float-right" href="<?php echo base_url('guru/siswa');?>">
                    <i class="fas fa-arrow-left"></i>&ensp;Back
                  </a>
                </div>
                <div class="card-body">

                    <input type="hidden" name="z" value="<?= $oneSiswa->id_siswa ;?>">

                    <!-- form-group -->
                    <div class="form-group">
                      <label for="editSiswaNISN">NISN</label>
                      <input name="nisn" id="editSiswaNISN" type="text" placeholder="NISN" class="form-control" value="<?= $oneSiswa->nisn ;?>" readonly >
                      <?= form_error('nisn', '<small class="text-danger pl-3">', '</small>');?>
                    </div>
                    <!-- /.form-group -->
                    
                    <!-- form-group -->
                    <div class="form-group">
                      <label for="EditSiswaNama">Nama Siswa</label>
                      <input name="nama" id="EditSiswaNama" type="text" placeholder="Nama Siswa" class="form-control" value="<?= $oneSiswa->nama ;?>" readonly>
                      <?= form_error('nama', '<small class="text-danger pl-3">', '</small>');?>
                    </div>
                    <!-- /.form-group -->

                    <!-- form-group -->
                    <div class="form-group">
                      <label for="EditSiswaWali">Orang Tua / Wali</label>
                      <input name="wali" id="EditSiswaWali" type="text" placeholder="Orang Tua / Wali" class="form-control" value="<?= $oneSiswa->parent_name ;?>" readonly>
                      <?= form_error('wali', '<small class="text-danger pl-3">', '</small>');?>
                    </div>
                    <!-- /.form-group -->

                    <div class="row">

                      <div class="col-md-6">
                      <div class="form-group">
                      <label for="kelas">Kategori Kelas</label>
                      <input name="kelas" id="kelas" type="text" placeholder="kelas" class="form-control" readonly value="<?= $oneSiswa->kelas ;?>">
                      <?= form_error('kelas', '<small class="text-danger pl-3">', '</small>');?>
                        </div>
                        <!-- /.form-group -->

                      </div>
                      <div class="col-md-6">

                        <!-- form-group -->
                        <div class="form-group">
                          <label for="namaKelas">Nama Kelas</label>
                          <input name="namaKelas" id="namaKelas" type="text" placeholder="Nama Kelas" class="form-control"  value="<?= $oneSiswa->nama_kls ;?>" readonly >
                          <input type="hidden" name="nama_kls" id="nama_kls" value="<?= $this->encrypt->encode($oneSiswa-> id_kelas) ;?>" >
                        <?= form_error('nama_kls', '<small class="text-danger pl-3">', '</small>');?>
                        </div>
                        <!-- /.form-group -->

                      </div>

                    </div>

                    <!-- Alamat -->
                    <div class="form-group">
                      <label for="editSiswaAlamat" class="col-form-label">Alamat</label>
                      <textarea type="text" name="alamat" id="editSiswaAlamat" class="form-control" placeholder="Alamat" readonly ><?= $oneSiswa->alamat  ?>  </textarea>
                      <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>');?>
                    </div>
                    <!-- / Alamat -->

                    <!-- form-group -->
                    <div class="form-group">
                      <label for="editSiswaTelepon">Nomor HP</label>
                      <input name="telepon" id="editSiswaTelepon" type="text" class="form-control" placeholder="Nomer HP Yang Bisa Di Hubungi(Utamakan Nomer HP Orang Tua)" value="<?= $oneSiswa->no_telp ;?>" readonly>
                      <?= form_error('telepon', '<small class="text-danger pl-3">', '</small>');?>
                    </div>
                    <!-- /.form-group -->
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