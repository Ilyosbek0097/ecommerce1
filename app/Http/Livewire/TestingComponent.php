<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TestingComponent extends Component
{

    public $sanoq = 100;
    public $variable = 2554;

    public function qoshish()
    {
        $this->sanoq--;
    }
    public function render()
    {
        return view('livewire.testing-component')->layout('layouts.base');
    }

}
