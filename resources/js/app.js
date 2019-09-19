//window.$ = window.jQuery = require('jquery');

require('./bootstrap');
require('bootstrap');
require('popper.js');

require('select2');

$(document).ready(function() {
    $('.select2-multiple').select2();
    $('.select2-simple').select2();
});