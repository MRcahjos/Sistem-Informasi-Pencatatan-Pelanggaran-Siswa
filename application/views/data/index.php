
<!-- Begin Page Content -->
    <div class="container-fluid">

            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash');?>"></div>

                <?php if ($this->session->flashdata('flash')) : ?>

                     <?php endif; ?>

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
           
        <a class="btn btn-primary mb-3-outline-info float-right" href="<?= base_url('data/addGuru/')?>">
                <i class="fas fa-plus"></i> Tambahkan Data Guru
              </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                    <th>#</th>
                        <th>Nik</th>
                        <th>Nama Guru</th>
                        <th>Mata Pelajaran</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Nik</th>
                        <th>Nama Guru</th>
                        <th>Mata Pelajaran</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    
                    <?php $i = 1; ?>
                    <?php foreach ($guru as $g) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $g['nik']; ?></td>
                            <td><?= $g['guru']; ?></td>
                            <td><?= $g['plajaran']; ?></td>
                            <td>
                            <a href="<?php echo base_url('data/edit_guru/'. $this->encrypt->encode($g['id'])); ?>" class="badge badge-pill badge-success ">edit</a>
                            <a href="<?php echo base_url(); ?>data/delete_guru/<?= $g['id'] ?>" class="badge badge-pill badge-danger Tombol-Hapus">delete</a>
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
