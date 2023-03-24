<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use Illuminate\Http\Request;

class PollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'status' => true,
            'data' => Poll::with('user', 'category')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $poll = Poll::create($request->all());

        return response()->json([
            'status' => true,
            'message' => "Poll created successfully!",
            'data' => $poll
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Poll $poll
     * @return \Illuminate\Http\Response
     */
    public function show(Poll $poll)
    {
        $poll->load('user', 'category','answers');
        return response()->json([
            'status' => true,
            'message' => "Showing Poll!",
            'data' => $poll
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Poll $poll
     * @return \Illuminate\Http\Response
     */
    public function edit(Poll $poll)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Poll $poll
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Poll $poll)
    {
        $poll->update($request->all());

        return response()->json([
            'status' => true,
            'message' => "Poll Updated successfully!",
            'poll' => $poll
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Poll $poll
     * @return \Illuminate\Http\Response
     */
    public function destroy(Poll $poll)
    {
        $poll->delete();

        return response()->json([
            'status' => true,
            'message' => "Poll deleted successfully!",
        ], 200);
    }
}
