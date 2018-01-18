<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;
use App\QuestionAndAnswer;
use Session;


class QuestionAndAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questionAndAnswers = QuestionAndAnswer::all();

        return view('questionandanswer.index')->withQuestionAndAnswers($questionAndAnswers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('questions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'question' => 'required',
            'answer' => 'required',
            'user_created' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('questions/create')
                    ->withErrors($validator)
                    ->withInput();
        }


        $input = $request->all();

        QuestionAndAnswer::create($input);

        \Session::flash('flash_message', 'Câu hỏi đã được tạo thành công!');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $questionAndAnswer = QuestionAndAnswer::find($id);
        
        if($questionAndAnswer === null){
            return view('errors.404');
        }

        return view('questions.show')->withQuestionAndAnswer($questionAndAnswer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $questionAndAnswer = QuestionAndAnswer::find($id);

        if (is_null($questionAndAnswer))
        {
            return Redirect::route('questions.index');
        }

        return \View::make('questions.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'question' => 'required',
            'answer' => 'required',
            'user_created' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }

        $input = $request->all();

        $questionAndAnswer = QuestionAndAnswer::find($id);

        $questionAndAnswer->update($input);

        \Session::flash('flash_message', 'Question đã được sửa thành công!');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $questionAndAnswer = QuestionAndAnswer::find($id);

        if (is_null($questionAndAnswer))
        {
            Session::flash('flash_message', 'Không tìm thấy câu hỏi bạn muốn xóa!');
            return Redirect::route('questions.index');
        }

        $questionAndAnswer->delete();

        Session::flash('flash_message', 'Câu hỏi đã được xóa thành công!');

        return redirect()->route('questions.index');
    }
}
