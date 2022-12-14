<?php

namespace App\Http\Controllers\Host;

use App\Http\Controllers\Controller;
use App\Models\Amenity;
use App\Models\Apartment;
use App\Models\Image;
use App\Models\Sponsorship;
use App\Models\View;
use Illuminate\Support\Str;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ApartmentController extends Controller
{

    protected $validationRules = [
        'title' => 'required|min:5|max:255',
        'rooms' => 'required|integer|min:1|max:20',
        'beds' => 'required|integer|min:1|max:20',
        'bathrooms' => 'required|integer|min:1|max:10',
        'square_meters' => 'required|integer|min:1|max:500',
        'address' => 'required',
        'image.*' => 'required|mimes:jpg,jpeg,png,gif|max:1024',
        // 'is_visible' => 'required|boolean',
        // 'long' => 'required|numeric',
        // 'lat' => 'required|numeric',
        'amenities' => 'exists:amenities,id'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apartments = Apartment::where('user_id', Auth::id())->get();
        $users = User::where('id', Auth::id())->get();
        // $apartments = Apartment::all();
        return view('host.apartments.index', compact('apartments', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $apartment = new Apartment();
        $amenities = Amenity::all();
        return view('host.apartments.create', compact('apartment', 'amenities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $data = $request->all();

        $validatedData = $request->validate($this->validationRules);

        $data['user_id'] = Auth::id();
        
        $apartment = new Apartment();

        $lastApartmentId = (Apartment::orderBy('id','desc')->first()->id)+1;

        $data['slug'] = Str::slug($data['title'], '-')."-".$lastApartmentId;
        
        //Default 
        $apartment->is_visible = false;

        $apartment->fill($data);
        
        $apartment->save($data);

        if (isset($data['amenity'])) {
            $apartment->amenities()->sync($data['amenity']);
        }
        else
        {
            $apartment->amenities()->detach();
        }
        
        if (isset($data['image'])) {
            foreach ($data['image'] as $image) {
                $newImage = new Image();
                $newImage->is_cover = false;
                if($image == $data['image'][0]){
                    $newImage->is_cover = true;
                }
                $image = Storage::put('uploads',$image);
                $newImage->image = $image;
                $apartment_id = (Apartment::orderBy('id','desc')->first()->id);
                $newImage->apartment_id = $apartment_id;
                $newImage->save();
            } 
        }
        

        return redirect()->route('host.apartments.show', $apartment['id'])->with('created', 'Hai creato un nuovo appartamento '. $data['title']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $apartment = Apartment::findOrFail($id);
        $apartments = User::where('id', Auth::id())->get();
        $sponsorPlan = Sponsorship::all();
        $views = View::where('apartment_id', '=', $apartment->id)->count();

        if (Auth::id() === $apartment->user_id) {
            return view('host.apartments.show', compact('apartment', 'views', 'sponsorPlan'));
        }

        else {
            return redirect()->route('host.apartments.index', compact('apartments'))->with('not-allowed', 'Il contenuto che hai cercato non ?? stato trovato nel tuo archivio.');
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
        $apartment = Apartment::findOrFail($id);
        $apartments = User::where('id', Auth::id())->get();
        $amenities = Amenity::all();

        if (Auth::id() === $apartment->user_id) {
            return view('host.apartments.edit', compact('apartment', 'amenities'));
        }

        else {
            return redirect()->route('host.apartments.index', compact('apartments'))->with('not-allowed', 'Il contenuto che hai cercato non ?? stato trovato nel tuo archivio.');
        }
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
        $apartment = Apartment::findOrFail($id);

        $validationRules = [
            'title' => 'required|min:5|max:255',
            'rooms' => 'required|integer|min:1|max:20',
            'beds' => 'required|integer|min:1|max:20',
            'bathrooms' => 'required|integer|min:1|max:10',
            'square_meters' => 'required|integer|min:1|max:500',
            'address' => 'required',
            // 'long' => 'required|numeric',
            // 'lat' => 'required|numeric',
            'amenities' => 'exists:amenities,id'
        ];
        $data = $request->all();
        
        $validatedData = $request->validate($validationRules);

        $data['slug'] = Str::slug($data['title'], '-')."-".$id;
        
        if (isset($data['image'])) {
            
            foreach ($data['image'] as $image) {
                $newImage = new Image();
                $image = Storage::put('uploads',$image);
                $newImage->image = $image;
                $newImage->apartment_id = $id;
                $newImage->is_cover = false;
                $newImage->save();
            }
        }


        if (isset($data['amenity'])) {
            $apartment->amenities()->sync($data['amenity']);
        }
        else
        {
            $apartment->amenities()->detach();
        }

        $data['user_id'] = $apartment->user_id;
        if (isset($data['is_visible'])) {
            $apartment->is_visible = true;
        } else {
            $apartment->is_visible = false;
        }
        $data['is_visible'] = $apartment->is_visible;

        $apartment->update($data);

        return redirect()->route('host.apartments.show', $apartment->id)->with('edited', 'Hai modificato l appartamento '. $apartment->title);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $apartment = Apartment::findOrFail($id);
        $apartment->delete();

        return redirect()->route('host.apartments.index')->with('deleted', "Hai spostato: " . $apartment->title. " nel CESTINO");
    }

    public function deletedApartments()
    {
        $apartments = Apartment::onlyTrashed()->paginate(10);
        return view('host.apartments.deletedApartments', compact('apartments'));
    }

    public function restoreApartments($id)
    {

        $apartment = Apartment::where('id', $id)->withTrashed()->first();

        $apartment->restore();

        return redirect()->route('host.apartments.index')
            ->with('restored', "Hai ripristinato: ". $apartment->title);
    }

    public function deletePermanently($id)
    {
        $apartments = Apartment::where('id', $id)->withTrashed()->first();

        $apartments->forceDelete();

        return redirect()->route('host.apartments.index')
            ->with('deleted', "Hai eliminato:". $apartments->title.  " dal cestino");
    }

    public function deletedApartmentImage($id)
    {
        $image = Image::findOrFail($id);
        $image->delete();

        return back();
    }

    public function changeCoverApartment($apartment_id, $id)
    {
        $apartment = Apartment::findOrFail($apartment_id);
        foreach ($apartment->images as $image) {
            $image->is_cover = false;
            $image->save();
        }
        $imagesId = Image::findOrFail($id);
        $imagesId->is_cover = true;
        $imagesId->save();

        return back();
    }

    public function changeSponsorshipApartment($id)
    {
        $apartment = Apartment::findOrFail($id);
        // dump($apartment);
        $apartment->isSponsored = true;
        $apartment->save();

        return back()->with('sponsor', "Hai sponsorizzato: ". $apartment->title);
    }
}
