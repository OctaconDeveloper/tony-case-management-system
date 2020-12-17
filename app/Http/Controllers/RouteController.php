<?php

namespace App\Http\Controllers;

use App\Models\CaseCategory;
use App\Models\Court;
use App\Models\CourtCase;
use App\Models\User;
use App\Models\Notice;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
class RouteController extends Controller
{
    public function adminHome(){ return view('admin.home');}
    public function adminNewuser(){ return view('admin.newuser'); }
    public function adminViewuser(){ $users = User::all(); return view('admin.viewuser', compact('users',$users)); }
    public function adminNewcourt(){ return view('admin.newcourt'); }
    public function adminViewcourt(){ $courts = Court::all(); return view('admin.viewcourt', compact('courts',$courts)); }
    public function adminViewSingleCourt(Court $id){ return view('admin.viewsinglecourt', compact('id',$id)); }
    public function adminNewcasetype(){ return view('admin.newcasecategory'); }
    public function adminViewcasetype(){ $cases = CaseCategory::all(); return view('admin.viewcasecategory', compact('cases',$cases)); }
    public function adminNewnotice(){ return view('admin.newnotice'); }
    public function adminViewnotice(){ $notices = Notice::OrderBy('created_at','ASC')->get(); return view('admin.viewnotice', compact('notices', $notices)); }
    public function adminViewmynotice(){ $notices = Notice::whereJudgeId(auth()->user()->id)->OrderBy('created_at','ASC')->get(); return view('admin.mynotice', compact('notices', $notices)); }
    public function adminnNewcourtcase(){ return view('admin.newcourtcase'); }
    public function adminnViewcourtcase(){ $cases = CourtCase::OrderBy('created_at','ASC')->get();  return view('admin.viewcourtcase', compact('cases', $cases)); }
    public function adminViewmycases(){ $cases = CourtCase::whereJudgeId(auth()->user()->id)->OrderBy('created_at','ASC')->get(); return view('admin.mycourtcase', compact('cases', $cases)); }
    
    public function login(){ return view('login');}
    public function settings(){ return view('admin.settings');}
    public function error403() { return view('errors.403');}


    public function viewnotice(Notice $id)
    { 
        view()->share('id',$id);
        $pdf_title = str_replace(" ", "_", $id->title_of_notice);
        $pdf = PDF::loadView('singlenoticereport');
        return $pdf->download($pdf_title.'.pdf');
        // return view('singlenoticereport');
    }

    public function viewcase(CourtCase $id)
    { 
        view()->share('id',$id);
        $pdf_title = str_replace(" ", "_", $id->title_of_notice);
        $pdf = PDF::loadView('singlecourtcaseresport');
        return $pdf->download($pdf_title.'.pdf');
        // return view('singlecourtcaseresport');
    }


    
}
 