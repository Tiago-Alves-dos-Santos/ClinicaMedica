<?php

namespace App\View\Components;

use Illuminate\View\Component;

class breadcumb extends Component
{
    public $titulo = null;
    public $links = null;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($titulo, $links=["0","0"])
    {
        $this->links = $links;
        $this->titulo = $titulo;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.breadcumb');
    }
}
