<?php

namespace App\Http\Controllers\Host;

use App\Http\Controllers\Controller;
use App\Models\Amenity;
use App\Models\Apartment;
use App\Models\View;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ApartmentController extends Controller
{

    protected $validationRules = [          
        'title' => 'required|min:15|max:255',       
        'rooms' => 'required|integer|min:3|max:20', 
        'beds' => 'required|integer|min:1|max:5',
        'bathrooms' => 'required|integer|min:1|max:5',
        'square_meters' => 'required|integer|min:1|max:500',
        'address' => 'required|min:3|max:255',
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
        // dd($request);
        $data = $request->all();
        $validatedData = $request->validate($this->validationRules); 
        $data['user_id'] = Auth::id();
        $data['is_visible'] = true;
        $data['image'] = Storage::put('uploads', $data['image']);
        $apartment = new Apartment();
        $apartment->fill($data);
        $apartment->save($data);

        return redirect()->route('host.apartments.show', $apartment['id']);
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
        $views = View::where('apartment_id','=',$apartment->id)->count();
        return view('host.apartments.show', compact('apartment', 'views'));
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
        $amenities = Amenity::all();
        return view('host.apartments.edit', compact('apartment', 'amenities'));
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
        $data = $request->all();  
        $validatedData = $request->validate($this->validationRules); 
        $data['user_id'] = $apartment->user_id;
        if (isset($data['is_visible'])) {
            $apartment->is_visible = true;
        }
        else
        {
            $apartment->is_visible = false;
        }
        $data['is_visible'] = $apartment->is_visible;
        $data['image'] = Storage::put('uploads', $data['image']);
        $apartment->update($data);

        return redirect()->route('host.apartments.show', $apartment->id);
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

        return redirect()->route('host.apartments.index')->with('deleted', $apartment->title);
    }

    public function deletedApartments(){
        $apartments = Apartment::onlyTrashed()->paginate(10);
        return view('host.apartments.deletedApartments',compact('apartments'));
    }

    public function restoreApartments($id) 
    {

        $apartment = Apartment::where('id', $id)->withTrashed()->first();

        $apartment->restore();

        return redirect()->route('host.apartments.index')
            ->with('success', 'You successfully restored the project');
    }

    public function deletePermanently($id)
    {
        $apartments = Apartment::where('id', $id)->withTrashed()->first();

        $apartments->forceDelete();

        return redirect()->route('host.apartments.index')
            ->with('success', 'You successfully deleted the project fromt the Recycle Bin');

    }
}
