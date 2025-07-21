// Konfigurasi SweetAlert dengan tema hijau
const swalWithGreenButton = Swal.mixin({
    customClass: {
        confirmButton: 'bg-primary-500 hover:bg-primary-600 text-white font-medium py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 transition duration-200',
        cancelButton: 'bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition duration-200 mr-3'
    },
    buttonsStyling: false
});

// Toast configuration
const Toast = swalWithGreenButton.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    },
    background: '#f8fafc',
    iconColor: '#22c55e'
});

// Handle flash messages
if (window.laravelFlash) {
    const flash = window.laravelFlash;

    if (flash.toast) {
        Toast.fire({
            icon: flash.type || 'success',
            title: flash.message
        });
    } else {
        swalWithGreenButton.fire({
            icon: flash.type || 'success',
            title: flash.title || (flash.type === 'error' ? 'Error!' : 'Success!'),
            text: flash.message,
            confirmButtonText: 'OK'
        });
    }
}
