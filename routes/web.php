<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });


//====================================================== USERS =========================================================================

Route::resource('/', 'FrontHomeController');
Route::resource('/home', 'FrontHomeController');

Route::resource('recapitulation', 'FrontRecapitulationController');
Route::post('recapitulation-search', 'FrontRecapitulationController@indexCari');

Route::resource('companies', 'FrontCompaniesController');
Route::post('companies-search', 'FrontCompaniesController@indexCari');

// Route::resource('program-csr', 'FrontProgramCsrController');
Route::get('program-csr/jenis-program/{id}', 'FrontProgramCsrController@index');
Route::get('program-csr/{id}', 'FrontProgramCsrController@show');

Route::get('csr-award', 'FrontProgramCsrController@indexCsrAward');

Route::get('galeri', 'FrontGaleriController@index1');
Route::get('galeri-pelaksanaan', 'FrontGaleriController@index2');


Route::resource('news', 'FrontNewsController');
Route::get('news/{id}', 'FrontNewsController@show');

Route::get('/about-team', function () {
    return view('user.about_tim');
});
Route::get('/about-forum', function () {
    return view('user.about_forum');
});

Route::get('/guide-account', function () {
    return view('user.guide_account');
});
Route::get('/guide-participation', function () {
    return view('user.guide_participation');
});
Route::get('/guide-guest', function () {
    return view('user.guide_guest');
});

Route::get('/pedoman-pelaksanaan', function () {
    return view('user.pedoman_pelaksanaan');
});

Route::resource('pengajuan-usulan', 'FrontPengajuanUsulanController');
Route::get('pengajuan-history', 'FrontPengajuanUsulanController@history');
Route::post('simpan-pengajuan-usulan', 'FrontPengajuanUsulanController@store');
Route::get('file-pengajuan-usulan/{id}', 'FrontPengajuanUsulanController@uploadFile');
Route::post('simpan-file-pengajuan-usulan', 'FrontPengajuanUsulanController@storeFile');
Route::delete('pengajuan_delete_file', 'FrontPengajuanUsulanController@deleteFile')->name('pengajuan_delete_file');

/*Route::get('/pengajuan-permohonan', function () {return view('user.pengajuan_permohonan');});
Route::get('/tracking-permohonan', function () {return view('user.tracking_permohonan');});*/

// LOGIN
Route::get('/user_reg', 'UserAuthController@register');
Route::post('/registerPost', 'UserAuthController@registerPost');
Route::get('/user_login', 'UserAuthController@loginDahulu');
Route::post('/loginPost', 'UserAuthController@loginPost');
Route::post('/loginPost2', 'UserAuthController@loginPost2');
Route::get('/logout_user', 'UserAuthController@logout');

Route::get('/userEdit', 'UserAuthController@userEdit');
Route::post('/userUpdate', 'UserAuthController@userUpdate');
//====================================================== END USERS =====================================================================


Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {

    Route::get('index_admin.html', 'PecahTemplateAdminController@index');

//============================================================ OWNER =============================================================================
    //Admin OPD==========================================================================================
    Route::resource('admin_opd', 'AdminOpdController');

    //Admin Bidang==========================================================================================
    Route::resource('admin_bidang', 'AdminBidangController');
    Route::get('data_admin_bidang', 'AdminBidangController@listData')->name('data_admin_bidang');

    //Admin Daftar Perusahaan=========================================================================================
    Route::resource('admin_daftar_perusahaan', 'AdminDaftarPerusahaanController');
    Route::get('data_admin_daftar_perusahaan', 'AdminDaftarPerusahaanController@listData')->name('data_admin_daftar_perusahaan');

    //Admin Perusahaan=========================================================================================
    Route::resource('admin_perusahaan', 'AdminPerusahaanController');
    Route::get('data_admin_perusahaan', 'AdminPerusahaanController@listData')->name('data_admin_perusahaan');

    //Admin Kategori Award =========================================================================================
    Route::resource('admin_kategori_award', 'AdminKategoriAwardController');
    Route::get('data_admin_kategori_award', 'AdminKategoriAwardController@listData')->name('data_admin_kategori_award');

    //Admin Kriteria Award =========================================================================================
    Route::resource('admin_kriteria_award', 'AdminKriteriaAwardController');
    Route::get('data_admin_kriteria_award', 'AdminKriteriaAwardController@listData')->name('data_admin_kriteria_award');

    //Admin Program =========================================================================================
    Route::resource('admin_program', 'AdminProgramController');

    //Admin Pengajuan =========================================================================================
    Route::resource('admin_pengajuan', 'AdminPengajuanController');
    Route::get('data_admin_pengajuan', 'AdminPengajuanController@listData')->name('data_admin_pengajuan');
    Route::get('admin_pengajuan_pdf', 'AdminPengajuanController@PengajuanPdf');
    Route::get('admin_pengajuan_excel', 'AdminPengajuanController@PengajuanExcel');

    //Admin Permohonan =========================================================================================
    Route::resource('admin_permohonan', 'AdminPermohonanController');
    Route::get('data_admin_permohonan', 'AdminPermohonanController@listData')->name('data_admin_permohonan');
    Route::get('admin_permohonan_pdf', 'AdminPermohonanController@PermohonanPdf');
    Route::get('admin_permohonan_excel', 'AdminPermohonanController@PermohonanExcel');

    //Admin Slideshow=========================================================================================
    Route::resource('admin_slideshow', 'AdminDataSlideshowController');
    //Admin Galeri Pelaksanaan=========================================================================================
    Route::resource('admin_galeri', 'AdminGaleriController');
    //Admin Data Berita ==========================================================================================
    Route::resource('admin_berita', 'AdminDataBeritaController');
    //Owner Master data ==========================================================================================
    Route::resource('admin_users', 'AdminPenggunaController');

//============================================================== END OWNER ===========================================================
//OPD ==========================================================================================
    Route::resource('opd_permohonan', 'OpdPermohonanController');
    Route::get('upload_file/{id}', 'OpdPermohonanController@upload_pdf')->name('upload_file');
    Route::post('permohonan_store_file', 'OpdPermohonanController@store_pdf')->name('permohonan_store_file');
    Route::delete('permohonan_delete_file', 'OpdPermohonanController@delete_pdf')->name('permohonan_delete_file');
//============================================================== END OPD ===========================================================

});
