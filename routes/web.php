<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ModulController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginSecurityController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnggaranKasController;
use App\Http\Controllers\ApbdesController;
use App\Http\Controllers\DanaController;
use App\Http\Controllers\DesaController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\NoRekeningController;
use App\Http\Controllers\RealisasiAnggaranController;
use App\Http\Controllers\Sp2dController;
use App\Http\Controllers\AnggaranController;
use App\Http\Controllers\LaporanController; 
use App\Http\Controllers\SuratController;
use App\Http\Controllers\ViewController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// File: routes/web.php

Route::get('/', function () {
    return redirect('/home');
});

// Tampilan awal pengguna di /home
Route::get('/home', [ViewController::class, 'index'])->name('home');

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home')->middleware(['auth', 'XSS', '2fa',]);

Route::post('/chart', [HomeController::class, 'chart'])->name('get.chart.data')->middleware(['auth', 'XSS',]);

Route::get('notification', [HomeController::class, 'notification']);


Route::group(['middleware' => ['auth', 'XSS']], function () {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('permission', PermissionController::class);
    Route::resource('modules', ModulController::class);
    Route::resource('realisasianggaran', RealisasiAnggaranController::class);
});

Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('users.destroy')->middleware(['auth', 'XSS']);

Route::post('/role/{id}', [RoleController::class, 'assignPermission'])->name('roles_permit')->middleware(['auth', 'XSS']);

Route::group(
    ['middleware' => ['auth', 'XSS']],
    function () {
        Route::get('setting/email-setting', [SettingController::class, 'getmail'])->name('settings.getmail');
        Route::post('setting/email-settings_store', [SettingController::class, 'saveEmailSettings'])->name('settings.emails');

        Route::get('setting/datetime', [SettingController::class, 'getdate'])->name('datetime');
        Route::post('setting/datetime-settings_store', [SettingController::class, 'saveSystemSettings'])->name('settings.datetime');

        Route::get('setting/logo', [SettingController::class, 'getlogo'])->name('getlogo');
        Route::post('setting/logo_store', [SettingController::class, 'store'])->name('settings.logo');
        Route::resource('settings', SettingController::class);

        Route::get('test-mail', [SettingController::class, 'testMail'])->name('test.mail');
        Route::post('test-mail', [SettingController::class, 'testSendMail'])->name('test.send.mail');
    }
);

Route::get('profile', [UserController::class, 'profile'])->name('profile')->middleware(['auth', 'XSS']);

Route::post('edit-profile', [UserController::class, 'editprofile'])->name('update.profile')->middleware(['auth', 'XSS']);

Route::get('/user/profile-desa', [UserController::class, 'showProfile'])->name('user.profile.desa')->middleware(['auth', 'XSS']);


Route::group(
    ['middleware' => ['auth', 'XSS']],
    function () {
        Route::get('change-language/{lang}', [LanguageController::class, 'changeLanquage'])->name('change.language');
        Route::get('manage-language/{lang}', [LanguageController::class, 'manageLanguage'])->name('manage.language');
        Route::post('store-language-data/{lang}', [LanguageController::class, 'storeLanguageData'])->name('store.language.data');
        Route::get('create-language', [LanguageController::class, 'createLanguage'])->name('create.language');
        Route::post('store-language', [LanguageController::class, 'storeLanguage'])->name('store.language');
        Route::delete('/lang/{lang}', [LanguageController::class, 'destroyLang'])->name('lang.destroy');
        Route::get('language', [LanguageController::class, 'index'])->name('index');
    }
);

Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('io_generator_builder')->middleware(['auth', 'XSS',]);

Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('io_field_template')->middleware(['auth', 'XSS',]);

Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')->name('io_relation_field_template')->middleware(['auth', 'XSS',]);

Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('io_generator_builder_generate')->middleware(['auth', 'XSS',]);

Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')->name('io_generator_builder_rollback')->middleware(['auth', 'XSS',]);

Route::post(
    'generator_builder/generate-from-file',
    '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile'
)->name('io_generator_builder_generate_from_file')->middleware(['auth', 'XSS',]);

Route::group(['prefix' => '2fa'], function () {
    Route::get('/', [UserController::class, 'profile'])->name('2fa')->middleware(['auth', 'XSS',]);
    Route::post('/generateSecret', [LoginSecurityController::class, 'generate2faSecret'])->name('generate2faSecret')->middleware(['auth', 'XSS',]);
    Route::post('/enable2fa', [LoginSecurityController::class, 'enable2fa'])->name('enable2fa')->middleware(['auth', 'XSS',]);
    Route::post('/disable2fa', [LoginSecurityController::class, 'disable2fa'])->name('disable2fa')->middleware(['auth', 'XSS',]);

    // 2fa middleware
    Route::post('/2faVerify', function () {
        return redirect(URL()->previous());
    })->name('2faVerify')->middleware('2fa');
});

Route::group(
    ['middleware' => ['auth', 'XSS']],
    function () {
        Route::get('realisasianggaran', [RealisasiAnggaranController::class, 'index'])->name('realisasi_anggarans.index');
        Route::get('realisasianggaran/create', [RealisasiAnggaranController::class, 'create'])->name('realisasi_anggarans.create');
        Route::post('realisasianggaran/store', [RealisasiAnggaranController::class, 'store'])->name('realisasi_anggarans.store');
        Route::get('realisasianggaran/{id}/edit', [RealisasiAnggaranController::class, 'edit'])->name('realisasi_anggarans.edit');
        Route::put('realisasianggaran/{id}', [RealisasiAnggaranController::class, 'update'])->name('realisasi_anggarans.update');
        Route::delete('realisasianggaran/{id}', [RealisasiAnggaranController::class, 'destroy'])->name('realisasi_anggarans.destroy');
        Route::get('realisasianggaran/{id}', [RealisasiAnggaranController::class, 'show'])->name('realisasi_anggarans.show');

        // Rute untuk Toggle, Edit, dan Delete
        Route::post('realisasi_anggarans/toggle-status/{id}', [RealisasiAnggaranController::class, 'toggleStatus'])->name('realisasi_anggarans.toggle-status');
        // Route::get('realisasi/edit/{id}', [RealisasiAnggaranController::class, 'edit'])->name('realisasi.edit');
        Route::delete('realisasi/delete/{id}', [RealisasiAnggaranController::class, 'destroy'])->name('realisasi.delete');
        Route::get('realisasianggaran/data', [RealisasiAnggaranController::class, 'getData'])->name('realisasi_anggarans.data');

    }
);

// Route::group(
//     ['middleware' => ['auth', 'XSS']],
//     function () {
//         Route::get('anggaranKas', [AnggaranKasController::class, 'index'])->name('anggaranKas.index');
//         Route::get('anggaranKas/create', [AnggaranKasController::class, 'create'])->name('anggaranKas.create');
//         Route::post('anggaranKas/store', [AnggaranKasController::class, 'store'])->name('anggaranKas.store');
//         Route::get('anggaranKas/{id}/edit', [AnggaranKasController::class, 'edit'])->name('anggaranKas.edit');
//         Route::put('anggaranKas/{id}', [AnggaranKasController::class, 'update'])->name('anggaranKas.update');
//         Route::delete('anggaranKas/{id}', [AnggaranKasController::class, 'destroy'])->name('anggaranKas.destroy');
//         Route::get('anggaranKas/{id}', [AnggaranKasController::class, 'show'])->name('anggaranKas.show');
//     }
// );


Route::resource('noRekenings', NoRekeningController::class);



// Anggaran Kas Routes

Route::resource('anggaran-kas', AnggaranKasController::class);


// APBDes Routes
Route::resource('apbdes', ApbdesController::class);

// Dana Routes
Route::middleware(['auth', 'XSS'])->group(function () {
    Route::get('dana', [DanaController::class, 'index'])->name('danas.index');
    Route::get('dana/create', [DanaController::class, 'create'])->name('danas.create');
    Route::post('dana/store', [DanaController::class, 'store'])->name('danas.store');
    Route::get('dana/{id}/edit', [DanaController::class, 'edit'])->name('danas.edit');
    Route::put('dana/{id}', [DanaController::class, 'update'])->name('danas.update');
    Route::delete('dana/{id}', [DanaController::class, 'destroy'])->name('danas.destroy');
    Route::get('dana/{id}', [DanaController::class, 'show'])->name('danas.show');
});

// Route::resource(
//     ['middleware' => ['auth', 'XSS']],
//     function () {
//         Route::get('dana', [DanaController::class, 'index'])->name('realisasi_anggarans.index');
//         Route::get('dana/create', [DanaController::class, 'create'])->name('realisasi_anggarans.create');
//         Route::post('dana/store', [DanaController::class, 'store'])->name('realisasi_anggarans.store');
//         Route::get('dana/{id}/edit', [DanaController::class, 'edit'])->name('realisasi_anggarans.edit');
//         Route::put('dana/{id}', [DanaController::class, 'update'])->name('realisasi_anggarans.update');
//         Route::delete('dana/{id}', [DanaController::class, 'destroy'])->name('realisasi_anggarans.destroy');
//         Route::get('dana/{id}', [DanaController::class, 'show'])->name('realisasi_anggarans.show');
//     }
// );

// Desas Routes
// Route::put('desas/{desa}', [DesaController::class, 'update'])->name('desas.update');


// Dokumens Routes
Route::resource('dokumens', DokumenController::class);

// No Rekenings Routes
Route::resource('no_rekenings', NoRekeningController::class);

// Realisasi Anggarans Routes
// Route::resource('realisasi_anggarans', RealisasiAnggaransController::class);

// SP2Ds Routes
Route::resource('sp2ds', Sp2dController::class);

// Route::group(
//     ['middleware' => ['auth', 'XSS']],
//     function () {
//         // Route::get('apbdes', [ApbdesController::class, 'index'])->name('apbdes.index');
//         // Route::get('apbdes/create', [ApbdesController::class, 'create'])->name('apbdes.create');
//         // Route::post('apbdes/store', [ApbdesController::class, 'store'])->name('apbdes.store');
//         // Route::get('apbdes/{id}/edit', [ApbdesController::class, 'edit'])->name('apbdes.edit');
//         // Route::put('apbdes/{id}', [ApbdesController::class, 'update'])->name('apbdes.update');
//         // Route::delete('apbdes/{id}', [ApbdesController::class, 'destroy'])->name('apbdes.destroy');
//         // Route::get('apbdes/{id}', [ApbdesController::class, 'show'])->name('apbdes.show');
//         // Route::get('/apbdes/anggaran', [ApbdesController::class, 'showAnggaran'])->name('apbdes.anggaran');
//         // Route::get('/apbdes/verifikasi', [ApbdesController::class, 'showVerifikasi'])->name('apbdes.verifikasi');
//         // Route::get('/apbdes/realisasi', [ApbdesController::class, 'showRealisasi'])->name('apbdes.realisasi');
//         // Route::post('/apbdes/verifikasi/toggle/{id}', [ApbdesController::class, 'toggleVerifikasi'])->name('apbdes.verifikasi.toggle');
//         // Route::post('/apbdes/realisasi/toggle/{id}', [ApbdesController::class, 'toggleStatus'])->name('apbdes.status.toggle');

//     }
// );

// Route::group(['middleware' => ['auth', 'XSS']], function () {
//     Route::get('apbdes', [ApbdesController::class, 'index'])->name('apbdes.index');
//     Route::get('/apbdes/anggaran', [AnggaranController::class, 'index'])->name('apbdes.anggaran'); // Ubah ke AnggaranController
//     Route::get('/apbdes/verifikasi', [ApbdesController::class, 'showVerifikasi'])->name('apbdes.verifikasi');
//     Route::get('/apbdes/realisasi', [ApbdesController::class, 'showRealisasi'])->name('apbdes.realisasi');
// });

// Route::group(['middleware' => ['auth', 'XSS']], function () {
//     Route::resource('anggaran', AnggaranController::class);
// });
// Route untuk APBDes
Route::get('/apbdes', [ApbdesController::class, 'index'])->name('apbdes.index');


Route::resource('anggaran', AnggaranController::class);
Route::get('/anggaran/{id}/edit', [AnggaranController::class, 'edit'])->name('.edit');
Route::put('/anggaran/{id}', [AnggaranController::class, 'update'])->name('anggaran.update');
Route::get('/create', [AnggaranController::class, 'create'])->name('apbdes.create');
Route::get('/get-kelompok-norekening', [AnggaranController::class, 'getKelompokNorekening'])->name('apbdes.getKelompokNorekening');
Route::get('/get-detail-norekening', [AnggaranController::class, 'getDetailNorekening'])->name('apbdes.getDetailNorekening');
Route::get('/get-detail-norekening', [AnggaranController::class, 'getDetailNorekening'])->name('apbdes.getDetailNorekening');
Route::post('/anggaran/store', [AnggaranController::class, 'store'])->name('anggaran.store');
Route::put('/anggaran/update-nilai/{id}', [AnggaranController::class, 'updateNilai'])->name('anggaran.updateNilai');


// Route::get('/anggaran/detail_norekening', [AnggaranController::class, 'getDetailNorekening'])->name('anggaran.detail_norekening');
// Route::get('/create', [AnggaranController::class, 'create'])->name('anggaran.create');

Route::get('/verifikasi', [AnggaranController::class, 'verifikasi'])->name('apbdes.verifikasi');
Route::post('/verifikasi/{id}/toggle', [AnggaranController::class, 'toggleVerifikasi'])->name('verifikasi.toggle');
Route::get('/realisasi', [AnggaranController::class, 'realisasi'])->name('apbdes.realisasi');


// Rute untuk mengupdate nilai realisasi
Route::put('/anggaran/realisasi/{id}', [AnggaranController::class, 'updateRealisasi'])->name('anggaran.realisasi.update');

// Rute untuk toggle status realisasi
Route::post('/realisasi/{id}/toggle', [AnggaranController::class, 'toggleStatus'])->name('status.toggle');
//     ['middleware' => ['auth', 'XSS']],
//     function () {
//         Route::get('danas', [DanaController::class, 'index'])->name('danas.index');
//         Route::get('danas/create', [DanaController::class, 'create'])->name('danas.create');
//         Route::post('danas/store', [DanaController::class, 'store'])->name('danas.store');
//         Route::get('danas/{id}/edit', [DanaController::class, 'edit'])->name('danas.edit');
//         Route::put('danas/{id}', [DanaController::class, 'update'])->name('danas.update');
//         Route::delete('danas/{id}', [DanaController::class, 'destroy'])->name('danas.destroy');
//         Route::get('danas/{id}', [DanaController::class, 'show'])->name('danas.show');
//     }
// );

Route::group(
    ['middleware' => ['auth', 'XSS']],
    function () {
        Route::get('desas', [DesaController::class, 'index'])->name('desas.index');
        Route::get('desas/create', [DesaController::class, 'create'])->name('desas.create');
        Route::post('desas/store', [DesaController::class, 'store'])->name('desas.store');
        Route::get('desas/{desa_id}/edit', [DesaController::class, 'edit'])->name('desas.edit');
        Route::put('desas/{desa_id}', [DesaController::class, 'update'])->name('desas.update');
        Route::delete('desas/{desa_id}', [DesaController::class, 'destroy'])->name('desas.destroy');
        Route::get('desas/{desa_id}', [DesaController::class, 'show'])->name('desas.show');

        Route::get('desas/{desa_id}/profile', [DesaController::class, 'profile'])->name('desas.profile');
    }
);

// Route::group(
//     ['middleware' => ['auth', 'XSS']],
//     function () {
//         Route::get('dokumens', [DokumenController::class, 'index'])->name('dokumens.index');
//         Route::get('dokumens/create', [DokumenController::class, 'create'])->name('dokumens.create');
//         Route::post('dokumens/store', [DokumenController::class, 'store'])->name('dokumens.store');
//         Route::get('dokumens/{id}/edit', [DokumenController::class, 'edit'])->name('dokumens.edit');
//         Route::put('dokumens/{id}', [DokumenController::class, 'update'])->name('dokumens.update');
//         Route::delete('dokumens/{id}', [DokumenController::class, 'destroy'])->name('dokumens.destroy');
//         Route::get('dokumens/{id}', [DokumenController::class, 'show'])->name('dokumens.show');
//     }
// );

Route::group(
    ['middleware' => ['auth', 'XSS']],
    function () {
        Route::get('no_rekenings', [NoRekeningController::class, 'index'])->name('no_rekenings.index');
        Route::get('no_rekenings/create', [NoRekeningController::class, 'create'])->name('no_rekenings.create');
        Route::post('no_rekenings/store', [NoRekeningController::class, 'store'])->name('no_rekenings.store');
        Route::get('no_rekenings/{id}/edit', [NoRekeningController::class, 'edit'])->name('no_rekenings.edit');
        Route::put('no_rekenings/{id}', [NoRekeningController::class, 'update'])->name('no_rekenings.update');
        Route::delete('no_rekenings/{id}', [NoRekeningController::class, 'destroy'])->name('no_rekenings.destroy');
        Route::get('no_rekenings/{id}', [NoRekeningController::class, 'show'])->name('no_rekenings.show');
    }
);

// Route::group(
//     ['middleware' => ['auth', 'XSS']],
//     function () {
//         Route::get('sp2ds', [Sp2dController::class, 'index'])->name('sp2ds.index');
//         Route::get('sp2ds/create', [Sp2dController::class, 'create'])->name('sp2ds.create');
//         Route::post('sp2ds/store', [Sp2dController::class, 'store'])->name('sp2ds.store');
//         Route::get('sp2ds/{id}/edit', [Sp2dController::class, 'edit'])->name('sp2ds.edit');
//         Route::put('sp2ds/{id}', [Sp2dController::class, 'update'])->name('sp2ds.update');
//         Route::delete('sp2ds/{id}', [Sp2dController::class, 'destroy'])->name('sp2ds.destroy');
//         Route::get('sp2ds/{id}', [Sp2dController::class, 'show'])->name('sp2ds.show');
//     }
// );

Route::resource('anggaranKas', App\Http\Controllers\AnggaranKasController::class);


Route::resource('apbdes', App\Http\Controllers\ApbdesController::class);

Route::resource('anggaran', App\Http\Controllers\AnggaranController::class);


Route::resource('danas', App\Http\Controllers\DanaController::class);


Route::resource('desas', App\Http\Controllers\DesaController::class);


Route::resource('dokumens', App\Http\Controllers\DokumenController::class);



Route::resource('realisasiAnggarans', App\Http\Controllers\RealisasiAnggaranController::class);


Route::resource('sp2ds', App\Http\Controllers\Sp2dController::class);




// Route::resource('klasifikasiBelanjas', App\Http\Controllers\klasifikasi_belanjaController::class);




// Route::resource('kelompokNorekenings', App\Http\Controllers\kelompok_norekeningController::class);


// Route::resource('jenisNorekenings', App\Http\Controllers\jenis_norekeningController::class);


// Route::resource('detailNorekenings', App\Http\Controllers\detail_norekeningController::class);

//Route::resource('sp2ds', SP2DSController::class);

Route::get('/sp2d', [SP2DController::class, 'index'])->name('surat_perintah.index');
Route::get('/sp2d/berita-acara', [SP2DController::class, 'beritaAcara'])->name('berita_acara.index');
Route::get('/sp2d/berita-desa', [SP2DController::class, 'beritaDesa'])->name('berita_desa.index');
Route::get('/sp2d/laporan', [SP2DController::class, 'laporan'])->name('laporan.index');
Route::get('/sp2d/lembaran-desa', [SP2DController::class, 'lembaranDesa'])->name('lembaran_desa.index');
Route::get('/sp2d/notulen', [SP2DController::class, 'notulen'])->name('notulen.index');
Route::get('/sp2d/rekomendasi', [SP2DController::class, 'rekomendasi'])->name('rekomendasi.index');
Route::get('/sp2d/surat-pengantar', [SP2DController::class, 'suratPengantar'])->name('surat_pengantar.index');
Route::get('/sp2d/surat', [SP2DController::class, 'surat'])->name('surat.index');



Route::prefix('laporan')->group(function () {
    Route::get('/', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/create', [LaporanController::class, 'create'])->name('laporan.create');
    Route::post('/', [LaporanController::class, 'store'])->name('laporan.store');
    Route::get('/{id}', [LaporanController::class, 'show'])->name('laporan.show');
    Route::get('/{id}/edit', [LaporanController::class, 'edit'])->name('laporan.edit');
    Route::put('/{id}', [LaporanController::class, 'update'])->name('laporan.update');
    Route::delete('/{id}', [LaporanController::class, 'destroy'])->name('laporan.destroy');  
});

Route::prefix('surat')->group(function () {
    Route::get('/', [SuratController::class, 'index'])->name('surat.index');
    Route::get('/create', [SuratController::class, 'create'])->name('surat.create');
    Route::post('/', [SuratController::class, 'store'])->name('surat.store');
    Route::get('/{surat}', [SuratController::class, 'show'])->name('surat.show');
    Route::get('/{surat}/edit', [SuratController::class, 'edit'])->name('surat.edit');
    Route::put('/{surat}', [SuratController::class, 'update'])->name('surat.update');
    Route::delete('/{surat}', [SuratController::class, 'destroy'])->name('surat.destroy');
    Route::get('/print', [SuratController::class, 'print'])->name('surat.print'); // Rute untuk mencetak surat
    Route::get('/surat/{id}', [SuratController::class, 'show'])->name('surat.show');
    Route::get('/surat/{id}/download', [SuratController::class, 'downloadPDF'])->name('surat.download');

});

// Route untuk halaman index surat
Route::resource('surat', SuratController::class);

// Route untuk mencetak surat
Route::get('surat/print', [SuratController::class, 'print'])->name('surat.print');
