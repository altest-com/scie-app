$(document).ready(function () {
    var evaluados;

    $.ajax({
        url: 'controller/buscarEvaluado.php',
        processData: false,
        contentType: false,
        cache: false,
        success: function (data) {
            evaluados = JSON.parse(data);
        },
        failure: function (data) {
            fireToast("Error", data, "error");
        }
    }).done( function () {
        $('#jsGrid1').jsGrid({
            width: "100%",
            height: "auto",

            filtering: true,
            editing: true,
            sorting: true,
            paging: true,
            autoload: true,
            pageSize: 10,
            pageButtonCount: 5,
            noDataContent: "No se encontraron registros",
            pagerFormat: "Páginas: {first} {prev} {pages} {next} {last}    {pageIndex} de {pageCount}",
            pagePrevText: "Previa",
            pageNextText: "Siguiente",
            pageFirstText: "Primera",
            pageLastText: "Última",
            loadIndication: true,
            loadIndicationDelay: 1000,
            loadMessage: "Por favor, espere...",
            loadShading: true,

            data: evaluados,
            controller: {
                data:evaluados,
                loadData: function (filter) {
                    return $.grep(this.data, function (item) {
                        return (!filter.nombre || item.nombre.indexOf(filter.nombre) >= 0)
                            && (!filter.primer_apellido || item.primer_apellido.indexOf(filter.primer_apellido) >= 0)
                            && (!filter.segundo_apellido || item.segundo_apellido.indexOf(filter.segundo_apellido) >= 0)
                            && (!filter.curp || item.curp.indexOf(filter.curp) >= 0)
                            && (!filter.rfc || item.rfc.indexOf(filter.rfc) >= 0);
                    });
                },
                updateItem: function (item) {
                    return $.ajax({
                        url: 'controller/editarEvaluado.php',
                        type: 'POST',
                        data: {myData: JSON.stringify(item)},
                    }).done( function () {
                        $.ajax({
                            url: 'controller/buscarEvaluado.php',
                            processData: false,
                            contentType: false,
                            cache: false,
                            success: function (data) {
                                evaluados = JSON.parse(data);
                            },
                            failure: function (data) {
                                fireToast("Error", data, "error");
                            }
                        })
                    });
                }
            },


            fields: [
                { name: "nombre", title: "Nombre(s)", type: "text", width: 150, validate: "required"},
                { name: "primer_apellido", title: "Primer apellido", type: "text", width: 200 },
                { name: "segundo_apellido", title: "Segundo apellido", type: "text", width: 200 },
                { name: "curp", title: "C.U.R.P.", type: "text", width: 150 },
                { name: "rfc", title: "R.F.C.", type: "text", width: 100 },
                { name: "id_genero", title: "Género", type: "select", items: [
                        { Name: "", Id: "0"},
                        { Name: "Hombre", Id: "1" },
                        { Name: "Mujer", Id: "2" }
                    ], valueField: "Id", textField: "Name" },
                { type: "control", deleteButton: false }
            ]
        });
    });
});
