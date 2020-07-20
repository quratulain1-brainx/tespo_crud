<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;

class ScheduleController extends Controller
{
    /**Index function*/
    public function index()
    {
        $Schedule = Schedule::all();
        return response()->json(['status' => 'OK', 'message' => 'OK', 'data'=>$Schedule]);
    }

    /**Create function*/
    public function create()
    {

    }

    /**Store function*/
    public function store(Request $request)
    {
        $schedule = new Schedule();
        $schedule->title = $request->input('title');
        $schedule->weekday = $request->input('weekday');
        $schedule->day = $request->input('day');
        $schedule->time =  $request->input('time');
        $schedule->save();
    return response()->json(['status' => 'OK', 'message' => 'Saved', 'data' =>$schedule]);
    }

    /** Edit function*/
    public function edit($id)
    {
        $schedule_edit=Schedule::all();
        $schedule_edit = Schedule::find($id);
        return response()->json(['status' => 'OK', 'message' => 'Saved', 'data' =>$schedule_edit]);
    }

    /** Update Function*/
    public function update(Request $request, $id)
    {
        $Schedule_update = Schedule::find($id);
        $Schedule_update->title = $request->title;
        $Schedule_update->weekday = $request->weekday;
        $Schedule_update->day = $request->day;
        $Schedule_update->time =  $request->time;
        if($Schedule_update->save()) {
            return response()->json(['status' => 'OK', 'message' => 'Saved', 'data' => $Schedule_update]);
        }
    }

    /**Delete Function */
    public function destroy($id)
    {
        //
    }
}
