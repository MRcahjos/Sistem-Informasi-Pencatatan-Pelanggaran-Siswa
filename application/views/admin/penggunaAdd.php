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
    <div class="container-fluid">

      <div class="row">

        <div class="col-sm-8">

          

          <!-- Default box -->
          <div class="card card-outline card-info">
            <div class="card-header">
              <h4 class="card-title " text-align="center"><strong><?= $title; ?></strong></h4>
              <a class="btn btn-secondary btn-sm float-right" href="<?php echo base_url('admin/pengguna');?>">
                <i class="fas fa-arrow-left"></i>&ensp;Back
              </a>
            </div>
            <div class="card-body">


              <form action="<?= base_url('admin/penggunaAdd')?>" method="post">


                <!-- Level -->
                <div class="form-group">
                  <label for="addPenggunaLevel" class="col-form-label">Level</label>
                  <select class="form-control" name="level" id="addPenggunaLevel">
                  <option value="">Silahkan Memilih Level</option>
                    <option value="Admin">Admin</option>
                    <option value="Guru">Guru</option>
                    <option value="GuruBk">Guru BK</option>
                    <option value="Wali">Wali</option>
                    <option value="Siswa">Siswa</option>
                  </select>
                  <?= form_error('level', '<small class="text-danger pl-3">', '</small>');?>
                </div>
                <!-- / Level -->

                <!-- add pengguna admin -->

                <div id=addPenggunaAdmin style="display: none">

                  <!-- Fullname -->
                  <div class="form-group">
                    <label for="addPenggunaFullnameAdmin" class="col-form-label">Fullname</label>
                    <input type="text" name="fullnameAdmin" class="form-control" id="addPenggunaFullnameAdmin" placeholder="Fullname" value="<?= set_value('fullname')?>" />
                    <?= form_error('fullnameAdmin', '<small class="text-danger pl-3">', '</small>');?>
                  </div>
              
                  <!-- Username -->
                  <div class="form-group">
                    <label for="addPenggunaUsernameAdmin" class="col-form-label">Username</label>
                    <input type="text" name="usernameAdmin" class="form-control" id="addPenggunaUsernameAdmin" placeholder="Username" value="<?= set_value('username')?>" />
                    <?= form_error('usernameAdmin', '<small class="text-danger pl-3">', '</small>');?>
                  </div>
                  <!-- / Username -->

                  <!-- Password -->
                  <div class="form-group">
                    <label for="addPenggunaPasswordAdmin" class="col-form-label">Password</label>
                    <input type="text" name="passwordAdmin" class="form-control" id="addPenggunaPasswordAdmin" placeholder="Password" value="<?= set_value('password')?>" />
                    <?= form_error('passwordAdmin', '<small class="text-danger pl-3">', '</small>');?>
                  </div>
                </div>
                  <!-- end -->

                <!-- Mencari guru -->
                <div id=addPenggunaGuru style="display: none">

                    <div class="form-group">
                      <label for="addNIKGuru">Silahkan Cari NIK Guru</label>
                      <input name="addNIKGuru" id="addNIKGuru" type="text" placeholder="Silahkan Cari NIK Guru" class="form-control">
                      <input type="hidden" name="addNIKGuru" id="addNIKGuru" value="" >
                    </div>

                  <!-- / NIK -->

                  <!-- Fullname -->
                  <div class="form-group">
                    <label for="addPenggunaFullnameGuru" class="col-form-label">Nama Guru</label>
                    <input type="text" name="fullnameGuru" class="form-control" id="addPenggunaFullnameGuru" placeholder="Nama Guru" readonly/>
                    <?= form_error('fullnameGuru', '<small class="text-danger pl-3">', '</small>');?>
                  </div>
                  <!-- / Fullname -->

                  <!-- Username -->
                  <div class="form-group">
                    <label for="addPenggunaUsernameGuru" class="col-form-label">Username</label>
                    <input type="text" name="usernameGuru" class="form-control" id="addPenggunaUsernameGuru" placeholder="Username" value="<?= set_value('username')?>" readonly/>
                    <?= form_error('usernameGuru', '<small class="text-danger pl-3">', '</small>');?>
                  </div>
                  <!-- / Username -->

                  <!-- Password -->
                  <div class="form-group">
                    <label for="addPenggunaPasswordGuru" class="col-form-label">Password</label>
                    <input type="text" name="passwordGuru" class="form-control" id="addPenggunaPasswordGuru" placeholder="Password" value="<?= set_value('password')?>" />
                    <?= form_error('passwordGuru', '<small class="text-danger pl-3">', '</small>');?>
                  </div>

                </div>
                  <!-- end -->

                <!-- Mencari guru bk -->
                <div id=addPenggunaGuruBk style="display: none">

                    <div class="form-group">
                      <label for="addNIKGuruBk">Silahkan Cari NIK Guru BK</label>
                      <input name="addNIKGuruBk" id="addNIKGuruBk" type="text" placeholder="Silahkan Cari NIK Guru BK" class="form-control">
                      <input type="hidden" name="addNIKGuruBk" id="addNIKGuruBk" value="" >
                    </div>

                  <!-- / NIK -->

                  <!-- Fullname -->
                  <div class="form-group">
                    <label for="addPenggunaFullnameGuruBk" class="col-form-label">Nama Guru</label>
                    <input type="text" name="fullnameGuruBk" class="form-control" id="addPenggunaFullnameGuruBk" placeholder="Nama Guru" readonly/>
                    <?= form_error('fullnameGuruBk', '<small class="text-danger pl-3">', '</small>');?>
                  </div>
                  <!-- / Fullname -->

                  <!-- Username -->
                  <div class="form-group">
                    <label for="addPenggunaUsernameGuruBk" class="col-form-label">Username</label>
                    <input type="text" name="usernameGuruBk" class="form-control" id="addPenggunaUsernameGuruBk" placeholder="Username" value="<?= set_value('username')?>" readonly/>
                    <?= form_error('usernameGuruBk', '<small class="text-danger pl-3">', '</small>');?>
                  </div>
                  <!-- / Username -->

                  <!-- Password -->
                  <div class="form-group">
                  <label for="addPenggunaPasswordGuruBk" class="col-form-label">Password</label>
                    <input type="text" name="passwordGuruBk" class="form-control" id="addPenggunaPasswordGuruBk" placeholder="Password" value="<?= set_value('password')?>" />
                    <?= form_error('passwordGuruBk', '<small class="text-danger pl-3">', '</small>');?>
                  </div>

                </div>
                <!-- end -->

                <!-- mencari wali siswa -->
                <div id=addPenggunaWali style="display: none">

                  <!-- NISN -->
                  <div class="form-group">

                  <label for="addNISNWali">Silahkan Cari NISN Siswa</label>
                      <input name="addNISNWali" id="addNISNWali" type="text" placeholder="Silahkan Cari NISN Siswa" class="form-control">
                  </div>
                  <!-- Fullname -->
                  <div class="form-group">
                    <label for="addPenggunaFullnameWali" class="col-form-label">Fullname</label>
                    <input type="text" name="fullnameWali" class="form-control" id="addPenggunaFullnameWali" placeholder="Fullname" readonly/>
                    <?= form_error('fullnameWali', '<small class="text-danger pl-3">', '</small>');?>
                  </div>
                  <!-- / Fullname -->

                  <!-- Username -->
                  <div class="form-group">
                    <label for="addPenggunaUsernameWali" class="col-form-label">Username</label>
                    <input type="text" name="usernameWali" class="form-control" id="addPenggunaUsernameWali" placeholder="Username" value="<?= set_value('username')?>" readonly/>
                    <?= form_error('usernameWali', '<small class="text-danger pl-3">', '</small>');?>
                  </div>
                  <!-- / Username -->

                  <!-- Password -->
                  <div class="form-group">
                    <label for="addPenggunaPasswordWali" class="col-form-label">Password</label>
                    <input type="text" name="passwordWali" class="form-control" id="addPenggunaPasswordWali" placeholder="Password" value="<?= set_value('password')?>" />
                    <?= form_error('passwordWali', '<small class="text-danger pl-3">', '</small>');?>
                  </div>
                </div>
                <!-- end -->

                <!-- add pengguna siswa -->
                <div id=addPenggunaSiswa style="display: none">

                <div class="form-group">
                      <label for="addNISNSiswa">Silahkan Cari NISN Siswa</label>
                      <input name="addNISNSiswa" id="addNISNSiswa" type="text" placeholder="Silahkan Cari NISN Siswa" class="form-control">
                      <!-- <input type="hidden" name="addNISNSiswa" id="addNISNSiswa" value="" > -->   
                    </div>
    
                  <!-- / NISN -->

                  <!-- Fullname -->
                  <div class="form-group">
                    <label for="addPenggunaFullnameSiswa" class="col-form-label">Fullname</label>
                    <input type="text" name="fullnameSiswa" class="form-control" id="addPenggunaFullnameSiswa" placeholder="Fullname" readonly/>
                    <?= form_error('fullnameSiswa', '<small class="text-danger pl-3">', '</small>');?>
                  </div>
                  <!-- / Fullname -->

                  <!-- Username -->
                  <div class="form-group">
                    <label for="addPenggunaUsernameSiswa" class="col-form-label">Username</label>
                    <input type="text" name="usernameSiswa" class="form-control" id="addPenggunaUsernameSiswa" placeholder="Username" value="<?= set_value('username')?>" readonly/>
                    <?= form_error('usernameSiswa', '<small class="text-danger pl-3">', '</small>');?>
                  </div>
                  <!-- / Username -->

                  <!-- Password -->
                  <div class="form-group">
                    <label for="addPenggunaPasswordSiswa" class="col-form-label">Password</label>
                    <input type="text" name="passwordSiswa" class="form-control" id="addPenggunaPasswordSiswa" placeholder="Password" value="<?= set_value('password')?>" />
                    <?= form_error('passwordSiswa', '<small class="text-danger pl-3">', '</small>');?>
                  </div>
                </div>
                <!-- end -->

                <div class="form-group text-right">
                  <a class="btn btn-danger btn-sm" href="<?= base_url('admin/pengaturanPenggunaAdd');?>"><i class="fa fa-undo"></i>&ensp;Reset</a>
                  <button type="submit" class="btn btn-primary btn-sm ">Submit &ensp;<i class="fas fa-arrow-right"></i></button>
                </div> 

              </form>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>

        


        <div class="col-sm-4">

          <!-- Default box -->
          <div class="card card-outline card-info">
            <div class="card-header">
              <h4 class="card-title " text-align="center"><strong>List Level</strong></h4>
              
            </div>
            <div class="card-body">
              <ol>
                <li><b>Admin</b></li>
                <p>Untuk Level Admin Bisa Memasukkan Username Yang Diingkan</p>
                <li><b>Guru</b></li>
                <p>Untuk Level Guru Silahkan Mencari berdasarkan NIK<br> <b>Contoh</b> guru12345</p>
                <li><b>Guru BK</b></li>
                <p>Untuk Level Guru BK Silahkan Mencari berdasarkan NIK<br> <b>Contoh</b> guruBK12345</p>
                <li><b>Wali</b></li>
                <p>Untuk Level Wali Silahkan Mencari berdasarkan NISN Siswa<br> <b>Contoh</b> wali12345</p>
                <li><b>Siswa</b></li>
                <p>Untuk Level Siswa Silahkan Mencari berdasarkan NISN Siswa<br> <b>Contoh</b> siswa12345</p>
              </ol>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

        </div>

      </div>


    </div>
    <!-- /.Container Fluid -->
  </section>
  <!-- /.content -->

</div>
</div>