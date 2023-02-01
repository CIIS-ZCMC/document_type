<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangayController;
use App\Http\Controllers\BenefitApplicationController;
use App\Http\Controllers\BenefitController;
use App\Http\Controllers\BenefitRequirementController;
use App\Http\Controllers\ClientCardController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\FieldOfficeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\RequirementController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientBenefitController;
use App\Models\BenefitRequirement;
use App\Models\ClientCard;
use App\Models\DeclineBenefit;
use App\Models\FieldOffice;
use Psr\Http\Client\ClientInterface;

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

Route::get('/main', [PageController::class, 'main'])->name('main'); //login route
Route::get('/userlogin', [PageController::class, 'userlogin'])->name('userlogin'); //login route

Route::get('/registration', [PageController::class, 'registration']); //login route
Route::get('/seniorregistration', [PageController::class, 'seniorregistration']); //login route
Route::get('/pwdregistration', [PageController::class, 'pwdregistration']); //login route
Route::get('/soloparentregistration', [PageController::class, 'soloparentregistration']); //login route



Route::get('/verify/{cardnumber}/{token}', [ClientCardController::class, 'verifyclient']); //login route

Route::get('/registeredsenior', [PageController::class, 'registeredsenior']); //login route
Route::get('/registeredsoloparent', [PageController::class, 'registeredsoloparent']); //login route
Route::get('/registeredpwd', [PageController::class, 'registeredpwd']); //login route

Route::get('/registeredseniorpage', [PageController::class, 'registeredseniorpage']); //login route
Route::get('/registeredsoloparentpage', [PageController::class, 'registeredsoloparentpage']); //login route
Route::get('/registeredpwdpage', [PageController::class, 'registeredpwdpage']); //login route

Route::get('/ongoingsenior', [PageController::class, 'ongoingsenior']); //login route
Route::get('/ongoingsoloparent', [PageController::class, 'ongoingsoloparent']); //login route
Route::get('/ongoingpwd', [PageController::class, 'ongoingpwd']); //login route

Route::post('/searchregisteredsenior', [PageController::class, 'searchregisteredsenior']);
Route::post('/searchregisteredpwd', [PageController::class, 'searchregisteredpwd']);
Route::post('/searchregisteredsoloparent', [PageController::class, 'searchregisteredsoloparent']);


Route::post('/searchongoingsenior', [PageController::class, 'searchongoingsenior']);
Route::post('/searchongoingpwd', [PageController::class, 'searchongoingpwd']);
Route::post('/searchongoingpwd1', [PageController::class, 'searchongoingpwd1']);
Route::post('/searchongoingsoloparent', [PageController::class, 'searchongoingsoloparent']);

Route::post('/save-capture.php', function()
{
    include public_path().'save-capture.php';
});




Route::get('/registeredsenior', [PageController::class, 'registeredsenior']); //login route
Route::get('/registeredsoloparent', [PageController::class, 'registeredsoloparent']); //login route
Route::get('/registeredpwd', [PageController::class, 'registeredpwd']); //login route

Route::get('/trackcardform', [PageController::class, 'trackcardform']); //login route
Route::get('/trackbenefitform', [PageController::class, 'trackbenefitform']); //login route  

Route::post('/trackcardapplication', [BenefitApplicationController::class, 'trackcardapplication']); //login route
Route::post('/trackbenefitapplication', [BenefitApplicationController::class, 'trackbenefitapplication']); //login route  

Route::post('/updatecardapplication', [BenefitApplicationController::class, 'updatecardapplication']); //login route
Route::post('/updatebenefitapplication', [BenefitApplicationController::class, 'updatebenefitapplication']); //login route  

Route::post('/updateclientcardapplication', [BenefitApplicationController::class, 'updateclientcardapplication']); //login route
Route::post('/updateseniorcardapplication', [BenefitApplicationController::class, 'updateseniorcardapplication']); //login route
Route::post('/updatepwdcardapplication', [BenefitApplicationController::class, 'updatepwdcardapplication']); //login route
Route::post('/updatesoloparentcardapplication', [BenefitApplicationController::class, 'updatesoloparentcardapplication']); //login route

Route::post('/updateclientbenefitapplication', [BenefitApplicationController::class, 'updateclientbenefitapplication']); //login route  



Route::get('/applybenefit', [BenefitApplicationController::class, 'applybenefitform']); //login route

Route::get('/dummybenefit', [BenefitApplicationController::class, 'dummyform']); //login route

Route::get('/searchseniorcashincentivesform', [BenefitApplicationController::class, 'searchseniorcashincentivesform']); //login route
Route::get('/searchsenioroctogenarianform', [BenefitApplicationController::class, 'searchsenioroctogenarianform']); //login route
Route::get('/searchseniornonagenarianform', [BenefitApplicationController::class, 'searchseniornonagenarianform']); //login route
Route::get('/searchseniorcentenarianform', [BenefitApplicationController::class, 'searchseniorcentenarianform']);

Route::post('/seniorcashincentivesform', [BenefitApplicationController::class, 'seniorcashincentivesform']); //login route
Route::post('/senioroctogenarianform', [BenefitApplicationController::class, 'senioroctogenarianform']); //login route
Route::post('/seniornonagenarianform', [BenefitApplicationController::class, 'seniornonagenarianform']); //login route
Route::post('/seniorcentenarianform', [BenefitApplicationController::class, 'seniorcentenarianform']); //login route

Route::post('/createseniorcashincentives', [BenefitApplicationController::class, 'createseniorcashincentives']); //login route
Route::post('/createsenioroctogenarian', [BenefitApplicationController::class, 'createsenioroctogenarian']); //login route
Route::post('/createseniornonagenarian', [BenefitApplicationController::class, 'createseniornonagenarian']); //login route
Route::post('/createseniorcentenarian', [BenefitApplicationController::class, 'createseniorcentenarian']); //login route


Route::post('/pwdcashincentivesform', [BenefitApplicationController::class, 'pwdcashincentivesform']); //login route

Route::get('/searchpwdcashincentivesform', [BenefitApplicationController::class, 'searchpwdcashincentivesform']); //login route

Route::post('/createpwdcashincentives', [BenefitApplicationController::class, 'createpwdcashincentives']); //login rout

// Route::get('/registeredsoloparent', [PageController::class, 'registeredsoloparent']); //login route
// Route::get('/registeredpwd', [PageController::class, 'registeredpwd']); //login route

Route::post('/createcitizen', [ClientController::class, 'store']);
Route::post('/createsenior', [ClientController::class, 'storesenior']);
Route::post('/createpwd', [ClientController::class, 'storepwd']);
Route::post('/createsoloparent', [ClientController::class, 'storesoloparent']);


Route::post('/createregistered', [ClientController::class, 'createregistered']);
Route::post('/createregisteredpwd', [ClientController::class, 'createregisteredpwd']);
Route::post('/createregisteredsoloparent', [ClientController::class, 'createregisteredsoloparent']);


Route::post('/createongoingsenior', [ClientController::class, 'createongoingsenior']);
Route::post('/createongoingpwd', [ClientController::class, 'createongoingpwd']);
Route::post('/createongoingpwd1', [ClientController::class, 'createongoingpwd1']);
Route::post('/createongoingsoloparent', [ClientController::class, 'createongoing']);


// Route::post('/storesenior/registeredsenior/{clientid}', [ClientController::class, 'storereg'])->name('post_insert');

Route::match(['get', 'post'], 'admin/setschedule/{id}', [ClientController::class, 'storeregisteredsenior']);




Route::controller(AuthController::class)->middleware('loggedin')->group(function() {
    Route::get('login', 'loginView')->name('login.index');
    Route::post('login', 'login')->name('login.check');
    Route::get('register', 'registerView')->name('register.index');
    Route::post('register', 'register')->name('register.store');
});


Route::middleware('isLogged')->group(function() {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::controller(PageController::class)->group(function() {
        // top-bar-menu
        Route::get('/user-profile', 'profile')->name('profile');

        Route::get('/', 'dashboardOverview1')->name('dashboard-overview-1');
        Route::get('account-page', 'account')->name('account');
        // Route::get('/', 'dashboardOverview3')->name('dashboard-overview-3');
        Route::get('dashboard-overview-4-page', 'dashboardOverview4')->name('dashboard-overview-4');
        Route::get('inbox-page', 'inbox')->name('inbox');
        Route::get('file-manager-page', 'fileManager')->name('file-manager');
        Route::get('point-of-sale-page', 'pointOfSale')->name('point-of-sale');
        Route::get('chat-page', 'chat')->name('chat');
        Route::get('post-page', 'post')->name('post');
        Route::get('calendar-page', 'calendar')->name('calendar');
        Route::get('crud-data-list-page', 'crudDataList')->name('crud-data-list');
        Route::get('crud-form-page', 'crudForm')->name('crud-form');
        Route::get('users-layout-1-page', 'usersLayout1')->name('users-layout-1');
        Route::get('users-layout-2-page', 'usersLayout2')->name('users-layout-2');
        Route::get('users-layout-3-page', 'usersLayout3')->name('users-layout-3');
        Route::get('profile-overview-1-page', 'profileOverview1')->name('profile-overview-1');
        Route::get('profile-overview-2-page', 'profileOverview2')->name('profile-overview-2');
        Route::get('profile-overview-3-page', 'profileOverview3')->name('profile-overview-3');
        Route::get('wizard-layout-1-page', 'wizardLayout1')->name('wizard-layout-1');
        Route::get('wizard-layout-2-page', 'wizardLayout2')->name('wizard-layout-2');
        Route::get('wizard-layout-3-page', 'wizardLayout3')->name('wizard-layout-3');
        Route::get('blog-layout-1-page', 'blogLayout1')->name('blog-layout-1');
        Route::get('blog-layout-2-page', 'blogLayout2')->name('blog-layout-2');
        Route::get('blog-layout-3-page', 'blogLayout3')->name('blog-layout-3');
        Route::get('pricing-layout-1-page', 'pricingLayout1')->name('pricing-layout-1');
        Route::get('pricing-layout-2-page', 'pricingLayout2')->name('pricing-layout-2');
        Route::get('invoice-layout-1-page', 'invoiceLayout1')->name('invoice-layout-1');
        Route::get('invoice-layout-2-page', 'invoiceLayout2')->name('invoice-layout-2');
        Route::get('faq-layout-1-page', 'faqLayout1')->name('faq-layout-1');
        Route::get('faq-layout-2-page', 'faqLayout2')->name('faq-layout-2');
        Route::get('faq-layout-3-page', 'faqLayout3')->name('faq-layout-3');
        Route::get('login-page', 'login')->name('login');
        Route::get('register-page', 'register')->name('register');
        Route::get('error-page-page', 'errorPage')->name('error-page');
        Route::get('update-profile-page', 'updateProfile')->name('update-profile');
        Route::get('change-password-page', 'changePassword')->name('change-password');
        Route::get('regular-table-page', 'regularTable')->name('regular-table');
        Route::get('tabulator-page', 'tabulator')->name('tabulator');
        Route::get('fieldoffice-page', 'fieldoffice')->name('fieldoffice');
        Route::get('benefit-page', 'benefit')->name('benefit');
        Route::get('requirement-page', 'requirement')->name('requirement');
        Route::get('clientbenefit-page', 'clientbenefit')->name('clientbenefit');

        Route::get('declinesenior-page', 'declinesenior')->name('declinesenior');
        Route::get('declinesoloparent-page', 'declinesoloparent')->name('declinesoloparent');
        Route::get('declinepwd-page', 'declinepwd')->name('declinepwd');
        Route::get('declinecitizen-page', 'declinecitizen')->name('declinecitizen');

        Route::get('cardsenior-page', 'cardsenior')->name('cardsenior');
        Route::get('cardsoloparent-page', 'cardsoloparent')->name('cardsoloparent');
        Route::get('cardpwd-page', 'cardpwd')->name('cardpwd');
        Route::get('cardcitizen-page', 'cardcitizen')->name('cardcitizen');

        Route::get('seniorevaluation-page', 'seniorevaluation')->name('seniorevaluation');
        Route::get('seniorapproval-page', 'seniorapproval')->name('seniorapproval');
        Route::get('verifysenior-page', 'verifysenior')->name('verifysenior');
      
        Route::get('soloparentevaluation-page', 'soloparentevaluation')->name('soloparentevaluation');
        Route::get('soloparentapproval-page', 'soloparentapproval')->name('soloparentapproval');
        Route::get('soloparentverification-page', 'soloparentverification')->name('soloparentverification');

        Route::get('pwdevaluation-page', 'pwdevaluation')->name('pwdevaluation');
        Route::get('pwdapproval-page', 'pwdapproval')->name('pwdapproval');
        Route::get('pwdverification-page', 'pwdverification')->name('pwdverification');

        Route::get('citizenevaluation-page', 'citizenevaluation')->name('citizenevaluation');
        Route::get('citizenapproval-page', 'citizenapproval')->name('citizenapproval');
        Route::get('citizenverification-page', 'citizenverification')->name('citizenverification');

        Route::get('seniorbenefitevaluation-page', 'seniorbenefitevaluation')->name('seniorbenefitevaluation');
        Route::get('seniorbenfitapproval-page', 'seniorbenefitapproval')->name('seniorbenefitapproval');
        Route::get('seniorbenefitverification-page', 'seniorbenefitverification')->name('seniorbenefitverification');
      
        Route::get('soloparentbenefitevaluation-page', 'soloparentbenefitevaluation')->name('soloparentbenefitevaluation');
        Route::get('soloparentbenefitapproval-page', 'soloparentbenefitapproval')->name('soloparentbenefitapproval');
        Route::get('soloparentbenefitverification-page', 'soloparentbenefitverification')->name('soloparentbenefitverification');

        Route::get('pwdebenefitvaluation-page', 'pwdbenefitevaluation')->name('pwdbenefitevaluation');
        Route::get('pwdbenefitapproval-page', 'pwdbenefitapproval')->name('pwdbenefitapproval');
        Route::get('pwdbenefitverification-page', 'pwdbenefitverification')->name('pwdbenefitverification');

        Route::get('citizenbenefitevaluation-page', 'citizenbenefitevaluation')->name('citizenbenefitevaluation');
        Route::get('citizenbenefitapproval-page', 'citizenbenefitapproval')->name('citizenbenefitapproval');
        Route::get('citizenbenefitverification-page', 'citizenbenefitverification')->name('citizenbenefitverification');

        Route::get('declineseniorbenefit-page', 'declineseniorbenefit')->name('declineseniorbenefit');
        Route::get('declinesoloparentbenefit-page', 'declinesoloparentbenefit')->name('declinesoloparentbenefit');
        Route::get('declinepwdbenefit-page', 'declinepwdbenefit')->name('declinepwdbenefit');
        Route::get('declinecitizenbenefit-page', 'declinecitizenbenefit')->name('declinecitizenbenefit');

        Route::get('citizencard-page', 'citizencard')->name('citizencard');
        Route::get('modal-page', 'modal')->name('modal');
        Route::get('slide-over-page', 'slideOver')->name('slide-over');
        Route::get('notification-page', 'notification')->name('notification');
        Route::get('tab-page', 'tab')->name('tab');
        Route::get('accordion-page', 'accordion')->name('accordion');
        Route::get('button-page', 'button')->name('button');
        Route::get('alert-page', 'alert')->name('alert');
        Route::get('progress-bar-page', 'progressBar')->name('progress-bar');
        Route::get('tooltip-page', 'tooltip')->name('tooltip');
        Route::get('dropdown-page', 'dropdown')->name('dropdown');
        Route::get('typography-page', 'typography')->name('typography');
        Route::get('icon-page', 'icon')->name('icon');
        Route::get('loading-icon-page', 'loadingIcon')->name('loading-icon');
        Route::get('regular-form-page', 'regularForm')->name('regular-form');
        Route::get('datepicker-page', 'datepicker')->name('datepicker');
        Route::get('tom-select-page', 'tomSelect')->name('tom-select');
        Route::get('file-upload-page', 'fileUpload')->name('file-upload');
        Route::get('wysiwyg-editor-classic', 'wysiwygEditorClassic')->name('wysiwyg-editor-classic');
        Route::get('wysiwyg-editor-inline', 'wysiwygEditorInline')->name('wysiwyg-editor-inline');
        Route::get('wysiwyg-editor-balloon', 'wysiwygEditorBalloon')->name('wysiwyg-editor-balloon');
        Route::get('wysiwyg-editor-balloon-block', 'wysiwygEditorBalloonBlock')->name('wysiwyg-editor-balloon-block');
        Route::get('wysiwyg-editor-document', 'wysiwygEditorDocument')->name('wysiwyg-editor-document');
        Route::get('validation-page', 'validation')->name('validation');
        Route::get('chart-page', 'chart')->name('chart');
        Route::get('slider-page', 'slider')->name('slider');
        Route::get('image-zoom-page', 'imageZoom')->name('image-zoom');
    });
    Route::post('/item/add', [ItemController::class, 'store']);
    Route::post('/fo/add', [FieldOfficeController::class, 'store']);
    Route::post('/requirements/add', [RequirementController::class, 'store']);
    Route::post('/benefits/add', [BenefitController::class, 'store']);
    Route::post('/addbenefitrequirements/{id}', [BenefitRequirementController::class, 'store']);
    Route::post('/addclientbenefits/{id}', [ClientBenefitController::class, 'store']);
    Route::post('/user/add', [UserController::class, 'store']);
    Route::match(['get', 'post'], '/user/deactivateuser/{id}', [UserController::class, 'deactivateuser']);
    Route::match(['get', 'post'], '/user/activateuser/{id}', [UserController::class, 'activateuser']);

   
    Route::post('/barangay/{id}', [BarangayController::class, 'store']);


    Route::post('/generateqrcode', [ClientCardController::class, 'generateqrcode']);

    Route::post('/evaluateseniorcitizen/{clientid}/{applicationid}', [ClientController::class, 'evaluatesenior']);
    Route::post('/approveseniorcitizen/{clientid}/{applicationid}', [ClientController::class, 'approvesenior']);
    Route::post('/verifyseniorcitizen/{clientid}/{applicationid}', [ClientController::class, 'verifysenior']);

    Route::post('/email/completeid/{cardid}', [ClientController::class, 'emailid']);

    Route::post('/evaluatecitizen/{clientid}/{applicationid}', [ClientController::class, 'evaluatecitizen']);
    Route::post('/approvecitizen/{clientid}/{applicationid}', [ClientController::class, 'approvecitizen']);
    Route::post('/verifycitizen/{clientid}/{applicationid}', [ClientController::class, 'verifycitizen']);
    
    Route::post('/evaluatesoloparent/{clientid}/{applicationid}', [ClientController::class, 'evaluatesoloparent']);
    Route::post('/approvesoloparent/{clientid}/{applicationid}', [ClientController::class, 'approvesoloparent']);
    Route::post('/verifysoloparent/{clientid}/{applicationid}', [ClientController::class, 'verifysoloparent']);

    Route::post('/evaluatepwd/{clientid}/{applicationid}', [ClientController::class, 'evaluatepwd']);
    Route::post('/approvepwd/{clientid}/{applicationid}', [ClientController::class, 'approvepwd']);
    Route::post('/verifypwd/{clientid}/{applicationid}', [ClientController::class, 'verifypwd']);

    Route::post('/declineseniorevaluation/{clientid}/{applicationid}', [ClientController::class, 'declineseniorevaluation']);
    Route::post('/declineseniorapproval/{clientid}/{applicationid}', [ClientController::class, 'declineseniorapproval']);
    Route::post('/declineseniorverification/{clientid}/{applicationid}', [ClientController::class, 'declineseniorverification']);

    Route::post('/declinecitizenevaluation/{clientid}/{applicationid}', [ClientController::class, 'declinecitizenevaluation']);
    Route::post('/declinecitizenapproval/{clientid}/{applicationid}', [ClientController::class, 'declinecitizenapproval']);
    Route::post('/declinecitizenverification/{clientid}/{applicationid}', [ClientController::class, 'declinecitizenverification']);
    
    Route::post('/declinepwdevaluation/{clientid}/{applicationid}', [ClientController::class, 'declinepwdevaluation']);
    Route::post('/declinepwdapproval/{clientid}/{applicationid}', [ClientController::class, 'declinepwdapproval']);
    Route::post('/declinepwdverification/{clientid}/{applicationid}', [ClientController::class, 'declinepwdverification']);
    
    Route::post('/declinesoloparentevaluation/{clientid}/{applicationid}', [ClientController::class, 'declinesoloparentevaluation']);
    Route::post('/declinesoloparentapproval/{clientid}/{applicationid}', [ClientController::class, 'declinesoloparentapproval']);
    Route::post('/declinesoloparentverification/{clientid}/{applicationid}', [ClientController::class, 'declinesoloparentverification']);


     Route::post('/evaluateseniorbenefit/{clientid}/{applicationid}/{benefittype}', [BenefitApplicationController::class, 'evaluateseniorbenefit']);
    Route::post('/approveseniorbenefit/{clientid}/{applicationid}', [BenefitApplicationController::class, 'approveseniorbenefit']);
    Route::post('/verifyseniorbenefit/{clientid}/{applicationid}', [BenefitApplicationController::class, 'verifyseniorbenefit']);

    Route::post('/evaluatecitizenbenefit/{clientid}/{applicationid}', [BenefitApplicationController::class, 'evaluatecitizenbenefit']);
    Route::post('/approvecitizenbenefit/{clientid}/{applicationid}', [BenefitApplicationController::class, 'approvecitizenbenefit']);
    Route::post('/verifycitizenbenefit/{clientid}/{applicationid}', [BenefitApplicationController::class, 'verifycitizenbenefit']);
    
    Route::post('/evaluatesoloparentbenefit/{clientid}/{applicationid}', [BenefitApplicationController::class, 'evaluatesoloparentbenefit']);
    Route::post('/approvesoloparentbenefit/{clientid}/{applicationid}', [BenefitApplicationController::class, 'approvesoloparentbenefit']);
    Route::post('/verifysoloparentbenefit/{clientid}/{applicationid}', [BenefitApplicationController::class, 'verifysoloparentbenefit']);

    Route::post('/evaluatepwdbenefit/{clientid}/{applicationid}', [BenefitApplicationController::class, 'evaluatepwdbenefit']);
    Route::post('/approvepwdbenefit/{clientid}/{applicationid}', [BenefitApplicationController::class, 'approvepwdbenefit']);
    Route::post('/verifypwdbenefit/{clientid}/{applicationid}', [BenefitApplicationController::class, 'verifypwdbenefit']);

    Route::post('/declineseniorevaluationbenefit/{clientid}/{applicationid}', [DeclineBenefit::class, 'declineseniorevaluationbenefit']);
    Route::post('/declineseniorapprovalbenefit/{clientid}/{applicationid}', [DeclineBenefit::class, 'declineseniorapprovalbenefit']);
    Route::post('/declineseniorverificationbenefit/{clientid}/{applicationid}', [DeclineBenefit::class, 'declineseniorverificationbenefit']);

    Route::post('/declinecitizenevaluationbenefit/{clientid}/{applicationid}', [DeclineBenefit::class, 'declinecitizenevaluationbenefit']);
    Route::post('/declinecitizenapprovalbenefit/{clientid}/{applicationid}', [DeclineBenefit::class, 'declinecitizenapprovalbenefit']);
    Route::post('/declinecitizenverificationbenefit/{clientid}/{applicationid}', [DeclineBenefit::class, 'declinecitizenverificationbenefit']);
    
    Route::post('/declinepwdevaluationbenefit/{clientid}/{applicationid}', [DeclineBenefit::class, 'declinepwdevaluationbenefit']);
    Route::post('/declinepwdapprovalbenefit/{clientid}/{applicationid}', [DeclineBenefit::class, 'declinepwdapprovalbenefit']);
    Route::post('/declinepwdverificationbenefit/{clientid}/{applicationid}', [DeclineBenefit::class, 'declinepwdverificationbenefit']);
    
    Route::post('/declinesoloparentevaluationbenefit/{clientid}/{applicationid}', [DeclineBenefit::class, 'declinesoloparentevaluationbenefit']);
    Route::post('/declinesoloparentapprovalbenefit/{clientid}/{applicationid}', [DeclineBenefit::class, 'declinesoloparentapprovalbenefit']);
    Route::post('/declinesoloparentverificationbenefit/{clientid}/{applicationid}', [DeclineBenefit::class, 'declinesoloparentverificationbenefit']);
    Route::post('/testemail/{id}/{name}', [ClientController::class, 'testemail']);
});
