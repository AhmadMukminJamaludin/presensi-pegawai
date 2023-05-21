<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">PRESENSI</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">PRE</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Presensi</li>
            <li class="{{ request()->is(['/']) ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/') }}"><i class="far fa-edit"></i> <span>Presensi</span></a>
            </li>
            <li class="{{ request()->is(['riwayat-presensi']) ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/riwayat-presensi') }}"><i class="fas fa-indent"></i> <span>Riwayat Presensi</span></a>
            </li>
            @if (Auth::user()->hasRole('admin'))
                <li class="menu-header">Manajemen</li>
                <li class="{{ request()->is(['data-pegawai']) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/data-pegawai') }}"><i class="fas fa-users"></i> <span>Data Pegawai</span></a>
                </li>
                <li class="{{ request()->is(['data-presensi']) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/data-presensi') }}"><i class="fas fa-indent"></i> <span>Data Presensi</span></a>
                </li>
                <li class="menu-header">Setting</li>
                <li class="{{ request()->is(['jam-kerja']) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/jam-kerja') }}"><i class="fas fa-clock"></i> <span>Jam Kerja</span></a>
                </li>
            @else
                
            @endif
            
        </ul>
    </aside>
</div>

