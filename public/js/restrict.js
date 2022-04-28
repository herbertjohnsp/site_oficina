$(function(){

	// EXIBIR MODAIS

	$("#btn_add_service").click(function(){
		clearErros();
		$("#form_service")[0].reset();
		$("#service_img_path").attr("src","");
		$("#modal_service").modal();
	});

	$("#btn_add_member").click(function(){
		clearErros();
		$("#form_member")[0].reset();
		$("#member_photo_path").attr("src", "");
		$("#modal_member").modal();
	});

	$("#btn_add_user").click(function(){
		clearErros();
		$("#form_user")[0].reset();
		$("#modal_user").modal();
	});


	$("#btn_upload_service_img").change(function(){
		uploadImg($(this), $("#service_img_path"), $("#service_img"));
	});


	$("#btn_upload_member_photo").change(function(){
		uploadImg($(this), $("#member_photo_path"), $("#member_photo"));
	});
	
	$("#form_service").submit(function(){

			$.ajax({
				type: "POST",
				url: BASE_URL + "restrict/ajax_save_service",
				dataType: "json",
				data: $(this).serialize(),
				beforeSend: function(){
					clearErros();
					$("#btn_save_service").siblings(".help-block").html(loadingImg("Verificando..."));
				},
				success: function(response){
					clearErros();
					if (response["status"]){
						$("#modal_service").modal("hide");
						swal.fire("Sucesso!", "Serviço salvo com sucesso!", "success");
						dt_service.ajax.reload();
					}else{
						showErrosModal(response["error_list"])
					}
				}

			})

		return false;
	})

	$("#form_member").submit(function(){

			$.ajax({
				type: "POST",
				url: BASE_URL + "restrict/ajax_save_member",
				dataType: "json",
				data: $(this).serialize(),
				beforeSend: function(){
					clearErros();
					$("#btn_save_member").siblings(".help-block").html(loadingImg("Verificando..."));
				},
				success: function(response){
					clearErros();
					if (response["status"]){
						$("#modal_member").modal("hide");
						swal.fire("Sucesso!", "Membro adicionado com sucesso!", "success");
						dt_member.ajax.reload();
					}else{
						showErrosModal(response["error_list"]);
					}
				}

			})

		return false;
	});


		$("#form_user").submit(function(){

			$.ajax({
				type: "POST",
				url: BASE_URL + "restrict/ajax_save_user",
				dataType: "json",
				data: $(this).serialize(),
				beforeSend: function(){
					clearErros();
					$("#btn_save_user").siblings(".help-block").html(loadingImg("Verificando..."));
				},
				success: function(response){
					clearErros();
					if (response["status"]){
						$("#modal_user").modal("hide");
						swal.fire("Sucesso!", "Usuário adicionado com sucesso!", "success");
						dt_user.ajax.reload();
					}else{
						showErrosModal(response["error_list"])
					}
				}

			})

		return false;
	});


			$("#btn_your_user").click(function(){

			$.ajax({
				type: "POST",
				url: BASE_URL + "restrict/ajax_get_user_data",
				dataType: "json",
				data: {"user_id": $(this).attr("user_id")},
				success: function(response){
					clearErros();
					$("#form_user")[0].reset();
					$.each(response["input"], function(id, value){
						$("#"+id).val(value);	
					});
				   $("#modal_user").modal();
				}

			})

		return false;
	});	

			/*Possível problema no carregamento da datatable*/

			function active_btn_service(){
				$(".btn-edit-service").click(function(){
				  $.ajax({
					type: "POST",             
					url: BASE_URL + "restrict/ajax_get_service_data",
					dataType: "json",
					data: {"service_id": $(this).attr("service_id")},
					success: function(response){
						clearErros();
						$("#form_service")[0].reset();
						$.each(response["input"], function(id, value){
							$("#"+id).val(value);	
						});

						$("#service_img_path").attr("src", response["img"]["service_img_path"]);
					    $("#modal_service").modal();
					 }
				})
			});

				$(".btn-del-service").click(function(){

					service_id = $(this);

					Swal.fire({
						title: "Atenção!",
						text: "Deseja deletar o serviço?",
						type: "warning",
						showCancelButton: true,
						confirmButtonColor: "#d9534f",
						confirmButtonText: "Sim",
						cancelButtonText: "Não",
						closeOnConfirm: true,
						closeOnCancel: true,
					})
					.then((result) => {
						if (result.value) {
					   		$.ajax ({
								type: "POST",             
								url: BASE_URL + "restrict/ajax_get_delete_service_data",
								dataType: "json",
								data: {"service_id": service_id.attr("service_id")},
								success: function(response){
									Swal.fire("Sucesso!", "Ação executada com sucesso", "sucess");
									dt_service.ajax.reload();
								 }
							});
			  			}
			  		})
				});
		}
		

			/*Fim do problema*/

			//var dt_service = $("#dt-services").DataTable({
				var dt_service = $("#dt_services").DataTable({
				"oLanguage" : DATATABLE_PTBR,
				"autoWidth": false,
				"processing": true,
				"serverSide": true,
				"ajax": {
					"url": BASE_URL + "restrict/ajax_list_service",
					"type": "POST",
				},
				"columnDefs": [
					{targets: "no-sort", orderable: false },
					{targets: "dt-center", className: "dt-center"},
				],

				/*Problema*/
				"drawCallback": function(){
					active_btn_service();
				}

			});
	
			/*Possível problema no carregamento da datatable*/

				function active_btn_member(){
				$(".btn-edit-member").click(function(){
				  $.ajax({
					type: "POST",             
					url: BASE_URL + "restrict/ajax_get_member_data",
					dataType: "json",
					data: {"member_id": $(this).attr("member_id")},
					success: function(response){
						clearErros();
						$("#form_member")[0].reset();
						$.each(response["input"], function(id, value){
							$("#"+id).val(value);	
						});

						$("#member_photo_path").attr("src", response["img"]["member_photo_path"]);
					    $("#modal_member").modal();
					 }
				})
			});


				$(".btn-del-member").click(function(){
					member_id = $(this);
					Swal.fire({
						title: "Atenção!",
						text: "Deseja deletar esse membro?",
						type: "warning",
						showCancelButton: true,
						confirmButtonColor : "#d9534f",
						confirmButtonText: "Sim",
						cancelButtonText: "Não",
						closeOnConfirm: true,
						closeOnCancel: true,
					}).then((result) =>{
						if (result.value){
							$.ajax({
								type: "POST",
								url: BASE_URL + "restrict/ajax_get_delete_member_data",
								dataType: "json",
								data: {"member_id": member_id.attr("member_id")},
								success: function(response){
									Swal.fire("Sucesso!", "Ação executada com sucesso", "sucess");
									dt_member.ajax.reload();
								}
							});
						}
					})
				});
		}
		

			var dt_member = $("#dt-team").dataTable({
				            "oLanguage" : DATATABLE_PTBR,
							"autoWidth": false,
							"processing": true,
							"serverSide": true,
							"ajax": {
								"url": BASE_URL + "restrict/ajax_list_member",
								"type": "POST",
							},
							"columnDefs": [
							{targets: "no-sort", orderable: false },
							{targets: "dt-center", className: "dt-center"},
							],
							"drawCallback": function(){
							active_btn_member();
						}

						});

				function active_btn_user (){
				$(".btn-edit-user").click(function(){
				  $.ajax({
					type: "POST",             
					url: BASE_URL + "restrict/ajax_get_user_data",
					dataType: "json",
					data: {"user_id": $(this).attr("user_id")},
					success: function(response){
						clearErros();
						$("#form_user")[0].reset();
						$.each(response["input"], function(id, value){
							$("#"+id).val(value);	
						});
					    $("#modal_user").modal();
					 }
				})
			})

				$(".btn-del-user").click(function(){
					user_id = $(this);
					Swal.fire({
						title: "Atenção!",
						text: "Deseja deletar esse usuário?",
						type: "warning",
						showCancelButton: true,
						confirmButtonColor : "#d9534f",
						confirmButtonText: "Sim",
						cancelButtonText: "Não",
						closeOnConfirm: true,
						closeOnCancel: true,
					}).then((result) =>{
						if (result.value){
							$.ajax({
								type: "POST",
								url: BASE_URL + "restrict/ajax_get_delete_user_data",
								dataType: "json",
								data: {"user_id": user_id.attr("user_id")},
								success: function(response){
									Swal.fire("Sucesso!", "Ação executada com sucesso", "sucess");
									dt_user.ajax.reload();
								}
							});
						}
					})
				});
		}
		

			var dt_user = $("#dt-users").dataTable({
				           "oLanguage" : DATATABLE_PTBR,
							"autoWidth": false,
							"processing": true,
							"serverSide": true,
							"ajax": {
								"url": BASE_URL + "restrict/ajax_list_user",
								"type": "POST",
							},
							"columnDefs": [
							{targets: "no-sort", orderable: false },
							{targets: "dt-center", className: "dt-center"},
							],
							"drawCallback": function(){
							active_btn_user();
						}

						});
})