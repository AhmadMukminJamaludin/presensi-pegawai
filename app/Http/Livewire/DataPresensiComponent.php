<?php

namespace App\Http\Livewire;

use App\Models\Presensi;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DataPresensiComponent extends Component
{
    public $bulan;
    public $tahun;

    public function mount()
    {
        $this->bulan = date('n');
        $this->tahun = date('Y');
    }

    public function render()
    {
        $tglAkhir = date('t', strtotime($this->tahun . "-" . $this->bulan));
        $jadwal = Presensi::select('presensi.user_id', DB::raw("group_concat(DAY(tanggal) ORDER BY `tanggal` ASC SEPARATOR ', ') as tgl, group_concat(jam_masuk ORDER BY `tanggal` ASC SEPARATOR ', ') as masuk, group_concat(jam_keluar ORDER BY `tanggal` ASC SEPARATOR ', ') as keluar"))->with('user')->groupBy('user_id')->get();
        return view('livewire.data-presensi-component', compact('jadwal', 'tglAkhir'));
    }
}
