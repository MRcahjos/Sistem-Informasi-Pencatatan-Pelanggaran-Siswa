
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
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nisn</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Nisn</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    
                    <?php $i = 1; ?>
                    <?php foreach ($Kelas as $k) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $k['nisn']; ?></td>
                            <td><?= $k['nama']; ?></td>
                            <td><?= $k['nama_kls']; ?></td>
                            
                            <td>
                                <a href="<?php echo base_url('guru/SiswaDetail/' . $this->encrypt->encode($k['id'])); ?>" class="badge badge-pill badge-info ">Detail</a>
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



