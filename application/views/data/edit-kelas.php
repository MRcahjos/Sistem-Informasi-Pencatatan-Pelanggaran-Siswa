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
                  <a class="btn btn-secondary btn-sm float-right" href="<?php echo base_url('data/kelas');?>">
                    <i class="fas fa-arrow-left"></i>&ensp;Back
                  </a>
                </div>
                <div class="card-body">

                <form action="<?= base_url('data/KelasEdit/')?>" method="post">
                    
                    <input type="hidden" name="z" value="<?= $oneKelas->id ;?>">
                    <!-- form-group -->
                    <div class="form-group">
                      <label for="addKelasKelas">Kelas</label>
                      <select id="kelas" name="kelas" class="form-control select2" style="width: 100%;">
                        <?php if($oneKelas->kelas == 'XII') {
                          $output .= '
                          <option value="I">Pilih Kategori Kelas</option>
                          <option value="X">X</option>
                          <option value="XI">XI</option>
                          <option value="XII" selected>XII</option>
                          ';
                        }elseif($oneKelas->kelas == 'XI'){
                          $output .= '
                          <option value="I">Pilih Kategori Kelas</option>
                          <option value="X">X</option>
                          <option value="XI" selected>XI</option>
                          <option value="XII">XII</option>
                          ';
                        }else{
                          $output .= '
                          <option value="I">Pilih Kategori Kelas</option>
                          <option value="X"  selected>X</option>
                          <option value="XI">XI</option>
                          <option value="XII">XII</option>
                          ';
                        }
                        echo $output;
                        ?>
                      </select>
                      <?= form_error('kelas', '<small class="text-danger pl-3">', '</small>');?>
                    </div>
                    <!-- /.form-group -->

                    <!-- form-group -->
                    <div class="form-group">
                      <label for="addKelasNama">Nama Kelas</label>
                      <input name="nama" id="addKelasNama" type="text" placeholder="Contoh Nama Kelas : XII-RPL-1" class="form-control" value="<?= $oneKelas->nama_kls ;?>" >
                      <?= form_error('nama', '<small class="text-danger pl-3">', '</small>');?>
                    </div>
                    <!-- /.form-group -->
                    
                    <!-- form-group -->
                    <div class="form-group">
                      <label for="addKelasMurid">Jumlah Murid</label>
                      <input name="jumlah" id="addKelasMurid" type="text" placeholder="Jumlah Murid" class="form-control" value="<?= $oneKelas->jumlah ;?>">
                      <?= form_error('jumlah', '<small class="text-danger pl-3">', '</small>');?>
                    </div>
                    <!-- /.form-group -->

                    <!-- form-group -->
                    <div class="form-group">
                      <label for="addKelasWali">Wali Kelas</label>
                      <select class="form-control select2" id="addKelasWali" name="wali">
                        <?php foreach ($guruAll as $guru) {
                          if($oneKelas->nama_wali == $guru->guru){
                            echo '<option value="'.$guru->guru.'" selected>'.$guru->guru.'</option>';
                          }else{
                            echo '<option value="'.$guru->guru.'">'.$guru->guru.'</option>';
                            echo '<option value="'.$guru->guru.'">'.$guru->guru.'</option>';
                          }
                        } 
                        ;?>
                      </select>
                      <?= form_error('wali', '<small class="text-danger pl-3">', '</small>');?>
                    </div>
                    <!-- /.form-group -->


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
