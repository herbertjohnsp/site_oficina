 $(function() {
	$("#login_form").submit(function(){
		$.ajax({
			type: "post",
			url: BASE_URL + "restrict/ajax_login",
			dataType: "json",
			data: $(this).serialize(),
			beforeSend: function(){
				clearErros();
				$("#btn-login").parent().siblings(".help-block").html(loadingImg("Verificando..."));
			},
			success: function(json){
				if (json["status"] == 1){
					clearErros();
					$("#btn-login").parent().siblings(".help-block").html(loadingImg("Logando..."));
					window.location = BASE_URL + "Restrict";
				} else {
					showErros(json["error_list"]);
				}
			},
			error: function(response){
				console.log(response);
			}
		})
		return false;
	})
})