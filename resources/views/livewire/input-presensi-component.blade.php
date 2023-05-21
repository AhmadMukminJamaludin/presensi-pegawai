<div>
    <div class="row row-cols-lg-2">
        <div class="col-12 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="empty-state">
                        <div class="empty-state-icon mb-2" style="width: 200px; height: 50px">
                            <h1 id="clock" class="text-white"></h1>
                        </div>
                        <p>{{ \Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y') }}</p>
                        <button type="button" class="btn btn-icon icon-left btn-primary" wire:click="submitPresensi"><i class="far fa-edit"></i> 
                            @if (date('H:i:s', strtotime(now())) <= date('H:i:s', strtotime('17:00:00')))
                                <span>Presensi Masuk</span>
                            @else
                                <span>Presensi Keluar</span>
                            @endif
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Presensi hari ini</h4>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled list-unstyled-border">
                        @if ($this->presensi->id)
                            <li class="media">
                                <img class="mr-3 rounded-circle" width="50" src="{{ asset('img/avatar/avatar-4.png') }}" alt="avatar">
                                <div class="media-body">
                                    <div @class(['badge badge-pill mb-1 float-right', 'badge-success' => $this->presensi->status_masuk == 'Tepat Waktu', 'badge-warning' => $this->presensi->status_masuk == 'Terlambat'])>{{ $this->presensi->status_masuk }}</div>
                                    <h6 class="media-title"><a href="#">Presensi Masuk</a></h6>
                                    <div class="text-small text-muted">{{ \Carbon\Carbon::create($this->presensi->tanggal)->isoFormat('dddd, D MMMM Y') }} <div class="bullet"></div> <span class="text-primary">{{ date('H:i:s', strtotime($this->presensi->jam_masuk)) }}</span></div>
                                </div>
                            </li>
                            @if ($this->presensi->status_keluar)
                                <li class="media">
                                    <img class="mr-3 rounded-circle" width="50" src="{{ asset('img/avatar/avatar-4.png') }}" alt="avatar">
                                    <div class="media-body">
                                        <div @class(['badge badge-pill mb-1 float-right', 'badge-success' => $this->presensi->status_keluar == 'Tepat Waktu', 'badge-primary' => $this->presensi->status_keluar == 'Lembur'])>{{ $this->presensi->status_keluar }}</div>
                                        <h6 class="media-title"><a href="#">Presensi Keluar</a></h6>
                                        <div class="text-small text-muted">{{ \Carbon\Carbon::create($this->presensi->tanggal)->isoFormat('dddd, D MMMM Y') }} <div class="bullet"></div> <span class="text-primary">{{ date('H:i:s', strtotime($this->presensi->jam_keluar)) }}</span></div>
                                    </div>
                                </li>
                            @endif
                        @else
                            <div class="alert alert-primary alert-has-icon">
                                <div class="alert-icon mr-2"><i class="fas fa-exclamation-triangle"></i></div>
                                <div class="alert-body">
                                    <div class="alert-title">Informasi</div>
                                    Anda belum presensi hari ini.
                                </div>
                            </div>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function displayTime() {
        const date = new Date();
        let hours = date.getHours();
        let minutes = date.getMinutes();
        let seconds = date.getSeconds();
        
        hours = (hours < 10) ? "0" + hours : hours;
        minutes = (minutes < 10) ? "0" + minutes : minutes;
        seconds = (seconds < 10) ? "0" + seconds : seconds;

        const time = hours + ":" + minutes + ":" + seconds;
        document.getElementById("clock").innerHTML = time;
        
        setTimeout(displayTime, 1000);
    }

    displayTime();

</script>
@endpush
