<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class DataPegawaiComponent extends Component
{
    public $pegawai;
    public $stateForm = false;

    protected $listeners = ['cancelForm', 'deletePegawai'];

    public function mount()
    {
        $this->pegawai = User::all();
    }
    
    public function cancelForm()
    {
        $this->stateForm = false;
        $this->mount();
    }

    public function addPegawai()
    {
        $this->stateForm = true;
    }

    public function editPegawai($id)
    {
        $this->stateForm = true;
        $this->emit('edit', $id);
    }

    public function deletePegawai(User $user)
    {
        $user->delete();
        $this->mount();
    }

    public function render()
    {
        return view('livewire.data-pegawai-component');
    }
}
