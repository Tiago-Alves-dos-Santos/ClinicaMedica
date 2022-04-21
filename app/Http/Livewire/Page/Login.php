<?php

namespace App\Http\Livewire\Page;

use Livewire\Component;

class Login extends Component
{
    public $login = '';

    public function render()
    {
        return view('livewire.page.login')
        ->extends('layouts.central')
        ->section('body');
    }
}
