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
				    itens += "<tr>";
				    itens += "<td>" + retorno[i].cdGrupo + "</td>";
                    itens += "<td>" + retorno[i].nm_grupo + "</td>";
                    itens += "<td> <button type=\"button\" onMouseOver=\"this.style.cursor='pointer'\" onclick=\"redirect('EditarGrupos?id="+retorno[i].cdGrupo+"')\" class=\"btn btn-link\">Visualizar</button></td>";
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




function carregaPerguntasPorGrupo(id){
	//variáveis
    var itens = "";
    alert
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
			    for(var i = 0; i<retorno.length; i++){
				    itens += "<tr>";
                    itens += "<td>" + retorno[i].cd_pergunta + "</td>";
                    itens += "<td>" + retorno[i].id_grupo + "</td>";
                    itens += "<td> <a class=\"h6\">(1)</a> " + retorno[i].questao1 +"<hr><a class=\"h6\">(2)</a> "+  retorno[i].questao2 +"<hr><a class=\"h6\">(4)</a> "+ retorno[i].questao3+ "</td>";
                    itens += "<td>"+retorno[i].somaresultado+"</td>";
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