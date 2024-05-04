
<div class="container-fluid">
      <!-- Content Header (Page header) -->
      <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash');?>"></div>

            <?php if ($this->session->flashdata('flash')) : ?>

                <?php endif; ?>
     
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark"><?= $title ;?></h1>
              </div>
            </div>
        </div>
      </div>
   


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
        <a class="btn btn-primary mb-3-outline-info float-right" href="<?= base_url('admin/penggunaAdd/')?>">
                <i class="fas fa-plus"></i> Tambahkan Data Pengguna
              </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Level</th>
                        <!-- <th>activr</th> -->
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                    <th>#</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Level</th>
                        <!-- <th>Active</th> -->
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    
                    <?php $i = 1; ?>
                    <?php foreach ($pengguna as $u) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $u['name']; ?></td>
                            <td><?= $u['username']; ?></td>
                            <td><?= $u['level']; ?></td>
                            <!-- <td><?= $u['is_active']; ?></td> -->
                           
                            
                            <td>
                                <a href="<?php echo base_url('admin/pengguna_edit/' . $this->encrypt->encode($u['id'])); ?>" class="badge badge-pill badge-success ">edit</a>
                                <a href="<?= base_url(); ?>admin/PenggunaDelete/<?= $u['id'] ?>" class="badge badge-pill badge-danger Tombol-Hapus">delete</a>
                            </td>

                        </tr>
                        <?php $i++; ?>
                    <?php endforeach ?>
                    </tr>
                                    </tbody>
            </table>
        </div>
    </div>
</div>

</div>
</div>


