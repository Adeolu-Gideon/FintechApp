'use strict';
var notify = $.notify('<i class="fa fa-bell-o"></i><strong>Hi there</strong>', {
    type: 'theme',
    allow_dismiss: true,
    delay: 5000,
    showProgressbar: true,
    timer: 500,
    animate: {
        enter: 'animated fadeInDown',
        exit: 'animated fadeOutUp'
    }
});

setTimeout(function () {
    notify.update('message', '<i class="fa fa-bell-o"></i><strong>Welcome To Novatify Fintech</strong>');
}, 2000);
