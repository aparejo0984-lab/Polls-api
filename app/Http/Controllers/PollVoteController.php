<?php

namespace App\Http\Controllers;

use App\Models\PollVote;
use App\Models\PollAnswer;
use Illuminate\Http\Request;

class PollVoteController extends Controller
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
            'data' => PollVote::with('poll', 'user', 'answer')->get()
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
        $post = $request->all();

        $pollVote = PollVote::create($request->all());

        if ($pollVote) {
            $totalVotesCount = PollVote::where('poll_id',  '=' , $post['poll_id'])->count();
            $option1Count = PollVote::where([
                ['poll_id', '=', $post['poll_id']],
                ['given_answer', '=', "1"]
            ]
            )->count();

            $option2Count = PollVote::where([
                ['poll_id', '=', $post['poll_id']],
                ['given_answer', '=', "2"]
            ]
            )->count();

            $option3Count = PollVote::where([
                ['poll_id', '=', $post['poll_id']],
                ['given_answer', '=', "3"]
            ]
            )->count();

            $option4Count = PollVote::where([
                ['poll_id', '=', $post['poll_id']],
                ['given_answer', '=', "4"]
            ]
            )->count();

            $pollAnswer = PollAnswer::where('poll_id',  '=' , $post['poll_id']);
            $pollAnswerArr = [];

            if ($option1Count > 0) {
                $option1Percent = (($option1Count / $totalVotesCount) * 100);
                $pollAnswerArr["option1_vote_percentage"] =  number_format($option1Percent, 2, '.', ''). "%" ;
            }

            if ($option2Count > 0) {
                $option2Percent = (($option2Count / $totalVotesCount) * 100);
                $pollAnswerArr["option2_vote_percentage"] =  number_format($option2Percent, 2, '.', ''). "%" ;
            }

            if ($option3Count > 0) {
                $option3Percent = (($option3Count / $totalVotesCount) * 100);
                $pollAnswerArr["option3_vote_percentage"] =  number_format($option3Percent, 2, '.', ''). "%" ;
            }

            if ($option4Count > 0) {
                $option4Percent = (($option4Count / $totalVotesCount) * 100);
                $pollAnswerArr ["option4_vote_percentage"] =  number_format($option4Percent, 2, '.', ''). "%" ;
            }

            $pollAnswer->update($pollAnswerArr);
        }

        return response()->json([
            'status' => true,
            'message' => "Poll vote created successfully!",
            'data' => $pollVote->load('user','poll','answer')
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PollVote $pollVote
     * @return \Illuminate\Http\Response
     */
    public function show(PollVote $pollVote)
    {
        return response()->json([
            'status' => true,
            'data' => $pollVote
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PollVote $pollVote
     * @return \Illuminate\Http\Response
     */
    public function edit(PollVote $pollVote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\PollVote $pollVote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PollVote $pollVote)
    {
        $pollVote->update($request->all());

        return response()->json([
            'status' => true,
            'message' => "Poll vote updated successfully!",
            'data' => $pollVote
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PollVote $pollVote
     * @return \Illuminate\Http\Response
     */
    public function destroy(PollVote $pollVote)
    {
        $pollVote->delete();

        return response()->json([
            'status' => true,
            'message' => "Poll vote deleted successfully!",
        ], 200);
    }
}
