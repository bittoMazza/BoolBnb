<div class="form-group">
    <div class="form-text alert alert-warning">I campi contrassegnati con l'asterisco sono obbligatori</div>
    <label class="text-light">TITOLO*</label>
    <input type="text" class="form-control" value="{{ old('title',$apartment->title) }}" name="title" placeholder="Inserire titolo descrittivo" required>
    <div class="form-text">minimo 5 caratteri massimo 255</div>
    @error('title')
    <div class="alert alert-danger">
        {{ $message }}
    </div>
    @enderror
</div>


<div class="form-group">
    <label class="text-light">NUMERO DI STANZE*</label>
    <input type="number" class="form-control" value="{{ old('rooms',$apartment->rooms) }}" name="rooms" placeholder="Inserire numero di stanze" required>
    <div class="form-text">deve essere un numero minimo 1 massimo 20</div>
    @error('rooms')
    <div class="alert alert-danger">
        {{ $message }}
    </div>
    @enderror
</div>


<div class="form-group">
    <label class="text-light">NUMERO DI LETTI*</label>
    <input type="number" class="form-control" value="{{ old('beds',$apartment->beds) }}" name="beds" placeholder="Inserire numero di letti" required>
    <div class="form-text">deve essere un numero minimo 1 massimo 20</div>
    @error('beds')
    <div class="alert alert-danger">
        {{ $message }}
    </div>
    @enderror
</div>


<div class="form-group">
    <label class="text-light">NUMERO DI BAGNI*</label>
    <input type="number" class="form-control" value="{{ old('bathrooms',$apartment->bathrooms) }}" name="bathrooms" placeholder="Inserire numero di bagni" required>
    <div class="form-text">deve essere un numero minimo 1 massimo 10</div>
    @error('bathrooms')
    <div class="alert alert-danger">
        {{ $message }}
    </div>
    @enderror
</div>


<div class="form-group">
    <label class="text-light">METRI QUADRI*</label>
    <input type="number" class="form-control" value="{{ old('square_meters',$apartment->square_meters) }}" name="square_meters" placeholder="Inserire numero metri quadri" required>
    <div class="form-text">deve essere un numero minimo 1 massimo 500</div>
    @error('square_meters')
    <div class="alert alert-danger">
        {{ $message }}
    </div>
    @enderror
</div>


<div class="form-group">
    <label class="text-light">INDIRIZZO*</label>
    <input type="text" class="form-control" value="{{ old('address',$apartment->address) }}" name="address" placeholder="Inserire indirzzo" required>
    @error('address')
    <div class="alert alert-danger">
        {{ $message }}
    </div>
    @enderror
</div>


<div class="form-group">
    <label class="text-light">LONGITUDINE*</label>
    <input type="text" class="form-control" value="{{ old('long',$apartment->long) }}" name="long" placeholder="Inserire longitudine" required>
    <div class="form-text">deve essere un numero</div>
    @error('long')
    <div class="alert alert-danger">
        {{ $message }}
    </div>
    @enderror
</div>


<div class="form-group">
    <label class="text-light">LATITUDINE*</label>
    <input type="text" class="form-control" value="{{ old('lat',$apartment->lat) }}" name="lat" placeholder="Inserire latitudine" required>
    <div class="form-text">deve essere un numero</div>
    @error('lat')
    <div class="alert alert-danger">
        {{ $message }}
    </div>
    @enderror
</div>


<div class="form-group">
    <label class="text-light">IMMAGINE APPARTAMENTO*</label>
    <div class="input-group">
        <input type="file" class="form-control" value="" name="image[]" placeholder="Inserire immagine" multiple required>
    </div>
    @error('image')
    <div class="alert alert-danger">
        {{ $message }}
    </div>
    @enderror
    <div class="form-text">il file deve essere non piu grande di 1 MB</div>
</div>

<div class="form-group py-2">
    <label class="text-light">E' DISPONIBILE??*</label>
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
            <input class="form-check-input" type="checkbox" value="{{ $amenity->id }}" name="amenity[]" id="exampleRadios1" {{ $apartment->amenities->contains($amenity) ? 'checked' : '' }}>
            <label class="form-check-label" for="exampleRadios1">
            {{ $amenity->name }}
            </label>
        </div>
    @endforeach
</div>



<button type="submit" value="save" class="btn btn-primary my-3">Salva l'appartamento</button>