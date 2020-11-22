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

Route::get('/', 'PortalController@index')->name('/');
Route::get('/regular/{var_id}/{cat_id}', 'PortalController@RegularChampionByVarByCat');
Route::get('/regular', 'PortalController@RegularChampion')->name('regular');
Route::get('/champion/{grade_id}', 'PortalController@GradeChampionbyGrade')->name('grade_champ');
Route::get('/champion', 'PortalController@GradeChampion')->name('champion');
Route::get('/best_in_size/{cat_id}', 'PortalController@BestInSizebyCat')->name('bis_cat');
Route::get('/best_in_size', 'PortalController@BestInSize')->name('bis');
Route::get('/summary', 'PortalController@summary')->name('summary');
Route::get('/point', 'PortalController@point')->name('point');

Route::get('/login', 'LoginController@login')->name('login');
Route::post('/login/auth', 'LoginController@auth');
Route::get('/logout', 'LoginController@logout')->name('logout');
Route::get('/register', 'LoginController@register')->name('register');

Route::post('/guest/register', 'RegisterController@register')->name('user_register');


Route::group(['middleware' => ['auth', 'checkRole:user']], function () {
    
    Route::get('/user/report/all_fish_nota/{id}', 'UserController@printAllFishNota')->name('user.report_all_fish_nota');
    Route::get('/user/payment/recipe/{id}', 'UserController@userBillFish')->name('user.detail_nota_fish');
    Route::get('/user/payment', 'UserController@userPaymentFish')->name('user.payment_fish');
    Route::post('/user/update_picture_ikan/', 'UserController@updateFishPicture')->name('user.update_fish_picture');
    Route::post('/user/update_ikan/', 'UserController@updateFish')->name('user.update_fish');
    Route::get('/user/data_ikan/{id}', 'UserController@showDetailFish')->name('user.detail_fish');
    Route::post('/store/register_ikan/', 'UserController@userStoreFish')->name('user.store_ikan');
    Route::get('/user/register_ikan/{id}', 'UserController@userRegisterFish')->name('user.regis_ikan');
    Route::post('/user/personal_data/', 'UserController@personalUpdateData')->name('user.update_personal');
    Route::get('/user/personal_data/{id}', 'UserController@personalData')->name('user.personal');
    Route::get('/user/fish_data/{id}', 'UserController@fishData')->name('user.fish');
    Route::get('/user/dashboard', 'UserController@index')->name('user.dashboard');
});

Route::group(['middleware' => ['auth', 'checkRole:admin']], function () {
    
    Route::post('/admin/grade_champ/delete', 'AdminController@gradeChampionDelete')->name('admin.delete_grade_champion');
    Route::post('/admin/grade_champ', 'AdminController@gradeChampionStore')->name('admin.store_grade');
    Route::get('/admin/grade_champ/{grade}', 'AdminController@gradeChampiongetFish');
    Route::get('/admin/grade_champ', 'AdminController@gradeChampion')->name('admin.grade');
    Route::post('/admin/best_in_size/delete', 'AdminController@bisChampionDelete')->name('admin.delete_bis_champion');
    Route::post('/admin/best_in_size', 'AdminController@bisChampionStore')->name('admin.store_best_in_size');
    Route::get('/admin/best_in_size/{cat_id}', 'AdminController@bisChampiongetFish');
    Route::get('/admin/best_in_size', 'AdminController@bisChampion')->name('admin.best_in_size');
    Route::post('/admin/regular_champion/delete', 'AdminController@regularChampionDelete')->name('admin.delete_regular_champion');
    Route::get('/admin/regular_champion/{var_id}/{cat_id}', 'AdminController@regularChampiongetFish');
    Route::post('/admin/store_regular_champion', 'AdminController@storeRegularChampion')->name('admin.store_regular_champion');
    Route::get('/admin/regular_champion', 'AdminController@regularChampion')->name('admin.regular_champion');
    Route::get('/admin/print_rekap_payment_belum_lunas', 'AdminController@printRekapPaymentBLunas')->name('admin.print_blunas_rekap_payment');
    Route::get('/admin/print_rekap_payment_lunas', 'AdminController@printRekapPaymentLunas')->name('admin.print_lunas_rekap_payment');
    Route::get('/admin/print_rekap_payment', 'AdminController@printRekapPaymentAll')->name('admin.print_all_rekap_payment');
    Route::get('/admin/rekap_payment', 'AdminController@rekapPayment')->name('admin.rekap_payment');
    Route::get('/admin/print_fish_data/{user_id}', 'AdminController@printUserFishData')->name('admin.print_user_data');
    Route::get('/admin/print_fish_nota/{fish_id}', 'AdminController@printUserFishNota')->name('admin.print_user_fish_nota');
    Route::get('/admin/print_nota/{user_id}', 'AdminController@printFishNota')->name('admin.print_user_nota');
    Route::get('/admin/print_sticker/{id}', 'AdminController@printUserFishSticker')->name('admin.print_user_sticker');
    Route::get('/admin/print_sticker', 'AdminController@printFishSticker')->name('admin.print_sticker'); //print fish stiker
    Route::post('/admin/store_champion_category', 'AdminController@storeCatChampion')->name('admin.store_cat_champion');
    Route::get('/admin/add_champion_category', 'AdminController@addCatChampion')->name('admin.add_cat_champion');
    Route::post('/admin/update_champion/{id}', 'AdminController@updateFishChampion')->name('admin.update_fish_champion');
    Route::get('/admin/edit_champion/{id}', 'AdminController@showFishChampion')->name('admin.show_fish_champion');
    Route::post('/admin/add_champion', 'AdminController@storeFishChampion')->name('admin.store_fish_champion');
    Route::get('/admin/add_champion/get_fish_champion/{user_id}', 'AdminController@getFishChampion')->name('admin.get_fish_champion');
    Route::get('/admin/add_champion/get_champion_cat/{grade}', 'AdminController@getChampionCat')->name('admin.get_champion_cat');
    Route::post('/admin/add_champion/delete', 'AdminController@deleteChampion')->name('admin.delete_champion');
    Route::get('/admin/add_champion', 'AdminController@addChampion')->name('admin.add_champion');
    Route::get('/admin/champion', 'AdminController@champion')->name('admin.champion');
    Route::post('/admin/add_fish_point/store_fish_point', 'AdminController@storeFishPoint')->name('admin.store_fish_point');
    Route::get('/admin/add_fish_point/get_fish_by_bio/{id}', 'AdminController@getFishByBio')->name('admin.getfishbybio');
    Route::post('/admin/delete_fish_point/', 'AdminController@deleteFishPoint')->name('admin.delete_fish_point');
    Route::post('/admin/show_fish_point/{id}', 'AdminController@updateFishPoint')->name('admin.update_fish_point');
    Route::get('/admin/show_fish_point/{id}', 'AdminController@showFishPoint')->name('admin.show_fish_point');
    Route::get('/admin/add_fish_point', 'AdminController@addFishPoint')->name('admin.add_fish_point');
    Route::get('/admin/fish_point', 'AdminController@FishPoint')->name('admin.fish_point');
    Route::post('/admin/update_pass_setup', 'AdminController@updatePass')->name('admin.update_pass');
    Route::get('/admin/pass_setup', 'AdminController@setupPass')->name('admin.setup_pass');
    Route::get('/admin/user_pass_setup', 'AdminController@setupUserPass')->name('admin.setup_user_pass');
    Route::get('/admin/data_ikan/{id}', 'AdminController@printStickerFish')->name('admin.fish_sticker');
    Route::get('/admin/data_ikan', 'AdminController@dataFish')->name('admin.fish_entry');
    Route::post('/admin/data_ikan/ajax_delete', 'AdminController@AjaxDeleteFishbyId')->name('admin.fish_entry_delete_ajax');
    Route::post('/admin/data_ikan/delete', 'AdminController@deleteFishbyId')->name('admin.fish_entry_delete');
    Route::post('/admin/store_admin', 'AdminController@storeAdmin')->name('admin.store_admin');
    Route::get('/admin/add_admin', 'AdminController@addAdmin')->name('admin.add_admin');
    Route::post('/admin/update_resi_ikan', 'AdminController@updateFishResiReg')->name('admin.update_user_resi_register');
    Route::post('/admin/upload_resi_ikan', 'AdminController@uploadFishResiReg')->name('admin.upload_user_resi_register');
    Route::post('/admin/update_picture_ikan', 'AdminController@updateFishPicture')->name('admin.update_user_picture_fish');
    Route::post('/admin/fish_confirm_registrasi', 'AdminController@ConfirmRegistrasi')->name('admin.confirm_reg_fish');
    Route::post('/admin/fish_peserta_detail', 'AdminController@UpdateUserFish')->name('admin.update_user_fish');
    Route::get('/admin/fish_peserta_detail/{id}', 'AdminController@detailUserFish')->name('admin.detail_user_fish');
    Route::get('/admin/fish_peserta/{id}', 'AdminController@listFishPeserta')->name('admin.peserta_fish');
    Route::get('/admin/list_peserta', 'AdminController@listPeserta')->name('admin.list_peserta');
    Route::post('/admin/store_peserta', 'AdminController@storePeserta')->name('admin.store_peserta');
    Route::get('/admin/add_peserta', 'AdminController@addPeserta')->name('admin.add_peserta');
    Route::get('/admin/dashboard', 'AdminController@index')->name('admin.dashboard');

});