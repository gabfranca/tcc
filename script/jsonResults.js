function carregaMeusGrupos2(id){
	//variáveis
	var itens = "";
    var url = window.location.protocol + "//" + window.location.host+'/api/grupo/getbyuser?id='+id;
   // alert(url);
    //Capturar Dados Usando Método AJAX do jQuery
    $.ajax({
	    url: url,
	    cache: false,
	    dataType: "json",
	    beforeSend: function() {
		   // $("h2").html("Carregando..."); //Carregando
	    },
        error: function (error) {
          //  alert(JSON.stringify(error));
            $("h2").html(error);
        },
	    success: function(retorno) {
       //     alert(retorno);
		    if(retorno.success){
			    $("h2").html(retorno.message);
		    }
		    else{
                retorno = retorno.data;
			    //Laço para criar linhas da tabela
			    for(var i = 0; i<retorno.length; i++){
				    itens += "<tr>";
				    itens += "<td>" + retorno[i].cdGrupo + "</td>";
                    itens += "<td>" + retorno[i].nm_grupo + "</td>";
                    itens += "<td> <button type=\"button\" onMouseOver=\"this.style.cursor='pointer'\" onclick=\"redirect('EditarGrupos?id="+retorno[i].cdGrupo+"')\" class=\"btn btn-link\">Visualizar</button></td>";
										itens +="<td><button type=\"button\" class=\"btn btn-danger\"><img src=\"images/remove.png\" width=\"30px\" height=\"30px\"/> Excluir</button></td>";
				    itens += "</tr>";
						alert(itens);
			    }
			    //Preencher a Tabela
			    $("#minhaTabela tbody").html(itens);

			    //Limpar Status de Carregando
			   // $("h2").html("Carregado");
		    }
	    }
    });
}




function carregaPerguntasPorGrupo(id){
	//variáveis
    var itens = "";
    var url = window.location.protocol + "//" + window.location.host+'/api/perguntasgrupo/get?id='+id;
    //Capturar Dados Usando Método AJAX do jQuery
    $.ajax({
	    url: url,
	    cache: false,
	    dataType: "json",
	    beforeSend: function() {
		   // $("h2").html("Carregando..."); //Carregando
	    },
        error: function (error) {
          //  alert(JSON.stringify(error));
            $("h2").html(error);
        },
	    success: function(retorno) {
       //     alert(retorno);
		    if(retorno.success){
			    $("h2").html(retorno.message);
		    }
		    else{
                retorno = retorno.data;
			    //Laço para criar linhas da tabela
        //  alert(retorno);
						if (retorno!=null) {
							for(var i = 0; i<retorno.length; i++){

        itens += "<div class=\"card\" style=\"width: 30rem; height:26rem; margin:10px; padding-left:1px; float:left;\"><div class=\"card-body card-header\"><h4 class=\"card-title\">Posição: "+retorno[i].id_grupo+ "</br>Resposta: "+ retorno[i].somaresultado+" </h4>";
    itens += "</div style=\"width:100%\"> <ul class=\"list-group list-group-flush\"> <li class=\"list-group-item\"><b>(1)</b> "+retorno[i].questao1+"</li> <li class=\"list-group-item\"><b>(2)</b> "+retorno[i].questao2+"</li>  <li class=\"list-group-item\"><b>(4)</b> "+retorno[i].questao3+"</li> </ul>";
     itens += "<div class=\"card-body\">";
    itens += "</div> </div>";

						 }
						 //Preencher a Tabela
						} else {
								 itens = "<tr><td style=\"color:red\"\">Este grupo não possui questões.</td></tr>";
						}

			 	 $("#minhaTabela tbody").html(itens);
			    //Limpar Status de Carregando
			   // $("h2").html("Carregado");
		    }
	    }
    });
}

function carregaMeusGrupos(id){
	//variáveis
	var itens = "";
    var url = window.location.protocol + "//" + window.location.host+'/api/grupo/getbyuser?id='+id;
   // alert(url);
    //Capturar Dados Usando Método AJAX do jQuery
    $.ajax({
	    url: url,
	    cache: false,
	    dataType: "json",
	    beforeSend: function() {
		   // $("h2").html("Carregando..."); //Carregando
	    },
        error: function (error) {
          //  alert(JSON.stringify(error));
            $("h2").html(error);
        },
	    success: function(retorno) {
       //     alert(retorno);
		    if(retorno.success){
			    $("h2").html(retorno.message);
		    }
		    else{
                retorno = retorno.data;
			    //Laço para criar linhas da tabela
			    for(var i = 0; i<retorno.length; i++){
				    itens += "<tr style=\"text-align:left\">";
				    itens += "<td> "+ retorno[i].cdGrupo + "</td>";
                    itens += "<td>" + retorno[i].nm_grupo + "</td>";
                    itens += "<td> <button type=\"button\" onMouseOver=\"this.style.cursor='pointer'\" onclick=\"redirect('EditarGrupos?id="+retorno[i].cdGrupo+"')\" class=\"btn btn-primary\"><img src=\"images/eye.png\" width=\"25px\" height=\"25px\"/> Visualizar</button></td>";
										itens +="<td><button type=\"button\"   onMouseOver=\"this.style.cursor='pointer'\" onclick=\"removeGrupo("+retorno[i].cdGrupo+",'"+retorno[i].nm_grupo+"')\" class=\"btn btn-danger\"><img src=\"images/remove.png\" width=\"25px\" height=\"25px\"/> Excluir</button></td>";
					  itens += "</tr>";
			    }
			    //Preencher a Tabela
			    $("#minhaTabela tbody").html(itens);

			    //Limpar Status de Carregando
			   // $("h2").html("Carregado");
		    }
	    }
    });
}



function AddPerguntaGrupo(cdgrupo, cdpergunta){
	//variáveis
	var itens = "";
    var url = window.location.protocol + "//" + window.location.host+'/api/perguntasgrupo/add?cdgrupo='+cdgrupo+'&cdpergunta='+cdpergunta;
   // alert(url);
    //Capturar Dados Usando Método AJAX do jQuery
    $.ajax({
	    url: url,
	    cache: false,
	    dataType: "json",
	    beforeSend: function() {
		   // $("h2").html("Carregando..."); //Carregando
	    },
        error: function (error) {
          //  alert(JSON.stringify(error));
            $("h2").html(error);
        },
	    success: function(retorno) {
       //     alert(retorno);
		    if(retorno.success){
                $("h2").html(retorno.message);

		    }
		    else{
                alert.retorno.message;
         //       retorno = retorno.data;
			    //Laço para criar linhas da tabela
			//    for(var i = 0; i<retorno.length; i++){
			//	    itens += "<tr>";
		//		    itens += "<td>" + retorno[i].cdGrupo + "</td>";
         //           itens += "<td>" + retorno[i].nm_grupo + "</td>";
         //           itens += "<td> <button type=\"button\" onMouseOver=\"this.style.cursor='pointer'\" onclick=\"redirect('EditarGrupos?id="+retorno[i].cdGrupo+"')\" class=\"btn btn-link\">Visualizar</button></td>";
		//		    itens += "</tr>";
		//	    }
			    //Preencher a Tabela
			  //  $("#minhaTabela tbody").html(itens);
		    }
	    }
    });
}



function AddGrupo(cd_usuario, nome){
	//variáveis
	if (nome=="") {
		alert("Preencha o campo de nome do Grupo!");
		return;
	}
	var itens = "";
    var url = window.location.protocol + "//" + window.location.host+'/api/grupo/criar?id='+cd_usuario+'&nm_grupo='+nome;
   // alert(url);
    //Capturar Dados Usando Método AJAX do jQuery
    $.ajax({
	    url: url,
	    cache: false,
	    dataType: "json",
	    beforeSend: function() {
		   // $("h2").html("Carregando..."); //Carregando
	    },
        error: function (error) {
          //  alert(JSON.stringify(error));
              alert("Erro ao Salvar!");
									location.reload();
        },
	    success: function(retorno) {
							alert("Salvo com sucesso!");
						//	console.log(Object.getOwnPropertyNames(retorno).sort());

									location.reload();
		    }


    });
}


function removeGrupo(cd_grupo, nome){

	var resp = confirm("Tem certeza que deseja remover o grupo "+ nome +"?");

	if (resp==false) {
		return;
	}

	var itens = "";
    var url = window.location.protocol + "//" + window.location.host+'/api/grupo/remover?id='+cd_grupo;
   // alert(url);
    //Capturar Dados Usando Método AJAX do jQuery
    $.ajax({
	    url: url,
	    cache: false,
	    dataType: "json",
	    beforeSend: function() {
		   // $("h2").html("Carregando..."); //Carregando
	    },
      //  error: function (error) {
					error: function(erro) {
//  var err = eval("(" + xhr.responseText + ")");
  alert("Ocorreu algum erro ao excluir");

        },
	    success: function(retorno) {
							alert("Excluido com sucesso com sucesso!");
									location.reload();
		    }


    });
}
