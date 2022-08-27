
$(document).ready(function(){
            $("#pesquisar").keyup(function(){
                $(".resultado_pesquisa").css('background-color', 'blue');
                    var pesquisar=$(this).val();
                       if (pesquisar !='') {
                                var dados= {
                                    pesquisar:pesquisar

                                    }
                      $.post('../html_php_BD/bd_l/pesquisar.php', dados, function(retorna) {
                      $(".resultado_pesquisa").html(retorna);
                           });
                    } else {
                        $(".resultado_pesquisa").html('');
                    }
                   }); 
     });
           