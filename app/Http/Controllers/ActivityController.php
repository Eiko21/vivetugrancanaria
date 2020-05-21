<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Activity;
use App\User;

class ActivityController extends Controller
{
    /**
     * Display a listing of the activities.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = Activity::all();
        return view('company.indexactivities', compact('activities'));
    }

    /**
     * Show the form for creating a new activity.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.createactivity');
    }

    /**
     * Store a newly created activity in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $activity = new Activity;
        if($request->hasFile('image')){
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_' .time().'.' .$extension;
            $path=$request->file('image')->move(public_path('/img'), $fileNameToStore);
            $activity->image=$fileNameToStore;
        }
        $activity->name=$request->name;
        $activity->type=$request->type;
        $activity->description=$request->description;
        $activity->price=$request->price;
        $activity->capacity=$request->capacity;
        $activity->start=$request->start;
        $activity->duration=$request->duration;
        $activity->companyid=Auth::user()->id;

        $activity->save();
        return redirect(route('indexactivities'));
    }

    /**
     * Display the specified activity.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $activity=Activity::findOrFail($id);
        if($activity->count()>0){
            foreach($activity as $detail){
                $activity->companyname = User::findOrFail($activity->companyid);
            }
        }
        return view('client.showactivity', compact('activity'));
    }

    /**
     * Show the form for editing the specified activity.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $activity=Activity::findOrFail($id);
        return view('company.editactivity', compact('activity'));
    }

    /**
     * Update the specified activity in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $activity=Activity::findOrFail($id);
        if($request->hasFile('image')){
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_' .time().'.' .$extension;
            $path=$request->file('image')->move(public_path('/img'), $fileNameToStore);
            $activity->image=$fileNameToStore;
        }
        $activity->name=$request->name;
        $activity->type=$request->type;
        $activity->description=$request->description;
        $activity->price=$request->price;
        $activity->capacity=$request->capacity;
        $activity->start=$request->start;
        $activity->duration=$request->duration;        
        // $companyid=$activity->companyid;
        $activity->companyid=Auth::user()->id;
        $activity->save();
        return redirect(route('indexactivities'));
    }

    /**
     * Remove the specified activity from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {        
        $activity=Activity::findOrFail($id);
 
        if(!empty($activity->image)){
            if(file_exists(public_path('/img/'.$activity->image))){
                unlink(public_path('/img/'.$activity->image));
            }
        }
 
        $activity->delete();
        return redirect(route('indexactivities'));
    }
}
