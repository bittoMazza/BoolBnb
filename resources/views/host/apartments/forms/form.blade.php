<div class="form-group">
    <div class="alert alert-warning">I campi contrassegnati con l'asterisco sono obbligatori</div>
    <label class="text-light">TITOLO*</label>
    <div class="input-control">
        <input id="title" type="text" class="form-control" value="{{ old('title',$apartment->title) }}" name="title" placeholder="Inserire titolo descrittivo" required>
        <span class="form-text text-white-50">minimo 5 caratteri massimo 255</span>
        <div class="error fs-6"></div>
    </div>
    @error('title')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
</div>


<div class="form-group my-2">
    <label class="text-light">NUMERO DI STANZE*</label>
    <div class="input-control">
        <input id="rooms" type="number" class="form-control" value="{{ old('rooms',$apartment->rooms) }}" name="rooms" placeholder="Inserire numero di stanze" required>
        <span class="form-text text-white-50">deve essere un numero minimo 1 massimo 20</span>
        <div class="error fs-6"></div>
    </div>
    <div class="error text-white"></div>
    @error('rooms')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
</div>


<div class="form-group my-2">
    <label class="text-light">NUMERO DI LETTI*</label>
    <div class="input-control">
        <input id="beds" type="number" class="form-control" value="{{ old('beds',$apartment->beds) }}" name="beds" placeholder="Inserire numero di letti" required>
        <span class="form-text text-white-50">deve essere un numero minimo 1 massimo 20</span>
        <div class="error fs-6"></div>
    </div>
    @error('beds')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
</div>


<div class="form-group my-2">
    <label class="text-light">NUMERO DI BAGNI*</label>
    <div class="input-control">
        <input id="bathrooms" type="number" class="form-control" value="{{ old('bathrooms',$apartment->bathrooms) }}" name="bathrooms" placeholder="Inserire numero di bagni" required>
        <span class="form-text text-white-50">deve essere un numero minimo 1 massimo 10</span>
        <div class="error fs-6"></div>
    </div>
    @error('bathrooms')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
</div>


<div class="form-group my-2">
    <label class="text-light">METRI QUADRI*</label>
    <div class="input-control">
        <input id="square_meters" type="number" class="form-control" value="{{ old('square_meters',$apartment->square_meters) }}" name="square_meters" placeholder="Inserire numero metri quadri" required>
        <span class="form-text text-white-50">deve essere un numero minimo 1 massimo 500</span>
        <div class="error fs-6"></div>
    </div>
    @error('square_meters')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
</div>


<div class="form-group my-2">
    <label class="text-light">INDIRIZZO*</label>
    <div class="input-control">
        <input type="text" id='geoAddress' class="form-control" value="{{ old('address',$apartment->address) }}" name="address" placeholder="Inserire indirizzo" required onkeyup="if (this.value.length > 3) beforeSubmit()">
        <span class="form-text text-white-50">Es: Via Salita Castello 13, 80079 Procida, Italia</span>
        <div class="error fs-6"></div>
    </div>
    @error('address')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
</div>


<div class="form-group my-3">
    {{-- <label class="text-light">LONGITUDINE</label> --}}
    <input type="text" id='longitudeHtml' class="form-control" value="{{ old('long',$apartment->long) }}" name="long" placeholder="Inserire longitudine" hidden>
</div>


<div class="form-group my-3">
    {{-- <label class="text-light">LATITUDINE</label> --}}
    <input type="text" id='latitudeHtml' class="form-control" value="{{ old('lat',$apartment->lat) }}" name="lat" placeholder="Inserire latitudine" hidden>
</div>

<div class="form-group my-3">
    @if (Route::is('host.apartments.create'))
        <label class="text-light">IMMAGINE APPARTAMENTO*</label>
    @else
        <label class="text-light">IMMAGINE APPARTAMENTO</label>
    @endif
    <div class="input-control">
        <div class="input-group">
            <input type="file" id="file" class="form-control" value="" name="image[]" placeholder="Inserire immagine"
            multiple {{ Route::is('host.apartments.create') ? 'required' : '' }} onclick="">
            <div class="error fs-6"></div>
        </div>
    </div>
    @error('image')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
    <span class="form-text text-white-50">il file deve essere non piu grande di 1 MB</span>
</div>

@if (Route::is('host.apartments.edit'))
<div class="form-group py-2">
    <label class="text-light">&#200; DISPONIBILE*</label>
    <div class="form-check form-switch ms-2">
        <input class="form-check-input border border-light border-2 fs-5" type="checkbox" id="flexSwitchCheckDefault"
            placeholder="L'APPARTAMENTO E' DISPONIBILE?" value="{{ old('is_visible', $apartment->is_visible) }}"
            {{ $apartment->is_visible ? 'checked' : '' }} name="is_visible">
        <label class="form-check-label text-white fw-bold ms-1 align-middle" for="flexSwitchCheckDefault">
            Rendi l'appartamento disponibile
        </label>
    </div>
    @error('is_visible')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
</div>
@endif



<div>
    <label class="text-light">SELEZIONA I SERVIZI</label>
    @foreach ($amenities as $amenity)
        <div class="form-check text-white">
            <label class="form-check-label" for="exampleRadios1">
                {{ $amenity->name }}
            </label>
            @if ($errors->any())
                <input type="checkbox" name="amenity[]" id="exampleRadios1" class="form-check-input"
                    value="{{ $amenity->id }}" {{ in_array($amenity->id, old('amenity', [])) ? 'checked' : '' }}>
            @else
                <input class="form-check-input bg-secondary border" type="checkbox" value="{{ $amenity->id }}" name="amenity[]"
                    id="exampleRadios1" {{ $apartment->amenities->contains($amenity) ? 'checked' : '' }}>
            @endif
        </div>
    @endforeach
</div>
<button type="submit" value="save" class="btn btn-success my-3 text-white text-center fw-bold" >
    Salva l'appartamento
</button>

{{-- <script>
    const file = document.getElementById("file");
    file.addEventListener('change', e => {
        if (!validateInput()) {
            e.preventDefault();
            console.log('false');
        } else {
            console.log('true');
            return true;
        }
    });

        // messaggi d'errore e di successo
        const setError = (element, message) => {
            const inputControl = element.parentElement;
            const errorDisplay = inputControl.querySelector('.error');

            errorDisplay.innerText = message;
            inputControl.classList.add('error');
            inputControl.classList.remove('success')
        };

        const setSuccess = element => {
            const inputControl = element.parentElement;
            const errorDisplay = inputControl.querySelector('.error');

            errorDisplay.innerText = '';
            inputControl.classList.add('success');
            inputControl.classList.remove('error');
        };
        // messaggi d'errore e di successo

        // validazione se file image è vuoto
        const validateInput = () => {
            const fileValue = file.files.length;
            console.log(file.value);
            if (fileValue == 0) {
                setError(file, 'Seleziona un file');
                console.log('falso');
                return false;
            } else {
                setSuccess(file);
                console.log('vero');
            }
        };
        // validazione se file image è vuoto

    function deRequire(elClass) {
        el = document.getElementsByClassName(elClass);

        let atLeastOneChecked = false; //at least one cb is checked
        for (i = 0; i < el.length; i++) {
            if (el[i].checked === true) {
            atLeastOneChecked = true;
            }
        }

        if (atLeastOneChecked === true) {
            for (i = 0; i < el.length; i++) {
            el[i].required = false;
            }
        } else {
            for (i = 0; i < el.length; i++) {
            el[i].required = true;
            }
        }
    }
</script> --}}