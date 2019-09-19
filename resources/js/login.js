
$('#modalLogin').on('show.bs.modal', function () {
    $.get( "/permafarmer/public/login", function( data ) {
        $( "#login-container" ).html( data );
    });
});

$('#register').on('click',function() {
    $('#modalRegister').modal('show');
});

// $('#modalRegister').on('show.bs.modal', function () {
//     $.get( "/permafarmer/public/register", function( data ) {
//         $( "#register-container" ).html( data );
//     });
// });

