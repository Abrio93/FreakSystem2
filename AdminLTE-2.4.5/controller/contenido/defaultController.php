<?php
    require_once "model/logModel.php";

    $silebar = "panel"; //? VARIABLE DECLARADA PARA SEÑALAR EN EL SILEBAR DONDE ESTAMOS

    $logs = Log::consultarTodos();

    require_once "view/contenido/default.phtml";
?>



<script>
    $('#tabla_log').DataTable({
        "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        }
    });
</script>