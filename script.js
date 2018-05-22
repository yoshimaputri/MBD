$('#navbar a').on("click", function(){
	$('#navbar a').removeClass('active');
	$(this).addClass('active');
});

$('#goto').on("click", function(){
	$('#navbar a'.removeClass('active'));
	$('#evlist').addClass('active');
});

$(document).ready(function() {
    $('#example').DataTable( {
    } );
} );