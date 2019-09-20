
$('#modalLogin').on('show.bs.modal', function () {
    $.get( "/permafarmer/public/login", function( data ) {
        $( "#login-container" ).html( data );
    });
});


