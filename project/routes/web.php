<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CounterController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\FeaturesController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ManageRoleController;
use App\Http\Controllers\Admin\ManageServiceController;
use App\Http\Controllers\Admin\ManageStaffController;
use App\Http\Controllers\Admin\ManageTestimonialController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PcategoryController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SocialController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Front\FrontendController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

// ************************** ADMIN SECTION START ***************************//

Route::prefix('admin')->name('admin.')->group(function () {


    // Route::group(['middleware' => 'demo'],function(){








    Route::post('brand/store', [BrandController::class, 'store'])->name('brand.store');
    Route::put('brand/update/{brand}', [BrandController::class, 'update'])->name('brand.update');
    Route::delete('brand-delete', [BrandController::class, 'destroy'])->name('brand.destroy');
    Route::put('about/update', [AboutController::class, 'update'])->name('about.update');
    Route::post('/add-testimonial', [ManageTestimonialController::class, 'store'])->name('testimonial.store');
    Route::put('/update-testimonial/{id}', [ManageTestimonialController::class, 'update'])->name('testimonial.update');
    Route::delete('/delete-testimonial', [ManageTestimonialController::class, 'destroy'])->name('testimonial.destroy');
    Route::post('add/social/link', [SocialController::class, 'store'])->name('social.store');
    Route::put('update/social/link/{id}', [SocialController::class, 'update'])->name('social.update');
    Route::delete('destroy/social/link', [SocialController::class, 'destroy'])->name('social.destroy');
    Route::post('/language/update', [AdminController::class, 'languageUpdate'])->name('language.update');
    Route::post('/manage-cookie', [AdminController::class, 'updateCookie'])->name('update.cookie');
    Route::get('/general-settings/status/update/{value}', [GeneralSettingController::class, 'StatusUpdate'])->name('gs.status');
    Route::post('/general-settings/update', [GeneralSettingController::class, 'update'])->name('gs.update');
    Route::post('/role/store', [ManageRoleController::class, 'store'])->name('role.store');
    Route::put('/role/update/{id}', [ManageRoleController::class, 'update'])->name('role.update');
    Route::delete('/role/delete', [ManageRoleController::class, 'destroy'])->name('role.destroy');
    Route::get('/getintouch/message', [ContactController::class, 'getintouch'])->name('contact.getintouch.message');
    Route::delete('/contact/message/delete', [ContactController::class, 'contactMessageDelete'])->name('contact.message.delete');
    Route::put('/contact/page/setting/update', [ContactController::class, 'update'])->name('contact.setting.update');
    Route::delete('/subscriber/delete', [AdminController::class, 'subscribersDelete'])->name('subscriber.destroy');
    Route::post('add/staff', [ManageStaffController::class, 'addStaff'])->name('staff.add');
    Route::post('update/staff/{id}', [ManageStaffController::class, 'updateStaff'])->name('staff.update');
    Route::delete('destroy/staff', [ManageStaffController::class, 'destroy'])->name('staff.destroy');




    // });

    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/forgot-password', [LoginController::class, 'forgotPasswordForm'])->name('forgot.password');
    Route::get('forgot-password/verify-code', [LoginController::class, 'verifyCode'])->name('verify.code');
    Route::get('reset-password', [LoginController::class, 'resetPassword'])->name('reset.password');
    Route::post('/forgot-password', [LoginController::class, 'forgotPasswordSubmit']);
    Route::post('reset-password', [LoginController::class, 'resetPasswordSubmit']);
    Route::post('forgot-password/verify-code', [LoginController::class, 'verifyCodeSubmit']);


    Route::middleware('auth:admin')->group(function () {
        Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
        Route::get('/', [AdminController::class, 'index'])->name('dashboard');
        Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
        Route::get('/password', [AdminController::class, 'passwordreset'])->name('password');
        Route::post('/password/update', [AdminController::class, 'changepass'])->name('password.update');
        Route::post('/profile/update', [AdminController::class, 'profileupdate'])->name('profile.update');


        // Service Category  section Start
        Route::get('/service-category', [CategoryController::class, 'index'])->name('service.category.index');
        Route::post('/service-category/store', [CategoryController::class, 'store'])->name('service.category.store');
        Route::put('/service-category/update/{id}', [CategoryController::class, 'update'])->name('service.category.update');
        Route::delete('/service-category/delete-service', [CategoryController::class, 'destroy'])->name('service.category.destroy');
        // Service Category  section End

        // service and Service FAQ section Start
        Route::get('/manage-service', [ManageServiceController::class, 'index'])->name('service.index');
        Route::get('/create', [ManageServiceController::class, 'create'])->name('service.create');
        Route::post('/store', [ManageServiceController::class, 'store'])->name('service.store');
        Route::get('/edit/{id}', [ManageServiceController::class, 'edit'])->name('service.edit');
        Route::put('/update/{id}', [ManageServiceController::class, 'update'])->name('service.update');
        Route::delete('/delete-service', [ManageServiceController::class, 'destroy'])->name('service.destroy');
        Route::get('/service/faq', [ManageServiceController::class, 'faq_index'])->name('service.faq.index');
        Route::post('service/faq/store', [ManageServiceController::class, 'faq_store'])->name('service.faq.store');
        Route::put('/service/update/{id}', [ManageServiceController::class, 'faq_update'])->name('service.faq.update');
        Route::delete('/service/faq/delete-service', [ManageServiceController::class, 'faq_destroy'])->name('service.faq.destroy');
        // service and Service FAQ section End

        //pages section start
        Route::get('page', [PageController::class, 'index'])->name('page.index');
        Route::get('page/create', [PageController::class, 'create'])->name('page.create');
        Route::post('page/store', [PageController::class, 'store'])->name('page.store');
        Route::get('page/edit/{page}', [PageController::class, 'edit'])->name('page.edit');
        Route::put('page/update/{page}', [PageController::class, 'update'])->name('page.update');
        Route::post('page/remove', [PageController::class, 'destroy'])->name('page.remove');
        //pages section end

        //manage blogs Category section start
        Route::get('blog-category', [BlogCategoryController::class, 'index'])->name('bcategory.index');
        Route::post('blog-category/store', [BlogCategoryController::class, 'store'])->name('bcategory.store');
        Route::put('blog-category/update/{id}', [BlogCategoryController::class, 'update'])->name('bcategory.update');
        Route::delete('blog-category/destroy', [BlogCategoryController::class, 'destroy'])->name('bcategory.destroy');
        //manage blogs Category section end

        //manage blogs section start
        Route::get('blog', [BlogController::class, 'index'])->name('blog.index');
        Route::get('blog/create', [BlogController::class, 'create'])->name('blog.create');
        Route::post('blog/store', [BlogController::class, 'store'])->name('blog.store');
        Route::get('blog/edit/{blog}', [BlogController::class, 'edit'])->name('blog.edit');
        Route::put('blog/update/{blog}', [BlogController::class, 'update'])->name('blog.update');
        Route::delete('blog-delete/{blog}', [BlogController::class, 'destroy'])->name('blog.destroy');
        //manage blogs section end

        // Manage Project Category section start
        Route::get('/project-categories', [PcategoryController::class, 'index'])->name('pcategory.index');
        Route::post('/store-project-category', [PcategoryController::class, 'store'])->name('pcategory.store');
        Route::put('/update-project-category/{id}', [PcategoryController::class, 'update'])->name('pcategory.update');
        Route::delete('/delete-project-category', [PcategoryController::class, 'destory'])->name('pcategory.destroy');
        // Manage Project Category section end

        // project section start
        Route::get('/projects', [ProjectController::class, 'index'])->name('project.index');
        Route::get('/create-project', [ProjectController::class, 'create'])->name('project.create');
        Route::post('/store-project', [ProjectController::class, 'store'])->name('project.store');
        Route::get('/edit-project/{id}', [ProjectController::class, 'edit'])->name('project.edit');
        Route::put('/update-project/{id}', [ProjectController::class, 'update'])->name('project.update');
        Route::delete('/delete-project', [ProjectController::class, 'destroy'])->name('project.destroy');
        // project section end

        // manage team section start
        Route::get('/manage-team', [TeamController::class, 'index'])->name('team.index');
        Route::get('/create-team', [TeamController::class, 'create'])->name('team.create');
        Route::post('/store-team', [TeamController::class, 'store'])->name('team.store');
        Route::get('/edit-team/{id}', [TeamController::class, 'edit'])->name('team.edit');
        Route::put('/update-team/{id}', [TeamController::class, 'update'])->name('team.update');
        Route::delete('/delete-team', [TeamController::class, 'destroy'])->name('team.destroy');
        // manage team section end

        // FAQ section start
        Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');
        Route::post('/faq/store', [FaqController::class, 'store'])->name('faq.store');
        Route::put('/faq/update/{id}', [FaqController::class, 'update'])->name('faq.update');
        Route::delete('/faq/destroy', [FaqController::class, 'destory'])->name('faq.destroy');
        // FAQ section end

        // counter section
        Route::get('counter', [CounterController::class, 'index'])->name('counter.index');
        Route::post('counter/store', [CounterController::class, 'store'])->name('counter.store');
        Route::put('counter/update/{counter}', [CounterController::class, 'update'])->name('counter.update');
        Route::delete('counter-delete', [CounterController::class, 'destroy'])->name('counter.destroy');
        // Counter section end

        // Brand section
        Route::get('brand', [BrandController::class, 'index'])->name('brand.index');
        // Features Section 
        Route::get('features', [FeaturesController::class, 'index'])->name('features.index');
        Route::post('features/store', [FeaturesController::class, 'store'])->name('features.store');
        Route::put('features/update/{id}', [FeaturesController::class, 'update'])->name('features.update');
        Route::delete('features-delete', [FeaturesController::class, 'destroy'])->name('features.destroy');

        // About section
        Route::get('about', [AboutController::class, 'index'])->name('about.index');

        // Contact section
        Route::get('contact/section', [GeneralSettingController::class, 'contact_section'])->name('contact.section');
        // manage testimonail
        Route::get('/manage-testimonial', [ManageTestimonialController::class, 'index'])->name('testimonial.index');



        Route::get('hero/page', [GeneralSettingController::class, 'hero_page'])->name('hero.page');
        Route::get('want-to-work/', [GeneralSettingController::class, 'want_to_work'])->name('want.to.work');


        //==================================== GENERAL SETTING SECTION ==============================================//

        Route::get('/general-settings', [GeneralSettingController::class, 'siteSettings'])->name('gs.site.settings');
        Route::get('/plugin-settings', [GeneralSettingController::class, 'pluginSettings'])->name('gs.plugin.settings');
        Route::get('/maintainance-settings', [GeneralSettingController::class, 'maintainance'])->name('gs.maintainance.settings');

        Route::get('/general-settings/logo-favicon', [GeneralSettingController::class, 'logo'])->name('gs.logo');
        Route::get('/general-settings/breadcumb', [GeneralSettingController::class, 'breadcumb'])->name('gs.breadcumb');
        Route::get('/general-settings/maintenance', [GeneralSettingController::class, 'maintenance'])->name('gs.maintenance');

        //cookie
        Route::get('/manage-cookie', [AdminController::class, 'cookie'])->name('cookie');

        Route::get('/manage-language', [AdminController::class, 'language'])->name('language');

        Route::get('social/link', [SocialController::class, 'index'])->name('social.manage');

        // theme
        Route::get('/theme-settings', [GeneralSettingController::class, 'themeSettings'])->name('gs.theme.settings');
        //==================================== GENERAL SETTING SECTION ==============================================//


        // ==================================== ADMIN CONTACT SECTION ====================================//
        Route::get('/contact/page/setting', [ContactController::class, 'index'])->name('contact.setting.index');

        Route::get('/contact/message', [ContactController::class, 'contactMessage'])->name('contact.message');




        //role manage
        Route::get('/role', [ManageRoleController::class, 'index'])->name('role.index');
        Route::get('/role/create', [ManageRoleController::class, 'create'])->name('role.create');

        Route::get('/role/edit/{id}', [ManageRoleController::class, 'edit'])->name('role.edit');



        //manage staff
        Route::get('manage/staff', [ManageStaffController::class, 'index'])->name('staff.manage');


        Route::get('manage/subscribers', [AdminController::class, 'subscribers'])->name('subscriber');






        Route::get('/clear-cache', function () {
            Artisan::call('optimize:clear');
            return back()->with('success', 'Cache cleared successfully');
        })->name('clear.cache');
    });
});

Route::post('the/genius/ocean/2441139', 'Front\FrontendController@subscription');
Route::get('finalize', [FrontendController::class, 'finalize']);
Route::get('/maintenance', [FrontendController::class, 'maintenance'])->name('front.maintenance');

Route::middleware(['maintenance'])->group(function () {
    // =========================================== FRONTEND ROUTES ===========================================//
    Route::get('/', [FrontendController::class, 'index'])->name('front.index');
    Route::get('/contact', [FrontendController::class, 'contact'])->name('front.contact');
    Route::get('/about', [FrontendController::class, 'aboutpage'])->name('front.about');
    Route::post('/contact/submit', [FrontendController::class, 'contactSubmit'])->name('front.contact.submit');
    Route::post('/subscriber/submit', [FrontendController::class, 'subscriber'])->name('front.subscriber.submit');

    Route::get('/getin/touch', [FrontendController::class, 'getintuch'])->name('front.getintuch');
    Route::post('/get/in/tuch/submit', [FrontendController::class, 'getInSubmit'])->name('front.gettuch.submit');
    Route::get('/blog', [FrontendController::class, 'blog'])->name('front.blog');
    Route::get('/blog/{slug}', [FrontendController::class, 'blog_details'])->name('front.blog.details');
    Route::get('/team', [FrontendController::class, 'team'])->name('front.team');
    Route::get('/team/{slug}', [FrontendController::class, 'team_details'])->name('front.team.details');
    Route::get('/services', [FrontendController::class, 'service'])->name('front.service');
    Route::get('/service/{slug}', [FrontendController::class, 'service_details'])->name('front.service.details');
    Route::get('/projects', [FrontendController::class, 'project'])->name('front.project');
    Route::get('/project/{slug}', [FrontendController::class, 'project_details'])->name('front.project.details');

    Route::get('/{slug}', [FrontendController::class, 'page'])->name('front.page');
});
