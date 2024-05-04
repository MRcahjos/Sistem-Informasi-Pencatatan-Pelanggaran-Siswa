
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

        <a class="btn btn-primary mb-3-outline-info float-right" href="#" data-toggle="modal" data-target="#newMenuModal">
                <i class="fas fa-plus"></i> Tambahkan Data Kategori Pelanggaran
              </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Pelanggaran</th>
                        <th>Point Yang di dapatkan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Nama Pelanggaran</th>
                        <th>Point Yang di dapatkan</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    
                    <?php $i = 1; ?>
                    <?php foreach ($ketegori as $k) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $k['pelanggaran']; ?></td>
                            <td><?= $k['point']; ?></td>
                            <td>
                            <a href="" class="badge badge-pill badge-success " data-toggle="modal" data-target="#edit<?= $k['id']; ?>">edit</a>
                            <a href="<?= base_url(); ?>kategori/delete_kategori/<?= $k['id'] ?>" class="badge badge-pill badge-danger Tombol-Hapus">delete</a>
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

<!-- Modal -->
<div class="modal fade" id="newMenuModal" tabindex="-1" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuModalLabel">ADD </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('kategori'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="pelanggaran" name="pelanggaran" placeholder="Nama Pelanggaran">
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="point" name="point" placeholder="Point Pelanggaran">
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">ADD</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php foreach ($ketegori as $k) :  ?>
<div class="modal fade" id="edit<?= $k['id']; ?>" tabindex="-1" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuModalLabel">Update Kategori </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('kategori/edit_kategori'); ?>" method="post">
                <div class="modal-body">
                <input type="hidden" name="id" value="<?= $k['id'] ?>">
                    <div class="form-group">
                        <input type="text" class="form-control" id="pelanggaran" name="pelanggaran" placeholder="Nama Pelanggaran" value="<?= $k['pelanggaran'] ?>">
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="point" name="point" placeholder="Point Pelanggaran" value="<?= $k['point'] ?>">
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; ?>


</div>
