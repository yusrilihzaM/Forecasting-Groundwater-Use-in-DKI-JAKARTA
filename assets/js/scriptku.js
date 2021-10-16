const flashDatanews = $('.flash-data-news').data('flashdata');
const flashDatadata = $('.flash-data-data').data('flashdata');
console.log(flashDatanews);
if (flashDatanews) {

    Swal.fire({
        title: 'Data ' + flashDatadata,
        text: flashDatanews + " successfully",
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
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })
});

//


//
const flashDatafaq = $('.flash-data-faq').data('flashdata');
console.log(flashDatafaq);
if (flashDatafaq) {

    Swal.fire({
        title: 'Data FAQ',
        text: flashDatafaq + " successfully",
        icon: 'success',

    })
} else {
    console.log('console gagal');
}
// tombol hapus news
$('.hapus-faq').on('click', function(e) {
    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;

        }
    })
});



const flashDatajadwal = $('.flash-data-jadwal').data('flashdata');
console.log(flashDatajadwal);
if (flashDatajadwal) {

    Swal.fire({
        title: 'Data Schedule',
        text: flashDatajadwal + " successfully",
        icon: 'success',

    })
} else {
    console.log('console gagal');
}
// tombol hapus news
$('.hapus-jadwal').on('click', function(e) {
    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;

        }
    })
});

const flashDatamentor = $('.flash-data-mentor').data('flashdata');
console.log(flashDatamentor);
if (flashDatamentor) {

    Swal.fire({
        title: 'Data Mentor',
        text: flashDatamentor + " successfully",
        icon: 'success',

    })
} else {
    console.log('console gagal');
}

$('.hapus-mentor').on('click', function(e) {
    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;

        }
    })
});