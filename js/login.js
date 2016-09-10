var usuario;
$( document ).ready(function() {
  
  $( "#enviar" ).click(function() {
	
    $.ajax({
        data: {
            "action": "login",
			"usuario": $("#usuario").val(),
			"pass": $("#pass").val()
        },
        type: "GET",
        dataType: "json",
        async: false,
        url: "../php/validar.php",
        success: function(data, textStatus, jqXHR) {
			if(data["usuario"]!="nulo"){
				var user = data["usuario"];
			window.location="../inicio.php?usuario="+user+""
			}else{
				window.location="../index.php?var=1"
			}
		}
	})
  
  })
})