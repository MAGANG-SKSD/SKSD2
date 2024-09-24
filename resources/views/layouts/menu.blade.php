<ul class="nav flex-column">
    <li class="nav-item {{ Request::is('anggaranKas*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('anggaranKas.index') }}">
            <i class="nav-icon fas fa-money-check-alt"></i>
            <span>Anggaran Kas</span>
        </a>
    </li>
    <li class="nav-item {{ Request::is('apbdes*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('apbdes.index') }}">
            <i class="nav-icon fas fa-chart-line"></i>
            <span>APBDes</span>
        </a>
    </li>
    <li class="nav-item {{ Request::is('danas*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('danas.index') }}">
            <i class="nav-icon fas fa-piggy-bank"></i>
            <span>Dana</span>
        </a>
    </li>
    <li class="nav-item {{ Request::is('desas*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('desas.index') }}">
            <i class="nav-icon fas fa-home"></i>
            <span>Desa</span>
        </a>
    </li>
    <li class="nav-item {{ Request::is('dokumens*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dokumens.index') }}">
            <i class="nav-icon fas fa-file-alt"></i>
            <span>Dokumen</span>
        </a>
    </li>
    <li class="nav-item {{ Request::is('noRekenings*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('noRekenings.index') }}">
            <i class="nav-icon fas fa-receipt"></i>
            <span>No Rekening</span>
        </a>
    </li>
    <li class="nav-item {{ Request::is('realisasiAnggarans*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('realisasi_anggarans.index') }}">
            <i class="nav-icon fas fa-coins"></i>
            <span>Realisasi Anggaran</span>
        </a>
    </li>
    <li class="nav-item {{ Request::is('sp2ds*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('sp2ds.index') }}">
            <i class="nav-icon fas fa-file-invoice-dollar"></i>
            <span>SP2D</span>
        </a>
    </li>
</ul>
<li class="nav-item {{ Request::is('klasifikasiBelanjas*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('klasifikasiBelanjas.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Klasifikasi Belanjas</span>
    </a>
</li>
