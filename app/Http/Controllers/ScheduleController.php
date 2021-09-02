<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
class ScheduleController extends Controller
{
    public function index()
    {
         $schedules = Schedule::all();

         return view('schedules.index', compact('schedules'));
    }

    public function create()
    {
        return view('schedules.create');
    }
}
