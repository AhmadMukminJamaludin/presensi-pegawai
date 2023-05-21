<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class PegawaiComponent extends Component
{
    public $form;

    protected $listeners = ['edit'];

    protected $rules = [
        'form.name' => 'required',
        'form.email' => 'required|email',
        'form.password' => 'required',
    ];

    protected $messages = [
        'form.name.required' => 'Nama pegawai belum diisi.',
        'form.email.required' => 'Email belum diisi.',
        'form.password.required' => 'Password belum diisi.',
    ];

    public function edit(User $user)
    {
        $this->form['id'] = $user->id;
        $this->form['name'] = $user->name;
        $this->form['email'] = $user->email;
        $this->form['password'] = '';
    }
    
    public function submit()
    {
        try {
            $this->form['password'] = Hash::make($this->form['password']);
            $this->validate();
            if (array_key_exists('id', $this->form) && isset($this->form['id'])) {
                $user = User::find($this->form['id']);
                $user->update($this->form);
            } else {
                $user = User::create([
                    'name' => $this->form['name'],
                    'email' => $this->form['email'],
                    'password' => $this->form['password'],
                ]);
                $user->assignRole('user');
            }
            $this->form = new User;
            $this->emit('alert-success', 'Berhasil menyimpan');
        } catch (\Throwable $th) {
            dd($th->getMessage(), $th->getLine());
            $this->emit('alert-error', $th->getMessage());
        }
    }

    public function cancelForm()
    {
        $this->form = new User;
        $this->emit('cancelForm');
    }

    public function render()
    {
        return view('livewire.pegawai-component');
    }
}
