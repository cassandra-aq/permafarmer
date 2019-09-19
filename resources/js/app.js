require('./bootstrap');

window.$ = window.jQuery = require('jquery');

require('select2');

$(document).ready(function() {
    $('.select2-multiple').select2();
    $('.select2-simple').select2();
});
