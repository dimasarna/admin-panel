<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Http\Requests\UpdateQuizQuestionRequest;

use Illuminate\Http\Request;

class QuizQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort(404);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort(404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateQuizQuestionRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQuizQuestionRequest $request, $id)
    {
        $quiz = Quiz::findOrFail($id);
        $input = collect($request->validated());

        $questions = collect($input->get('questions'));
        $selected_questions = collect($input->get('selected_questions', []));

        $quiz
            ->questions()
            ->attach(
                $selected_questions
                ->flatten()
                ->all()
            );

        $quiz
            ->questions()
            ->detach(
                $questions
                ->diff($selected_questions)
                ->flatten()
                ->all()
            );

        return
            redirect()
            ->route('quizzes.show', [
                'quiz' => $id,
                'page' => $input->get('page', 1)
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort(404);
    }
}
