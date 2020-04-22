$(document).ready(function(){

    $('#nuevoEvaluadoForm').submit(function(event){

        event.preventDefault();
        var datos = new FormData();
        datos.append('nombres', document.querySelector('[name="nombres"]').value);
        datos.append('primer_apellido', document.querySelector('[name="primer_apellido"]').value);
        datos.append('segundo_apellido', document.querySelector('[name="segundo_apellido"]').value);
        datos.append('curp', document.querySelector('[name="curp"]').value);
        datos.append('rfc', document.querySelector('[name="rfc"]').value);
        datos.append('genero', document.querySelector('[name="genero"]').value);
        jQuery.each(jQuery('#files')[0].files, function (i, file) {
            datos.append('file-' + i, file);
        });

        $.ajax({
            url: 'controller/agregarNuevoEvaluado.php',
            processData: false,
            contentType: false,
            cache: false,
            data: datos,
            type: 'POST',
            success: function (data) {
                if (data.includes("registered")) {
                    fireToast('Aviso', '¡Esta C.U.R.P. ya ha sido registrada!', 'info');
                }
                else if (data.includes("true")) {
                    fireToast('Correcto', '¡Se ha registrado un nuevo evaluado!', 'success');
                    $('form :input').val('');
                    document.getElementById('archivo_masivo_label').innerHTML = 'Zona de archivo para carga masiva (sin archivo)';
                }
                else if (data.includes("false")) {
                    const msg = 'Por favor, asegurese de haber completado los campos obligatorios marcados con un asterisco y tambien que la CURP y el RFC sean correctos. E1000';
                    fireToast('Error', msg, 'error');
                }
                else if (data.includes("custom")){
                    const msg = data.split(":")[1];
                    fireToast('Cuidado', msg.replace('\"', ''), 'warning');
                }
                else {
                    const res = data.split(',');
                    var formatedResults  = "";
                    for (var i = 0; i < res.length; i++) {
                        formatedResults += (res[i].replace('"', '') + "<br/>");
                    }
                    formatedResults = formatedResults.replace('[', '').replace(']', '');
                    fireToast('Resultados', formatedResults, 'info');
                    $('form :input').val('');
                    document.getElementById('archivo_masivo_label').innerHTML = 'Zona de archivo para carga masiva (sin archivo)';
                }
            },
            failure: function (data) {
                fireToast('Error', 'Ha ocurrido un error desconocido. E0001', 'error');
            }
        })
    })
});
