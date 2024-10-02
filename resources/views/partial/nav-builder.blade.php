@php
$users = \Auth::user();
$currantLang = $users->currentLanguage();
$logo = asset(Storage::url('uploads/logo/'));
$settings = Utility::settings();


@endphp

<!-- [ navigation menu ] start -->
<nav class="dash-sidebar light-sidebar transprent-bg">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="{{ route('home') }}" class="b-brand">
                <!-- ========   change your logo hear   ============ -->
                {{-- @if (setting('app_logo'))
                    <img src="{{ Storage::url(setting('app_logo')) ? Storage::url('uploads/appLogo/app-logo.png') : '' }}"
                        alt="logo" class="custom-logo">
                @else
                    <a href="{{ route('home') }}">{{ setting('app_name') }}</a>
                @endif --}}
                @if (isset($settings['dark_mode']))
                    @if ($settings['dark_mode'] == 'on')
                        <img class="c-sidebar-brand-full pt-3 mt-2 mb-1"
                            src="{{ $logo . (isset($company_logo) && !empty($company_logo) ? $company_logo : 'light_logo.png') }}"
                            height="46" class="navbar-brand-img">
                    @else
                        <img class="c-sidebar-brand-full pt-3 mt-2 mb-1"
                            src="{{ $logo . (isset($company_logo) && !empty($company_logo) ? $company_logo : 'dark_logo.png') }}"
                            height="46" class="navbar-brand-img">
                    @endif
                @else
                    <img class="c-sidebar-brand-full pt-3 mt-2 mb-1"
                        src="{{ $logo . (isset($company_logo) && !empty($company_logo) ? $company_logo : 'dark_logo.png') }}"
                        height="46" class="navbar-brand-img">
                @endif
                {{-- <img class="c-sidebar-brand-minimized"
                    src="{{ $logo . (isset($company_logo) && !empty($company_logo) ? $company_logo : 'small_logo.png') }}"
                    height="46" class="navbar-brand-img"> --}}
            </a>
        </div>
        <div class="navbar-content active dash-trigger ps ps--active-y">
            <ul class="dash-navbar" style="display: block;">
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
                <!-- Penambahan baru dari rizky -->
                <li class="dash-item dash-hasmenu {{ request()->is('anggaranKas*') ? 'active' : '' }}">
                        <a class="dash-link" href="{{ route('anggaranKas.index') }}">
                            <span class="dash-micon"><i class="ti ti-map"></i></span>
                            <span class="dash-mtext custom-weight">{{ __('Anggaran kas') }}</span>
                        </a>
                    </li>
                <!--  -->
                <li class="dash-item dash-hasmenu {{ request()->is('apbdes*') ? 'active' : '' }}">
                        <a class="dash-link" href="{{ route('apbdes.index') }}">
                            <span class="dash-micon"><i class="ti ti-wallet"></i></span>
                            <span class="dash-mtext custom-weight">{{ __('APBDes') }}</span>
                        </a>
                    </li>
                <!--  -->
                <li class="dash-item dash-hasmenu {{ request()->is('danas*') ? 'active' : '' }}">
                        <a class="dash-link" href="{{ route('danas.index') }}">
                            <span class="dash-micon"><i class="ti ti-bell"></i></span>
                            <span class="dash-mtext custom-weight">{{ __('Dana') }}</span>
                        </a>
                    </li>
                <li class="dash-item dash-hasmenu {{ request()->is('desas*') ? 'active' : '' }}">
                    <a class="dash-link" href="{{ route('desas.profile', ['desa_id' => 1]) }}">
                        <span class="dash-micon"><i class="ti ti-crown"></i></span>
                        <span class="dash-mtext custom-weight">{{ __('Profile Desa') }}</span>
                    </a>
                </li>

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
                <li class="dash-item dash-hasmenu {{ request()->is('noRekenings*') ? 'active' : '' }}">
                        <a class="dash-link" href="{{ route('noRekenings.index') }}">
                            <span class="dash-micon"><i class="ti ti-lock"></i></span>
                            <span class="dash-mtext custom-weight">{{ __('No Rekening') }}</span>
                        </a>
                    </li>
                {{-- @can('manage-reaalisasianggaran')
                    <li class="dash-item dash-hasmenu {{ request()->is('realisasi_anggarans*') ? 'active' : '' }}">
                        <a class="dash-link" href="{{ route('realisasi_anggarans.index') }}">
                            <span class="dash-micon"><i class="ti ti-search"></i></span>
                            <span class="dash-mtext custom-weight">{{ __('Realisasi Anggaran') }}</span>
                        </a>
                    </li>
                @endcan --}}
                <li class="dash-item dash-hasmenu {{ request()->is('sp2ds*') ? 'active' : '' }}">
                        <a class="dash-link" href="{{ route('sp2ds.index') }}">
                            <span class="dash-micon"><i class="ti ti-folder"></i></span>
                            <span class="dash-mtext custom-weight">{{ __('SP2D') }}</span>
                        </a>
                    </li>
            </ul>

        </div>
    </div>
</nav>
<!-- [ navigation menu ] end -->
