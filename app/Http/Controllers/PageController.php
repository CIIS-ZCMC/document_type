<?php

namespace App\Mail;
namespace App\Http\Controllers;
use App\Mail\ScheduleMail;
use App\Models\Client;
use Illuminate\Support\Facades\Session;
use App\Models\Barangay;
use App\Models\ClientApplication;
use App\Models\ClientApplicationLog;
use App\Models\ClientApplicationRequirement;
use App\Models\ClientCard;
use App\Models\ClientSchedule;
use App\Models\ClientType;
use App\Models\ClientBenefit;
use App\Models\BenefitRequirement;
use App\Models\Benefit;
use App\Models\BenefitApplication;
use App\Models\Requirement;
use App\Models\Pharmacy;
use App\Models\Medicine;
use App\Models\ApplicationMedicine;
use App\Models\CommunityInvolvement;
use App\Models\DeclinedClient;
use App\Models\DeclinedClientLog;
use App\Models\DisabilityCause;
use App\Models\DisabilityType;
use App\Models\DocumentType;
use App\Models\DocumentTypeDetail;
use App\Models\Education;
use App\Models\FamilyComposition;
use App\Models\IdentificationCard;
use App\Models\Occupation;
use App\Models\Organization;
use App\Models\Personnel;
use App\Models\User;
use App\Models\Physician;
use App\Models\Position;
use App\Models\SeminarTraining;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Mail;


class PageController extends Controller
{
    
    public function dashboardOverview1()
    {
        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
      
        return view('pages/dashboard-overview-1',$data);
    }
    public function profile() {
        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
             return view('layout/top-bar-menu/profile',$data,[]);
    }
    public function document()
    {

        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
        $document_type = DocumentType::all();
        $supplier = Supplier::get();
        $personnel = Personnel::get();
        return view('pages/document/document-page',$data)->with(compact('document_type','supplier','personnel'));
    }

    public function print()
    {

        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
        $document_type = DocumentType::all();
        $supplier = Supplier::get();
        $personnel = Personnel::get();
        return view('pages/document/print-page',$data)->with(compact('document_type','supplier','personnel'));
    }
    public function template()
    {

        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
    
        $document_type = DocumentType::withCount('document_type_details')->get();  
        $supplier = Supplier::get();
        $personnel = Personnel::get();
        return view('pages/document/template-page',$data)->with(compact('document_type','supplier','personnel'));
    }

    public function account()
    {

        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
        $user  = User::get();
        return view('pages/user',$data)->with(compact('user'));
    }
    
    public function supplier()
    {

        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
        $supplier = Supplier::get();
        return view('pages/setting/supplier-page',$data)->with(compact('supplier'));
    }
    public function personnel()
    {

        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
        $personnel = Personnel::get();
        $positions = Position::get();
        return view('pages/setting/personnel-page',$data)->with(compact('personnel','positions'));
    }
    public function position()
    {

        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
        $position = Position::get();
        return view('pages/setting/position-page',$data)->with(compact('position'));
    }
}
