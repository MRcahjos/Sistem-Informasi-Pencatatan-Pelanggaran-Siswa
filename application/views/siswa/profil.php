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
            </div>
            <div class="card-body">

              <?= form_open_multipart('siswa/profile');?>

                <input type="hidden" name="z" value="<?= $oneSiswa->nisn ;?>">

                <!-- form-group -->
                <div class="form-group">
                  <label for="detailSiswaNISN">NISN</label>
                  <input name="nisn" id="detailSiswaNISN" type="text" placeholder="NISN" class="form-control" value="<?= $oneSiswa->nisn ;?>"  readonly>
                  <?= form_error('nisn', '<small class="text-danger pl-3">', '</small>');?>
                </div>
                <!-- /.form-group -->

                <!-- form-group -->
                <div class="form-group">
                  <label for="detailSiswaNama">Nama Siswa</label>
                  <input name="nama" id="detailSiswaNama" type="text" placeholder="Nama Siswa" class="form-control" value="<?= $oneSiswa->nama ;?>"  readonly>
                  <?= form_error('nama', '<small class="text-danger pl-3">', '</small>');?>
                </div>
                <!-- /.form-group -->

                <!-- form-group -->
                <div class="form-group">
                 <label for="inputProfilAddress"  class="col-form-label">Picture</label>
                 <div class="row">
                  <div class="col-sm-4">
                    <?php
                    if(file_exists('assets/img/profile/siswa/'.$oneSiswa->nisn.'.png')) : ?>
                      <img class="img-thumbnail"
                      src="<?= base_url('assets/img/profile/siswa/'.$oneSiswa->nisn.'.png'); ?>"
                      alt="User profile picture">
                      <?php else : ?>
                        <img class="img-thumbnail"
                        src="<?= base_url('assets/img/profile/siswa/def.jpg'); ?>"
                        alt="User profile picture">
                      <?php endif;?>
                    </div>
                    <div class="col-sm-8">
                      <div class="custom-file">
                        <input type="file" name="picture" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.form-group -->

                <!-- form-group -->
                <div class="form-group">
                  <label for="detailSiswaWali">Orang Tua / Wali</label>
                  <input name="wali" id="detailSiswaWali" type="text" placeholder="Orang Tua / Wali" class="form-control" value="<?= $oneSiswa->parent_name ;?>"  readonly>
                  <?= form_error('wali', '<small class="text-danger pl-3">', '</small>');?>
                </div>
                <!-- /.form-group -->

                <div class="row">

                  <div class="col-sm-6">

                    <!-- form-group -->
                    <div class="form-group">
                      <label for="addkelas">Kategori Kelas</label>
                      <?php if($oneSiswa->kelas == 'XII') {
                        echo '<input type="text" class="form-control" id="kelas" placeholder="Kategori Kelas" value="12" readonly>';
                      }elseif($oneSiswa->kelas == 'XI'){
                        echo '<input type="text" class="form-control" id="kelas" placeholder="Kategori Kelas" value="11" readonly>';
                      }else{
                        echo '<input type="text" class="form-control" id="kelas" placeholder="Kategori Kelas" value="10" readonly>';
                      };?>
                      <?= form_error('addkelas', '<small class="text-danger pl-3">', '</small>');?>
                    </div>
                    <!-- /.form-group -->

                  </div>

                  <div class="col-sm-6">

                    <!-- form-group -->
                    <div class="form-group">
                      <label for="addnamaKelas">Nama Kelas</label>
                      <input type="text" class="form-control" id="addnamaKelas" placeholder="Nama Kelas" value="<?= $oneSiswa->nama_kls?>" readonly>
                      <?= form_error('addnamaKelas', '<small class="text-danger pl-3">', '</small>');?>
                    </div>
                    <!-- /.form-group -->

                  </div>

                </div>

                <!-- Alamat -->
                <div class="form-group">
                  <label for="detailSiswaAlamat" class="col-form-label">Alamat</label>
                  <textarea type="text" name="alamat" id="detailSiswaAlamat" class="form-control" placeholder="Alamat"  readonly><?= $oneSiswa->alamat ;?></textarea>
                  <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>');?>
                </div>
                <!-- / Alamat -->

                <!-- form-group -->
                <div class="form-group">
                  <label for="detailSiswaTelepon">No Telp / HP</label>
                  <input name="telepon" id="detailSiswaTelepon" type="text" class="form-control" placeholder="Nomer HP Yang Bisa Di Hubungi(Utamakan Nomer HP Orang Tua)"  readonly value="<?= $oneSiswa->phone_number_wali ;?>">
                  <?= form_error('telepon', '<small class="text-danger pl-3">', '</small>');?>
                </div>
                <!-- /.form-group -->

                <div class="form-group text-right">
                  <button type="submit" class="btn btn-warning btn-sm" ><i class="fa fa-edit"></i>&ensp;Update</button>
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
    
    
    
   
   
   