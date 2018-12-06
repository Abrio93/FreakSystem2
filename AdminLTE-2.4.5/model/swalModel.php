<?php

class Swal{

    public static function alerta($title = "", $type = "", $position = "", $timer = "0", $showConfirmButton = "false"){
        return "
            <script>
                swal({
                    position: '$position',
                    type: '$type',
                    title: '$title',
                    showConfirmButton: $showConfirmButton,
                    timer: $timer
                  });
            </script>
        ";
    }

}

?>