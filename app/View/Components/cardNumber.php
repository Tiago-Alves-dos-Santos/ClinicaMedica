<?php

namespace App\View\Components;

use Illuminate\View\Component;

class cardNumber extends Component
{
    public $class = null;
    public $numero = 0;
    public $titulos = null;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($class, $numero, $titulos)
    {
       $this->class = $class;
       $this->numero = $numero;
       $this->titulos = $titulos;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card-number');
    }
}
