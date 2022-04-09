<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Http\Requests\UpdateGroupUserRequest;

use Illuminate\Http\Request;

class GroupUserController extends Controller
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
     * @param  \App\Http\Requests\UpdateGroupUserRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGroupUserRequest $request, $id)
    {
        $group = Group::findOrFail($id);
        $input = collect($request->validated());

        $users = collect($input->get('users'));
        $selected_users = collect($input->get('selected_users', []));

        $group
            ->users()
            ->attach(
                $selected_users
                ->flatten()
                ->all()
            );

        $group
            ->users()
            ->detach(
                $users
                ->diff($selected_users)
                ->flatten()
                ->all()
            );

        return
            redirect()
            ->route('groups.show', [
                'group' => $id,
                'users_page' => $input->get('users_page', 1),
                'quizzes_page' => $input->get('quizzes_page', 1),
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
