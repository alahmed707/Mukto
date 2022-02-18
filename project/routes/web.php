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

// *********************************** ADMIN SECTION START *********************************************//
Route::prefix('admin')->group(function() {



  Route::group(['middleware' => ['administrator']], function () {
  Route::get('/general-settings/email-verify/{status}', 'Admin\GeneralSettingController@isemailverify')->name('admin-gs-is-email-verify');


    //------------------------------- ADMIN USER SECTION -----------------------------------//
    Route::get('/users/datatables', 'Admin\UserController@datatables')->name('admin-user-datatables'); //JSON REQUEST
    Route::get('/users', 'Admin\UserController@index')->name('admin-user-index');
    Route::get('/users/edit/{id}', 'Admin\UserController@edit')->name('admin-user-edit');
    Route::post('/users/edit/{id}', 'Admin\UserController@update')->name('admin-user-update');
    Route::get('/users/delete/{id}', 'Admin\UserController@destroy')->name('admin-user-delete');
    Route::get('/user/{id}/show', 'Admin\UserController@show')->name('admin-user-show');
    Route::get('/users/ban/{id1}/{id2}', 'Admin\UserController@ban')->name('admin-user-ban');
      //------------------------------- ADMIN USER SECTION END -----------------------------------//
  
  
   // -------------------------------------ADMIN USER WITHDRAW SECTION----------------------------------//
    Route::get('/users/withdraws/datatables', 'Admin\UserController@withdrawdatatables')->name('admin-withdraw-datatables'); //JSON REQUEST
    Route::get('/users/withdraws', 'Admin\UserController@withdraws')->name('admin-withdraw-index');
    Route::get('/user/withdraw/{id}/show', 'Admin\UserController@withdrawdetails')->name('admin-withdraw-show');
    Route::get('/users/withdraws/accept/{id}', 'Admin\UserController@accept')->name('admin-withdraw-accept');
    Route::get('/user//withdraws/reject/{id}', 'Admin\UserController@reject')->name('admin-withdraw-reject');
   // ------------------------------------- WITHDRAW SECTION ENDS----------------------------------//
    //------------------------------- ADMIN GENERAL SETTINGS SECTION ------------------------------//
    Route::get('/general-settings/logo', 'Admin\GeneralSettingController@logo')->name('admin-gs-logo');
    Route::get('/general-settings/favicon', 'Admin\GeneralSettingController@fav')->name('admin-gs-fav');
    Route::get('/general-settings/loader', 'Admin\GeneralSettingController@load')->name('admin-gs-load');
    Route::get('/general-settings/contents', 'Admin\GeneralSettingController@contents')->name('admin-gs-contents');
    Route::get('/general-settings/success', 'Admin\GeneralSettingController@success')->name('admin-gs-success');
    Route::get('/general-settings/footer', 'Admin\GeneralSettingController@footer')->name('admin-gs-footer');
    Route::get('/general-settings/error', 'Admin\GeneralSettingController@error')->name('admin-gs-error');
    Route::get('/general-settings/breadcumb', 'Admin\GeneralSettingController@breadcumb')->name('admin-gs-breadcumb');
    //-------------------------------------- ADMIN GENERAL SETTINGS JSON SECTION END ---------------------------//
  
  
    // -------------------------------- SETTINGS SECTION------------------------------------------------------//
    Route::get('/general-settings/disqus/{status}', 'Admin\GeneralSettingController@isdisqus')->name('admin-gs-isdisqus'); 
    Route::get('/general-settings/admin/loader/{status}', 'Admin\GeneralSettingController@isadminloader')->name('admin-gs-is-admin-loader'); 
    Route::get('/general-settings/loader/{status}', 'Admin\GeneralSettingController@isloader')->name('admin-gs-isloader'); 
    Route::get('/general-settings/talkto/{status}', 'Admin\GeneralSettingController@talkto')->name('admin-gs-talkto');
      // -------------------------------- SETTINGS SECTION END ------------------------------------------------------//

  
    //  Comment Section
    Route::get('/general-settings/comment/{status}', 'Admin\GeneralSettingController@comment')->name('admin-gs-iscomment'); 
    //  Language Section
    Route::get('/general-settings/language/{status}', 'Admin\GeneralSettingController@language')->name('admin-gs-islanguage'); 
    //  Currency Section
    Route::get('/general-settings/currency/{status}', 'Admin\GeneralSettingController@currency')->name('admin-gs-iscurrency'); 
    //  Affilte Section
    //------------ ADMIN GENERAL SETTINGS JSON SECTION ENDS------------
    Route::post('/general-settings/update/all', 'Admin\GeneralSettingController@generalupdate')->name('admin-gs-update');
    Route::post('/general-settings/update/menu/all', 'Admin\GeneralSettingController@menuupdate')->name('admin-gs-menuupdate');
    //---------------------------------- ADMIN GENERAL SETTINGS SECTION ENDS -----------------------------------------//
  
      //------------ STAFF SECTION ------------
      Route::get('/staff/datatables', 'Admin\StaffController@datatables')->name('admin.staff.datatables');
      Route::get('/staff', 'Admin\StaffController@index')->name('admin.staff.index');
      Route::get('/staff/create', 'Admin\StaffController@create')->name('admin.staff.create');
      Route::get('/staff/edit/{id}', 'Admin\StaffController@Edit')->name('admin-staff-edit');
      Route::post('/staff/store', 'Admin\StaffController@store')->name('admin.staff.store');
      Route::post('/staff/update/{id}', 'Admin\StaffController@Update')->name('admin.staff.update');
      Route::get('/staff/show/{id}', 'Admin\StaffController@show')->name('admin.staff.show');
      Route::get('/staff/delete/{id}', 'Admin\StaffController@destroy')->name('admin.staff.delete');
      //------------ STAFF SECTION ENDS------------
  
      //----------------------------- ADMIN LANGUAGE SETTINGS SECTION ---------------------------------//
  Route::get('/languages/datatables', 'Admin\LanguageController@datatables')->name('admin-lang-datatables'); //JSON REQUEST
  Route::get('/languages', 'Admin\LanguageController@index')->name('admin-lang-index');
  Route::get('/languages/create', 'Admin\LanguageController@create')->name('admin-lang-create');
  Route::get('/languages/edit/{id}', 'Admin\LanguageController@edit')->name('admin-lang-edit');
  Route::post('/languages/create', 'Admin\LanguageController@store')->name('admin-lang-store');
  Route::post('/languages/edit/{id}', 'Admin\LanguageController@update')->name('admin-lang-update');
  Route::get('/languages/status/{id1}/{id2}', 'Admin\LanguageController@status')->name('admin-lang-st');
  Route::get('/languages/delete/{id}', 'Admin\LanguageController@destroy')->name('admin-lang-delete');
  //-------------------------------- ADMIN LANGUAGE SETTINGS SECTION ENDS -----------------------------//


  //----------------------------- ADMIN LANGUAGE SETTINGS SECTION ---------------------------------//
  Route::get('/panel/languages/datatables', 'Admin\AdminLanguageController@datatables')->name('admin-lang-admin-datatables'); //JSON REQUEST
  Route::get('/panel/languages/', 'Admin\AdminLanguageController@index')->name('admin-lang-admin-index');
  Route::get('/panel/languages/create', 'Admin\AdminLanguageController@create')->name('admin-lang-admin-create');
  Route::get('/panel/languages/edit/{id}', 'Admin\AdminLanguageController@edit')->name('admin-lang-admin-edit');
  Route::post('/panel/languages/create', 'Admin\AdminLanguageController@store')->name('admin-lang-admin-store');
  Route::post('/panel/languages/edit/{id}', 'Admin\AdminLanguageController@update')->name('admin-lang-admin-update');
  Route::get('/panel/languages/status/{id1}/{id2}', 'Admin\AdminLanguageController@status')->name('admin-lang-admin-st');
  Route::get('/panel/languages/delete/{id}', 'Admin\AdminLanguageController@destroy')->name('admin-lang-admin-delete');
  //-------------------------------- ADMIN LANGUAGE SETTINGS SECTION ENDS -----------------------------//


  //--------------------------------- ADMIN SEOTOOL SETTINGS SECTION ---------------------------------//

  Route::get('/seotools/analytics', 'Admin\SeoToolController@analytics')->name('admin-seotool-analytics');
  Route::post('/seotools/analytics/update', 'Admin\SeoToolController@analyticsupdate')->name('admin-seotool-analytics-update');
  Route::get('/seotools/keywords', 'Admin\SeoToolController@keywords')->name('admin-seotool-keywords');
  Route::post('/seotools/keywords/update', 'Admin\SeoToolController@keywordsupdate')->name('admin-seotool-keywords-update');
  Route::get('/products/popular/{id}','Admin\SeoToolController@popular')->name('admin-prod-popular');
  //---------------------------- ADMIN SEOTOOL SETTINGS SECTION ------------------------------//
//------------------------------ ADMIN PAGE SETTINGS SECTION --------------------------//
Route::get('/page-settings/contact', 'Admin\PageSettingController@contact')->name('admin-ps-contact');
Route::get('/page-settings/customize', 'Admin\PageSettingController@customize')->name('admin-ps-customize');
Route::get('/page-settings/experience', 'Admin\PageSettingController@video')->name('admin-ps-video');
Route::get('/page-settings/homecontact', 'Admin\PageSettingController@homecontact')->name('admin-ps-homecontact');
Route::get('/page-settings/donate', 'Admin\PageSettingController@donate')->name('admin-ps-donate');
Route::get('/page-settings/blog', 'Admin\PageSettingController@blog')->name('admin-ps-blog');
Route::post('/page-settings/update/all', 'Admin\PageSettingController@update')->name('admin-ps-update');
Route::post('/page-settings/update/home', 'Admin\PageSettingController@homeupdate')->name('admin-ps-homeupdate');
//----------------------------- ADMIN PAGE SETTINGS SECTION ENDS ---------------------------------//

  //----------------------------- ADMIN PAGE SECTION -----------------------------------------//
  Route::get('/page/datatables', 'Admin\PageController@datatables')->name('admin-page-datatables'); //JSON REQUEST
  Route::get('/page', 'Admin\PageController@index')->name('admin-page-index');
  Route::get('/page/create', 'Admin\PageController@create')->name('admin-page-create');
  Route::post('/page/create', 'Admin\PageController@store')->name('admin-page-store');
  Route::get('/page/edit/{id}', 'Admin\PageController@edit')->name('admin-page-edit');
  Route::post('/page/update/{id}', 'Admin\PageController@update')->name('admin-page-update');
  Route::get('/page/delete/{id}', 'Admin\PageController@destroy')->name('admin-page-delete');
  Route::get('/page/header/{id1}/{id2}', 'Admin\PageController@header')->name('admin-page-header');
  Route::get('/page/footer/{id1}/{id2}', 'Admin\PageController@footer')->name('admin-page-footer');
  //--------------------------------- ADMIN PAGE SECTION ENDS---------------------------------//


  //--------------------------------- ADMIN EMAIL SETTINGS SECTION ----------------------------//

  Route::get('/email-templates/{id}', 'Admin\EmailController@edit')->name('admin-mail-edit');
  Route::post('/email-templates/{id}', 'Admin\EmailController@update')->name('admin-mail-update');
  Route::get('/email-config', 'Admin\EmailController@config')->name('admin-mail-config');
  Route::get('/groupemail', 'Admin\EmailController@groupemail')->name('admin-group-show');
  Route::post('/groupemailpost', 'Admin\EmailController@groupemailpost')->name('admin-group-submit');
  Route::get('/issmtp/{status}', 'Admin\GeneralSettingController@issmtp')->name('admin-gs-issmtp');
  //------------------------- ADMIN EMAIL SETTINGS SECTION ENDS -------------------------//


  //------------------------------ ADMIN PAYMENT SETTINGS SECTION ----------------------------//
  Route::get('/payment-informations', 'Admin\GeneralSettingController@paymentsinfo')->name('admin-gs-payments');
  //------------------------------ ADMIN PAYMENT SETTINGS SECTION ----------------------------//


// --------------------------------- ADMIN CURRENCY SETTING -------------------------------//
  Route::get('/currency/datatables', 'Admin\CurrencyController@datatables')->name('admin-currency-datatables'); //JSON REQUEST
  Route::get('/currency', 'Admin\CurrencyController@index')->name('admin-currency-index');
  Route::get('/currency/create', 'Admin\CurrencyController@create')->name('admin-currency-create');
  Route::post('/currency/create', 'Admin\CurrencyController@store')->name('admin-currency-store');
  Route::get('/currency/edit/{id}', 'Admin\CurrencyController@edit')->name('admin-currency-edit');
  Route::post('/currency/update/{id}', 'Admin\CurrencyController@update')->name('admin-currency-update');
  Route::get('/currency/delete/{id}', 'Admin\CurrencyController@destroy')->name('admin-currency-delete');
  Route::get('/currency/status/{id1}/{id2}', 'Admin\CurrencyController@status')->name('admin-currency-status');
// --------------------------------- ADMIN CURRENCY SETTING -------------------------------//


  //---------------------------- ADMIN SOCIAL SETTINGS SECTION --------------------------//
  Route::get('/social', 'Admin\SocialSettingController@index')->name('admin-social-index');
  Route::post('/social/update', 'Admin\SocialSettingController@socialupdate')->name('admin-social-update');
  Route::post('/social/update/all', 'Admin\SocialSettingController@socialupdateall')->name('admin-social-update-all');
  //----------------------------- ADMIN SOCIAL SETTINGS SECTION ENDS------------------------------//


  });

    //------------- Admin Login Section -------------------------------------------//
    Route::get('/login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login/submit', 'Admin\LoginController@login')->name('admin.login.submit');
    Route::get('/forgot', 'Admin\LoginController@showForgotForm')->name('admin.forgot');
    Route::post('/forgot', 'Admin\LoginController@forgot')->name('admin.forgot.submit');
    Route::get('/logout', 'Admin\LoginController@logout')->name('admin.logout');
    //------------- Admin Login Section End-------------------------------------------//


    //------------- Admin Profile Section -------------------------------------------//
    Route::get('/', 'Admin\DashboardController@index')->name('admin.dashboard');
    Route::get('/profile', 'Admin\DashboardController@profile')->name('admin.profile');
    Route::post('/profile/update', 'Admin\DashboardController@profileupdate')->name('admin.profile.update');
    Route::get('/password', 'Admin\DashboardController@passwordreset')->name('admin.password');  
    Route::post('/password/update', 'Admin\DashboardController@changepass')->name('admin.password.update');
  ///------------- Admin Login Section End -------------------------------------------//


  //---------------------------------------- ADMIN BLOG SECTION -----------------------//
  Route::get('/blog/datatables', 'Admin\BlogController@datatables')->name('admin-blog-datatables'); //JSON REQUEST
  Route::get('/blog', 'Admin\BlogController@index')->name('admin-blog-index');
  Route::get('/blog/create', 'Admin\BlogController@create')->name('admin-blog-create');
  Route::post('/blog/create', 'Admin\BlogController@store')->name('admin-blog-store');
  Route::get('/blog/edit/{id}', 'Admin\BlogController@edit')->name('admin-blog-edit');
  Route::post('/blog/edit/{id}', 'Admin\BlogController@update')->name('admin-blog-update');  
  Route::get('/blog/delete/{id}', 'Admin\BlogController@destroy')->name('admin-blog-delete'); 
  //------------------------------- ADMIN BLOG SECTION End -----------------------//
  

      //------------ ADMIN BLOG CATEGORY SECTION  -----------------------//
  Route::get('/blog/category/datatables', 'Admin\BlogCategoryController@datatables')->name('admin-cblog-datatables'); //JSON REQUEST
  Route::get('/blog/category', 'Admin\BlogCategoryController@index')->name('admin-cblog-index');
  Route::get('/blog/category/create', 'Admin\BlogCategoryController@create')->name('admin-cblog-create');
  Route::post('/blog/category/create', 'Admin\BlogCategoryController@store')->name('admin-cblog-store');
  Route::get('/blog/category/edit/{id}', 'Admin\BlogCategoryController@edit')->name('admin-cblog-edit');
  Route::post('/blog/category/edit/{id}', 'Admin\BlogCategoryController@update')->name('admin-cblog-update');  
  Route::get('/blog/category/delete/{id}', 'Admin\BlogCategoryController@destroy')->name('admin-cblog-delete'); 
  Route::get('blog/category/status/{id1}/{id2}', 'Admin\BlogCategoryController@status')->name('admin-bcat-status');
  //------------------------------ ADMIN BLOG CATEGORY SECTION  END -----------------------//

  //--------------------------------- ADMIN SERVICE SECTION -----------------------------//
  Route::get('/service/datatables', 'Admin\ServiceController@datatables')->name('admin-service-datatables'); //JSON REQUEST
  Route::get('/service', 'Admin\ServiceController@index')->name('admin-service-index');
  Route::get('/service/create', 'Admin\ServiceController@create')->name('admin-service-create');
  Route::post('/service/create', 'Admin\ServiceController@store')->name('admin-service-store');
  Route::get('/service/edit/{id}', 'Admin\ServiceController@edit')->name('admin-service-edit');
  Route::post('/service/edit/{id}', 'Admin\ServiceController@update')->name('admin-service-update');  
  Route::get('/service/delete/{id}', 'Admin\ServiceController@destroy')->name('admin-service-delete'); 
  //------------ ADMIN COUNTER SECTION ENDS ------------

  
  //--------------------- ADMIN CAMPAIGN SECTION ------------------------//
  Route::get('/campaign/datatables', 'Admin\CampaignController@datatables')->name('admin-campaign-datatables'); //JSON REQUEST
  Route::get('/campaign', 'Admin\CampaignController@index')->name('admin-campaign-index');
  Route::get('/campaign/create', 'Admin\CampaignController@create')->name('admin-campaign-create');
  Route::post('/campaign/create', 'Admin\CampaignController@store')->name('admin-campaign-store');
  Route::get('/campaign/edit/{id}', 'Admin\CampaignController@edit')->name('admin-campaign-edit');
  Route::get('/panding/view/{id}', 'Admin\CampaignController@PandingView')->name('admin-campaign-panding-view');
  Route::get('/campaign/view/{id}', 'Admin\CampaignController@campaignView')->name('admin-campaign-view');
  Route::post('/campaign/edit/{id}', 'Admin\CampaignController@update')->name('admin-campaign-update');  
  Route::get('/campaign/delete/{id}', 'Admin\CampaignController@destroy')->name('admin-campaign-delete'); 
  Route::get('/campaign/status/{id1}/{id2}', 'Admin\CampaignController@status')->name('admin-campaign-status');
  Route::get('/campaign/status/panding/{id1}/{id2}', 'Admin\CampaignController@isPanding')->name('admin-campaign-is_panding');
  Route::get('/campaign/panding/datatables', 'Admin\CampaignController@Pandingdatatables')->name('admin-campaign-panding-datatables'); //JSON REQUEST
  Route::get('/campaign/availble-fund/get/{id}','Admin\CampaignController@GetCampaignFund')->name('admin-campaign-fund-get');
  Route::get('/campaign/panding', 'Admin\CampaignController@Pandingindex')->name('admin-campaign-panding-index');
  
  Route::get('/donation/datatables/{id}', 'Admin\CampaignController@DonationdatatablesSingle')->name('admin-donation-datatables-single'); //JSON REQUEST
  Route::get('/donation/datatables', 'Admin\CampaignController@Donationdatatables')->name('admin-donation-datatables'); //JSON REQUEST
  Route::get('/all/donation','Admin\CampaignController@AllDonation')->name('admin-all-donation');
  Route::get('/donation/view/{id}','Admin\CampaignController@DonationView')->name('admin-donation-view');
  //--------------------- ADMIN CAMPAIGN SECTION END ------------------------//


  //--------------------- ADMIN CAMPAIGN WITHDROW SECTION ------------------------//
  Route::get('/campaign/withdrow/datatables', 'Admin\CampaignController@Withdrowdatatables')->name('admin-campaign-withdrow-datatables'); //JSON REQUEST
  Route::post('/campaign/withdrow', 'Admin\CampaignController@CampaignWithdrow')->name('admin-campaign-withdrow');  
  Route::get('/campaign/withdrow/{id}', 'Admin\CampaignController@CampaignWithdrowCreate')->name('admin-campaign-withdrow-create');  

      //--------------------- ADMIN CAMPAIGN WITHDROW SECTION END------------------------//


    //---------------------------- ADMIN COUNTER SECTION ----------------------------------//
    Route::get('/counter/datatables', 'Admin\HomeCounterController@datatables')->name('admin-counter-datatables'); //JSON REQUEST
    Route::get('/counter', 'Admin\HomeCounterController@index')->name('admin-counter-index');
    Route::get('/counter/create', 'Admin\HomeCounterController@create')->name('admin-counter-create');
    Route::post('/counter/create', 'Admin\HomeCounterController@store')->name('admin-counter-store');
    Route::get('/counter/edit/{id}', 'Admin\HomeCounterController@edit')->name('admin-counter-edit');
    Route::post('/counter/edit/{id}', 'Admin\HomeCounterController@update')->name('admin-counter-update');  
    Route::get('/counter/delete/{id}', 'Admin\HomeCounterController@destroy')->name('admin-counter-delete'); 
    //-------------------------- ADMIN COUNTER SECTION ENDS ---------------------------------//


  //---------------------------------- ADMIN SLIDER SECTION -----------------------------------//
  Route::get('/home', 'Admin\HomePageController@index')->name('admin-background-index');
  Route::post('/home/update', 'Admin\HomePageController@Update')->name('admin-homepage-update');
  //---------------------------------- ADMIN SLIDER SECTION ENDS -------------------------------//


  // ------------------------ ADMIN NOTIFICATION SECTION ....................//
  Route::get('notification/count','Admin\NotificationController@notf_count')->name('notification-count');
  Route::get('notification/show','Admin\NotificationController@notf_show')->name('order-notf-show');
  Route::get('notification/clear','Admin\NotificationController@notf_clear')->name('order-notf-clear');
// ------------------------- ADMIN NOTIFICATION SECTION END ....................//


  //--------------------- ADMIN CATEGORY SECTION --------------------------//
  Route::get('/category/datatables', 'Admin\CategoryController@datatables')->name('admin-cat-datatables'); //JSON REQUEST
  Route::get('/category', 'Admin\CategoryController@index')->name('admin-cat-index');
  Route::get('/category/create', 'Admin\CategoryController@create')->name('admin-cat-create');
  Route::post('/category/create', 'Admin\CategoryController@store')->name('admin-cat-store');
  Route::get('/category/edit/{id}', 'Admin\CategoryController@edit')->name('admin-cat-edit');
  Route::post('/category/edit/{id}', 'Admin\CategoryController@update')->name('admin-cat-update');
  Route::get('/category/delete/{id}', 'Admin\CategoryController@destroy')->name('admin-cat-delete');
  Route::get('/category/status/{id1}/{id2}', 'Admin\CategoryController@status')->name('admin-cat-status');
  //------------------------------  ADMIN CATEGORY SECTION ENDS------------------------------//


 //----------------------------- ADMIN PORTFOLIO SECTION -------------------------------//
Route::get('/portfolio/datatables', 'Admin\PortfolioController@datatables')->name('admin-portfolio-datatables');
Route::get('/portfolio', 'Admin\PortfolioController@index')->name('admin-portfolio-index');
Route::get('/portfolio/create', 'Admin\PortfolioController@create')->name('admin-portfolio-create');
Route::post('/portfolio/create', 'Admin\PortfolioController@store')->name('admin-portfolio-store');
Route::get('/portfolio/edit/{id}', 'Admin\PortfolioController@edit')->name('admin-portfolio-edit');
Route::post('/portfolio/edit/{id}', 'Admin\PortfolioController@update')->name('admin-portfolio-update');
Route::get('/portfolio/delete/{id}', 'Admin\PortfolioController@destroy')->name('admin-portfolio-delete');
  //--------------------------------- ADMIN PORTFOLIO SECTION ENDS --------------------------------//


  //---------------------------------ADMIN TEAM SECTION -------------------------------------//
Route::get('/member/datatables', 'Admin\MemberController@datatables')->name('admin-member-datatables');
Route::get('/member', 'Admin\MemberController@index')->name('admin-member-index');
Route::get('/member/create', 'Admin\MemberController@create')->name('admin-member-create');
Route::post('/member/create', 'Admin\MemberController@store')->name('admin-member-store');
Route::get('/member/edit/{id}', 'Admin\MemberController@edit')->name('admin-member-edit');
Route::post('/member/edit/{id}', 'Admin\MemberController@update')->name('admin-member-update');
Route::get('/member/delete/{id}', 'Admin\MemberController@destroy')->name('admin-member-delete');
  //-------------------------------ADMIN TEAM SECTION ENDS ----------------------------//

// -------------------------------- ADMIN NOTIFICATION SECTION -----------------------------//
    Route::get('/conv/notf/show', 'Admin\NotificationController@conv_notf_show')->name('conv-notf-show');
    Route::get('/conv/notf/count','Admin\NotificationController@conv_notf_count')->name('conv-notf-count');
    Route::get('/conv/notf/clear','Admin\NotificationController@conv_notf_clear')->name('conv-notf-clear');
// -------------------------------- ADMIN NOTIFICATION SECTION END -----------------------------//


  //--------------------------------- ADMIN USER MESSAGE SECTION -----------------------------//
  Route::get('/messages/datatables', 'Admin\MessageController@datatables')->name('admin-message-datatables');
  Route::get('/messages', 'Admin\MessageController@index')->name('admin-message-index');
  Route::get('/message/{id}', 'Admin\MessageController@message')->name('admin-message-show');
  Route::get('/message/load/{id}', 'Admin\MessageController@messageshow')->name('admin-message-load');
  Route::post('/message/post', 'Admin\MessageController@postmessage')->name('admin-message-store');
  Route::get('/message/{id}/delete', 'Admin\MessageController@messagedelete')->name('admin-message-delete');   
  Route::post('/user/send/message', 'Admin\MessageController@usercontact')->name('admin-send-message');
 //--------------------------------- ADMIN USER MESSAGE SECTION -----------------------------//
  

  //------------------------------------ ADMIN FAQ SECTION ---------------------------------//
  Route::get('/faq/datatables', 'Admin\FaqController@datatables')->name('admin-faq-datatables'); //JSON REQUEST
  Route::get('/faq', 'Admin\FaqController@index')->name('admin-faq-index');
  Route::get('/faq/create', 'Admin\FaqController@create')->name('admin-faq-create');
  Route::post('/faq/create', 'Admin\FaqController@store')->name('admin-faq-store');
  Route::get('/faq/edit/{id}', 'Admin\FaqController@edit')->name('admin-faq-edit');
  Route::post('/faq/update/{id}', 'Admin\FaqController@update')->name('admin-faq-update');
  Route::get('/faq/delete/{id}', 'Admin\FaqController@destroy')->name('admin-faq-delete');
  //---------------------------- ADMIN FAQ SECTION ENDS -------------------------------//


  //---------------------------- ADMIN FEATURE SECTION ------------------------------//
  Route::get('/feature/datatables', 'Admin\FeatureController@datatables')->name('admin-feature-datatables'); //JSON REQUEST
  Route::get('/feature', 'Admin\FeatureController@index')->name('admin-feature-index');
  Route::get('/feature/create', 'Admin\FeatureController@create')->name('admin-feature-create');
  Route::post('/feature/create', 'Admin\FeatureController@store')->name('admin-feature-store');
  Route::get('/feature/edit/{id}', 'Admin\FeatureController@edit')->name('admin-feature-edit');
  Route::post('/feature/update/{id}', 'Admin\FeatureController@update')->name('admin-feature-update');
  Route::get('/feature/delete/{id}', 'Admin\FeatureController@destroy')->name('admin-feature-delete');
  //-------------------------------- ADMIN FEATURE SECTION ENDS -----------------------------//


  //---------------------------- ADMIN CALL BACK SECTION ------------------------------//
  Route::get('/call-back/datatables', 'Admin\CallbackController@datatables')->name('admin-callback-datatables'); //JSON REQUEST
  Route::get('/callback', 'Admin\CallbackController@index')->name('admin-ps-callback.index');
  Route::get('/callback/information', 'Admin\CallbackController@Information')->name('admin-ps-callback.information');
  Route::get('/callback/delete/{id}', 'Admin\CallbackController@Delete')->name('admin-callback-delete');
  Route::get('/callback/show/{id}', 'Admin\CallbackController@show')->name('admin-callback-show');
  //-------------------------------- ADMIN CALL BACK SECTION ENDS -----------------------------//



  //------------ ADMIN SUBSCRIBERS SECTION ------------
  Route::get('/subscribers/datatables', 'Admin\SubscriberController@datatables')->name('admin-subs-datatables'); //JSON REQUEST
  Route::get('/subscribers', 'Admin\SubscriberController@index')->name('admin-subs-index');
  Route::get('/subscribers/download', 'Admin\SubscriberController@download')->name('admin-subs-download');  
  //---------------------------- ADMIN SUBSCRIBERS ENDS -----------------------------------------//

    //------------ ADMIN SOCIAL SETTINGS SECTION ------------

    Route::get('/social', 'Admin\SocialSettingController@index')->name('admin-social-index');
    Route::post('/social/update', 'Admin\SocialSettingController@socialupdate')->name('admin-social-update');
    Route::post('/social/update/all', 'Admin\SocialSettingController@socialupdateall')->name('admin-social-update-all');
    Route::get('/social/facebook', 'Admin\SocialSettingController@facebook')->name('admin-social-facebook');
    Route::get('/social/google', 'Admin\SocialSettingController@google')->name('admin-social-google');
    Route::get('/social/facebook/{status}', 'Admin\SocialSettingController@facebookup')->name('admin-social-facebookup');
    Route::get('/social/google/{status}', 'Admin\SocialSettingController@googleup')->name('admin-social-googleup');
    //------------ ADMIN SOCIAL SETTINGS SECTION ENDS------------//




// Payment Informations

Route::get('/payment-informations', 'Admin\GeneralSettingController@paymentsinfo')->name('admin-gs-payments');
Route::get('/general-settings/guest/{status}', 'Admin\GeneralSettingController@guest')->name('admin-gs-guest');
Route::get('/general-settings/paypal/{status}', 'Admin\GeneralSettingController@paypal')->name('admin-gs-paypal');
Route::get('/general-settings/instamojo/{status}', 'Admin\GeneralSettingController@instamojo')->name('admin-gs-instamojo');
Route::get('/general-settings/paystack/{status}', 'Admin\GeneralSettingController@paystack')->name('admin-gs-paystack');
Route::get('/general-settings/cod/{status}', 'Admin\GeneralSettingController@cod')->name('admin-gs-cod');
Route::get('/general-settings/paytm/{status}', 'Admin\GeneralSettingController@paytm')->name('admin-gs-paytm');
Route::get('/general-settings/molly/{status}', 'Admin\GeneralSettingController@molly')->name('admin-gs-molly');
Route::get('/general-settings/razor/{status}', 'Admin\GeneralSettingController@razor')->name('admin-gs-razor');
// Payment Gateways

Route::get('/payment-settings/staus/{field}/{value}', 'Admin\PaymentSettingController@status')->name('admin-payment-setting-status');
Route::get('/paymentgateway/datatables', 'Admin\PaymentGatewayController@datatables')->name('admin-payment-datatables'); //JSON REQUEST
Route::get('/paymentgateway', 'Admin\PaymentGatewayController@index')->name('admin-payment-index');
Route::get('/paymentgateway/edit/{id}', 'Admin\PaymentGatewayController@edit')->name('admin-payment-edit');
Route::post('/paymentgateway/update/{id}', 'Admin\PaymentGatewayController@update')->name('admin-payment-update');
Route::delete('/paymentgateway/delete/{id}', 'Admin\PaymentGatewayController@destroy')->name('admin-payment-delete');
Route::get('/paymentgateway/status/{id1}/{id2}', 'Admin\PaymentGatewayController@status')->name('admin-payment-status');

// Currency Settings




Route::get('/check/movescript', 'Admin\DashboardController@movescript')->name('admin-move-script');
Route::get('/generate/backup', 'Admin\DashboardController@generate_bkup')->name('admin-generate-backup');
Route::get('/activation', 'Admin\DashboardController@activation')->name('admin-activation-form');
Route::post('/activation', 'Admin\DashboardController@activation_submit')->name('admin-activate-purchase');
Route::get('/clear/backup', 'Admin\DashboardController@clear_bkup')->name('admin-clear-backup');



});

// ************************************ ADMIN SECTION ENDS**********************************************//


// ************************************ USER SECTION START *********************************************//

Route::prefix('user')->group(function() {

  // ---------------------------- USER DASHBOARD SECTION .....................................//
  Route::get('/dashboard', 'User\UserController@index')->name('user-dashboard');
  Route::get('/transactions', 'User\UserController@trans')->name('user-trans'); 
  // ---------------------------- USER DASHBOARD SECTION END .....................................//

  // ----------------------------- USER LOGIN SECTION -------------------------------------------//
  Route::get('/login', 'User\LoginController@showLoginForm')->name('user.login');
  Route::post('/login', 'User\LoginController@login')->name('user.login.submit');
  // ----------------------------- USER LOGIN SECTION -------------------------------------------//


  // ----------------------------- USER REGISTER SECTION -------------------------------------------//
  Route::post('/register', 'User\RegisterController@register')->name('user-register-submit');
  Route::get('/register/verify/{token}', 'User\RegisterController@token')->name('user-register-token');  
  // ----------------------------- USER REGISTER SECTION END -------------------------------------------//

  // ----------------------------- USER RESET SECTION -------------------------------------------//
  Route::get('/reset', 'User\UserController@resetform')->name('user-reset');
  Route::post('/reset', 'User\UserController@reset')->name('user-reset-submit');
  // ----------------------------- USER RESET  SECTION END -------------------------------------------//

   // ----------------------------- USER PROFILE SECTION -------------------------------------------//
  Route::get('/profile', 'User\UserController@profile')->name('user-profile'); 
  Route::post('/profile', 'User\UserController@profileupdate')->name('user-profile-update'); 
  // ----------------------------- USER PROFILE  SECTION END -------------------------------------------//

  // ----------------------------- USER FORGOT SECTION -------------------------------------------//
  Route::get('/forgot', 'User\ForgotController@showforgotform')->name('user-forgot');
  Route::post('/forgot', 'User\ForgotController@forgot')->name('user-forgot-submit');  
  // ----------------------------- USER FORGOT SECTION END -------------------------------------------//

  // ----------------------------- USER WITHDRAW SECTION -------------------------------------------//
  Route::get('/withdraw', 'User\WithdrawController@index')->name('user-wwt-index');
  Route::get('/withdraw/create', 'User\WithdrawController@create')->name('user-wwt-create');
  Route::post('/withdraw/create', 'User\WithdrawController@store')->name('user-wwt-store');
  // ----------------------------- USER WITHDRAW  SECTION  END -------------------------------------------//

  // ----------------------------- USER CAMPAIGN SECTION -------------------------------------------//
  Route::get('campaign','User\CampaignController@index')->name('user-campaign.index');
  Route::get('campaign/create','User\CampaignController@CreateCampaign')->name('user-campaign.create');
  Route::get('campaign/edit/{id}','User\CampaignController@EditCampaign')->name('user-campaign.edit');
  Route::post('/campaign/store', 'User\CampaignController@store')->name('user-campaign-create'); 
  Route::post('/campaign/update/{id}', 'User\CampaignController@update')->name('user-campaign-update'); 
  Route::get('/campaign/view/{id}', 'User\CampaignController@View')->name('user-campaign-view'); 
  Route::get('/campaign/delete/{id}', 'User\CampaignController@delete')->name('user-campaign-delete');
  Route::get('/campaign/availble-fund/get/{id}','User\CampaignController@GetCampaignFund')->name('user-campaign-fund-get');
  // ----------------------------- USER CAMPAGIN SECTION  END -------------------------------------------//

  // ----------------------------- USER AFFILATE SECTION -------------------------------------------//
  Route::get('/affilate/code', 'User\UserController@affilate_code')->name('user-affilate-code');
  // ----------------------------- USER LOGINAFFILATE SECTION END-------------------------------------------//

  // ----------------------------- USER NOTIFICATION SECTION -------------------------------------------//
  Route::get('/notf/show', 'User\NotificationController@user_notf_show')->name('customer-notf-show');
  Route::get('/notf/count','User\NotificationController@user_notf_count')->name('customer-notf-count');
  Route::get('/notf/clear','User\NotificationController@user_notf_clear')->name('customer-notf-clear');
  // ----------------------------- USER NOTIFICATION SECTION END -------------------------------------------//

  // ----------------------------- USER ADMIN MESSAGE SECTION -------------------------------------------//
  Route::get('/messages', 'User\MessageController@adminmessages')->name('user-message-index');
  Route::get('/message/{id}', 'User\MessageController@adminmessage')->name('user-message-show');
  Route::post('/message/post', 'User\MessageController@adminpostmessage')->name('user-message-store');
  Route::get('/message/{id}/delete', 'User\MessageController@adminmessagedelete')->name('user-message-delete1');   
  Route::post('/send/message', 'User\MessageController@adminusercontact')->name('user-send-message');
  Route::get('/message/load/{id}', 'User\MessageController@messageload')->name('user-message-load');
  // ----------------------------- USER ADMIN MESSAGE  SECTION END -------------------------------------------//

  // ----------------------------- USER LOGOUT SECTION -------------------------------------------//
  Route::get('/logout', 'User\LoginController@logout')->name('user-logout');
  // ----------------------------- USER LOGOUT SECTION END -------------------------------------------//

});


// ************************************* USER SECTION END  ************************************************//

Route::post('the/genius/ocean/2441139', 'Front\FrontendController@subscription');
Route::get('finalize', 'Front\FrontendController@finalize');

// ************************************ FRONT SECTION **********************************************

Route::get('/', 'Front\FrontendController@index')->name('front.index');
Route::get('/currency/{id}', 'Front\FrontendController@currency')->name('front.currency');
Route::get('/language/{id}', 'Front\FrontendController@language')->name('front.language');

// PROJECT SECTION  
Route::get('/project/show/{id}','Front\FrontendController@project')->name('front.project');


// BLOG SECTION

Route::get('/blog','Front\FrontendController@blog')->name('front.blog');
Route::get('blog/show/{slug}','Front\FrontendController@blogshow')->name('front.blog.show');
Route::get('/blog/category/{slug}','Front\FrontendController@blogcategory')->name('front.blogcategory');
Route::get('/blog/tag/{slug}','Front\FrontendController@blogtags')->name('front.blogtags');  
Route::get('/blog-search','Front\FrontendController@blogsearch')->name('front.blogsearch');
Route::get('/blog/archive/{slug}','Front\FrontendController@blogarchive')->name('front.blogarchive');
// Campaign SECTION-------------------------//
Route::get('/campaign','Front\FrontendController@campaign')->name('front.campaign');
Route::get('/campaign/donet/{slug}','Front\FrontendController@campaignDonet')->name('front.campaign.donet');
Route::get('/campaign/{id}','Front\FrontendController@campaignShow')->name('front.campaign.show');
Route::get('/campaign/category/{slug}','Front\FrontendController@campaigncategory')->name('front.campaign.category');
Route::get('/campaign/tag/{slug}','Front\FrontendController@campaigntags')->name('front.campaign.slug');

// FAQ SECTION  //
Route::get('/faq','Front\FrontendController@faq')->name('front.faq');

// CONTACT SECTION  ..................
Route::get('/contact','Front\FrontendController@contact')->name('front.contact');
Route::post('/contact','Front\FrontendController@contactemail')->name('front.contact.submit');
Route::get('/contact/refresh_code','Front\FrontendController@refresh_code');

// CHECKOUT SECTION  
Route::get('/donation/payment/return', 'Front\PaymentController@payreturn')->name('payment.return');
Route::get('/donation/payment/cancle', 'Front\PaymentController@paycancle')->name('payment.cancle');
Route::get('/donation/payment/notify', 'Front\PaymentController@notify')->name('payment.notify');
// CHECKOUT SECTION ENDS


// SUBSCRIBE SECTION----------------------
Route::post('/subscriber/store', 'Front\FrontendController@subscribe')->name('front.subscribe');

// Search Section .........................//
Route::get('/search','Front\FrontendController@Search')->name('front.search');

// CURRENCY SET ROUTE 

Route::get('/currency/setup/{id}','Front\FrontendController@currency')->name('front-currency-setup');

// PROJECT SECTION  
Route::get('/service/{slug}','Front\FrontendController@service')->name('front.service');

// PAGE SECTION
Route::get('/{slug}','Front\FrontendController@page')->name('front.page');


  // LOGIN WITH FACEBOOK OR GOOGLE SECTION  
  Route::get('auth/{provider}', 'User\SocialRegisterController@redirectToProvider')->name('social-provider');
  Route::get('auth/{provider}/callback', 'User\SocialRegisterController@handleProviderCallback');
  // LOGIN WITH FACEBOOK OR GOOGLE SECTION ENDS

  // CALL BACK SECTION..........................//
  Route::post('call-back-store','Front\FrontendController@CallbackStore')->name('front.callback.store');




// CHECKOUT SECTION

  // Checkout
  Route::get('/checkout/','Front\CheckoutController@checkout')->name('front.checkout');
  Route::get('/checkout/payment/{slug1}/{slug2}','Front\FrontendController@loadpayment')->name('front.load.payment');
  Route::get('/checkout/payment/return', 'Front\CheckoutController@payreturn')->name('front.payment.return');
  Route::get('/checkout/payment/cancle', 'Front\CheckoutController@paycancle')->name('front.payment.cancle');
  Route::get('/checkout/payment/wallet-check','Front\CheckoutController@walletcheck')->name('front.wallet.check');

  // Paypal
  Route::post('/checkout/payment/paypal-submit', 'Payment\Checkout\PaypalController@store')->name('front.paypal.submit');
  Route::get('/checkout/payment/paypal-notify', 'Payment\Checkout\PaypalController@notify')->name('front.paypal.notify');


  // Stripe
  Route::post('/checkout/payment/stripe-submit', 'Payment\Checkout\StripeController@store')->name('front.stripe.submit');

  // Instamojo
  Route::post('/checkout/payment/instamojo-submit', 'Payment\Checkout\InstamojoController@store')->name('front.instamojo.submit');
  Route::get('/checkout/payment/instamojo-notify', 'Payment\Checkout\InstamojoController@notify')->name('front.instamojo.notify');

  // Paystack
  Route::post('/checkout/payment/paystack-submit', 'Payment\Checkout\PaystackController@store')->name('front.paystack.submit');

  // PayTM
  Route::post('/checkout/payment/paytm-submit', 'Payment\Checkout\PaytmController@store')->name('front.paytm.submit');;
  Route::post('/checkout/payment/paytm-notify', 'Payment\Checkout\PaytmController@notify')->name('front.paytm.notify');

  // Molly
  Route::post('/checkout/payment/molly-submit', 'Payment\Checkout\MollieController@store')->name('front.molly.submit');
  Route::get('/checkout/payment/molly-notify', 'Payment\Checkout\MollieController@notify')->name('front.molly.notify');

  // RazorPay
  Route::post('/checkout/payment/razorpay-submit', 'Payment\Checkout\RazorpayController@store')->name('front.razorpay.submit');
  Route::post('/checkout/payment/razorpay-notify', 'Payment\Checkout\RazorpayController@notify')->name('front.razorpay.notify');

  // Authorize.Net	
  Route::post('/checkout/payment/authorize-submit', 'Payment\Checkout\AuthorizeController@store')->name('front.authorize.submit');

  // Mercadopago 
  Route::post('/checkout/payment/mercadopago-submit', 'Payment\Checkout\MercadopagoController@store')->name('front.mercadopago.submit');

  // Flutter Wave	 
  Route::post('/checkout/payment/flutter-submit', 'Payment\Checkout\FlutterWaveController@store')->name('front.flutter.submit');

  // 2checkout
  Route::post('/checkout/payment/twocheckout-submit', 'Payment\Checkout\TwoCheckoutController@store')->name('front.twocheckout.submit');
  Route::get('/checkout/payment/twocheckout-notify', 'Payment\Checkout\TwoCheckoutController@notify')->name('front.twocheckout.notify');

  
  // Voguepay
  Route::post('/checkout/payment/voguepay-submit', 'Payment\Checkout\VoguepayController@store')->name('front.voguepay.submit');

  // Wallet
  Route::post('/checkout/payment/wallet-submit', 'Payment\Checkout\WalletPaymentController@store')->name('front.wallet.submit');

  // Flutterwave Notify Routes

  // Checkout
  Route::post('/cflutter/notify', 'Payment\Checkout\FlutterWaveController@notify')->name('front.flutter.notify');



  // CHECKOUT SECTION ENDS


