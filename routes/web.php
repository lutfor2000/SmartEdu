<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FontendController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\AboutComtroller;
use App\Http\Controllers\AboutsummaryController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\ResponerController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ContactController;

Auth::routes();
//===================HomeController Start===================================================>
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('home/eidt/{user_id}', [HomeController::class, 'userEdit'])->name('user_edit');
Route::post('home/user_post/{user_id}', [HomeController::class, 'userPost'])->name('user_post')->middleware('checkadmin');
Route::get('home/delete/user', [HomeController::class, 'userDelete'])->name('user.delete')->middleware('checkadmin');
Route::get('user', [HomeController::class, 'User'])->name('user')->middleware('checkadmin');
//===================HomeController End===================================================>

//===========================FontendController Start========================================>
Route::get('/', [FontendController::class, 'smartHome'])->name('smartedu');
Route::get('fontend/about', [FontendController::class, 'AboutFontend'])->name('smartabout');
Route::get('chack/out/{packag_id}', [FontendController::class, 'Checkout'])->name('checkout');
Route::post('chackout/post', [FontendController::class, 'checkoutPost'])->name('chackout.post');
Route::get('customer/registration', [FontendController::class, 'customerRegistration'])->name('customerrdistration');
Route::get('font/course/page/', [FontendController::class, 'CoursePage'])->name('coursepage');
Route::post('customer/post/registration', [FontendController::class, 'customerPostregistration'])->name('customerregisterpost');
Route::get('login/customer', [FontendController::class, 'customerLogin'])->name('customerlogin');
Route::post('login/post/customer', [FontendController::class, 'customerLoginPost'])->name('customerlogin.post');
Route::get('customer/order', [FontendController::class, 'customerOrder'])->name('customer.order')->middleware('auth');
Route::get('teacher/all/font', [FontendController::class, 'TeacherAll'])->name('fonteacher');
Route::get('pricing/fontend', [FontendController::class, 'Pricing'])->name('pricing');
Route::get('contact/fontend', [FontendController::class, 'ContacsFontend'])->name('contacs');
Route::post('post/contact/fontend', [FontendController::class, 'CotactPost'])->name('contactsfontend.post');
//===========================FontendController End========================================>

//===========================BannerController Start========================================>
Route::get('banner', [BannerController::class, 'bannerPage'])->name('banner');
Route::post('banner/insert', [BannerController::class, 'bannerInsert'])->name('banner.post');
Route::post('banner/update', [BannerController::class, 'bannerUpdate'])->name('banner.update');
Route::get('delete/banner', [BannerController::class, 'bannerDelete'])->name('banner.delete');
Route::get('pagination/banner', [BannerController::class, 'bannerPagination'])->name('banner.pagination');
Route::get('banner/search', [BannerController::class, 'bannerSearch'])->name('banner.search');
//===========================BannerController End========================================>

//===========================SettingController End========================================>
Route::get('setting', [SettingController::class, 'Setting'])->name('setting');
Route::post('setting/update', [SettingController::class, 'SettingUpdate'])->name('setting.update');
//===========================SettingController End========================================>

//===========================AboutComtroller Start========================================>
Route::get('about', [AboutComtroller::class, 'About'])->name('about');
Route::post('about/post', [AboutComtroller::class, 'aboutPost'])->name('about.post');
Route::post('update/about', [AboutComtroller::class, 'aboutUpdate'])->name('about.update');
Route::get('delete/about', [AboutComtroller::class, 'aboutDelete'])->name('about.delete');
//===========================AboutComtroller End========================================>

//===========================AboutsummaryController Start========================================>
Route::get('aboutsummery', [AboutsummaryController::class, 'aboutSummery'])->name('aboutsummary');
Route::post('post/about/summery', [AboutsummaryController::class, 'SummeryPost'])->name('summar.post');
Route::post('update/about/summery', [AboutsummaryController::class, 'SummeryUpdate'])->name('summar.update');
Route::get('delete/about/summery', [AboutsummaryController::class, 'SummeryDelete'])->name('summery.delete');
//===========================AboutsummaryController End========================================>

//===========================HistoryController Start========================================>
Route::get('history', [HistoryController::class, 'History'])->name('history');
Route::post('post/history', [HistoryController::class, 'historyPost'])->name('post.history');
Route::post('update/history', [HistoryController::class, 'historyUpdate'])->name('history.update');
Route::get('delete/history', [HistoryController::class, 'historyDelete'])->name('history.delete');
//===========================HistoryController End========================================>

//===========================PackageController Start========================================>
Route::get('package', [PackageController::class, 'Package'])->name('package');
Route::post('package/post', [PackageController::class, 'packagePost'])->name('package.post');
Route::post('package/update', [PackageController::class, 'packageUpdate'])->name('package.update');
Route::get('delete/package/', [PackageController::class, 'packageDelete'])->name('package.delete');
Route::get('search/package', [PackageController::class, 'packageSearch'])->name('package.search');
Route::get('pagination/package', [PackageController::class, 'packagePagination'])->name('package.pagination');
//===========================PackageController End========================================>

//===========================TestimonialController Start========================================>
Route::get('testimonial', [TestimonialController::class, 'Testimonial'])->name('testimonial');
Route::post('testimonial/post', [TestimonialController::class, 'TestimonialPost'])->name('testimonial.post');
Route::post('update/testimonial/', [TestimonialController::class, 'TestimonialUpdate'])->name('testimonial.update');
Route::get('delete/testimonial/', [TestimonialController::class, 'TestimonialDelete'])->name('testimonial.delete');
//===========================TestimonialController End========================================>

//===========================ResponerController Start========================================>
Route::get('responser', [ResponerController::class, 'Responser'])->name('responser')->middleware('checkadmin');
Route::post('responser/post', [ResponerController::class, 'ResponserPost'])->name('responser.post');
Route::post('update/responser', [ResponerController::class, 'ResponserUpdate'])->name('responser.update');
Route::get('delete/responser', [ResponerController::class, 'ResponserDelete'])->name('responser.delete');
Route::get('pagination/responser', [ResponerController::class, 'ResponserPagination'])->name('responser.pagination');
//===========================ResponerController End========================================>

//===========================CourseController Start========================================>
Route::get('course', [CourseController::class, 'Course'])->name('course');
Route::post('course/post', [CourseController::class, 'CoursePost'])->name('course.post');
Route::post('update/course/', [CourseController::class, 'CourseUpdate'])->name('course.update');
Route::get('delete/course/', [CourseController::class, 'CourseDelete'])->name('course.delete');
//===========================CourseController End========================================>

//===========================TeacherController Start========================================>
Route::get('teacher', [TeacherController::class, 'Teacher'])->name('teacher');
Route::post('teacher/post', [TeacherController::class, 'TeacherPost'])->name('teacher.post');
Route::post('update/teacher', [TeacherController::class, 'TeacherUpdate'])->name('teacher.update');
Route::get('delete/teacher', [TeacherController::class, 'TeacherDelete'])->name('teacher.delete');
Route::get('pagination/teacher', [TeacherController::class, 'TeacherPagination'])->name('teacher.pagination');
Route::get('search/teacher', [TeacherController::class, 'TeacherSearch'])->name('teacher.search');
//===========================TeacherController End========================================>

//===========================ContactController Start========================================>
Route::get('contact', [ContactController::class, 'Contact'])->name('contact');
Route::get('delete/contact', [ContactController::class, 'ContactDelete'])->name('contact.delete');
//===========================ContactController End========================================>

//===========================FontendController Start========================================>
//===========================FontendController End========================================>

//===========================FontendController Start========================================>
//===========================FontendController End========================================>

