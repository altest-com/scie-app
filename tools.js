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

function loadListaDiaria() {
    $.ajax({
       url : 'listaDiaria.php',
       success : function (datos) {
            $('#div-content-wrapper').html(datos);
       }
    });
}

function loadSeguimientoDeEvaluaciones() {
    $.ajax({
        url : 'listaSeguimientoEvaluaciones.php',
        success : function (datos) {
            $('#div-content-wrapper').html(datos);
        }
    });
}
