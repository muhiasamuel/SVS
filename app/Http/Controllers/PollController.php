<?php

namespace App\Http\Controllers;
use App\School;
use App\Role;
use App\User;
use App\Poll;
 

use DB;
use Illuminate\Support\Facades\Auth;
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
        $polls= Poll::all();
        return view ('polls.index') ->with('polls',$polls);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \view('polls.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'start_date' => ['required', 'string', 'max:255'],
            'end_date' => ['string', 'max:255'],
        ]);
        Poll::create($request->all());
        return \redirect()->route('poll.index');
        return response()->json('Success','School created successifully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function vote($id)
    {
       $vote = new Poll;
       $vote->voter_id = Auth::id();
       $vote->user_id = $id;
       
        $vote->save();
        return redirect()->back();
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function voteCount() {
        $role = Role::where('name','candidate')->where('name','delegate');
        $Users=User::withCount('polls')->get();
        return view('candidates.results',\compact('Users','role'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
