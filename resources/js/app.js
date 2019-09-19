//window.$ = window.jQuery = require('jquery');

require('./bootstrap');
require('bootstrap');
require('popper.js');

require('select2');
require('./login');

$(document).ready(function () {
    $('.select2-multiple').select2();
    $('.select2-simple').select2();
});


$('.btn-add-product, .btn-remove-product').on('click', function() {
    const apiUrl = $(this).attr('data-api-url');

    $.get( apiUrl, (function( self, data ) {
        return function(data) {
            const nbProductsContainer = $(self).siblings('.nb-products');
            nbProductsContainer.text(parseInt(data));
        };
    })(this)).fail( function(data) {
        console.error(data);
    });
});