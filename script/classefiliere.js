$(document).ready(function () {
    
    
    function remplir(data) {
        var contenu = $('#table-content');
        var ligne = "";
        for (i = 0; i < data.length; i++) {
            ligne += '<tr><th scope="row">' + data[i].id + '</th>';
            ligne += '<td>' + data[i].code + '</td>';
            ligne += '<td>' + data[i].nom + '</td>';
            ligne += '<td>' + data[i].id_fil + '</td>';
            
        }
        contenu.html(ligne);
    }
    $('#btn').click(function () {
        if ($('#btn').text() == 'Chercher') {
            var id_fil = $("#id_fil");
            
            $.ajax({
                url: 'controller/gestionClasse.php',
                data: {op: 'select', id_fil: id_fil.val()},
                type: 'POST',
                success: function (data, textStatus, jqXHR) {
                    remplir(data);
                    
                    
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus);
                }
            });
        }
    });
    
});