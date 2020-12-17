<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddJudgeRequest;
use App\Http\Requests\AddNoticeJudgeRequest;
use App\Http\Requests\createCourtRequest;
use App\Http\Requests\CreateNewUserRequest;
use App\Http\Requests\NewNoticeRequest;
use App\Http\Requests\SaveCaseCategory;
use App\Http\Requests\SaveNewCaseRequest;
use App\Http\Requests\SearchNoticeRequest;
use App\Models\CaseCategory;
use App\Models\Court;
use App\Models\CourtCase;
use App\Models\CourtMemo;
use App\Models\CourtUser;
use App\Models\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GeneralController extends Controller
{
    public function savecourt(createCourtRequest $request)
    {
        $data = $request->only(
            [
               'type',
               'address',
               'town',
               'state', 
            ]
        );
        $data['judge_id'] = $request->court_judge;
        $data['registrar_id']= $request->court_registrar;
        $court =  Court::create($data);
        $data2['court_id'] = $court->id;
        $data2['user_id'] = $request->court_judge;
        CourtUser::create($data2);
        return redirect('/admin/viewcourt');
    }

    public function savecasetype(SaveCaseCategory $request)
    {
        $data["name"] = $request->case_title;
        $data["slug"] = Str::slug($request->case_title);
        $data["description"]= $request->case_description;
        $save = CaseCategory::create($data);
        return redirect()->back()->with('message', 'New Case category Added');
    } 
 
    public function removeCourt(Court $id)
    {
        $id->delete();
        return redirect()->back();
    }
 
    public function removeCourtUser($courtId, $userId)
    {
       $data = CourtUser::whereUserId($userId)->whereCourtId($courtId)->first();
       $data->delete();
        return redirect()->back();
    }

    public function savejudge(AddJudgeRequest $request)
    {
        $data['court_id'] = $request->court_id;
        $data['user_id'] = $request->court_judge;
        CourtUser::create($data);
        return redirect()->back();
    }

    public function removeCaseCategory(CaseCategory $id)
    {
        $id->delete();
        return redirect()->back();
    }

    public function savenotice(NewNoticeRequest $request)
    {
        $data = $request->only([
            "court",
            "case_type",
            "date_of_appearance",
            "plaintiffs",
            "plaintiffs_counsel",
            "plaintiffs_counsel_chanber",
            "defendants",
            "title_of_notice",
            "description"
        ]);
        $data["registrar_id"] = auth()->user()->id;
        $data_count = Notice::count() > 0 ? Notice::count() : Notice::count() +1;
        $number_format = str_pad($data_count, 3, '0', STR_PAD_LEFT);

        //get court
        $court_type = Court::find($request->court)->type;
        $court_town= Court::find($request->court)->town;
        $court_state= Court::find($request->court)->state;
        $exploded_court_type =  explode("-",$court_type);
        $court_abbreviation = "";
        foreach($exploded_court_type as $exploded_type)
        {
            $court_abbreviation.= strtoupper($exploded_type[0]);
        }
        $data["case_file_no"] = $court_abbreviation."/"
                            .$this->extract_first_three_digits($court_state)."/"
                            .$this->extract_first_three_digits($court_town)."/"
                            .$number_format."/".$this->random_four_digit();


        Notice::create($data);
        return redirect('/admin/viewnotice');

    } 

    private function extract_first_three_digits($string)
    {
        return strtoupper(substr($string, 0, 3));
    }

    private function random_four_digit()
    {
        return sprintf("%0.4s", str_shuffle(rand(20,90000) * time()));
    }

    public function addjudge(AddNoticeJudgeRequest $request)
    {
        $notice = Notice::find($request->notice_id);
        $notice->update([
            'judge_id' => $request->court_judge
        ]);
        return redirect()->back();
    }

    public function searchnotice(SearchNoticeRequest $request)
    {
        $notice = Notice::whereCaseFileNo($request->notice_id)->first();
        return redirect()->back()->with('notice', $notice);
    }

    public function savecase(SaveNewCaseRequest $request)
    {
        $notice_id = $request->notice_id;
        $data = Notice::find($notice_id);
        $data['defendants_counsel'] = $request->defendants_counsel;
        $data['defendants_counsel_chanber'] = $request->defendants_counsel_chanber;
        unset($data['id']);
        unset($data['created_at']);
        unset($data['updated_at']);

        $data_count = CourtCase::count() > 0 ? CourtCase::count() : CourtCase::count() +1;
        $number_format = str_pad($data_count, 3, '0', STR_PAD_LEFT);
        $court_type = Court::find($data->court)->type;
        $court_town= Court::find($data->court)->town;
        $court_state= Court::find($data->court)->state;

        $exploded_court_type =  explode("-",$court_type);
        $court_abbreviation = "";
        foreach($exploded_court_type as $exploded_type)
        {
            $court_abbreviation.= strtoupper($exploded_type[0]);
        }
        $data['court_file_no'] = $court_abbreviation."/CAP/"
                            .$this->extract_first_three_digits($court_state)."/"
                            .$this->extract_first_three_digits($court_town)."/"
                            .$number_format."/".$this->random_four_digit();


        CourtCase::create($data->toArray());
        return redirect('/admin/viewcourtcase');
    }

    public function updatecase(Request $request)
    {

        $status = $request->status;

       $case =  CourtCase::find($request->court_case_id);
       $case->update([
           "status" => $status
       ]);

       $data['court_case_id'] = $request->court_case_id;
       $data['description'] = $request->summary;

       CourtMemo::create($data);

       return redirect()->back();

    }
     
    
} 
 