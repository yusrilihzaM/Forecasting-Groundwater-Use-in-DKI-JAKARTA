const flashDatanews = $('.flash-data-news').data('flashdata');
const flashDatadata = $('.flash-data-data').data('flashdata');
console.log(flashDatanews);
if (flashDatanews) {

    Swal.fire({
        title: flashDatadata,
        text: "Berhasil " +
            flashDatanews,
        icon: 'success',

    })
} else {
    console.log('console gagal');
}
// tombol hapus news
$('.hapus-news').on('click', function(e) {
    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Apakah kamu yakin ?',
        text: "Anda tidak akan dapat mengembalikan ini!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus!'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })
});