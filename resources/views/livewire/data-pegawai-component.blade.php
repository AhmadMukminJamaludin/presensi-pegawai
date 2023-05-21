<div>
    <x-slot:title>Data Pegawai</x-slot:title>
    @if ($stateForm)
        <livewire:pegawai-component />
    @else
        <button type="button" class="btn btn-primary mb-3" wire:click="addPegawai"><i class="fas fa-plus mr-2"></i> Tambah pegawai</button>
        <div class="card">
            <div class="card-body p-1">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Nama Pegawai</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pegawai as $item)
                                <tr>
                                    <td class="text-center align-middle">{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>
                                        @if ($item->hasRole('admin'))
                                            <span class="badge badge-primary">Admin</span>
                                        @else
                                            <span class="badge badge-info">User</span>
                                        @endif
                                    </td>
                                    <td class="text-center align-middle">
                                        <button class="btn btn-primary btn-action mr-1" wire:click="editPegawai({{ $item->id }})"><i class="fas fa-pencil-alt"></i></button>
                                        <button type="button" class="btn btn-danger btn-action" onclick="deletePegawai({{ $item->id }})"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>        
    @endif
</div>

@push('scripts')
<script>
    function deletePegawai(id) {
        Swal.fire({
            text: `Apakah benar anda ingin menghapus data ini?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, Benar',
            cancelButtonText: 'Tidak',
            customClass: {
                confirmButton: 'btn btn-danger',
                cancelButton: 'btn btn-light'
            }
        }).then((result) => {
            if (result.isConfirmed) { 
                Livewire.emit('deletePegawai', id);
            }
        });        
    }
</script>    
@endpush

