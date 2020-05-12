<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        //
    }

    /**
     * Show the form for creating a new activity.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($companyid)
    {
        $id=$companyid;
        return view('company.createActivity', compact('id'));
    }

    /**
     * Store a newly created activity in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
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
        $activity->companyid=$id;

        $activity->save();
        return redirect(route('listActivities', $id));
        //
    }

    /**
     * Display the specified activity.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        return view('company.editActivity', compact('activity'));
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
        $companyid=$activity->companyid;
        $activity->save();
        return redirect(route('listActivities', $companyid));
    }

    /**
     * Remove the specified activity from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function listActivitiesCompany($companyid){
        $activities = Activity::where('companyid', '=',$companyid);
        $activities= $activities->get();
        return view('company.listActivities', compact('activities', 'companyid'));
    }

}
