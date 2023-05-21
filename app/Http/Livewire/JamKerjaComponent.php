<?php

namespace App\Http\Livewire;

use App\Models\JamKerja;
use Illuminate\Validation\Validator;
use Livewire\Component;

class JamKerjaComponent extends Component
{
    public $data;

    protected $rules = [
        'data.*.keterangan' => 'required',
        'data.*.jam_mulai' => 'required',
        'data.*.jam_selesai' => 'required',
    ];

    public function mount()
    {
        $this->data = JamKerja::all();
    }

    public function submit()
    {
        $this->withValidator(function (Validator $validator) {
            if ($validator->fails()) {
                $this->emit('alert-error', 'Data harus diisi.');
            }
        })->validate();
        
        $this->data->each->save();
        $this->emit('alert-success', 'Berhasil menyimpan.');
    }

    public function render()
    {
        return view('livewire.jam-kerja-component');
    }
}
