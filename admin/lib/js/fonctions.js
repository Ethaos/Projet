$(document).ready(function(){

    //MODIF JEU (admin)
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

    //AJOUT JEU (admin)
    $('#nomjeu').blur(function(){
        var nomjeu = $(this).val();
        //alert(nomjeu);
        var parametre = "nomjeu="+nomjeu;
        //alert(parametre);
        $.ajax({
            type: 'GET',
            data: parametre,
            datatype: 'json',
            url: './lib/php/ajax/ajaxRechJeu.php',
            success: function(data){
                console.log(data);
                $('#nomjeu').val(data[0].nomjeu);
                if($('#nomjeu').val()!=''){
                    $('#submitJeuAdmin').hide();
                    alert('Le  jeu est déjà présent');
                    location.reload();
                }else{
                    $('#nomjeu').val(nomjeu);
                    $('#submitJeuAdmin').show();

                }
            }
        });
    });

    //AJOUT JEU (client)

    $('#nomjeu').blur(function(){
        var nomjeu = $(this).val();
        //alert(nomjeu);
        var parametre = "nomjeu="+nomjeu;
        //alert(parametre);
        $.ajax({
            type: 'GET',
            data: parametre,
            datatype: 'json',
            url: './admin/lib/php/ajax/ajaxRechJeu.php',
            success: function(data){
                console.log(data);
                $('#nomjeu').val(data[0].nomjeu);
                if($('#nomjeu').val()!=''){
                    $('#submitJeu').hide();
                    alert('Le  jeu est déjà présent');
                    location.reload();
                }else{
                    $('#nomjeu').val(nomjeu);
                    $('#submitJeu').show();
                }
            }
        });
    });

    //INSCRIPTION CLIENT

    $('#mail').blur(function(){
        var mail = $(this).val();
        var parametre = '&mail='+mail;
        $.ajax({
            type: 'GET',
            data: parametre,
            datatype: 'text',
            url: './admin/lib/php/ajax/ajaxVerifMail.php',
            success: function(data){
                console.log(data);
                $('#mail').val(data[0].mail);
                if($('#mail').val()!=''){
                    $('#inscription').hide();
                    alert('Mail déjà utilisé');
                    location.reload();
                }else{
                    $('#mail').val(mail);
                    $('#inscription').show();
                }
            }
        });
    });

    //AJOUTER UNE PHOTO (admin)

    $('#submitPhotoAdmin').click(function(){
        var id = $.trim($('#idjeu').val());
        var photo = document.getElementById("photo").files[0].name;
        var parametre = '&id='+id+'&photo='+photo;
        //alert(parametre);
        $.ajax({
            type: 'GET',
            data: parametre,
            datatype: 'json',
            url: './lib/php/ajax/ajaxAjoutPhoto.php',
            success: function(data){
                console.log(data);
                location.reload();
            }
        });
    });

    //AJOUTER UNE PHOTO (client)

    $('#submitPhoto').click(function(){
        var id = $.trim($('#idjeu').val());
        var photo = document.getElementById("photo").files[0].name;
        var parametre = '&id='+id+'&photo='+photo;
        //alert(parametre);
        $.ajax({
            type: 'GET',
            data: parametre,
            datatype: 'json',
            url: './admin/lib/php/ajax/ajaxAjoutPhoto.php',
            success: function(data){
                console.log(data);
                location.reload();
            }
        });
    });

    //AJOUT ET MOYENNE D'UNE NOTE

    $('#button').click(function(){
        var id = $.trim($('#idjeu').val());
        var note = Number(document.getElementById("note").value);
        var newNote = Number(document.getElementById("newNote").value);
        var N = (note+newNote)/2;
        //alert('('+note+' + '+newNote+')/2 = '+N);
        var parametre = '&id='+id+'&N='+N;
        //alert(parametre);
        $.ajax({
            type: 'GET',
            data: parametre,
            datatype: 'text',
            url: './admin/lib/php/ajax/ajaxUpdateNote.php',
            success: function(data){
                console.log(data);
                location.reload();
            }
        });
    });

    //SUPPRESSION D'UN CLIENT (admin)

    $(".delete").click( function(){
        var iduser = $(this).attr("id");
        var parametre = '&id='+iduser;
        $.ajax({
            type: 'GET',
            data: parametre,
            dataType: 'text',
            url: './lib/php/ajax/ajaxSupprClient.php',
            success: function (data) {
                console.log(data);
                location.reload();
            }
        });
    });

    //SUPPRESSION D'UN JEU (admin)

    $(".deletejeu").click( function(){
        var idjeu = $(this).attr("id");
        var parametre = '&id='+idjeu;
        $.ajax({
            type: 'GET',
            data: parametre,
            dataType: 'text',
            url: './lib/php/ajax/ajaxSupprJeu.php',
            success: function (data) {
                console.log(data);
                location.reload();
            }
        });
    });

    //MODIF CLIENT

    $('#mail').blur(function(){
        var mail = $(this).val();
        if(mail != ''){
            var parametre = "&mail="+mail;
            $.ajax({
                type: 'GET',
                data: parametre,
                datatype: 'json',
                url: './admin/lib/php/ajax/ajaxVerifMail.php',
                success: function(data){
                    console.log(data);
                    $('#prenom').val(data[0].prenom);
                    $('#nom').val(data[0].nom);
                    $('#mail').val(data[0].mail);
                    $('#pwd').val(data[0].password);
                }
            });
        }
    });

});