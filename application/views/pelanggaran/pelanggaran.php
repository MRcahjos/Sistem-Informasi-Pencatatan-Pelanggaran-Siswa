
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

        <a class="btn btn-primary mb-3-outline-info float-right" href="<?= base_url('pelanggaran/PelanggaranAdd/')?>">
                <i class="fas fa-plus"></i> Tambahkan Data List Pelanggaran
              </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">NISN</th>
                    <th scope="col">Nama Siswa</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Note</th>
                    <th scope="col">Pelapor</th>
                    <th scope="col" >Action</th>
                    </tr>
                </thead>

                <?php $i = 1; ?>
                    <?php foreach ($pelanggaran as $p):?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $p['nisn']; ?></td>                            
                            <td><?= $p['nama']; ?></td>
                            <td><?= $p['nama_kls']; ?></td>
                            <td><?= $p['catatan']; ?></td>
                            <td><?= $p['pelapor']; ?></td>
                            <td>
                            <a href="<?= base_url('pelanggaran/edit/' . $this->encrypt->encode($p['pelanggaran_id'])); ?> " class="badge badge-pill badge-success ">edit</a>
                            <a href="<?= base_url('pelanggaran/detail/' .$this->encrypt->encode($p['pelanggaran_id']). '' ); ?> " class="badge badge-pill badge-info ">Detail</a>
                            <a href="<?php echo base_url(); ?>pelanggaran/ListPelanggaranDelete/<?= $p['pelanggaran_id'] ?>" class="badge badge-pill badge-danger Tombol-Hapus">delete</a>
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



