<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Subject;
use App\Models\Exam;

class AdminController extends Controller
{


    // Subject CURD : 1 step

    public function addSubjectView()
    {
        $subjects = Subject::all();
        return view('Admin-Panel.dashboard.admin.pages.subject',compact('subjects'));
    }


    public function addSubject(Request $request)
    {
        // return $request->all();
        $request->validate(
            [
                'subject'=>'string|required|unique:subjects'
            ]
        );

        try{

            Subject::create(
                [
                    'subject'=>$request->subject,
                ]
            );
            return response()->json(
                [
                    'success'=>true,
                    'message'=>'Subject Added Successfully.',

                ]);

        }catch(\Exception $e){
            return response()->json(['success'=>false, 'message'=>$e->getMessage()]);
        }
    }


    public function updateSubject(Request $request)
    {
        // return $request->all();
        // $request->validate(
        //     [
        //         'subject'=>'string|required|unique:subjects,subject'.$request->up_id,
        //     ]
        // );

        try{

            Subject::where('id',$request->up_id)->update(
                [
                    'subject'=>$request->subject,
                ]
            );

            return response()->json(
                [
                    'success'=>true,
                    'message'=>'Subject Added Successfully.',

                ]);

        }catch(\Exception $e){
            return response()->json(['success'=>false, 'message'=>$e->getMessage()]);
        }
    }


    public function deleteSubject(Request $request)
    {
        Subject::find($request->subject_id)->delete();
        return response()->json(['status'=>'success']);
    }


    // Subject CURD END: 1 step

    // EXAM CURD : 2 step

    public function examDashBoard()
    {
       $subjects = Subject::all();
       return view('Admin-Panel.dashboard.admin.pages.exam.exam-dashboard',['subjects'=>$subjects]);
    }

    public function addExam(Request $request)
    {
        // return $request->all();
        $request->validate(
            [
                'exam'=>'string|required',
                'date'=>'string|required',
                'time'=>'string|required',
                'subject_id'=>'string|required',
            ]
        );

        try{

            Exam::create(
                [
                    'exam_name'=>$request->exam,
                    'date'=>$request->date,
                    'time'=>$request->time,
                    'subject_id'=>$request->subject_id,
                ]
            );
            return response()->json(
                [
                    'success'=>true,
                    'message'=>'Subject Added Successfully.',

                ]);

        }catch(\Exception $e){
            return response()->json(['success'=>false, 'message'=>$e->getMessage()]);
        }
    }



}
