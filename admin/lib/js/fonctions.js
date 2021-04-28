$(document).ready(function(){

    //MODIF COTE ADMIN
    $('span[id]').click(function(){
        var valeur1 = $.trim($(this).text());
        var ident = $(this).attr("id");
        var name = $(this).attr("name");
        $(this).blur(function(){
            var valeur2 = $.trim($(this).text());
            if(valeur1 != valeur2){
                var parametre = 'champ='+name+'&id='+ident+'&nouveau='+valeur2;
                $.ajax({
                    type:'GET',
                    data: parametre,
                    datatype: 'text',
                    url: './lib/php/ajax/ajaxModifJeu.php',
                    success: function(data){
                        console.log(data);
                    }
                });
            }
        });
    });


    //AJOUT COTE ADMIN
    $('#nomjeu').blur(function(){
        var nomjeu = $(this).val();
        //alert(nomjeu);
        var parametre = "nomjeu="+nomjeu;
        //alert(parametre);
        $.ajax({
            type: 'GET',
            data: parametre,
            datatype: 'json',
            url: './lib/php/ajax/ajaxAjoutJeu.php',
            success: function(data){
                console.log(data);
                $('#nomjeu').val(data[0].nomjeu);
                if($('#nomjeu').val()!=''){
                    $('#submit').hide();
                    alert('Le  jeu est déjà présent');
                }else{
                    $('#nomjeu').val(nomjeu);
                    $('#submit').show();
                }
            }
        });
    });

    //AJOUT COTE CLIENT ENCODE
    $('#nomjeu').blur(function(){
        var nomjeu = $(this).val();
        //alert(nomjeu);
        var parametre = "nomjeu="+nomjeu;
        //alert(parametre);
        $.ajax({
            type: 'GET',
            data: parametre,
            datatype: 'json',
            url: './admin/lib/php/ajax/ajaxAjoutJeu.php',
            success: function(data){
                console.log(data);
                $('#nomjeu').val(data[0].nomjeu);
                if($('#nomjeu').val()!=''){
                    $('#submit').hide();
                    alert('Le  jeu est déjà présent');
                }else{
                    $('#nomjeu').val(nomjeu);
                    $('#submit').show();
                }
            }
        });
    });
});
