<?php

namespace App\Http\Controllers\Host;

use App\Http\Controllers\Controller;
use App\Models\Amenity;
use App\Models\Apartment;
use App\Models\Image;
use App\Models\View;
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
        'image' => 'required|image|max:1024',
        // 'is_visible' => 'required|boolean',
        'long' => 'required|numeric',
        'lat' => 'required|numeric',
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
        if (isset($data['is_visible'])) {
            $data['is_visible'] = true;
        } else {
            $data['is_visible'] = false;
        }
        $apartment = new Apartment();
        $apartment->fill($data);

        
        $apartment->save($data);

        foreach ($data['image'] as $image) {
            $newImage = new Image();
            $image = Storage::put('uploads',$image);
            $newImage->image = $image;
            $apartment_id = (Apartment::orderBy('id','desc')->first()->id);
            $newImage->apartment_id = $apartment_id;
            $newImage->save();

        }

        return redirect()->route('host.apartments.show', $apartment['id'])->with('created', 'Hai creato un nuovo appartamento');
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
        $views = View::where('apartment_id', '=', $apartment->id)->count();

        if (Auth::id() === $apartment->user_id) {
            return view('host.apartments.show', compact('apartment', 'views'));
        }

        else {
            return redirect()->route('host.apartments.index', compact('apartments'))->with('not-allowed', 'Il contenuto che hai cercato non è stato trovato nel tuo archivio.');
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
            return redirect()->route('host.apartments.index', compact('apartments'))->with('not-allowed', 'Il contenuto che hai cercato non è stato trovato nel tuo archivio.');
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
            'long' => 'required|numeric',
            'lat' => 'required|numeric',
            'amenities' => 'exists:amenities,id'
        ];

        $data = $request->all();

        $validatedData = $request->validate($validationRules);

        foreach ($data['image'] as $image) {
            $newImage = new Image();
            $image = Storage::put('uploads',$image);
            $newImage->image = $image;
            $newImage->apartment_id = $id;

            $newImage->save();
        }


        $data['user_id'] = $apartment->user_id;
        if (isset($data['is_visible'])) {
            $apartment->is_visible = true;
        } else {
            $apartment->is_visible = false;
        }
        $data['is_visible'] = $apartment->is_visible;

        $apartment->update($data);

        return redirect()->route('host.apartments.show', $apartment->id)->with('edited', 'Hai modificato un appartamento');
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

        return redirect()->route('host.apartments.index')->with('deleted', "Hai spostato l'appartamento nel cestino");
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
            ->with('restored', 'Hai ripristinato un appartamento');
    }

    public function deletePermanently($id)
    {
        $apartments = Apartment::where('id', $id)->withTrashed()->first();

        $apartments->forceDelete();

        return redirect()->route('host.apartments.index')
            ->with('deleted', "Hai eliminato l'appartamento dal cestino");
    }

    public function deletedApartmentImage($id)
    {
        $image = Image::findOrFail($id);
        $image->delete();

        return back();
    }
}
