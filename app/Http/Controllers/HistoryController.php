<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\QuizUser;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Initiate variable for paginator instance
        $collection = collect([]);
        $total = 0;
        $perPage = 10;

        // Query history of users attempt from database
        $quizzes = Quiz::whereHas('users')->with([
            'users' => function ($query) use ($perPage) {
                $query->paginate($perPage);
        }])->withCount('users')->get();

        // Update variable for paginator instance
        $quizzes->each(function ($quiz) use (&$total, &$collection) {
            $total += $quiz->users_count;
            $collection->push($quiz->users);
        });

        // Create paginator instance
        $paginator = new LengthAwarePaginator(
            $collection->flatten(),
            $total,
            $perPage,
            Paginator::resolveCurrentPage(),
            ['path' => Paginator::resolveCurrentPath()]
        );

        return view('histories.index', compact('quizzes', 'paginator'));
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $history = QuizUser::findOrFail($id);
        $history->delete();

        return redirect()->route('histories.index');
    }
}
