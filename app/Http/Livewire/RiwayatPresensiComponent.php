<?php

namespace App\Http\Livewire;

use App\Models\Presensi;
use Livewire\Component;

class RiwayatPresensiComponent extends Component
{
    public $bulan;
    public $tahun;
    public $presensi = [];

    public function getUserProperty()
    {
        return auth()->user();
    }

    public function mount()
    {
        $this->bulan = date('n');
        $this->tahun = date('Y');
        $this->presensi = Presensi::query()
            ->whereMonth('tanggal', $this->bulan)
            ->whereYear('tanggal', $this->tahun)
            ->where('user_id', $this->user->id)
            ->get();
    }

    public function search()
    {
        $this->presensi = Presensi::query()
            ->whereMonth('tanggal', $this->bulan)
            ->whereYear('tanggal', $this->tahun)
            ->where('user_id', $this->user->id)
            ->get();
    }

    public function render()
    {
        $tglAkhir = date('t', strtotime($this->tahun . "-" . $this->bulan));
        $data_presensi = [];
        for ($i=1; $i < $tglAkhir; $i++) { 
            foreach ($this->presensi as $item) {
                if (date('Y-m-d', strtotime($item->tanggal)) == date('Y-m-d', strtotime($this->tahun.'-'.$this->bulan.'-'.$i))) {
                    $data_presensi[$i] = $item;
                }
            }
        }
        return view('livewire.riwayat-presensi-component', compact('tglAkhir', 'data_presensi'))->layout('layouts.app');
    }
}
