<div class="form-group">
    <label class="text-light">TITOLO</label>
    <input type="text" class="form-control" value="{{ old('title',$apartment->title) }}" name="title" placeholder="Inserire titolo descrittivo" required>
    @error('title')
    <div class="alert alert-danger">
        {{ $message }}
    </div>
    @enderror
</div>


<div class="form-group">
    <label class="text-light">NUMERO DI STANZE</label>
    <input type="number" class="form-control" value="{{ old('rooms',$apartment->rooms) }}" name="rooms" placeholder="Inserire numero di stanze" required>
    @error('rooms')
    <div class="alert alert-danger">
        {{ $message }}
    </div>
    @enderror
</div>


<div class="form-group">
    <label class="text-light">NUMERO DI LETTI</label>
    <input type="number" class="form-control" value="{{ old('beds',$apartment->beds) }}" name="beds" placeholder="Inserire numero di letti" required>
    @error('beds')
    <div class="alert alert-danger">
        {{ $message }}
    </div>
    @enderror
</div>


<div class="form-group">
    <label class="text-light">NUMERO DI BAGNI</label>
    <input type="number" class="form-control" value="{{ old('bathrooms',$apartment->bathrooms) }}" name="bathrooms" placeholder="Inserire numero di bagni" required>
    @error('bathrooms')
    <div class="alert alert-danger">
        {{ $message }}
    </div>
    @enderror
</div>


<div class="form-group">
    <label class="text-light">METRI QUADRI</label>
    <input type="number" class="form-control" value="{{ old('square_meters',$apartment->square_meters) }}" name="square_meters" placeholder="Inserire numero metri quadri" required>
    @error('square_meters')
    <div class="alert alert-danger">
        {{ $message }}
    </div>
    @enderror
</div>


<div class="form-group">
    <label class="text-light">INDIRIZZO</label>
    <input type="text" class="form-control" value="{{ old('address',$apartment->address) }}" name="address" placeholder="Inserire indirizzo" required>
    @error('address')
    <div class="alert alert-danger">
        {{ $message }}
    </div>
    @enderror
</div>


<div class="form-group">
    <label class="text-light">LONGITUDINE</label>
    <input type="text" class="form-control" value="{{ old('long',$apartment->long) }}" name="long" placeholder="Inserire longitudine" required>
    @error('long')
    <div class="alert alert-danger">
        {{ $message }}
    </div>
    @enderror
</div>


<div class="form-group">
    <label class="text-light">LATITUDINE</label>
    <input type="text" class="form-control" value="{{ old('lat',$apartment->lat) }}" name="lat" placeholder="Inserire latitudine" required>
    @error('lat')
    <div class="alert alert-danger">
        {{ $message }}
    </div>
    @enderror
</div>


<div class="form-group">
    <label class="text-light">IMMAGINE APPARTAMENTO</label>
    <input type="file" class="form-control" value="" name="image[]" placeholder="Inserire immagine" multiple required>
    @error('image')
    <div class="alert alert-danger">
        {{ $message }}
    </div>
    @enderror
</div>


<div class="form-group py-2">
    <label class="text-light">E' DISPONIBILE??</label>
    {{-- <input type="text" class="form-control" value="{{ old('is_visible',$apartment->is_visible) }}" name="is_visible" placeholder="L'APPARTAMENTO E' DISPONIBILE?" required> --}}
    <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" placeholder="L'APPARTAMENTO E' DISPONIBILE?" value="{{ old('is_visible', $apartment->is_visible) }}" {{ $apartment->is_visible ? 'checked' : '' }} name="is_visible">
        <label class="form-check-label" for="flexSwitchCheckDefault">Default switch checkbox input</label>
    </div>
    @error('is_visible')
    <div class="alert alert-danger">
        {{ $message }}
    </div>
    @enderror
</div>




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



<button type="submit" class="btn btn-primary my-3 text-white fw-bold">Salva l'appartamento</button>
