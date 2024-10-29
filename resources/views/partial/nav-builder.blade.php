@php
$users = \Auth::user();
$currantLang = $users->currentLanguage();
$logo = asset(Storage::url('uploads/logo/'));
$settings = Utility::settings();
@endphp

<!-- [ navigation menu ] start -->
<nav class="dash-sidebar light-sidebar transprent-bg responsive-nav">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="{{ route('home') }}" class="b-brand">
                @if (isset($settings['dark_mode']))
                    @if ($settings['dark_mode'] == 'on')
                        <img class="c-sidebar-brand-full pt-3 mt-2 mb-1"
                            src="{{ $logo . (isset($company_logo) && !empty($company_logo) ? $company_logo : 'light_logo.png') }} "
                            height="46" class="navbar-brand-img">
                    @else
                        <img class="c-sidebar-brand-full pt-3 mt-2 mb-1"
                            src="{{ $logo . (isset($company_logo) && !empty($company_logo) ? $company_logo : 'dark_logo.png') }} "
                            height="46" class="navbar-brand-img">
                    @endif
                @else
                    <img class="c-sidebar-brand-full pt-3 mt-2 mb-1"
                        src="{{ $logo . (isset($company_logo) && !empty($company_logo) ? $company_logo : 'dark_logo.png') }} "
                        height="46" class="navbar-brand-img">
                @endif
            </a>
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="navbarResponsive">
            <div class="navbar-content active dash-trigger ps ps--active-y">
                <ul class="dash-navbar d-flex flex-column"> <!-- Menggunakan flexbox -->
                    <li class="dash-item dash-hasmenu {{ request()->is('/') ? 'active' : '' }}">
                        <a class="dash-link" href="{{ url('/') }}">
                            <span class="dash-micon"><i class="ti ti-home"></i></span>
                            <span class="dash-mtext custom-weight">{{ __('Dashboard') }}</span>
                        </a>
                    </li>
                    @can('manage-user')
                    <li class="dash-item dash-hasmenu {{ request()->is('users*') ? 'active' : '' }}">
                        <a class="dash-link" href="{{ route('users.index') }}">
                            <span class="dash-micon"><i class="ti ti-user"></i></span>
                            <span class="dash-mtext custom-weight">{{ __('Users') }}</span>
                        </a>
                    </li>
                    @endcan
                    @can('manage-role')
                    <li class="dash-item dash-hasmenu {{ request()->is('roles*') ? 'active' : '' }}">
                        <a class="dash-link" href="{{ route('roles.index') }}">
                            <span class="dash-micon"><i class="ti ti-key"></i></span>
                            <span class="dash-mtext custom-weight">{{ __('Roles') }}</span>
                        </a>
                    </li>
                    @endcan
                    @can('manage-permission')
                    <li class="dash-item dash-hasmenu {{ request()->is('permission*') ? 'active' : '' }}">
                        <a class="dash-link" href="{{ route('permission.index') }}">
                            <span class="dash-micon"><i class="ti ti-lock"></i></span>
                            <span class="dash-mtext custom-weight">{{ __('Permissions') }}</span>
                        </a>
                    </li>
                    @endcan
                    @can('manage-module')
                    <li class="dash-item dash-hasmenu {{ request()->is('modules*') ? 'active' : '' }}">
                        <a class="dash-link" href="{{ route('modules.index') }}">
                            <span class="dash-micon"><i class="ti ti-subtask"></i></span>
                            <span class="dash-mtext custom-weight">{{ __('Modules') }}</span>
                        </a>
                    </li>
                    @endcan
                    @role('admin')
                    <li class="dash-item dash-hasmenu {{ request()->is('settings*') ? 'active' : '' }}">
                        <a class="dash-link" href="{{ route('settings.index') }}">
                            <span class="dash-micon"><i class="ti ti-settings"></i></span>
                            <span class="dash-mtext custom-weight">{{ __('Settings') }}</span>
                        </a>
                    </li>
                    @endrole
                    @can('manage-language')
                    <li class="dash-item dash-hasmenu {{ request()->is('index') ? 'active' : '' }}">
                        <a class="dash-link" href="{{ route('index') }}">
                            <span class="dash-micon"><i class="ti ti-world"></i></span>
                            <span class="dash-mtext custom-weight">{{ __('Language') }}</span>
                        </a>
                    </li>
                    @endcan
                    @role('admin')
                    <li class="dash-item dash-hasmenu {{ request()->is('home*') ? 'active' : '' }}">
                        <a class="dash-link" href="{{ route('io_generator_builder') }}" target="_blank">
                            <span class="dash-micon"><i class="ti ti-3d-cube-sphere"></i></span>
                            <span class="dash-mtext custom-weight">{{ __('CRUD') }}</span>
                        </a>
                    </li>
                    @endrole
                    {{-- <li class="dash-item dash-hasmenu {{ request()->is('anggaranKas*') ? 'active' : '' }}">
                        <a class="dash-link" href="{{ route('anggaranKas.index') }}">
                            <span class="dash-micon"><i class="ti ti-map"></i></span>
                            <span class="dash-mtext custom-weight">{{ __('Anggaran kas') }}</span>
                        </a>
                    </li> --}}
                    <li class="dash-item dash-hasmenu {{ request()->is('apbdes*') ? 'active' : '' }}">
                        <a class="dash-link" href="{{ route('apbdes.index') }}">
                            <span class="dash-micon"><i class="ti ti-wallet"></i></span>
                            <span class="dash-mtext custom-weight">{{ __('APBDes') }}</span>
                        </a>
                    </li>
                    {{-- <li class="dash-item dash-hasmenu {{ request()->is('danas*') ? 'active' : '' }}">
                        <a class="dash-link" href="{{ route('danas.index') }}">
                            <span class="dash-micon"><i class="ti ti-bell"></i></span>
                            <span class="dash-mtext custom-weight">{{ __('Dana') }}</span>
                        </a>
                    </li> --}}
                    <li class="dash-item dash-hasmenu {{ request()->is('desas*') ? 'active' : '' }}">
                        {{-- <a class="dash-link" href="{{ route('desas.profile', ['desa_id' => 1]) }}"> --}}
                        <a class="dash-link" href="{{ route('desas.profile', ['desa_id' => auth()->user()->desa->desa_id]) }}">
                            <span class="dash-micon"><i class="ti ti-crown"></i></span>
                            <span class="dash-mtext custom-weight">{{ __('Profile Desa') }}</span>
                        </a>
                    </li>
                    {{-- @if(auth()->user()->desa)
                        <a class="dash-link" href="{{ route('desas.profile', ['desa_id' => auth()->user()->desa->desa_id]) }}">
                            <span class="dash-micon"><i class="ti ti-crown"></i></span>
                            <span class="dash-mtext custom-weight">{{ __('Profile Desa') }}</span>
                        </a>
                    @else
                        <p>{{ __('No Desa data available') }}</p>
                    @endif --}}

                


                <!--  -->
                {{-- @if($desas->isNotEmpty())
                    @foreach($desas as $desa)
                        <li class="dash-item dash-hasmenu {{ request()->is('desas*') ? 'active' : '' }}">
                            <a class="dash-link" href="{{ route('desas.profile', ['desa_id' => $desa->desa_id]) }}">
                                <span class="dash-micon"><i class="ti ti-bell"></i></span>
                                <span class="dash-mtext custom-weight">{{ __('Desa: '.$desa->nama_desa) }}</span>
                            </a>
                        </li>
                    @endforeach
                @else
                    <p>No data available</p>
                @endif --}}






                <!--  -->
                <li class="dash-item dash-hasmenu {{ request()->is('dokumens*') ? 'active' : '' }}">
                        <a class="dash-link" href="{{ route('dokumens.index') }}">
                            <span class="dash-micon"><i class="ti ti-file"></i></span>
                            <span class="dash-mtext custom-weight">{{ __('Dokumen') }}</span>
                        </a>
                    </li>
                <!--  -->
                <li class="dash-item dash-hasmenu {{ request()->is('no_rekenings*') ? 'active' : '' }}">
                        <a class="dash-link" href="{{ route('no_rekenings.index') }}">
                            <span class="dash-micon"><i class="ti ti-lock"></i></span>
                            <span class="dash-mtext custom-weight">{{ __('No Rekening') }}</span>
                        </a>
                    </li>
                    <li class="dash-item dash-hasmenu {{ request()->is('surat_perintah*') ? 'active' : '' }}">
                        <a class="dash-link" href="{{ route('surat_perintah.index') }}">
                            <span class="dash-micon"><i class="ti ti-folder"></i></span>
                            <span class="dash-mtext custom-weight">{{ __('Kelola Surat') }}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- [ navigation menu ] end -->

<!-- Tambahkan CSS -->
<style>
    /* Default sidebar styling */
    .dash-sidebar {
        width: 250px;
    }

    /* Tombol toggle hanya muncul di layar kecil */
    .navbar-toggler {
        display: none;
    }

    /* Sidebar collapse untuk tampilan kecil */
    @media (max-width: 768px) {
        .dash-sidebar {
            width: 100%; /* Full width pada layar kecil */
            position: relative;
        }

        .dash-sidebar .navbar-content {
            padding: 0;
        }

        .dash-navbar {
            display: flex;
            flex-direction: column;
        }

        .dash-item {
            width: 100%;
            text-align: center;
        }

        .navbar-toggler {
            display: block; /* Tombol toggle muncul di layar kecil */
        }
    }

    /* Menambahkan padding atau margin pada layar kecil */
    @media (max-width: 576px) {
        .dash-navbar {
            padding: 10px 0;
        }

        .dash-item {
            padding: 10px;
        }
    }

    /* Menangani perubahan pada layar sedang */
    @media (min-width: 769px) and (max-width: 1024px) {
        .dash-sidebar {
            width: 250px; /* Sidebar dengan lebar tetap */
        }

        .dash-navbar {
            padding: 15px;
        }
    }
</style>
