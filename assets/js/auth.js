const flashDatanews = $('.flash-data-news').data('flashdata');
const flashDatadata = $('.flash-data-data').data('flashdata');
const flashDatanews1 = $('.flash-data-news1').data('flashdata');
const flashDatadata1 = $('.flash-data-data1').data('flashdata');
console.log(flashDatanews);
if (flashDatanews) {

    Swal.fire({
        title: 'Data ' + flashDatadata,
        text: flashDatanews,
        icon: 'error',

    })
} else {
    console.log('console gagal');
}
if (flashDatanews1) {

    Swal.fire({
        title: flashDatadata1,
        text: flashDatanews1 + " berhasil",
        icon: 'success',

    })
} else {
    console.log('console gagal');
}