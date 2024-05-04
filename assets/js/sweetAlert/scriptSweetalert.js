// Sweet Alert
const flashData = $('.flash-data').data('flashdata');
 
if (flashData) {
   Swal.fire({
        icon: 'success',
        title: 'Sukses',
        text:  flashData,
        confirmButtonText: 'OK'
    });
}
 
// Sweet Alert
const flashGagal = $('.flash-data-gagal').data('flashdata');
 
if (flashGagal) {
   Swal.fire({
        icon: 'error',
        title: 'Gagal',
        text: 'Data Gagal ' + flashGagal,
        confirmButtonText: 'OK'
    });
}
 

$('.Tombol-Hapus').on('click', function(e) {

    e.preventDefault();
    const href = $(this).attr('href')

    Swal.fire({
        title: 'Apakah Anda Yakin?',
        text: "Data Akan Dihapus!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus Data!'
      }).then((result) => {
        if (result.isConfirmed) {
         document.location.href = href;
        }
      })

})






