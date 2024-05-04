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
                  <a class="btn btn-secondary btn-sm float-right" href="<?php echo base_url('admin/pengguna');?>">
                    <i class="fas fa-arrow-left"></i>&ensp;Back
                  </a>
                </div>
                <div class="card-body">

                <form action="<?= base_url('admin/pengguna_edit')?>" method="post">

                    <input type="hidden" name="z" value="<?= $oneUsers->id ;?>">

                    <!-- Fullname -->
                    <div class="form-group">
                      <label for="editPenggunaFullname" class="col-form-label">Fullname</label>
                      <input type="text" name="fullname" class="form-control" id="editPenggunaFullname" placeholder="Fullname" value="<?= $oneUsers->name?>" />
                      <?= form_error('fullname', '<small class="text-danger pl-3">', '</small>');?>
                    </div>
                    <!-- / Fullname -->
                                        
                    <!-- Username -->
                    <div class="form-group">
                      <label for="editPenggunaUsername" class="col-form-label">Username</label>
                      <input type="text" name="username" class="form-control" id="editPenggunaUsername" placeholder="Username" value="<?= $oneUsers->username?>" />
                      <?= form_error('username', '<small class="text-danger pl-3">', '</small>');?>
                    </div>
                    <!-- / Username -->

                                        <!-- Password -->
                      <div class="form-group">
                          <label for="editPenggunaPassword" class="col-form-label">Password</label>
                          <input type="password" name="password" class="form-control" id="editPenggunaPassword" placeholder="Password" <?= empty(set_value('password')) ? '' : 'value="'.set_value('password').'"' ?> />
                          <p class="text-danger">*Catatan: Kosongkan jika tidak diubah</p>
                          <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                      </div>
                      <!-- / Password -->



                    <!-- Level -->
                    <div class="form-group">
                      <label for="detailPenggunaLevel" class="col-form-label">Level</label>
                      <select class="form-control select2" name="level" id="addPenggunaLevel" style="width: 100%;">

                        <?php 
                        if($oneUsers->level == 'Admin'){
                          $output ='
                          <option value="Admin" selected>Admin</option>
                          <option value="Guru">Guru</option>
                          <option value="Wali">Wali</option>
                          <option value="Siswa">Siswa</option>
                          ';
                        }elseif($oneUsers->level == 'Guru'){
                          $output .='
                          <option value="Admin">Admin</option>
                          <option value="Guru" selected>Guru</option>
                          <option value="Wali">Wali</option>
                          <option value="Siswa">Siswa</option>
                          ';
                        }elseif($oneUsers->level == 'GuruBk'){
                          $output .='
                          <option value="Admin">Admin</option>
                          <option value="Guru" >Guru</option>
                          <option value="GuruBk" selected>GuruBk</option>
                          <option value="Wali">Wali</option>
                          <option value="Siswa">Siswa</option>
                          ';
                        }elseif($oneUsers->level == 'Wali'){
                          $output .='
                          <option value="Admin">Admin</option>
                          <option value="Guru">Guru</option>
                          <option value="Wali" selected>Wali</option>
                          <option value="Siswa">Siswa</option>
                          ';
                        }elseif($oneUsers->level == 'Siswa'){
                          $output .='
                          <option value="Admin">Admin</option>
                          <option value="Guru">Guru</option>
                          <option value="Wali">Wali</option>
                          <option value="Siswa" selected>Siswa</option>
                          ';
                        };
                        echo $output;
                        ;?>
                      </select>
                      <?= form_error('level', '<small class="text-danger pl-3">', '</small>');?>
                    </div>
                    <!-- / Level -->

                    <div class="form-group text-right">
                      <button type="submit" class="btn btn-warning btn-sm" ><i class="fa fa-edit"></i>&ensp;Edit</button>
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