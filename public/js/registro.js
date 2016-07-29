$(document).ready(function () {
    $(".borrarEmpleado").click(function () {
        var id = this.getAttribute("data-id");
        try {
            $.ajax({
                type: 'POST',
                url: "http://crudpf.app/empleados/index/deleteempleado",
                data: $('#registro').serialize() + "&id_empleado=" + id,
                success: function (data) {
                    var obj = jQuery.parseJSON(data);
                    if (obj.status == 'success') {
                        alert("Se borro correctamente el empleado");
                    } else {
                        alert("ERROR..!!! algo sucedio, favor de reportarlo a sistemas");
                    }
                    window.location = "http://crudpf.app/empleados/index/"
                }
            });
        }
        catch (ex) {
            alert(ex.description);
        }
    });

    $("#Registrar").click(function (e) {
        e.preventDefault();
        try {
            $.ajax({
                type: 'POST',
                url: "http://crudpf.app/empleados/index/addempleado",
                data: $('#registro').serialize(),
                success: function (data) {
                    var obj = jQuery.parseJSON(data);
                    if (obj.status == 'success') {
                        alert("Se registro correctamente el empleado");
                    } else {
                        alert("ERROR..!!! algo sucedio, favor de reportarlo a sistemas");
                    }
                    location.reload();
                }
            });
        }
        catch (ex) {
            alert(ex.description);
        }

    });
});