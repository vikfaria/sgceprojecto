    function imprimir_Empresa(){
        var descricao = document.getElementById("descricao").value;
		var tipoCliente = $("#fornecedor").prop('checked');
		var tipoFornecedor = $("#cliente").prop('checked');
        
        VentanaCentrada('../pdf/documentos/empresa.php?descricao='+ descricao +"&tipoC="+tipoCliente+ "&tipoF=" +tipoFornecedor,'Empresa','','1024','768','true');
    }
    function imprimir_Relatorio(){
        var tipoP = document.getElementById("tipoP").value;
		var dataMin = document.getElementById("dataMinima").value;
		var dataMax = document.getElementById("dataMaxima").value;
        var estado = document.getElementById("estado").value;
        
        VentanaCentrada('../pdf/documentos/relatorio.php?id='+ tipoP+"&dataMin="+dataMin+"&dataMax="+dataMax+"&estado="+estado,'Relatorio','','1024','768','true');
    }
    function imprimir_Extrato(){
        var tipoP = document.getElementById("tipoP").value;
		var dataMin = document.getElementById("dataMinima").value;
		var dataMax = document.getElementById("dataMaxima").value;
        var banco = document.getElementById("banco").value;
        
        VentanaCentrada('../pdf/documentos/extrato.php?id='+ tipoP+"&dataMin="+dataMin+"&dataMax="+dataMax+"&banco="+banco,'Relatorio','','1024','768','true');
    }
    function imprimir_receitas(){
        var descricao = document.getElementById("descricao").value;
		var tipo = document.getElementById("tipo").value;
		var dataMin = document.getElementById("dataMinima").value;
		var dataMax = document.getElementById("dataMaxima").value;
        var estado = document.getElementById("estado").value;
        
        VentanaCentrada('../pdf/documentos/receitas.php?descricao='+ descricao + "&tipo="+tipo+"&dataMin="+dataMin+"&dataMax="+dataMax+"&estado="+estado,'Receitas','','1024','768','true');
    }
    function imprimir_despesas(){
        var descricao = document.getElementById("descricao").value;
		var tipo = document.getElementById("tipo").value;
		var dataMin = document.getElementById("dataMinima").value;
		var dataMax = document.getElementById("dataMaxima").value;
        var estado = document.getElementById("estado").value;
        
        VentanaCentrada('../pdf/documentos/despesas.php?descricao='+ descricao + "&tipo="+tipo+"&dataMin="+dataMin+"&dataMax="+dataMax+"&estado="+estado,'Despesas','','1024','768','true');
    }
    function imprimir_bancos(){
        VentanaCentrada('../pdf/documentos/bancos.php','Bancos','','1024','768','true');
    }

