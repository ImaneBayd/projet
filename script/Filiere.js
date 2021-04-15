$(document).ready(function () {
    $.ajax({
        url: 'controller/gestionFiliere.php',
        data: {op: ''},
        type: 'POST',
        success: function (data, textStatus, jqXHR) {
            remplir(data);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus);
        }
    });

    $('#btn').click(function () {
        var code = $("#code");
        var libelle = $("#libelle");
        var abr = $("#abr");
        if ($('#btn').text() == 'Ajouter') {
            $.ajax({
                url: 'controller/gestionFiliere.php',
                data: {op: 'add', code: $("#code").val(), libelle: $("#libelle").val(), abr: $("#abr").val()},
                type: 'POST',
                success: function (data, textStatus, jqXHR) {
                    remplir(data);
                    code.val('');
                    libelle.val('');
                    abr.val('');
                },
                error: function (data) {
                    console.log(data);
                }
            });
        }

    });

    $(document).on('click', '.supprimer', function () {
        var id = $(this).closest('tr').find('th').text();
        $.ajax({
            url: 'controller/gestionFiliere.php',
            data: {op: 'delete', id: id},
            type: 'POST',
            success: function (data, textStatus, jqXHR) {
                remplir(data);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus);
            }
        });
    });

    $(document).on('click', '.modifier', function () {
        var btn = $('#btn');
        var id = $(this).closest('tr').find('th').text();
        var code = $(this).closest('tr').find('td').eq(0).text();
        var libelle = $(this).closest('tr').find('td').eq(1).text();
        var abr = $(this).closest('tr').find('td').eq(2).text();
        btn.text('Modifier');
        $("#code").val(code);
        $("#libelle").val(libelle);
        $("#abr").val(abr);
        $("#id").val(id);
        btn.click(function () {
            if ($('#btn').text() == 'Modifier') {
                $.ajax({
                    url: 'controller/gestionFiliere.php',
                    data: {op: 'update',  code: $("#code").val(), libelle: $("#libelle").val(), abr:$("#abr").val(), id: $("#id").val(),},
                    type: 'POST',
                    success: function (data, textStatus, jqXHR) {
                        
                        remplir(data);
                        $("#code").val('');
                        $("#libelle").val('');
                        $("#abr").val('');
                        btn.text('Ajouter');
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(textStatus);
                    }
                });
            }
        });
    });
    function remplir(data) {
       
        var contenu = $('#table-content');
        var ligne = "";
        for (i = 0; i < data.length; i++) {
            ligne += '<tr><th scope="row">' + data[i].id + '</th>';
            ligne += '<td>' + data[i].code + '</td>';
            ligne += '<td>' + data[i].libelle + '</td>';
            ligne += '<td>' + data[i].abr + '</td>';
            ligne += '<td><button type="button" class="btn btn-outline-danger supprimer">Supprimer</button></td>';
            ligne += '<td><button type="button" class="btn btn-outline-secondary modifier">Modifier</button></td></tr>';
        }
        contenu.html(ligne);
    }

});



