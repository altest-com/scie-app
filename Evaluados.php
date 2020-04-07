<!-- TABLE: LISTA DE EVALUADOS -->
<section class="content-header">
    <div class="card">
        <div class="card-header border-transparent">
            <h1 class="card-title">Evaluados</h1>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="row ">
            <div class="col-lg-11" style="margin: 20px">
                <div class="card card-primary card-outline card-tabs">
                    <div class="card-header p-0 pt-1 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="false">Agregar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-two-profile-tab" data-toggle="pill" href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">Editar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-two-messages-tab" data-toggle="pill" href="#custom-tabs-two-messages" role="tab" aria-controls="custom-tabs-two-messages" aria-selected="false">Evaluaciones</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-two-tabContent">
                            <div class="tab-pane fade show active" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                                <form role="form">
                                    <div class="card-body">
                                        <input class="form-control form-control-lg" type="text" placeholder="*Nombre(s)"><br>
                                        <input class="form-control form-control-lg" type="text" placeholder="*Primer Apellido"><br>
                                        <input class="form-control form-control-lg" type="text" placeholder="Segundo Apellido"><br>
                                        <input class="form-control form-control-lg" type="text" placeholder="*C.U.R.P."><br>
                                        <input class="form-control form-control-lg" type="text" placeholder="*R.F.C."><br>
                                        <select class="form-control form-control-lg">
                                            <option>Hombre</option>
                                            <option>Mujer</option>
                                        </select>
                                    </div>
                                </form>
                                <div class="card-footer" onclick="handleFileSelect();">
                                    <div class="row">
                                        <div class="col-md-11">
                                            <div class="custom-file">
                                                <input id="files" type="file" class="custom-file-input">
                                                <label class="custom-file-label" for="files">Selecciona archivo para carga masiva</label>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control rounded-0" placeholder="Buscar evaluado">
                                    <span class="input-group-append">
                                        <button type="button" class="btn btn-info btn-flat">Buscar!</button>
                                    </span>
                                </div>
                                <div id="jsGrid1">
                                    <script>loadJSGrid();</script>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-two-messages" role="tabpanel" aria-labelledby="custom-tabs-two-messages-tab">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">Evaluaciones</h3>
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body p-0">
                                                <table class="table table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th style="width: 10px">#</th>
                                                        <th>Folio</th>
                                                        <th>Progreso</th>
                                                        <th style="width: 40px">Porcentaje</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>1.</td>
                                                        <td>20-0009</td>
                                                        <td>
                                                            <div class="progress progress-xs">
                                                                <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                                                            </div>
                                                        </td>
                                                        <td><span class="badge bg-danger">55%</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>2.</td>
                                                        <td>20-0024</td>
                                                        <td>
                                                            <div class="progress progress-xs">
                                                                <div class="progress-bar bg-warning" style="width: 70%"></div>
                                                            </div>
                                                        </td>
                                                        <td><span class="badge bg-warning">70%</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>3.</td>
                                                        <td>20-0034</td>
                                                        <td>
                                                            <div class="progress progress-xs progress-striped active">
                                                                <div class="progress-bar bg-primary" style="width: 30%"></div>
                                                            </div>
                                                        </td>
                                                        <td><span class="badge bg-primary">30%</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>4.</td>
                                                        <td>20-0048</td>
                                                        <td>
                                                            <div class="progress progress-xs progress-striped active">
                                                                <div class="progress-bar bg-success" style="width: 90%"></div>
                                                            </div>
                                                        </td>
                                                        <td><span class="badge bg-success">90%</span></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade active show" id="custom-tabs-two-settings" role="tabpanel" aria-labelledby="custom-tabs-two-settings-tab">
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>

        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">

        </div>
        <!-- /.card-footer -->
    </div>
</section>
<!-- /.card -->
