function cargarMenu() {
    $.ajax({
        url : "loadMenu.php",
        beforeSend : function () {

        },
        success : function (datos) {
            $("#menu_principal").html(datos);
        }
    });
}
