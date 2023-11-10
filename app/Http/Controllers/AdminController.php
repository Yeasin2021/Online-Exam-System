<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Subject;

class AdminController extends Controller
{
    public function addSubjectView()
    {
        return view('Admin-Panel.dashboard.admin.pages.subject');
    }


    public function addSubject(Request $request)
    {
        // return $request->all();
        $request->validate(
            [
                'subject'=>'string|required'
            ]
        );

        try{
            
            Subject::create(
                [
                    'subject'=>$request->subject,
                ]
            );
            return response()->json(['success'=>true, 'message'=>'Subject Added Successfully.']);

        }catch(\Exception $e){
            return response()->json(['success'=>false, 'message'=>$e->getMessage()]);
        }
    }
}
