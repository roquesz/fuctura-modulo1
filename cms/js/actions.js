$(
    function()
    {
        $('#cep_frete').mask('00.000-000');
        $("#calfrete").submit(
            function()
            {
                $.ajax({
                    type: "POST",
                    url: "includes/frete.php",
                    data: { cep: $("#cep_frete").val() },
                    dataType: 'html'
                })
                .success(function()
                {
                    $("#retorno_frete").html('<img src"img/loading.gif" />');
                })
                .done(function( resposta ) {
                    $("#retorno_frete").html(resposta);                    
                });
            }
        );
    }
)