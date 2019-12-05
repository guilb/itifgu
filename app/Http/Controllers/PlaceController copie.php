<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use GuzzleHttp\Client;


#use App\Http\Requests\ProductRequest;
use App\Models\Distance;
use App\Models\Place;
#use App\Models\Category;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://api.openrouteservice.org',
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);



        $distances = array();
        #$exceptions = array();

        $places_1 = Place::all ();

        foreach ($places_1 as &$place_1) {
            #array_push($exceptions, $place_1->id);

            $places_2 = Place::all()->except($place_1->id);
            foreach ($places_2 as &$place_2) {
                Log::error("--------------------");

                
                Log::error($place_1->id);
                Log::error("youpi");


                

                if ($distance = Distance::wherePlace_1_id($place_1->id)->wherePlace_2_id($place_2->id)->first()) {
                    Log::error("il y a");
    
                } else {
                    Log::error("il y a pas");

                    $url_itinerary="https://api.openrouteservice.org/v2/directions/driving-car?api_key=5b3ce3597851110001cf62488fa4a992f11f4aeeb62850c3649de8c3&start=".$place_1->lng.",".$place_1->lat."&end=".$place_2->lng.",".$place_2->lat;

                    $response_itinerary = $client->get($url_itinerary)->getBody();

                    $obj_itinerary = json_decode($response_itinerary);
                    $new_distance = Distance::create(['place_1_id' => $place_1->id,'place_2_id' => $place_2->id,'distance' => $obj_itinerary->features[0]->properties->summary->distance,'duration' => $obj_itinerary->features[0]->properties->summary->duration]);
                    Log::error($place_1->name .' '. $place_2->name. ' '.$obj_itinerary->features[0]->properties->summary->duration. 'mn '.$obj_itinerary->features[0]->properties->summary->distance.'km');

                }

                #$object = new \stdClass();
                #$object->city_1 = $place_1->name;
                #$object->city_2 = $place_2->name;
                #$object->distance = intval($obj_itinerary->features[0]->properties->summary->distance/1000);
                #$object->duration = intval($obj_itinerary->features[0]->properties->summary->duration/60);



                #array_push($distances, $object);

            }
        }
        $distances = Distance::all();


        return view('places.index', compact('distances'));
        #return view('places.index', compact('places'));
    }



    public function schedule()
    {

        $client = new Client([
            'base_uri' => 'https://api.openrouteservice.org',
            'timeout'  => 2.0,
        ]);
        $starting_place = 13;
        $distances = Distance::where('place_1_id', $starting_place)->get();
        Log::error("-----------DEBUT JOUR 1-----------------------------");

        $more_distant = Distance::where('place_1_id', $starting_place)->orderBy('duration', 'desc')->first();

        $next_point = $more_distant->place_2_id;
        $exceptions =array();
        array_push($exceptions, $more_distant->place_1->id);
        array_push($exceptions, $more_distant->place_2->id);

        do {
            #####Log::error("De ".$more_distant->place_1->name." à ".$more_distant->place_2->name." - duration : ".$more_distant->duration);
            if(isset($next_segment)){
                array_push($exceptions, $next_segment->place_2->id);
            }
            #Log::error("exceptions");
            #Log::error($exceptions);
            $next_segment = Distance::where('place_1_id', $next_point)->whereNotIn('place_2_id', $exceptions)->orderBy('duration', 'desc')->first();

            #####Log::error("de ".$next_segment->place_1->name." à ".$next_segment->place_2->name."- duration : ".$next_segment->duration);
            $last_point = $next_segment->place_2_id;

            $road_back = Distance::where('place_1_id', $last_point)->where('place_2_id', $starting_place)->orderBy('duration', 'desc')->first();;
            #####Log::error("de ".$road_back->place_1->name." à ".$road_back->place_2->name."- duration : ".$road_back->duration);

            $total_duration= $more_distant->duration + $next_segment->duration + $road_back->duration;
                        #####Log::error("durée : ".$total_duration/60);
                        #####Log::error("----------------------------------------");

        } while ($total_duration/60 > 240);

        $all_points =  array();
        array_push($all_points, $more_distant->place_1->id);
        array_push($all_points, $next_segment->place_1->id);
        array_push($all_points, $road_back->place_1->id);
        #####Log::error("all_points");
        #####Log::error($all_points);
            #--------------------du troisième au quatrième lieu-------
        ini_set("memory_limit",-1);

        #Log::error("-----------troisième LIEU-----------------------------");
        do {
            if(isset($next_segment2)){
                array_push($exceptions, $next_segment2->place_2->id);
            }

            $next_segment2 = Distance::where('place_1_id', $next_segment->place_2->id)->whereNotIn('place_2_id', $exceptions)->orderBy('duration', 'desc')->first();
            array_push($exceptions, $next_segment2->place_2->id);
            array_push($exceptions, $next_segment2->place_1->id);

            #####Log::error("de ".$next_segment2->place_1->name." à ".$next_segment2->place_2->name."- duration : ".$next_segment2->duration);
            #Log::error("durée next_segment2");
            #Log::error($next_segment2->duration);
            $last_point = $next_segment2->place_2_id;

            $road_back2 = Distance::where('place_1_id', $last_point)->where('place_2_id', $starting_place)->orderBy('duration', 'desc')->first();;
            #####Log::error("de ".$road_back2->place_1->name." à ".$road_back->place_2->name."- duration : ".$road_back2->duration);

            $total_duration= $more_distant->duration + $next_segment->duration + $next_segment2->duration + $road_back->duration;
            
            #comparaion nb exceptions avec nb places
            $exceptions = array_unique($exceptions);
            #Log::error(count($exceptions));
            #Log::error($exceptions);
            $all_places = Place::all();
            #Log::error(count($all_places));

        } while (($total_duration/60 > 240) &&(count($exceptions)!=count($all_places)));


        #Log::error($all_points);

        Log::error("De ".$more_distant->place_1->name." à ".$more_distant->place_2->name." - duration : ".$more_distant->duration);

        Log::error("de ".$next_segment->place_1->name." à ".$next_segment->place_2->name."- duration : ".$next_segment->duration);
        Log::error("de ".$next_segment2->place_1->name." à ".$next_segment2->place_2->name."- duration : ".$next_segment2->duration);
        Log::error("de ".$road_back2->place_1->name." à ".$road_back->place_2->name."- duration : ".$road_back2->duration);
        Log::error("durée : ".$total_duration/60);

        echo "<b>jour 1</b></br>";
        echo $more_distant->place_1->name."</br>";
        echo $next_segment->place_1->name."</br>";
        echo $next_segment2->place_1->name."</br>";
        echo $road_back2->place_1->name."</br>";
        echo $road_back2->place_2->name."</br>";

        Log::error("---------------------------------FIN JOUR 1------------------------------");

        #---------------------------------DEBUT JOUR 2------------------------------

        $days=1;
        while ($days<7){
            #$exceptions =array();
            $exceptions = array_merge($exceptions, $all_points);

            #####Log::error("all_points");
            #####Log::error($all_points);
            #####Log::error("exceptions");
            #####Log::error($exceptions);

            $more_distant = Distance::where('place_1_id', $starting_place)->whereNotIn('place_2_id', $exceptions)->orderBy('duration', 'desc')->first();
            #####Log::error("de ".$more_distant->place_1->name." à ".$more_distant->place_2->name."- duration : ".$more_distant->duration);

            $next_point = $more_distant->place_2_id;
            
            array_push($exceptions, $more_distant->place_1->id);
            array_push($exceptions, $more_distant->place_2->id);


            #--------------------du deuxième au troisième lieu-------
            do {
                #####Log::error("de ".$more_distant->place_1->name." à ".$more_distant->place_2->name."- duration : ".$more_distant->duration);
                if(isset($next_segment)){
                    array_push($exceptions, $next_segment->place_2->id);
                }
                #Log::error("exceptions");
                $exceptions = array_unique($exceptions);
                #####Log::error(count($exceptions));
                $all_places = Place::all();
                #####Log::error(count($all_places));
                $next_segment = Distance::where('place_1_id', $next_point)->whereNotIn('place_2_id', $exceptions)->orderBy('duration', 'desc')->first();

                #####Log::error("de ".$next_segment->place_1->name." à ".$next_segment->place_2->name."- duration : ".$next_segment->duration);
                $last_point = $next_segment->place_2_id;

                $road_back = Distance::where('place_1_id', $last_point)->where('place_2_id', $starting_place)->orderBy('duration', 'desc')->first();;
                #####Log::error("de ".$road_back->place_1->name." à ".$road_back->place_2->name."- duration : ".$road_back->duration);

                $total_duration= $more_distant->duration + $next_segment->duration + $road_back->duration;
                #####Log::error("durée : ".$total_duration/60);
                #####Log::error("----------------------------------------");
            } while (($total_duration/60 > 240) &&(count($exceptions)!=count($all_places)));
            Log::error("de ".$more_distant->place_1->name." à ".$more_distant->place_2->name."- duration : ".$more_distant->duration);
            Log::error("de ".$next_segment->place_1->name." à ".$next_segment->place_2->name."- duration : ".$next_segment->duration);
            Log::error("de ".$road_back->place_1->name." à ".$road_back->place_2->name."- duration : ".$road_back->duration);
            Log::error("durée : ".$total_duration/60);



            array_push($all_points, $more_distant->place_1->id);
            array_push($all_points, $next_segment->place_1->id);
            array_push($all_points, $road_back->place_1->id);
            #Log::error("all_points");
            #Log::error($all_points);



            $all_points =  array();
            array_push($all_points, $more_distant->place_1->id);
            array_push($all_points, $next_segment->place_1->id);
            array_push($all_points, $road_back->place_1->id);
            #####Log::error("all_points");
            #####Log::error($all_points);
                #--------------------du troisième au quatrième lieu-------
            ini_set("memory_limit",-1);

            #Log::error("-----------troisième LIEU-----------------------------");
            do {
                if(isset($next_segment2)){
                    array_push($exceptions, $next_segment2->place_2->id);
                }

                $next_segment2 = Distance::where('place_1_id', $next_segment->place_2->id)->whereNotIn('place_2_id', $exceptions)->orderBy('duration', 'desc')->first();
                array_push($exceptions, $next_segment2->place_2->id);
                array_push($exceptions, $next_segment2->place_1->id);

                #####Log::error("de ".$next_segment2->place_1->name." à ".$next_segment2->place_2->name."- duration : ".$next_segment2->duration);
                #Log::error("durée next_segment2");
                #Log::error($next_segment2->duration);
                $last_point = $next_segment2->place_2_id;

                $road_back2 = Distance::where('place_1_id', $last_point)->where('place_2_id', $starting_place)->orderBy('duration', 'desc')->first();;
                #####Log::error("de ".$road_back2->place_1->name." à ".$road_back->place_2->name."- duration : ".$road_back2->duration);

                $total_duration= $more_distant->duration + $next_segment->duration + $next_segment2->duration + $road_back->duration;
                
                #comparaion nb exceptions avec nb places
                $exceptions = array_unique($exceptions);
                #Log::error(count($exceptions));
                #Log::error($exceptions);
                $all_places = Place::all();
                #Log::error(count($all_places));

            } while (($total_duration/60 > 240) &&(count($exceptions)!=count($all_places)));


            #Log::error($all_points);

            Log::error("De ".$more_distant->place_1->name." à ".$more_distant->place_2->name." - duration : ".$more_distant->duration);

            Log::error("de ".$next_segment->place_1->name." à ".$next_segment->place_2->name."- duration : ".$next_segment->duration);
            Log::error("de ".$next_segment2->place_1->name." à ".$next_segment2->place_2->name."- duration : ".$next_segment2->duration);
            Log::error("de ".$road_back2->place_1->name." à ".$road_back->place_2->name."- duration : ".$road_back2->duration);
            Log::error("durée : ".$total_duration/60);




            $days++;
            Log::error("---------------------------------FIN JOUR ".$days."------------------------------");
        
            echo "<b>jour ".$days."</b></br>";
            echo $more_distant->place_1->name."</br>";
            echo $next_segment->place_1->name."</br>";
            echo $next_segment2->place_1->name."</br>";
            echo $road_back2->place_1->name."</br>";
            echo $road_back2->place_2->name."</br>";

        }

        #---------------------------------FIN JOUR 2------------------------------
                $exceptions = array_unique($exceptions);
                Log::error(count($exceptions));
                $all_places = Place::all();
                Log::error(count($all_places));
        return view('places.schedule', compact('distances'));
        #return view('places.index', compact('places'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('places.create');    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'name' => 'string|max:255',
            'lng' => 'string|max:255',
            'lat' => 'string|max:255',

        ]);

        Place::create($request->all());

        return back()->with('ok', __("Le lieu a bien été enregistrée"));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
