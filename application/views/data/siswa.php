
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

        <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
              <?= $this->session->flashdata('message');  ?>
              <!--/. Col -->

        <a class="btn btn-primary mb-3-outline-info float-right my-3" href="<?= base_url('data/addSiswa/')?>">
                <i class="fas fa-plus"></i> Tambahkan Data Siswa
              </a>
              <button style="" class="btn btn-danger mr-3 my-3 delete_all float-right " data-url="deleteAll/">Hapus Semua Yang Dipilih</button>
              <button style="" class="btn btn-info mr-3 my-3 update_all float-right  " data-url="updateAllkelas/">Updete Semua Yang Dipilih</button>

         

              <form action="<?= base_url('data/import_excel/')?>" method="post" enctype="multipart/form-data" >

              <div class="col-md-2 mr-3 my-3 float-right ">

                <select name="kelas_id" class="custom-select naik_kelas select2" style="width: 100%;" >
                <option selected>Pilih Kelas</option>
                <?php foreach ($Kelas as $k) : ?>
                <option value="<?= $k['id'] ?>"><?= $k['nama_kls'] ?></option>
                <?php endforeach ?>
                </select>
                </div>

                <div class="input-group mt-3">
                <div class="input-group-prepend">
                <button class="btn btn-success" type="submit" id="inputGroupFileAddon03">Submit</button>
                </div>
                <div class="custom-file">
                <input type="file" class="custom-file-input" name="fileExcel" id="fileExcel" aria-describedby="inputGroupFileAddon03">
                <label class="custom-file-label" for="fileExcel">Pilih file Excel</label>
                </div>
                </div>

                </form>
                            
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="master_chck"></th>
                        <th>#</th>
                        <th>Nisn</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>                   
                    <?php $i = 1; ?>
                    <?php foreach ($Siswa as $S) : ?>
                        <tr>
                        <td><input type="checkbox" class="sub_chk" data-id="<?php echo $S['id']; ?>"></td>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $S['nisn']; ?></td>
                            <td><?= $S['nama']; ?></td>
                            <td><?= $S['nama_kls']; ?></td>                            
                            <td>
                                <a href="<?= base_url('data/SiswaEdit/' .$this->encrypt->encode($S['id'])); ?>" class="badge badge-pill badge-success ">edit</a>
                                <a href="<?php echo base_url(); ?>data/delete_siswa/<?= $S['id'] ?>" class="badge badge-pill badge-danger Tombol-Hapus">delete</a>
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




