<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Place;
use App\Models\Itinerary;
use Log;


class ItineraryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $places = Place::where('done', 0)->get();

        $itineraries = Itinerary::all();
        foreach ($itineraries as &$itinerary) {
            $this_places = Place::where('itinerary_id', $itinerary->id )->get();
                Log::error($this_places);

            $this_places_coordinates = "[";
            foreach ($this_places as &$place) {
                $this_places_coordinates .= "{lat: ".$place->lat.", lng: ".$place->lng."},";

            }
            $this_places_coordinates .= "]";

            $itinerary->update(['places' => $this_places_coordinates]);
            #$itinerary->update(['places' => "[{lat: -21, lng: 55.5},{lat: -21.4, lng: 55.5},{lat: -21.4, lng: 55.5},]"]);
        }

        return view('itineraries.index', compact('places','itineraries'));
        #return view('places.index', compact('places'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $places = Place::all();

        $itineraries = Itinerary::all();
        foreach ($itineraries as &$itinerary) {
            $this_places = Place::where('itinerary_id', $itinerary->id )->get();
                Log::error($this_places);

            $this_places_coordinates = "[";
            foreach ($this_places as &$place) {
                $this_places_coordinates .= "{lat: ".$place->lat.", lng: ".$place->lng."},";

            }
            $this_places_coordinates .= "]";

            $itinerary->update(['places' => $this_places_coordinates]);
            #$itinerary->update(['places' => "[{lat: -21, lng: 55.5},{lat: -21.4, lng: 55.5},{lat: -21.4, lng: 55.5},]"]);
        }
        $itinerary = Itinerary::find($id);
        return view('itineraries.show', compact('places','itineraries','itinerary'));
        #return view('places.index', compact('places'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Itinerary $itinerary)
    {
        return view('itineraries.edit', compact('itinerary'));
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
