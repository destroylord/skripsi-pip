<?php

namespace App\Livewire;

use Livewire\Component;

class BlankComponent extends Component
{
    public function render()
    {
        return view('livewire.blank-component')
        ->layout('layouts.app');
    }
}
