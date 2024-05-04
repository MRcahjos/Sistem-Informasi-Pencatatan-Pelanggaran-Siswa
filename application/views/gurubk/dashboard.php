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
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-12">
              
            </div>

            <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Jumlah Siswa</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $ttlSiswa ;?></div>
                                        </div>
                                        <div class="col-auto">
                                        <i class="fa fa-user fa-2x text-gray-300"></i>
                                        </div>           
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Tipe Pelanggaran</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $ttlTipePelanggaran?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="far fa-list-alt fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                            Jumlah Pelanggaran</div>
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $ttlPelanggaran?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


        
          <!-- /.row -->
          <!-- Main row -->
          <div class="row">
          <!-- <div class="from-grub"> -->
            <!-- Left col -->
            <section class="col-lg-6 connectedSortable">
              <!-- Custom tabs (Charts with tabs)-->
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title h5">
                    <i class="far fa-list-alt"></i>
                    Top Pelanggaran
                  </h5>
                </div><!-- /.card-header -->
                <div class="card-body table-responsive">
                  <table id="terbanyak" class="table table-bordered table-striped display nowrap" style="width:100%">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Pelanggaran</th>
                        <th scope="col">Total Pelanggaran</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i=0; foreach($pelanggaran as $terbanyak) :  $i++;?>
                      <tr>
                        <td><?= $i ;?></td>
                        <td><?= $terbanyak->pelanggaran ;?></td>
                        <td><?= $terbanyak->total_pelanggaran ;?></td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
                </div>
              </div>
              </section>
            <!-- /.card-body -->
          
                        <section class="col-lg-6 connectedSortable">

                        <!-- Custom tabs (Charts with tabs)-->
                                <div class="card">
                          <div class="card-header">
                            <h3 class="card-title">
                              <i class="far fa-list-alt"></i>
                              Top Siswa
                            </h3>
                            
                          </div><!-- /.card-header -->
                          <div class="card-body table-responsive">
                            <table id="terakhir" class="table table-bordered table-striped display nowrap" style="width:100%">
                              <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Nama Siswa</th>
                                  <th scope="col">Jumlah</th>
                                  <!-- <th scope="col" class="text-center">Action</th> -->
                                </tr>
                                <tbody>
                                            <?php $i=0; foreach($murid as $terakhir) :  $i++;?>
                                            <tr>
                                              <td><?= $i ;?></td>
                                              <td><?= $terakhir->nama ;?></td>
                                              <td><?= $terakhir->total_poin ;?> Point Dari <?= $terakhir->total_pelanggaran ;?> Pelanggaran</td>
                                              <!-- <td class="text-center"> -->
                                             
                                              </td>
                                            </tr>
                                          <?php endforeach; ?>
                                        </tbody>
                                      </table>
                                  <!-- /.card -->
                                </div>
        <!-- /.Container Fluid -->
      </section>
      <!-- /.content -->
</div>
    </div>
    </div>
    </div>
    </div>
    
