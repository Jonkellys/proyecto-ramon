<?php

class empleado extends controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    public function empleado($params)
    {
        $this->views->getView($this, "empleado");
    }
}
