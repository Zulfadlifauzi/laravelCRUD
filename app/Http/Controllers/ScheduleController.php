<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use File;
use Storage;
class ScheduleController extends Controller
{
    public function index(Request $request)
    {

        if($request->keyword){
            $user=auth()->user();
            $schedules=$user->schedules()
            ->where('title','LIKE','%'.$request->keyword.'%')
            ->orwhere('description','LIKE','%'.$request->keyword.'%')->paginate(2);
        }else{
         $user=auth()->user();
         $schedules=$user->schedules()->paginate(3);
        }
        return view('schedules.index', compact('schedules'));
    }

    public function create()
    {
        return view('schedules.create');
    }
    public function store(Request $request)
    {
        $schedule = new Schedule();
        $schedule->title =$request->title;
        $schedule->description=$request->description;
        $schedule->user_id=auth()->user()->id;
        $schedule->save();

        if($request->hasFile('attachment')){
            $filename = $schedule->id.'-'.date('Y-m-d').'-'.$request->attachment->getClientOriginalExtension();

            Storage::disk('public')->put($filename,File::get($request->attachment));

            $schedule->attachment=$filename;
            $schedule->save();
        }

        return redirect()->route('schedule:index')->with([
            'alert-type' => 'alert-primary',
            'alert'=>'Your schedule has been saved!' 
        ]);
    }

    public function show(Schedule $schedule)
    {
        return view('schedules.show',compact('schedule'));
    }

    public function edit(Schedule $schedule)
    {
        return view('schedules.edit',compact('schedule'));
    }

    public function destroy (Schedule $schedule)
    {
        if($schedule->attachment){
            Storage::disk('public')->delete($schedule->attachment);
        }

        $schedule->delete();
        return redirect()->route('schedule:index')->with([
            'alert-type' => 'alert-danger',
            'alert'=>'Your schedule has been deleted!' 
        ]);
    }

    public function update(Schedule $schedule, Request $request)
    {
        $schedule->title=$request->title;
        $schedule->description=$request->description;
        $schedule->save();

        return redirect()->route('schedule:index')->with([
            'alert-type' => 'alert-success',
            'alert'=>'Your schedule has been updated!' 
        ]);
    }

    public function forceDestroy(Schedule $schedule)
    {
        $schedule->forceDelete();
        return redirect()->route('schedule:index')->with([
            'alert-type' => 'alert-danger',
            'alert'=>'Your schedule has been force deleted!' 
        ]);

    }

}
