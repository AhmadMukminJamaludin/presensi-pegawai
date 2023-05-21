<div>
    <h2 class="section-title">Bulan : {{ \Carbon\Carbon::now()->translatedFormat('M Y') }}</h2>
    <x-slot:title>Data Presensi</x-slot:title>
    <div class="card">
        <div class="card-body p-1">
            <div class="table-responsive">
                <table class="table table-sm table-bordered">
                    <thead class="text-center">
                        <tr>
                            <th class="align-middle" rowspan="2">No.</th>
                            <th class="align-middle" rowspan="2">Nama Pegawai</th>
                            <th class="align-middle" colspan="{{ $tglAkhir }}">Tanggal</th>
                        </tr>
                        <tr>
                            @for ($i = 1; $i <= $tglAkhir; $i++)
                                <th class="align-middle">{{ $i }}</th>
                            @endfor
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jadwal as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->user->name }}</td>
                                @for ($i = 1; $i <= $tglAkhir; $i++)
                                    @php
                                        $masuk = explode(', ', $item->masuk);
                                        $tgl = explode(', ', $item->tgl);
                                        $jam_masuk = array_combine($tgl, $masuk);
                                        $presensi = $jam_masuk[$i] ?? '';
                                    @endphp
                                    @if($presensi)
                                        <td class="text-center align-middle">✔</td>
                                    @else
                                        <td></td>
                                    @endif
                                @endfor
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
