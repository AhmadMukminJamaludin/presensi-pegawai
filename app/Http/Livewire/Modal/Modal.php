<?php

namespace App\Http\Livewire\Modal;

use Livewire\Component;

class Modal extends Component
{
    public $alias;
    public $params = [];

    protected $listeners = ['showModal', 'resetModal'];

    public function showModal($alias, ...$params)
    {
        dd($alias);
        $this->alias = $alias;
        $this->params = $params;
        $this->emit('showBootstrapModal');
    }

    public function resetModal()
    {
        $this->reset();
    }

    public function render()
    {
        return view('livewire.modal.modal');
    }
}
