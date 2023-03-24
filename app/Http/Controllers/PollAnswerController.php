<?php

namespace App\Http\Controllers;

use App\Models\PollAnswer;
use Illuminate\Http\Request;

class PollAnswerController extends Controller
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
            'data' => PollAnswer::with('poll')->get()
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pollAnswer = PollAnswer::create($request->all());

        return response()->json([
            'status' => true,
            'message' => "Poll answer created successfully!",
            'data' => $pollAnswer
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PollAnswer $pollAnswer
     * @return \Illuminate\Http\Response
     */
    public function show(PollAnswer $pollAnswer)
    {
        return response()->json([
            'status' => true,
            'data' => $pollAnswer
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PollAnswer $pollanswer
     * @return \Illuminate\Http\Response
     */
    public function edit(PollAnswer $pollanswer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\PollAnswer $pollanswer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PollAnswer $pollanswer)
    {
        $pollanswer->update($request->all());

        return response()->json([
            'status' => true,
            'message' => "Poll answer updated successfully!",
            'data' => $pollanswer
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PollAnswer $pollanswer
     * @return \Illuminate\Http\Response
     */
    public function destroy(PollAnswer $pollanswer)
    {
        $pollanswer->delete();

        return response()->json([
            'status' => true,
            'message' => "Poll answer deleted successfully!",
        ], 200);
    }
}
