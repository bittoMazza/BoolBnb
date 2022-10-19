<div class="form-group">
    <div class="alert alert-warning">I campi contrassegnati con l'asterisco sono obbligatori</div>
    <label class="text-light">TITOLO*</label>
    <input type="text" class="form-control" value="{{ old('title',$apartment->title) }}" name="title" placeholder="Inserire titolo descrittivo" required>
    <span class="form-text">minimo 5 caratteri massimo 255</span>
    @error('title')
    <div class="alert alert-danger">
        {{ $message }}
    </div>
    @enderror
</div>


<div class="form-group my-2">
    <label class="text-light">NUMERO DI STANZE*</label>
    <input type="number" class="form-control" value="{{ old('rooms',$apartment->rooms) }}" name="rooms" placeholder="Inserire numero di stanze" required>
    <span class="form-text">deve essere un numero minimo 1 massimo 20</span>
    @error('rooms')
    <div class="alert alert-danger">
        {{ $message }}
    </div>
    @enderror
</div>


<div class="form-group my-2">
    <label class="text-light">NUMERO DI LETTI*</label>
    <input type="number" class="form-control" value="{{ old('beds',$apartment->beds) }}" name="beds" placeholder="Inserire numero di letti" required>
    <span class="form-text">deve essere un numero minimo 1 massimo 20</span>
    @error('beds')
    <div class="alert alert-danger">
        {{ $message }}
    </div>
    @enderror
</div>


<div class="form-group my-2">
    <label class="text-light">NUMERO DI BAGNI*</label>
    <input type="number" class="form-control" value="{{ old('bathrooms',$apartment->bathrooms) }}" name="bathrooms" placeholder="Inserire numero di bagni" required>
    <span class="form-text">deve essere un numero minimo 1 massimo 10</span>
    @error('bathrooms')
    <div class="alert alert-danger">
        {{ $message }}
    </div>
    @enderror
</div>


<div class="form-group my-2">
    <label class="text-light">METRI QUADRI*</label>
    <input type="number" class="form-control" value="{{ old('square_meters',$apartment->square_meters) }}" name="square_meters" placeholder="Inserire numero metri quadri" required>
    <span class="form-text">deve essere un numero minimo 1 massimo 500</span>
    @error('square_meters')
    <div class="alert alert-danger">
        {{ $message }}
    </div>
    @enderror
</div>


<div class="form-group my-2">
    <label class="text-light">INDIRIZZO*</label>
    <input type="text" id='geoAddress' class="form-control" value="{{ old('address',$apartment->address) }}" name="address" placeholder="Inserire indirzzo" required onkeyup="if (this.value.length > 3) beforeSubmit()">
    @error('address')
    <div class="alert alert-danger">
        {{ $message }}
    </div>
    @enderror
</div>


<div class="form-group my-3">
    <label class="text-light">LONGITUDINE</label>
    <input type="text" id='longitudeHtml' class="form-control" value="{{ old('long',$apartment->long) }}" name="long" placeholder="Inserire longitudine" readonly>
</div>


<div class="form-group my-3">
    <label class="text-light">LATITUDINE</label>
    <input type="text" id='latitudeHtml' class="form-control" value="{{ old('lat',$apartment->lat) }}" name="lat" placeholder="Inserire latitudine" readonly>
</div>

<div class="form-group my-3">
    @if (Route::is('host.apartments.create'))
        <label class="text-light">IMMAGINE APPARTAMENTO*</label>
    @else
        <label class="text-light">IMMAGINE APPARTAMENTO</label>
    @endif
    <div class="input-group">
        <input type="file" class="form-control" value="" name="image[]" placeholder="Inserire immagine" multiple>
    </div>
    @error('image')
    <div class="alert alert-danger">
        {{ $message }}
    </div>
    @enderror
    <span class="form-text">il file deve essere non piu grande di 1 MB</span>
</div>

<div class="form-group py-2">
    <label class="text-light">E' DISPONIBILE*</label>
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
    <label class="text-light">SELEZIONA GLI OPTIONAL*</label>
    @foreach ($amenities as $amenity)
        <div class="form-check text-white">
            <label class="form-check-label" for="exampleRadios1">
            {{ $amenity->name }}
            </label>
            @if ($errors->any())
                <input type="checkbox" name="amenity[]" id="exampleRadios1" class="form-check-input" 
                value="{{ $amenity->id }}" {{ in_array($amenity->id, old('amenity', [])) ? 'checked' : '' }}>
            @else
                <input class="form-check-input" type="checkbox" value="{{ $amenity->id }}" name="amenity[]" id="exampleRadios1" {{ $apartment->amenities->contains($amenity) ? 'checked' : '' }}>
            @endif
        </div>
    @endforeach
</div>


<button type="submit" value="save" class="btn btn-success my-3">Salva l'appartamento</button>