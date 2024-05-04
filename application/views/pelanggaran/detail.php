<div class="container-fluid">
  <div class="row">
    <div class="div col-sm-5">
      <a class="btn btn-secondary btn-sm center mb-3 " href="<?php echo base_url('pelanggaran/pelanggaran');?>">
                    <i class="fas fa-arrow-left"></i>&ensp;Back
       </a>
      <div class="card col-11" style="width: 35rem;">
        <img src="<?= base_url('assets/upload/images/') . $onepel->image; ?>" class="card-img-top" alt="...">
        <div class="card-body">
        </div>
      </div>
    </div>
    <div class="div col-sm-4">
           <div class="card card-outline card-info">
        <div class="card-header">
             <h4 class="card-title " text-align="center"><strong>Detail List Pelanggaran</strong></h4>
        </div>
          <div class="card-body">
          <ol>
                <b>Nisn : <?= $onepel->nisn ;?></b>
                <p></p>
                <b>Nama Siswa : <?= $onepel->nama ;?></b>
                <p></p>
                <b>Kelas : <?= $onepel->nama_kls ;?></b>
                <p></p>
                <b>Pelanggaran Yang Dilakukan : <?= $onepel->pelanggaran ;?></b>
                <p></p>
                <b>Catatan Pelanggaran : <?= $onepel->catatan ;?></b>
                <p></p>
                <b>Dilaporkan Pada : <?= date('d F Y', strtotime($onepel->reported_on)); ?></b>
                <p></p>
              </ol>
  </div>
    </div>
</div>
  </div>
</div>
</div>



