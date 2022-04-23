<?php

namespace App\View\Components;

use Illuminate\View\Component;

class titleSection extends Component
{
    public $titulo = null;
    public $h = null;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($h='h3', $titulo)
    {
        $this->titulo = $titulo;
        $this->h = $h;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.title-section');
    }
}
