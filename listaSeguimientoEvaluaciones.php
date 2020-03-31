<!-- TABLE: LISTA DE SEGUIMIENTO DE EVALUACIONES -->
<section class="content-header">
    <div class="card">
        <div class="card-header border-transparent">
            <h3 class="card-title">Seguimiento De Evaluaciones</h3>
            <div class="card-tools">
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control float-right" id="reservation">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <script>
                        $(function () {
                            //Date range picker
                            $('#reservation').daterangepicker({
                                "locale": {
                                    "format": "YYYY-MM-DD",
                                    "separator": " - ",
                                    "applyLabel": "Guardar",
                                    "cancelLabel": "Cancelar",
                                    "fromLabel": "Desde",
                                    "toLabel": "Hasta",
                                    "customRangeLabel": "Personalizar",
                                    "daysOfWeek": [
                                        "Do",
                                        "Lu",
                                        "Ma",
                                        "Mi",
                                        "Ju",
                                        "Vi",
                                        "Sa"
                                    ],
                                    "monthNames": [
                                        "Enero",
                                        "Febrero",
                                        "Marzo",
                                        "Abril",
                                        "Mayo",
                                        "Junio",
                                        "Julio",
                                        "Agosto",
                                        "Setiembre",
                                        "Octubre",
                                        "Noviembre",
                                        "Diciembre"
                                    ],
                                    "firstDay": 1
                                }
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table m-0">
                    <thead>
                    <tr>
                        <th>Folio</th>
                        <th>Nombre</th>
                        <th>Toxicología E - S</th>
                        <th>Psicología E - S</th>
                        <th>ISE E - S</th>
                        <th>Médico E - S</th>
                        <th>Poligrafía E - S</th>
                        <th>Estatus</th>
                    </tr>
                    </thead>
                    <tbody id="lseTable">
                    <!-- COMENZAR A LLENAR LA TABLA -->
                    <tr>
                        <td>20-1005</td>
                        <td>Juan Peréz</td>
                        <td>14/03/2020 09:15:12 - 14/03/2020 09:42:53</td>
                        <td>14/03/2020 09:15:12 - 14/03/2020 09:42:53</td>
                        <td>14/03/2020 09:15:12 - 14/03/2020 09:42:53</td>
                        <td>14/03/2020 09:15:12 - 14/03/2020 09:42:53</td>
                        <td>14/03/2020 09:15:12 - 14/03/2020 09:42:53</td>
                        <td><span class="badge badge-success">Finalizado</span></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">

        </div>
        <!-- /.card-footer -->
    </div>
</section>
<!-- /.card -->
