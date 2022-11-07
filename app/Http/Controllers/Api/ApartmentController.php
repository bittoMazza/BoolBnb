<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = $request->all();
        $radius = $data['radius'];
        $lat = $data['lat'];
        $long = $data['long'];
        $rooms = $data['rooms'];
        $beds = $data['beds'];
        $filteredApartments = [];
        $fapartements = [];
        $apartments = Apartment::with('images','amenities')->paginate(10);

        foreach ($apartments as $apartment) {
             $distance = sqrt(pow($lat - $apartment->lat, 2) + pow($long - $apartment->long, 2)) * 100;
             if ($distance <= $radius) {
                 $filteredApartments[] = $apartment;
             }
        }

        foreach($filteredApartments as $apartment){
            if($apartment->beds >= $beds &&  $apartment->rooms >= $rooms && $apartment->is_visible == true){ 
                $fapartements[] = $apartment;
            }
        }


        return response()->json([
          "response" => true,
          "results" => $fapartements,
        ]);
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
    public function show($slug)
    {
        $apartment = Apartment::with('amenities','images')->where('slug',$slug)->get();
        if($apartment) {
            return response()->json([
                "response" => true,
                "results" => $apartment,
              ]);
        }
        /* Ritorna un 404 nel caso con trovasse l'id */
        return response('',404);
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

    public function sponsoredApartments()
    {
        $apartments = Apartment::with('images')->where('isSponsored', '=', true)->get();

        return response()->json([
            "response" => true,
            "results" => $apartments,
        ]);
    }
}
