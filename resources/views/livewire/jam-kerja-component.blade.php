<div>
    <x-slot:title>Jam Kerja</x-slot:title>
    <div class="card">
        <div class="card-body p-1">
            <div class="d-flex justify-content-end p-3">
                <button class="btn btn-primary btn-icon" wire:click="submit"><i class="fas fa-check pr-1"></i> Simpan</button>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Jam Mulai</th>
                            <th scope="col">Jam Selesai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $item->keterangan }}</td>
                                <td class="align-middle">
                                    <input type="time" class="form-control form-control-sm border-0 p-0"
                                        wire:model.defer="data.{{ $loop->index }}.jam_mulai" />
                                </td>
                                <td class="align-middle">
                                    <input type="time" class="form-control form-control-sm border-0 p-0"
                                        wire:model.defer="data.{{ $loop->index }}.jam_selesai" />
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
