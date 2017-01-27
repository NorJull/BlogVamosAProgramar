$("#save").click(function(){

	var myData = $("#name").val();
	var URL = "http://localhost:8000/admin/tags";
	var myToken = $("#token").val();
	// 	var data2 =  $.parseJSON('{ "name": myData , "_token": myToken}');
	// console.log(myData);
	// console.log(myToken);
	// console.log(URL);
	// console.log(data2);

	$.ajax({
	url: URL,
	headers: {'X-CSRF-TOKEN': myToken},
	type: "POST",	
    dataType: "json",
    data:{ "name": myData},
    error: function(data){
    	console.log(data.status);

    	if(data.status == 422){

    	$("#messages").html('<div class="alert alert-danger" role="alert">Ohh!!! El tag '+myData+' habia sido añadido!</div>');

    	}
    	//responseText


    // Error...
   /* var errors = $.parseJSON(data.responseText);

    console.log(errors);

    $.each(errors, function(index, value) {
        $.gritter.add({
            title: 'Error',
            text: value
        });
    });*/
}  
   
}).done(function(data){



	if(data.mensaje == "Creado"){
			$("#messages").html('<div class="alert alert-success" role="alert">El tag '+myData+' ha sido añadido exitosamente!</div>');
	}
	//<div class="alert alert-success" role="alert">...</div>
});

});
//localhost:8000/admin/tags?page=2

//Paginacion Ajax

$(document).on('click', '.pagination a', function(e){
e.preventDefault();
var page = $(this).attr('href').split('page=')[1];

	console.log(page);

getTags(page);

function getTags(page){

	$.ajax({

		url : '/admin/ajax/tags?page='+page
	}).done(function(data){

		console.log(data);
	$('.content').html(data);	
	location.hash = page;
	});

}

});

//Fin Paginacion con AJAX