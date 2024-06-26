var grados = `<option value="">Seleccione...</option>
<option value="1">1º</option>
<option value="2">2º</option>
<option value="3">3º</option>
<option value="4">4º</option>
<option value="5">5º</option>
<option value="6">6º</option>`;

var grados_inicial = `<option value="">Seleccione...</option>
<option value="1">1º</option>
<option value="2">2º</option>`;

$(document).ready(function () {
    usuarios();
    personal();
    kardex_personal();
    boleta_calificaciones();
    centralizador_calificaciones();
    historial_academico();
    horarios();
    estadistica_estudiantes();
    filiacion_padres();
    kardex_desempenos();
});

function usuarios() {
    var tipo = $("#m_usuarios #tipo").parents(".form-group");
    tipo.hide();
    $("#m_usuarios select#filtro").change(function () {
        let filtro = $(this).val();
        switch (filtro) {
            case "todos":
                tipo.hide();
                break;
            case "tipo":
                tipo.show();
                break;
        }
    });
}

function personal() {
    var gestion = $("#m_personal #gestion").parents(".form-group");
    gestion.hide();
    $("#m_personal select#filtro").change(function () {
        let filtro = $(this).val();
        switch (filtro) {
            case "todos":
                gestion.hide();
                break;
            case "administrativos":
                gestion.hide();
                break;
            case "profesores":
                gestion.hide();
                break;
            case "gestion":
                gestion.show();
                break;
        }
    });
}

function kardex_personal() {
    var personal = $("#m_kardex_personal #personal").parents(".form-group");
    personal.hide();
    $("#m_kardex_personal select#filtro").change(function () {
        let filtro = $(this).val();
        switch (filtro) {
            case "todos":
                personal.hide();
                personal.find("input").removeAttr("required");
                break;
            case "administrativos":
                personal.hide();
                personal.find("input").removeAttr("required");
                break;
            case "profesores":
                personal.hide();
                personal.find("input").removeAttr("required");
                break;
            case "individual":
                personal.find("input").prop("required", true);
                personal.show();
                break;
        }
    });
}

function boleta_calificaciones() {
    var estudiante = $("#m_boleta_calificaciones #estudiante").parents(
        ".form-group"
    );
    var nivel = $("#m_boleta_calificaciones #nivel").parents(".form-group");
    var grado = $("#m_boleta_calificaciones #grado").parents(".form-group");
    var paralelo = $("#m_boleta_calificaciones #paralelo").parents(
        ".form-group"
    );
    var turno = $("#m_boleta_calificaciones #turno").parents(".form-group");
    var gestion = $("#m_boleta_calificaciones #gestion").parents(".form-group");
    var trimestre = $("#m_boleta_calificaciones #trimestre").parents(
        ".form-group"
    );

    nivel.find("select").change(function () {
        let valor = nivel.find("select").val();
        if (valor != "NIVEL INICIAL") {
            grado.find("select").html(grados);
        } else {
            grado.find("select").html(grados_inicial);
        }
    });

    estudiante.hide();
    $("#m_boleta_calificaciones select#filtro").change(function () {
        let filtro = $(this).val();
        switch (filtro) {
            case "todos":
                estudiante.hide();
                estudiante.find("input").removeAttr("required");
                break;
            case "individual":
                estudiante.show();
                break;
        }
    });
}

function centralizador_calificaciones() {
    var nivel = $("#m_centralizador_calificacions #nivel").parents(
        ".form-group"
    );
    var grado = $("#m_centralizador_calificacions #grado").parents(
        ".form-group"
    );

    nivel.find("select").change(function () {
        let valor = nivel.find("select").val();
        if (valor != "NIVEL INICIAL") {
            grado.find("select").html(grados);
            grado.find("select").append('<option value="todos">Todos</option>');
        } else {
            grado.find("select").html(grados_inicial);
            grado.find("select").append('<option value="todos">Todos</option>');
        }
    });
}

function historial_academico() {
    var estudiante = $("#m_historial_academico #estudiante").parents(
        ".form-group"
    );
    var nivel = $("#m_historial_academico #nivel").parents(".form-group");
    var grado = $("#m_historial_academico #grado").parents(".form-group");
    var paralelo = $("#m_historial_academico #paralelo").parents(".form-group");
    var turno = $("#m_historial_academico #turno").parents(".form-group");
    var gestion = $("#m_historial_academico #gestion").parents(".form-group");

    nivel.find("select").change(function () {
        let valor = nivel.find("select").val();
        if (valor != "NIVEL INICIAL") {
            grado.find("select").html(grados);
        } else {
            grado.find("select").html(grados_inicial);
        }
    });
}

function horarios() {
    var nivel = $("#m_horarios #nivel").parents(".form-group");
    var grado = $("#m_horarios #grado").parents(".form-group");
    var paralelo = $("#m_horarios #paralelo").parents(".form-group");
    var turno = $("#m_horarios #turno").parents(".form-group");
    var gestion = $("#m_horarios #gestion").parents(".form-group");

    nivel.find("select").change(function () {
        let valor = nivel.find("select").val();
        if (valor != "NIVEL INICIAL") {
            grado.find("select").html(grados);
        } else {
            grado.find("select").html(grados_inicial);
        }
    });
}

function estadistica_estudiantes() {
    var nivel = $("#m_estadistica_estudiantes #nivel").parents(".form-group");
    var grado = $("#m_estadistica_estudiantes #grado").parents(".form-group");
    var paralelo = $("#m_estadistica_estudiantes #paralelo").parents(
        ".form-group"
    );
    var turno = $("#m_estadistica_estudiantes #turno").parents(".form-group");
    var gestion = $("#m_estadistica_estudiantes #gestion").parents(
        ".form-group"
    );

    nivel.find("select").change(function () {
        let valor = nivel.find("select").val();
        if (valor != "NIVEL INICIAL") {
            grado.find("select").html(grados);
        } else {
            grado.find("select").html(grados_inicial);
        }
    });
}

function filiacion_padres() {
    var nivel = $("#m_filiacion_padres #nivel").parents(".form-group");
    var grado = $("#m_filiacion_padres #grado").parents(".form-group");
    var paralelo = $("#m_filiacion_padres #paralelo").parents(".form-group");
    var turno = $("#m_filiacion_padres #turno").parents(".form-group");
    var gestion = $("#m_filiacion_padres #gestion").parents(".form-group");

    nivel.find("select").change(function () {
        let valor = nivel.find("select").val();
        if (valor != "NIVEL INICIAL") {
            grado.find("select").html(grados);
        } else {
            grado.find("select").html(grados_inicial);
        }
    });
}

function kardex_desempenos() {
    var nivel = $("#m_kardex_desempenos #nivel").parents(".form-group");
    var grado = $("#m_kardex_desempenos #grado").parents(".form-group");
    var paralelo = $("#m_kardex_desempenos #paralelo").parents(".form-group");
    var turno = $("#m_kardex_desempenos #turno").parents(".form-group");
    var gestion = $("#m_kardex_desempenos #gestion").parents(".form-group");

    nivel.find("select").change(function () {
        let valor = nivel.find("select").val();
        if (valor != "NIVEL INICIAL") {
            grado.find("select").html(grados);
        } else {
            grado.find("select").html(grados_inicial);
        }
    });
}
