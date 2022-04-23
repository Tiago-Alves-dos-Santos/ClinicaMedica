<?php

namespace App\View\Components;

use Illuminate\View\Component;

class loadDiv extends Component
{
    public $id = null;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id = 'loadPage')
    {
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.load-div');
    }
}
