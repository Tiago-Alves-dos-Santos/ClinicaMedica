<?php

namespace App\View\Components;

use Illuminate\View\Component;

class modal extends Component
{
    public $titulo = null;
    public $id = null;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($titulo, $id)
    {
        $this->titulo = $titulo;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modal');
    }
}
