
          <!-- Main content -->
          <section class="content ">
            <div class="container-fluid col-sm-8">
              <!-- Default box -->
              <div class="card card-outline card-info">
                <div class="card-header">
                <h4 class="card-title " text-align="center"><strong>ADD Siswa</strong></h4>
                  <a class="btn btn-secondary btn-sm float-right" href="<?php echo base_url('data/siswa');?>">
                    <i class="fas fa-arrow-left"></i>&ensp;Back
                  </a>
                </div>
                <div class="card-body">

                  <form action="<?= base_url('data/addSiswa')?>" method="post">

                    <!-- form-group -->
                    <div class="form-group">
                      <label for="addSiswaNISN">NISN</label>
                      <input name="nisn" id="addSiswaNISN" type="text" placeholder="NISN" class="form-control" value="<?= set_value('nisn') ;?>" >
                      <?= form_error('nisn', '<small class="text-danger pl-3">', '</small>');?>
                    </div>
                    <!-- /.form-group -->
                    
                    <!-- form-group -->
                    <div class="form-group">
                      <label for="addSiswaNama">Nama Siswa</label>
                      <input name="nama" id="addSiswaNama" type="text" placeholder="Nama Siswa" class="form-control" value="<?= set_value('nama') ;?>">
                      <?= form_error('nama', '<small class="text-danger pl-3">', '</small>');?>
                    </div>
                    <!-- /.form-group -->

                    <!-- form-group -->
                    <div class="form-group">
                      <label for="addSiswaWali">Orang Tua / Wali</label>
                      <input name="wali" id="addSiswaWali" type="text" placeholder="Nama Ibu" class="form-control" value="<?= set_value('nama') ;?>">
                      <?= form_error('wali', '<small class="text-danger pl-3">', '</small>');?>
                    </div>
                    <!-- /.form-group -->

                    <div class="row">

                      <div class="col-sm-6">

                        <!-- form-group -->
                        <div class="form-group">
                          <label for="addkelas">Kategori Kelas</label>
                          <select id="addkelas" name="addkelas" class="form-control select2" style="width: 100%;">
                            <option value="I" selected="selected">Pilih Kategori Kelas</option>
                            <option value="X">10</option>
                            <option value="XI">11</option>
                            <option value="XII">12</option>
                          </select>
                          <?= form_error('addkelas', '<small class="text-danger pl-3">', '</small>');?>
                        </div>
                        <!-- /.form-group -->
                        
                      </div>

                      <div class="col-sm-6">

                        <!-- form-group -->
                        <div class="form-group">
                          <label for="addnamaKelas">Nama Kelas</label>
                          <select id="addnamaKelas" name="addnamaKelas" class="form-control select2" style="width: 100%;">
                            <option value="" selected="selected">Pilih Kategori Kelas Terlebih Dahulu</option>
                          </select>
                          <?= form_error('addnamaKelas', '<small class="text-danger pl-3">', '</small>');?>
                        </div>
                        <!-- /.form-group -->

                      </div>
                      
                    </div>

                    <!-- Alamat -->
                    <div class="form-group">
                      <label for="addSiswaAlamat" class="col-form-label">Alamat</label>
                      <textarea type="text" name="alamat" id="addSiswaAlamat" class="form-control" placeholder="Alamat"><?= set_value('alamat')?></textarea>
                      <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>');?>
                    </div>
                    <!-- / Alamat -->

                    <!-- form-group -->
                    <div class="form-group">
                      <label for="addSiswaNama">Nomor  HP</label>
                      <input name="telepon" id="addSiswaTelepon" type="text" class="form-control" placeholder="Nomer HP Yang Bisa Di Hubungi(Utamakan Nomer HP Orang Tua)" value="<?= set_value('telepon') ;?>" >
                      <?= form_error('telepon', '<small class="text-danger pl-3">', '</small>');?>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group text-right">
                      <a class="btn btn-danger btn-sm" href="<?= base_url('data/addSiswa');?>"><i class="fa fa-undo"></i>&ensp;Reset</a>
                      <button type="submit" class="btn btn-primary btn-sm ">Submit &ensp;<i class="fas fa-arrow-right"></i></button>
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