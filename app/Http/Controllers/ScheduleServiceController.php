<?php

namespace App\Http\Controllers;

use App\Models\ScheduleService;
use Illuminate\Http\Request;

class ScheduleServiceController extends Controller
{
    public function store(Request $request) 
    {
        $validatedData = $request->validate([
            'contact' => ['required', 'regex:/^09\d{9}$/', 'unique:schedule_services,contact'],
            'frequency' => 'required|in:One time,Recurring',
            'start_date' => 'required|date|after_or_equal:today',
            'day' => 'required|array|min:1',
            'time' => 'required|array|min:1',
            'note' => 'string'
        ],[
            'contact.regex' => 'The contact number must start with 09 and be 11 digits long.',
        ]);

        try {
            ScheduleService::create([
                'contact' => $validatedData['contact'],
                'frequency' => $validatedData['frequency'],
                'start_date' => $validatedData['start_date'],
                'day' => $validatedData['day'],
                'time' => $validatedData['time'],
                'note' => $validatedData['note']
            ]);

            return response()->json([
                'message' => "You've successfully booked a schedule!",
                'status' => 'ok'
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
                'status' => 'error'
            ], 500);
        }
    }
}
