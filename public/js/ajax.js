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
    	console.log(data);
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
   
});

});