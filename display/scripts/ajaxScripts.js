//Metodo para retirar virgula de um numero formatado
function parseCurrency( num ) {
    return parseFloat( num.replace( /,/g, '') );
}

//Starting Real Time
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip({ trigger: "hover" });
	$(".select2").select2();
	$(".descricao").change(function()
    {
		var descricao = document.getElementById("descricao").value;
		var tipo = document.getElementById("tipo").value;
		var dataMin = document.getElementById("dataMinima").value;
		var dataMax = document.getElementById("dataMaxima").value;
        var estado = document.getElementById("estado").value;
		
		var dataString = 'descricao='+ descricao + "&tipo="+tipo+"&dataMin="+dataMin+"&dataMax="+dataMax+"&estado="+estado;
		
		$.ajax
		({
				type: "POST",
				url: "../include/ajax/pesquisaEntradas.php",
				data: dataString,
				cache: false,
				success: function(html)
				{
					$(".tableBody").html(html);
				} 
		});
    });
	$(".descricaoSaida").change(function()
    {
		var descricao = document.getElementById("descricao").value;
		var tipo = document.getElementById("tipo").value;
		var dataMin = document.getElementById("dataMinima").value;
		var dataMax = document.getElementById("dataMaxima").value;
		var estado = document.getElementById("estado").value;
		
		var dataString = 'descricao='+ descricao + "&tipo="+tipo+"&dataMin="+dataMin+"&dataMax="+dataMax+"&estado="+estado;
		
		$.ajax
		({
				type: "POST",
				url: "../include/ajax/pesquisaSaidas.php",
				data: dataString,
				cache: false,
				success: function(html)
				{
					$(".tableBody").html(html);
				} 
		});
    });
	$(".descricaoEmpresa").change(function()
    {
		var descricao = document.getElementById("descricao").value;
		var tipoCliente = $("#fornecedor").prop('checked');
		var tipoFornecedor = $("#cliente").prop('checked');
		var dataString = 'descricao='+ descricao + "&tipoC="+tipoCliente+"&tipoF="+tipoFornecedor;
		
		$.ajax
		({
				type: "POST",
				url: "../include/ajax/pesquisaEmpresa.php",
				data: dataString,
				cache: false,
				success: function(html)
				{
					$(".tableBody").html(html);
				} 
		});
    });
	$(".tipoEmpresa").click(function()
    {
		var descricao = document.getElementById("descricao").value;
		var tipoCliente = $("#fornecedor").prop('checked');
		var tipoFornecedor = $("#cliente").prop('checked');
		var dataString = 'descricao='+ descricao + "&tipoC="+tipoCliente+"&tipoF="+tipoFornecedor;
		
		$.ajax
		({
				type: "POST",
				url: "../include/ajax/pesquisaEmpresa.php",
				data: dataString,
				cache: false,
				success: function(html)
				{
					$(".tableBody").html(html);
				} 
		});
    });
	$(".mes").change(function()
    {
		var id=$(this).val();
        var dataString = 'id='+ id;
		
		$.ajax
		({
				type: "POST",
				url: "../include/ajax/entradasVsSaidas.php",
				data: dataString,
				cache: false,
				success: function(html)
				{
					$(".tabelaPie").html(html);
				} 
		});
    });
	$(".tipoP").change(function()
    {
        var id = document.getElementById("tipoP").value;
        var dataMin = document.getElementById("dataMinima").value;
		var dataMax = document.getElementById("dataMaxima").value;
		var estado = document.getElementById("estado").value;
		
		var dataString = 'id='+ id+"&dataMin="+dataMin+"&dataMax="+dataMax+"&estado="+estado;

        
		$.ajax
		({
				type: "POST",
				url: "../include/ajax/pesquisaRelatorio.php",
				data: dataString,
				cache: false,
				success: function(html)
				{
					$(".tableBody").html(html);
				} 
		});
    });
    $(".extrato").change(function()
    {
        var id = document.getElementById("tipoP").value;
        var dataMin = document.getElementById("dataMinima").value;
		var dataMax = document.getElementById("dataMaxima").value;
        var banco = document.getElementById("banco").value;
        
		var dataString = 'id='+ id+"&dataMin="+dataMin+"&dataMax="+dataMax+"&banco="+banco;
        
		$.ajax
		({
				type: "POST",
				url: "../include/ajax/pesquisaExtrato.php",
				data: dataString,
				cache: false,
				success: function(html)
				{
					$(".tableBody").html(html);
				} 
		});
    });
	$(".tipo").change(function()
    {
        var id = document.getElementById("tipo").value;
        var mesSaldo = document.getElementById("mesSaldo").value;
		var dataString = 'id='+ id+"&mesSaldo="+mesSaldo;
        
		$.ajax
		({
				type: "POST",
				url: "../include/ajax/pesquisaTipoGrafico.php",
				data: dataString,
				cache: false,
				success: function(html)
				{
					$(".tipoPesquisa").html(html);
				} 
		});
    });
	$(".nomeBanco").change(function()
    {
		var bancoId = $(this).val();
        var leva = document.getElementById("leva").value;
        
		var dataString = 'id='+ bancoId+"&leva="+leva;
		$.ajax
		({
				type: "POST",
				url: "../include/ajax/getSaldo.php",
				data: dataString,
				cache: false,
				success: function(html)
				{
					$("#saldo").html(html);
				} 
		});
    });
    $(".nomeBancoSaida").change(function()
    {
		var bancoId = $(this).val();
        var leva = document.getElementById("leva").value;
        
		var dataString = 'id='+ bancoId+"&leva="+leva;
		$.ajax
		({
				type: "POST",
				url: "../include/ajax/getSaldoSaida.php",
				data: dataString,
				cache: false,
				success: function(html)
				{
					$("#saldo").html(html);
				} 
		});
    });
	$(".execucaoSaida").keyup(function()
    {
        var saldoActual="";
        document.getElementById("executar").disabled =true;
        var saldo=document.getElementById("saldoSaida").value;
        var saldoReal=document.getElementById("saldoExecucao").value;
        var saldoActual=document.getElementById("saldoActual");
        var total=(parseCurrency(saldo)-parseCurrency(saldoReal)).toFixed(2);
    
    if(saldo =='' || saldoReal =='')
        saldoActual.value = 0;
    else
        {
            total = new Intl.NumberFormat().format(total);
            saldoActual.value = total;
            
            if(parseCurrency(total) >= 0)
            {
                document.getElementById("executar").disabled =false;
            }
            else{
                document.getElementById("executar").disabled =true;
            }
        }
        
    });
    
//########### Perfil #######################################/////
    //Verificacao dos Campos
	$(".email").keyup(function()
    {
		var email = $(this).val();
		var dataString = 'email='+ email;
        $.ajax
		({
				type: "POST",
				url: "../include/varificacaoForm/email.php",
				data: dataString,
				cache: false,
				success: function(html)
				{
                    if(html != 0)
                    {
                        $('input[id="email"]').css({"border-color":"#b71c1c"});
                        $('input[id="butao"]').prop('disabled', true);
                    }
                    else
                    {
                        $('input[id="email"]').css({"border-color":"#0cc2aa"});
                        $('input[id="butao"]').prop('disabled', false);
                    }
				} 
		});
    });
    
    //Pegando Modal
    $(document).on('click', '#editarUsu', function(e){
        
		e.preventDefault();
		
		var uid = $(this).val();   // it will get id of clicked row
		$('#dynamic-content').html(''); // leave it blank before ajax call
		$('#modal-loader').show();      // load ajax loader
		
		$.ajax({
			url: '../include/modal/editarUsuario.php',
			type: 'POST',
			data: 'id='+uid,
			dataType: 'html'
		})
		.done(function(data){
			console.log(data);	
			$('#dynamic-content').html('');    
			$('#dynamic-content').html(data); // load response 
			$('#modal-loader').hide();		  // hide ajax loader	
		})
		.fail(function(){
			$('#dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
			$('#modal-loader').hide();
		});
		
	});
    
    //Editar Perfil
    $(document).on('click', '#profileE', function(e){
		
		e.preventDefault();
		
		var uid = $(this).val();   // it will get id of clicked row
		$('#dynamic-content').html(''); // leave it blank before ajax call
		$('#modal-loader').show();      // load ajax loader
		
		$.ajax({
			url: '../include/modal/editarPerfil.php',
			type: 'POST',
			data: 'id='+uid,
			dataType: 'html'
		})
		.done(function(data){
			console.log(data);	
			$('#dynamic-content').html('');    
			$('#dynamic-content').html(data); // load response 
			$('#modal-loader').hide();		  // hide ajax loader	
		})
		.fail(function(){
			$('#dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
			$('#modal-loader').hide();
		});
		
	});
       //Reset Password
    $(document).on('click', '#reset', function(e){
		e.preventDefault();
		
		var uid = $(this).val();
        // it will get id of clicked row
		$('#dynamic-content').html(''); // leave it blank before ajax call
		$('#modal-loader').show();      // load ajax loader
		
		$.ajax({
			url: '../include/modal/resetId.php',
			type: 'POST',
			data: 'id='+uid,
			dataType: 'html'
		})
		.done(function(data){
			console.log(data);	
			$('#dynamic-content1').html('');    
			$('#dynamic-content1').html(data); // load response 
			$('#modal-loader1').hide();		  // hide ajax loader	
		})
		.fail(function(){
			$('#dynamic-content1').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
			$('#modal-loader1').hide();
		});
		
	});
    $(".continuar").click(function()
    {
        var id = document.getElementById("resetValue").value;   
		var dataString = 'id='+ id;
		$.ajax
		({
				type: "POST",
				url: "../include/ajax/resetPass.php",
				data: dataString,
				cache: false,
				success: function(html)
				{
                    window.location = "./ps_usuarios.php";
				} 
		});
    });
    
    
//Verificacao do campo Nuit da empresa
    $(".nuit").keyup(function()
    {
        var emp=0;
        
        if($("#idEmp").val())
        {
            emp = $("#idEmp").val();
        }
            
        
		var nuit = $(this).val();
		var dataString = 'nuit='+ nuit+"&emp="+emp;
        $.ajax
		({
				type: "POST",
				url: "../include/varificacaoForm/nuit.php",
				data: dataString,
				cache: false,
				success: function(html)
				{
                    if(html != 0)
                    {
                        $('input[id="nuit"]').css({"border-color":"#b71c1c"});
                        $("#butao").prop('disabled', true);
						$("[data-toggle='nuit']").popover('show');
						setTimeout(function () {
							$("[data-toggle='nuit']").popover('hide');
						}, 2000);
                    }
                    else
                    {
                        $('input[id="nuit"]').css({"border-color":"#0cc2aa"});
                        $("#butao").prop('disabled', false);
						$("[data-toggle='nuit']").popover('hide');
                    }
				} 
		});
    });
});

//Visualizar Fotografia
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#dvPreview').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#fileupload").change(function(){
    readURL(this);
});