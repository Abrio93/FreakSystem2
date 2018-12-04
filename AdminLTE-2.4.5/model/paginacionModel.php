<?php

class Paginacion{
    public $pagina_actual;
    public $total_por_pagina;
    public $total_registros;

    public function __construct($pagina = 1, $cantidad_x_pagina = 3, $total = 0){
        $this->pagina_actual = $pagina;
        $this->total_por_pagina = $cantidad_x_pagina;
        $this->total_registros = $total;
    }

    public function total_paginas(){
        return ceil($this->total_registros / $this->total_por_pagina);
    }

    public function pagina_siguiente(){
        return $this->pagina_actual+1;
    }

    public function pagina_anterior(){
        return $this->pagina_actual-1;
    }

    public function existe_siguiente(){
        return ($this->pagina_actual < $this->total_paginas());
    }

    public function existe_anterior(){
        return ($this->pagina_actual > 1);
    }

    public function offset(){
        return ($this->pagina_actual-1) * $this->total_por_pagina;
    }
}
?>