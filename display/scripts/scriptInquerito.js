$(document).ready(function()
{
    $("#todasAct").click(function()
    {
        var id=$(this).prop('checked');
        var dataString = 'id='+ id;
		alert("aqui");
		$.ajax
        ({
            type: "POST",
            url: "../include/ajax/inquerito.php",
            data: dataString,
            cache: false
        });
    });
});