function cargarMenu() {
    $.ajax({
        url : "loadMenu.php",
        beforeSend : function () {

        },
        success : function (datos) {
            $("#menu_principal").html(datos);
            loadChartData();

        }
    });
}

function loadChartData() {
    var donutData = {
        labels: [
            'Riesgo bajo',
            'Riesgo medio',
            'Riesgo alto',
            'Pendientes',
            'Cancelados',
        ],
        datasets: [
            {
                data: [700,500,400,600,300],
                backgroundColor : ['#00a65a', '#f39c12', '#f56954', '#00c0ef', '#3c8dbc'],
            }
        ]
    };
    var pieChartCanvas = $('#pieChart').get(0 ).getContext('2d');
    var pieData        = donutData;
    var pieOptions     = {
        maintainAspectRatio : false,
        responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var pieChart = new Chart(pieChartCanvas, {
        type: 'pie',
        data: pieData,
        options: pieOptions
    });
}

function loadJSGrid() {
    $("#jsGrid1").jsGrid({
        height: "100%",
        width: "100%",

        sorting: true,
        paging: true,

        data: db.clients,

        fields: [
            { name: "Nombre", type: "text", width: 150 },
            { name: "Edad", type: "number", width: 50 },
            { name: "CURP", type: "text", width: 200 },
            { name: "RFC", type: "select", items: db.countries, valueField: "Id", textField: "Name" },
            { name: "Opciones", type: "checkbox", title: "Opciones" }
        ]
    });
}

function load(content) {
    var fn = function (datos) {
        $('#div-content-wrapper').html(datos);
    }
    AjaxPost(content, '', fn,  null);
}

function handleFileSelect(evt) {
    var files = evt.target.files; // FileList object

    // Loop through the FileList and render image files as thumbnails.
    for (var i = 0, f; f = files[i]; i++) {

        // Only process image files.
        if (!f.type.match('image.*')) {
            continue;
        }

        var reader = new FileReader();

        // Closure to capture the file information.
        reader.onload = (function(theFile) {
            return function(e) {
                // Render thumbnail.
                var span = document.createElement('span');
                span.innerHTML = ['<img class="thumb" src="', e.target.result,
                    '" title="', escape(theFile.name), '"/>'].join('');
                document.getElementById('list').insertBefore(span, null);
            };
        })(f);

        // Read in the image file as a data URL.
        reader.readAsDataURL(f);
    }
    document.getElementById('files').addEventListener('change', handleFileSelect, false);
}

function fireToast(titulo, contenido, tipo, format = false) {
    if (format) {
        Swal.fire({
            title: titulo,
            icon: tipo,
            html: contenido
        })
    }
    else {
        Swal.fire(
            titulo,
            contenido,
            tipo
        )
    }
}

