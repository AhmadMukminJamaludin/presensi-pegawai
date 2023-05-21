<?php

namespace App\Http\Livewire;

use App\Models\JamKerja;
use App\Models\Presensi;
use Livewire\Component;

class InputPresensiComponent extends Component
{
    public $presensi;
    public $jam_kerja = [];

    public function mount(Presensi $presensi)
    {
        $this->jam_kerja['jam_masuk'] = JamKerja::where('keterangan', 'Masuk')->first();
        $this->jam_kerja['jam_pulang'] = JamKerja::where('keterangan', 'Pulang')->first();
        $this->jam_kerja['jam_lembur'] = JamKerja::where('keterangan', 'Lembur')->first();
        $data = Presensi::query()
        ->where('user_id', $this->user->id)
        ->where('tanggal', date('Y-m-d', strtotime(now())))
        ->latest()
        ->first();

        if ($data) {
            $this->presensi = $data;
        } else {
            $this->presensi = $presensi;
        }
    }

    public function getUserProperty()
    {
        return auth()->user();
    }

    public function submitPresensi()
    {
        try {
            if ($this->presensi->id) {
                if (date('H:i:s', strtotime(now())) >= date('H:i:s', strtotime($this->jam_kerja['jam_pulang']['jam_mulai'])) && date('H:i:s', strtotime(now())) <= date('H:i:s', strtotime($this->jam_kerja['jam_pulang']['jam_selesai']))) {
                    $status = 'Tepat Waktu';
                    $this->presensi->update([
                        'jam_keluar' => date('H:i:s', strtotime(now())),
                        'status_keluar' => $status
                    ]);
                } elseif (date('H:i:s', strtotime(now())) >= date('H:i:s', strtotime($this->jam_kerja['jam_lembur']['jam_mulai']))) {
                    $status = 'Lembur';
                    $this->presensi->update([
                        'jam_keluar' => date('H:i:s', strtotime(now())),
                        'status_keluar' => $status
                    ]);
                } else {
                    return $this->emit('alert-error', 'Anda sudah presensi masuk hari ini!');
                }
            } else {
                if (date('H:i:s', strtotime(now())) >= date('H:i:s', strtotime($this->jam_kerja['jam_masuk']['jam_mulai'])) && date('H:i:s', strtotime(now())) <= date('H:i:s', strtotime($this->jam_kerja['jam_masuk']['jam_selesai']))) {
                    $status = 'Tepat Waktu';
                } else if(date('H:i:s', strtotime(now())) < date('H:i:s', strtotime($this->jam_kerja['jam_masuk']['jam_mulai']))) {
                    return $this->emit('alert-error', 'Belum waktunya presensi!');
                } else {
                    $status = 'Terlambat';
                }
                $presensi = Presensi::create([
                    'user_id' => $this->user->id,
                    'tanggal' => date('Y-m-d', strtotime(now())),
                    'jam_masuk' => date('H:i:s', strtotime(now())),
                    'status_masuk' => $status
                ]);
                $this->presensi = $presensi;
            }
            return $this->emit('alert-success', 'Berhasil menyimpan presensi');
        } catch (\Throwable $th) {
            dd($th->getMessage(), $th->getLine());
            info($th->getMessage());
            $this->emit('alert-error', 'Terjadi kesalahan!');
        }
    }

    public function render()
    {
        return view('livewire.input-presensi-component');
    }
}
