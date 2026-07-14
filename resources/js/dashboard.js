//  // Validation alert pop-up 
console.log('dashboard.js loaded');

document.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll('.success-toast').forEach(function (el) {

        el.classList.add('show');

        const toast = new bootstrap.Toast(el, {
            autohide: true,
            delay: 4000
        });

        toast.show();

    });

    document.querySelectorAll('.error-toast').forEach(function (el) {

        el.classList.add('show');

        const toast = new bootstrap.Toast(el, {
            autohide: false
        });

        toast.show();

    });

});
//  // =======