<div>
    <x-slot:title>Riwayat Presensi</x-slot:title>
    <div class="row row-cols-lg-2">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <div class="row d-flex align-items-center">
                        <div class="col-sm-3">
                            <select wire:model.defer="bulan" class="form-control form-control-sm" style="width: 150px">
                                <option value="">Pilih bulan</option>
                                @foreach (getMonth() as $item)
                                    <option value="{{ $item['id'] }}">{{ $item['bulan'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <select wire:model.defer="tahun" class="form-control form-control-sm" style="width: 150px">
                                <option value="">Pilih tahun</option>
                                @for ($i = 2020; $i <= date('Y'); $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>                                    
                                @endfor
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <button type="button" wire:click="search" class="btn btn-icon icon-left btn-primary"><i class="fas fa-search"></i> Cari</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col"></div>
    </div>
    <div class="card">
        <div class="card-body p-1">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Masuk</th>
                            <th scope="col">Status Masuk</th>
                            <th scope="col">Pulang</th>
                            <th scope="col">Status Keluar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 1; $i <= $tglAkhir; $i++)
                            @php
                                $item = $data_presensi[$i] ?? '';
                                $tanggal = date('Y-m-d', strtotime($this->tahun.'-'.$this->bulan.'-'.$i));
                            @endphp
                            @if ($item)
                                <tr @class(['bg-secondary' => \Carbon\Carbon::create($tanggal)->translatedFormat('l') == 'Minggu'])>
                                    <td>{{ $i }}</td>
                                    <td>{{ \Carbon\Carbon::create($item->tanggal)->translatedFormat('l, d F Y') }}</td>
                                    <td>{{ $item->jam_masuk }}</td>
                                    <td>{{ $item->status_masuk }}</td>
                                    <td>{{ $item->jam_keluar }}</td>
                                    <td>{{ $item->status_keluar }}</td>
                                </tr>
                            @else
                                <tr @class(['bg-secondary' => \Carbon\Carbon::create($tanggal)->translatedFormat('l') == 'Minggu'])>
                                    <td>{{ $i }}</td>
                                    <td>{{ \Carbon\Carbon::create($tanggal)->translatedFormat('l, d F Y') }}</td>
                                    <td colspan="4" class="text-center align-middle">Belum presensi</td>
                                </tr>
                            @endif
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
