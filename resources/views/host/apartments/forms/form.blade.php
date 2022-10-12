<div class="form-group">
    <label class="text-light">TITOLO</label>
    <input type="text" class="form-control" value="{{ old('title',$apartment->title) }}" name="title" placeholder="Inserire titolo descrittivo" required>
</div>

@error('title')
<div class="alert alert-warning">
    {{ $message }}
</div>
@enderror

<div class="form-group">
    <label class="text-light">NUMERO DI STANZE</label>
    <input type="number" class="form-control" value="{{ old('rooms',$apartment->rooms) }}" name="rooms" placeholder="Inserire numero di stanze" required>
</div>

@error('apartment_content')
<div class="alert alert-warning">
    {{ $message }}
</div>
@enderror

<div class="form-group">
    <label class="text-light">NUMERO DI LETTI</label>
    <input type="number" class="form-control" value="{{ old('beds',$apartment->beds) }}" name="beds" placeholder="Inserire numero di letti" required>
</div>

@error('thumb')
<div class="alert alert-warning">
    {{ $message }}
</div>
@enderror

<div class="form-group">
    <label class="text-light">NUMERO DI BAGNI</label>
    <input type="number" class="form-control" value="{{ old('bathrooms',$apartment->bathrooms) }}" name="bathrooms" placeholder="Inserire numero di bagni" required>
</div>

@error('thumb')
<div class="alert alert-warning">
    {{ $message }}
</div>
@enderror

<div class="form-group">
    <label class="text-light">METRI QUADRI</label>
    <input type="number" class="form-control" value="{{ old('square_meters',$apartment->square_meters) }}" name="square_meters" placeholder="Inserire numero metri quadri" required>
</div>

@error('thumb')
<div class="alert alert-warning">
    {{ $message }}
</div>
@enderror

<div class="form-group">
    <label class="text-light">INDIRIZZO</label>
    <input type="text" class="form-control" value="{{ old('address',$apartment->address) }}" name="address" placeholder="Inserire indirzzo" required>
</div>

@error('thumb')
<div class="alert alert-warning">
    {{ $message }}
</div>
@enderror

<div class="form-group">
    <label class="text-light">LONGITUDINE</label>
    <input type="text" class="form-control" value="{{ old('long',$apartment->long) }}" name="long" placeholder="Inserire longitudine" required>
</div>

@error('thumb')
<div class="alert alert-warning">
    {{ $message }}
</div>
@enderror

<div class="form-group">
    <label class="text-light">LATITUDINE</label>
    <input type="text" class="form-control" value="{{ old('lat',$apartment->lat) }}" name="lat" placeholder="Inserire latitudine" required>
</div>

@error('thumb')
<div class="alert alert-warning">
    {{ $message }}
</div>
@enderror

<div class="form-group">
    <label class="text-light">IMMAGINE APPARTMANETO</label>
    <input type="file" class="form-control" value="{{ old('image',$apartment->image) }}" name="image" placeholder="Inserire immagine" required>
</div>

@error('thumb')
<div class="alert alert-warning">
    {{ $message }}
</div>
@enderror

<div class="form-group py-2">
    <label class="text-light">E' DISPONIBILE??</label>
    {{-- <input type="text" class="form-control" value="{{ old('is_visible',$apartment->is_visible) }}" name="is_visible" placeholder="L'APPARTAMENTO E' DISPONIBILE?" required> --}}
    <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" placeholder="L'APPARTAMENTO E' DISPONIBILE?">
        <label class="form-check-label" for="flexSwitchCheckDefault">Default switch checkbox input</label>
    </div>
</div>

@error('thumb')
<div class="alert alert-warning">
    {{ $message }}
</div>
@enderror



<div>
    <label class="text-light">SELEZIONA GLI OPTIONAL</label>
    @foreach ($amenities as $amenity)
        <div class="form-check text-white">
            <input class="form-check-input" type="checkbox" value="{{ $amenity->id }}" name="amenity[]" id="exampleRadios1" {{ $apartment->amenities->contains($amenity) ? 'checked' : '' }}>
            <label class="form-check-label" for="exampleRadios1">
            {{ $amenity->name }}
            </label>
        </div>
    @endforeach
</div>



<button type="submit" class="btn btn-primary my-3">Salva l'appartamento</button>
