<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Holiday;


class HolidayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $holidays = Holiday::all();
        return response()->json($holidays, 200);
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
        if ($request->name && $request->date && $request->country_code) {
            $holiday = new Holiday;
            
            $holiday->name = $request->name;
            $holiday->date = $request->date;
            $holiday->country_code = $request->country_code;
            
            $holiday->save();
            return response()->json($holiday, 201);
        } else {
            return response()->json(['error' => 'incomplete request body'], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $holiday = Holiday::find($id);
        if ($holiday) {
            return response()->json($holiday, 200);
        } else {
            return response()->json(['error' => 'holiday not found'], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        if ($request->name && $request->date && $request->country_code) {
            $holiday = Holiday::find($id);

            if ($holiday) {
                $holiday->name = $request->name;
                $holiday->date = $request->date;
                $holiday->country_code = $request->country_code;
            
                $holiday->save();
                return response()->json($holiday, 201);
            } else {
                return response()->json(['error' => 'holiday not found'], 404);
            }
        } else {
            return response()->json(['error' => 'incomplete request body'], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $holiday = Holiday::find($id);
        
        if ($holiday) {
            $holiday->delete();
            return response()->json(['message' => 'holiday deleted'], 200);
        } else {
            return response()->json(['error' => 'holiday not found'], 404);
        }
    }

    /**
     * Get holidays from the enrico service.
     */
    private function getHolidays()
    {
        $url = 'https://kayaposoft.com/enrico/json/v2.0/?action=getHolidaysForYear&year=2020&country=zaf&holidayType=public_holiday';
        $api_call = Http::get($url);
        return $api_call->json();
    }

    /**
     * Get holidays from the enrico service.
     */
    public function initHolidays()
    {
        $holidays = $this->getHolidays();
        $data = array();
        foreach($holidays as $holiday) {
            $date = date("Y-m-d", strtotime($holiday['date']['year']."-".$holiday['date']['month']."-".$holiday['date']['day']));
            $name = $holiday['name'][0]['text'];
            $data[] = array('name' => $name, 'date' => $date, 'country_code' => 'zaf');
        }
        Holiday::insert($data);
        return response()->json(['message' => 'Holidays DB has been initiated'], 200);
    }
}
