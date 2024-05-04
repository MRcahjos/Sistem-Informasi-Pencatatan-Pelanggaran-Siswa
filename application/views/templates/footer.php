            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Muhammad Iqbal <?= date('Y'); ?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

            </div>
            <!-- End of Page Wrapper -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"></span>
                            </button>
                        </div>
                        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bootstrap core JavaScript-->
            
            <script src="<?= base_url('assets'); ?>/vendor/jquery/jquery.min.js"></script>
            <script src="<?= base_url('assets'); ?>/vendor/jquery/jquery-ui.js"></script>
            <!-- <script src="<?= base_url('assets'); ?>/vendor/jquery/jquery-3.3.1.js"></script> -->
            <script src="<?= base_url('assets'); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="<?= base_url('assets'); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Custom scripts for all pages-->
            <script src="<?= base_url('assets'); ?>/js/sb-admin-2.min.js"></script>
            <script src="<?= base_url(); ?>assets/js/sweetAlert/sweetalert2.all.min.js"></script>
            <script src="<?= base_url(); ?>assets/js/sweetAlert/scriptSweetalert.js"></script>
          
            <script src="<?= base_url('assets/'); ?>vendor/moment/moment.min.js"></script>
            <script src="<?= base_url('assets/'); ?>vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
            <script src="<?= base_url('assets/'); ?>vendor/daterangepicker/daterangepicker.js"></script>
           

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

           
            <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
            <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
            <script  src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>       
            <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

            <!-- Select2 -->
            <script src="<?= base_url('assets/');?>select2/js/select2.full.min.js"></script>

            <script type="text/javascript">

            // select 2
            $(document).ready(function() {
            $('.select2').select2();
           });

            // preview image
      function previewImage() {
      const image = document.querySelector('#image');
      const imgPreview = document.querySelector('.img-preview');

      imgPreview.style.display = 'block';

      const oFReader = new FileReader();
      oFReader.readAsDataURL(image.files[0]);

      oFReader.onload = function(oFREvent){
      imgPreview.src = oFREvent.target.result;
      }
    } 

      // Chekbox selected
    $('#master_chck').on('click', function(e) {
         if($(this).is(':checked',true))  
         {
            $(".sub_chk").prop('checked', true);  
         } else {  
            $(".sub_chk").prop('checked',false);  
         }  
        });
 
        $('.delete_all').on('click', function(e) {
            var allVals = [];  
            $(".sub_chk:checked").each(function() {  
                allVals.push($(this).attr('data-id'));
            });  
            if(allVals.length <=0)  
            {  
              Swal.fire('Pilih Row Terlebih Dahulu')  
            }  else {  
                  Swal.fire({
                  title: 'Are you sure?',
                  text: "You won't be able to revert this!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                  if (result.isConfirmed) {
                    var join_selected_values = allVals.join(","); 
                    $.ajax({
                        url: $(this).data('url'),
                        type: 'POST',
                        data: 'ids='+join_selected_values,
                        success: function (data) {
                          console.log(data);
                          $(".sub_chk:checked").each(function() {  
                              $(this).parents("tr").remove();
                          });
                          Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                          )
                        },
                        error: function (data) {
                            alert(data.responseText);
                        }
                    });
                    $.each(allVals, function( index, value ) {
                      $('table tr').filter("[data-row-id='" + value + "']").remove();
                  });
                  
            }  
        });
                  }
                })
  
            // end Chekbox deleted
        
        $('.update_all').on('click', function(e) {
        var allVals = [];  
        $(".sub_chk:checked").each(function() {  
            allVals.push($(this).attr('data-id'));
        });  

        if(allVals.length <=0)  
        {  
          Swal.fire('Pilih Row Terlebih Dahulu')  
        }  else {  
                 Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, update it!'
                        }).then((result) => {
                        if (result.isConfirmed) {
                        var join_selected_values = allVals.join(","); 
                        var kelas_id = $('.naik_kelas').val();
                $.ajax({
                    url: $(this).data('url'),
                    type: 'POST',
                    data: 'ids='+join_selected_values+'&kelas_id='+kelas_id,
                    success: function (data) {
                      console.log(data);
                      $(".sub_chk:checked").each(function() {  
                          $(this).parents("tr").remove();
                      });
                      Swal.fire(
                        'Update!',
                        'Update Success.',
                        'success'
                      )
                    },
                    error: function (data) {
                        alert(data.responseText);
                    }
                });

              $.each(allVals, function( index, value ) {
                  $('table tr').filter("[data-row-id='" + value + "']").remove();
              });
                    }
                    })
        }  
        });

            
                $('.custom-file-input').on('change', function() {
                    let fileName = $(this).val().split('\\').pop();
                    $(this).next('.custom-file-label').addClass("selected").html(fileName);
                });
                $('.form-check-input').on('click', function() {
                    const menuId = $(this).data('menu');
                    const roleId = $(this).data('role');

                    $.ajax({
                        url: "<?= base_url('admin/changeaccess') ?>",
                        type: 'post',
                        data: {
                            menuId: menuId,
                            roleId: roleId
                        },
                        success: function() {
                            document.location.href = "<?= base_url('admin/roleaccess/') ?>" + roleId;
                        }
                    })
                });


                $(document).ready(function() {
    $('#dataTable').DataTable();
} );

var terbanyak = $('#terbanyak').DataTable( {
        rowReorder: {
          selector: 'td:nth-child(2)'
        },
        responsive: true,
        paging: false,
        lengthChange: false,
        searching: false,
        ordering: true,
        info: false,
        autoWidth: false,
      });

      var terakhir = $('#terakhir').DataTable( {
        rowReorder: {
          selector: 'td:nth-child(2)'
        },
        responsive: true,
        paging: false,
        lengthChange: false,
        searching: false,
        ordering: true,
        info: false,
        autoWidth: false,
      });
        
       /*-- Ajax Select Nama Kelas  --*/
       $('#kelas').change(function(){
        var kelas = $('#kelas').val();
        if(kelas != ''){
          $.ajax({
            url: "<?= base_url('ajax/fetch_subNamakelas') ?>",
            method:"POST",
            data:{kelas:kelas},
            success:function(data){
              $('#namaKelas').html(data);

              if(kelas == 'I'){
                $('#namaSiswa').html('<option value="" selected="selected">Pilih Kategori Kelas Terlebih Dahulu</option>');
              }else{
                $('#namaSiswa').html('<option value="" selected="selected">Pilih Nama Kelas Terlebih Dahulu</option>');
              }
            }
          })
        }
      });

      
      /*-- Ajax Select Nama Siswa  --*/
      $('#namaKelas').change(function(){
        var namaKelas = $('#namaKelas').val();
        if(namaKelas != ''){
          $.ajax({
            url: "<?= base_url('ajax/fetch_subNamaSiswa') ?>",
            method:"POST",
            data:{namaKelas:namaKelas},
            success:function(data){
              $('#namaSiswa').html(data);
            }
          })
        }
      });



      /*-- Ajax Select Nama Kelas  --*/
      $('#addkelas').change(function(){
        var kelas = $('#addkelas').val();
        if(kelas != ''){
          $.ajax({
            url:"<?= base_url('ajax/fetch_subNamakelas') ?>",
            method:"POST",
            data:{kelas:kelas},
            success:function(data){
              $('#addnamaKelas').html(data)

            }
          })
        }
      });

        /*-- Ajax Select Tipe Pencarian Laporan  --*/
      $('#tipePencarian').change(function(){
        var pencarian = $('#tipePencarian').val();
        if(pencarian == 'siswa'){

          $("#pencarianKelas").css("display", "none");
          $("#pencarianSiswa").css("display", "block");

        }else if(pencarian == 'kelas'){

          $("#pencarianSiswa").css("display", "none")
          $("#pencarianKelas").css("display", "block");

        }else if(pencarian == ''){

          $("#pencarianKelas").css("display", "none");
          $("#pencarianSiswa").css("display", "none");

        }
      });

   
     //Date range picker
     $('#reservation').daterangepicker({
      singleDatePicker : true,
      showDropdowns : true,
      timePicker : true,
      timePicker24Hour: true,
      timePickerSeconds: true,
      // startDate: "2020-01-01 12:00:00",
      startDate : moment().startOf('hour:minute:second'),
      locale: {
        format: 'YYYY-MM-DD HH:mm:ss'
      }
    });

     $('#akhir').daterangepicker({
      singleDatePicker : true,
      showDropdowns : true,
      timePicker : true,
      timePicker24Hour: true,
      timePickerSeconds: true,
      startDate : moment().startOf('hour:minute:second'),
      locale: {
        format: 'YYYY-MM-DD HH:mm:ss'
      }
    });


    $(function () {

'use strict'

/*-- Make the dashboard widgets sortable Using jquery UI --*/
$('.connectedSortable').sortable({
  placeholder         : 'sort-highlight',
  connectWith         : '.connectedSortable',
  handle              : '.card-header, .nav-tabs',
  forcePlaceholderSize: true,
  zIndex              : 999999
});


// });
  /*-- Ajax Select Level  --*/
  $('#addPenggunaLevel').change(function(){
    var penggunaLevel = $('#addPenggunaLevel').val();
    if(penggunaLevel == 'Admin'){

      $("#addPenggunaAdmin").css("display", "block");
      $("#addPenggunaGuru").css("display", "none");
      $("#addPenggunaGuruBk").css("display", "none");
      $("#addPenggunaWali").css("display", "none");
      $("#addPenggunaSiswa").css("display", "none");

    }else if(penggunaLevel == 'Guru'){

      $("#addPenggunaAdmin").css("display", "none");
      $("#addPenggunaGuru").css("display", "block");
      $("#addPenggunaGuruBk").css("display", "none");
      $("#addPenggunaWali").css("display", "none");
      $("#addPenggunaSiswa").css("display", "none");

    }else if(penggunaLevel == 'GuruBk'){

    $("#addPenggunaAdmin").css("display", "none");
    $("#addPenggunaGuru").css("display", "none");
    $("#addPenggunaGuruBk").css("display", "block");
    $("#addPenggunaWali").css("display", "none");
    $("#addPenggunaSiswa").css("display", "none");


    }else if(penggunaLevel == 'Wali'){

      $("#addPenggunaAdmin").css("display", "none");
      $("#addPenggunaGuru").css("display", "none");
      $("#addPenggunaGuruBk").css("display", "none");
      $("#addPenggunaWali").css("display", "block");
      $("#addPenggunaSiswa").css("display", "none");

    }else if(penggunaLevel == 'Siswa'){

      $("#addPenggunaAdmin").css("display", "none");
      $("#addPenggunaGuru").css("display", "none");
      $("#addPenggunaGuruBk").css("display", "none");
      $("#addPenggunaWali").css("display", "none");
      $("#addPenggunaSiswa").css("display", "block");

    }
  });

/*-- Ajax Select Nama Guru  --*/
$('#addNIKGuru').change(function(){
    var idGuru = $('#addNIKGuru').val();
    if(idGuru != ''){
      $.ajax({
        url:"<?= base_url('ajax/fetch_nikGuru') ?>",
        method:"POST",
        dataType:'json',
        data:{idGuru:idGuru},
        success:function(data){
          $('#addPenggunaFullnameGuru').val(data.nama);
          $('#addPenggunaUsernameGuru').val(data.nik);
        }
      })
    }
  });

  /*-- Ajax Select Nama GuruBK  --*/
$('#addNIKGuruBk').change(function(){
    var idGuru = $('#addNIKGuruBk').val();
    if(idGuru != ''){
      $.ajax({
        url:"<?= base_url('ajax/fetch_nikGuruBk') ?>",
        method:"POST",
        dataType:'json',
        data:{idGuru:idGuru},
        success:function(data){
          $('#addPenggunaFullnameGuruBk').val(data.nama);
          $('#addPenggunaUsernameGuruBk').val(data.nik);
        }
      })
    }
  });

  /*-- Ajax Select Nama Wali  --*/
  $('#addNISNWali').change(function(){
    var nisnWali = $('#addNISNWali').val();
    if(nisnWali != ''){
      $.ajax({
        url:"<?= base_url('ajax/fetch_nisnWali') ?>",
        method:"POST",
        dataType:'json',
        data:{nisnWali:nisnWali},
        success:function(data){
          $('#addPenggunaFullnameWali').val(data.nama);
          $('#addPenggunaUsernameWali').val(data.nisn);
        }
      })
    }
  });

  /*-- Ajax Select Nama Kelas  --*/
  $('#addNISNSiswa').change(function(){
    var nisnSiswa = $('#addNISNSiswa').val();
    if(nisnSiswa != ''){
      $.ajax({
        url:"<?= base_url('ajax/fetch_nisnSiswa') ?>",
        method:"POST",
        dataType:'json',
        data:{nisnSiswa:nisnSiswa},
        success:function(data){
          $('#addPenggunaFullnameSiswa').val(data.nama);
          $('#addPenggunaUsernameSiswa').val(data.nisn);
        }
      })
    }
  });
                    // autocomplete cari nisn siswa
                 $('#addNISNSiswa').autocomplete({
                     source: "<?= base_url('ajax/fetch_search_nisn')?>",
                     select: function(event, ui) {
                         $('[name="nisn"]').val(ui.item.label);
                         $('[name="fullnameSiswa"]').val(ui.item.fullnameSiswa); 
                         $('[name="usernameSiswa"]').val(ui.item.usernameSiswa); 
                     }
                 });

                 // autocomplete cari wali dari nisn siswa
                 $('#addNISNWali').autocomplete({
                     source: "<?= base_url('ajax/fetch_search_nisn_Wali')?>",
                     select: function(event, ui) {
                         $('[name="nisn"]').val(ui.item.label);
                         $('[name="fullnameWali"]').val(ui.item.fullnameWali); 
                         $('[name="usernameWali"]').val(ui.item.usernameWali); 
                     }
                 });

                 // autocomplete cari nik guru
                 $('#addNIKGuru').autocomplete({
                     source: "<?= base_url('ajax/fetch_nik')?>",
                     select: function(event, ui) {
                         $('[name="nik"]').val(ui.item.label);
                         $('[name="addNIKGuru"]').val(ui.item.addNIKGuru); 
                         $('[name="fullnameGuru"]').val(ui.item.fullnameGuru); 
                         $('[name="usernameGuru"]').val(ui.item.usernameGuru); 
                     }
                 });

                 // autocomplete cari nik guru bk
                 $('#addNIKGuruBk').autocomplete({
                     source: "<?= base_url('ajax/fetch_nik_bk')?>",
                     select: function(event, ui) {
                         $('[name="nik"]').val(ui.item.label);
                         $('[name="addNIKGuruBk"]').val(ui.item.addNIKGuruBk); 
                         $('[name="fullnameGuruBk"]').val(ui.item.fullnameGuruBk); 
                         $('[name="usernameGuruBk"]').val(ui.item.usernameGuruBk); 
                     }
                 });

                 // autocomplete cari laporan
                 $('#laporan').autocomplete({
                     source: "<?= base_url('ajax/fetch_laporan')?>",
                     select: function(event, ui) {
                         $('[name="nisn"]').val(ui.item.label);
                         $('[name="siswa"]').val(ui.item.siswa);
                     }
                 });

      $('#nisn').autocomplete({
          source: function(request, response) {
              $.ajax({
                  url: "<?= base_url('ajax/get_data')?>",
                  dataType: "json",
                  data: {
                      term: request.term
                  },
                  success: function(data) {
                      response(data);
                  }
              });
          },
              select: function(event, ui) {
                  $('[name="nisn"]').val(ui.item.label);
                  $('[name="namaSiswa"]').val(ui.item.namaSiswa); 
                  $('[name="kelas"]').val(ui.item.kelas); 
                  $('[name="namaKelas"]').val(ui.item.namaKelas); 
                  $('[name="nama_mhs"]').val(ui.item.nama_mhs); 
                  $('[name="nama_kls"]').val(ui.item.nama_kls); 
              }
          });

          });
            </script>



            </body>

            </html>