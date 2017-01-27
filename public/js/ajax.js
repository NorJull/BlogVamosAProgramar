
function createPOST(name, url, token, successMessage, failMessage){
    var myData = name;
	var URL = url;
	var myToken = token;
	var success = successMessage;
	var fail = failMessage;


	$.ajax({
	url: URL,
	headers: {'X-CSRF-TOKEN': myToken},
	type: "POST",	
    dataType: "json",
    data:{ "name": myData},
    error: function(data){
    	console.log(data.status);

    	if(data.status == 422){

    	$("#messages").html('<div class="alert alert-danger" role="alert">'+fail+'</div>');
    	}	
	}  
	}).done(function(data){
		

	if(data.mensaje == "Creado"){
		$("#messages").html('<div class="alert alert-success" role="alert">'+ success+'</div>');
		
	}

	});
}

$("#save").click(function(){

	var myData = $("#name").val();
	var URL = $(".ajaxForm").attr('action').split('/create')[0];
	var myToken = $("#token").val();
	var successMessage = 'El tag '+myData+' ha sido añadido exitosamente!';
	var  failMessage = 'Ohh!!! El tag '+myData+' habia sido añadido!';

	console.log(myData);
	console.log(URL);
	console.log(myToken);
	console.log(successMessage);
	console.log(failMessage);
	createPOST(myData, URL, myToken, successMessage, failMessage);
});
$("#saveCategory").click(function(){

	var myData = $("#name").val();
	var URL = $(".ajaxForm").attr('action').split('/create')[0];
	var myToken = $("#token").val();
	var successMessage = 'La categoria '+myData+' ha sido añadido exitosamente!';
	var  failMessage = 'Ohh!!! La categoria '+myData+' habia sido añadido!';

	console.log(myData);
	console.log(URL);
	console.log(myToken);
	console.log(successMessage);
	console.log(failMessage);
	createPOST(myData, URL, myToken, successMessage, failMessage);
});




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