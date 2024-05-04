
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

       
        <a class="btn btn-primary mb-3-outline-info float-right" href="<?= base_url('data/addKelas/')?>">
                <i class="fas fa-plus"></i> Tambahkan Data Kelas
              </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kelas</th>
                        <th>Nama Kelas</th>
                        <th>Jumlah Murid</th>
                        <th>Wali Kelas</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Kelas</th>
                        <th>Nama Kelas</th>
                        <th>Jumlah Murid</th>
                        <th>Wali Kelas</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    
                    <?php $i = 1; ?>
                    <?php foreach ($data as $d) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $d['kelas']; ?></td>
                            <td><?= $d['nama_kls']; ?></td>
                            <td><?= $d['jumlah']; ?></td>
                            <td><?= $d['nama_wali']; ?></td>
                            <td>
                                <a href="<?php echo base_url('data/KelasEdit/' . $this->encrypt->encode($d['id'])); ?>" class="badge badge-pill badge-success ">edit</a>
                                <a href="<?php echo base_url(); ?>data/delete_kelas/<?= $d['id'] ?>" class="badge badge-pill badge-danger Tombol-Hapus">delete</a>
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



