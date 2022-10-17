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
    <input type="text" id='geoAddress' class="form-control" value="{{ old('address',$apartment->address) }}" name="address" placeholder="Inserire indirzzo" required onkeyup="if (this.value.length > 6) beforeSubmit()">
    @error('address')
    <div class="alert alert-danger">
        {{ $message }}
    </div>
    @enderror
</div>


<div class="form-group">
    <label class="text-light">LONGITUDINE*</label>
    <input type="text" id='longitudeHtml' class="form-control" value="{{ old('long',$apartment->long) }}" name="long" placeholder="Inserire longitudine" required>
    <div class="form-text">deve essere un numero</div>
    @error('long')
    <div class="alert alert-danger">
        {{ $message }}
    </div>
    @enderror
</div>


<div class="form-group">
    <label class="text-light">LATITUDINE*</label>
    <input type="text" id='latitudeHtml' class="form-control" value="{{ old('lat',$apartment->lat) }}" name="lat" placeholder="Inserire latitudine" required>
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

<script>
   function autocomplete(inp, arr) {
    /*the autocomplete function takes two arguments,
    the text field element and an array of possible autocompleted values:*/
    var currentFocus;
    /*execute a function when someone writes in the text field:*/
    inp.addEventListener("input", function (e) {
        var a,
            b,
            i,
            val = this.value;
        /*close any already open lists of autocompleted values*/
        closeAllLists();
        if (!val) {
            return false;
        }
        currentFocus = -1;
        /*create a DIV element that will contain the items (values):*/
        a = document.createElement("DIV");
        a.setAttribute("id", this.id + "autocomplete-list");
        a.setAttribute("onclick", "beforeSubmit()");
        a.setAttribute("class", "autocomplete-items text-white");
        /*append the DIV element as a child of the autocomplete container:*/
        this.parentNode.appendChild(a);
        /*for each item in the array...*/
        for (i = 0; i < arr.length; i++) {
            /*check if the item starts with the same letters as the text field value:*/
            if (
                arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()
            ) {
                /*create a DIV element for each matching element:*/
                b = document.createElement("DIV");
                /*make the matching letters bold:*/
                b.innerHTML =
                    "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                b.innerHTML += arr[i].substr(val.length);
                /*insert a input field that will hold the current array item's value:*/
                b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                /*execute a function when someone clicks on the item value (DIV element):*/
                b.addEventListener("click", function (e) {
                    /*insert the value for the autocomplete text field:*/
                    inp.value = this.getElementsByTagName("input")[0].value;
                    /*close the list of autocompleted values,
                (or any other open lists of autocompleted values:*/
                    closeAllLists();
                });
                a.appendChild(b);
            }
        }
    });
    /*execute a function presses a key on the keyboard:*/
    inp.addEventListener("keydown", function (e) {
        var x = document.getElementById(this.id + "autocomplete-list");
        if (x) x = x.getElementsByTagName("div");
        if (e.keyCode == 40) {
            /*If the arrow DOWN key is pressed,
          increase the currentFocus variable:*/
            currentFocus++;
            /*and and make the current item more visible:*/
            addActive(x);
        } else if (e.keyCode == 38) {
            //up
            /*If the arrow UP key is pressed,
          decrease the currentFocus variable:*/
            currentFocus--;
            /*and and make the current item more visible:*/
            addActive(x);
        } else if (e.keyCode == 13) {
            /*If the ENTER key is pressed, prevent the form from being submitted,*/
            e.preventDefault();
            if (currentFocus > -1) {
                /*and simulate a click on the "active" item:*/
                if (x) x[currentFocus].click();
            }
        }
    });
    function addActive(x) {
        /*a function to classify an item as "active":*/
        if (!x) return false;
        /*start by removing the "active" class on all items:*/
        removeActive(x);
        if (currentFocus >= x.length) currentFocus = 0;
        if (currentFocus < 0) currentFocus = x.length - 1;
        /*add class "autocomplete-active":*/
        x[currentFocus].classList.add("autocomplete-active");
    }
    function removeActive(x) {
        /*a function to remove the "active" class from all autocomplete items:*/
        for (var i = 0; i < x.length; i++) {
            x[i].classList.remove("autocomplete-active");
        }
    }
    function closeAllLists(elmnt) {
        /*close all autocomplete lists in the document,
      except the one passed as an argument:*/
        var x = document.getElementsByClassName("autocomplete-items");
        for (var i = 0; i < x.length; i++) {
            if (elmnt != x[i] && elmnt != inp) {
                x[i].parentNode.removeChild(x[i]);
            }
        }
    }
    /*execute a function when someone clicks in the document:*/
    document.addEventListener("click", function (e) {
        closeAllLists(e.target);
    });
};
beforeSubmit = function () {
    /*     let city = document.getElementById("geoCity").value;
    let address = document.getElementById("geoAddress").value;
    let civic = document.getElementById("geoCnum").value; */

    let completeAddress = document.getElementById("geoAddress").value;

    var geocodeOptions = {
        query: completeAddress,
        key: "Y3utdtjiBc6ObgcZs8bNzOGza3HV7trG",
    };
    // Look up the geocode of the given address
    tt.services.geocode(geocodeOptions).then(function (geocodeRes) {
        // console.log(geocodeRes);

        var reverseOptions = {
            position: geocodeRes.results[0].position,
            key: "Y3utdtjiBc6ObgcZs8bNzOGza3HV7trG",
        };
        // console.log(geocodeRes.results[0].position.lat);
        // console.log(geocodeRes.results[0].position.lng);
        console.log(geocodeRes.results[0].address);

        let suggestion = [];

        geocodeRes.results.forEach((element) => {
            if (element.address.freeformAddress.includes("'")) {
                let newAddress = element.address.freeformAddress.replace(
                    "'",
                    " "
                );
                suggestion.push(newAddress);
            } else {
                suggestion.push(element.address.freeformAddress);
            }
        });

        console.log(suggestion);

        autocomplete(document.getElementById("geoAddress"), suggestion);

        let lat = geocodeRes.results[0].position.lat;
        let lng = geocodeRes.results[0].position.lng;

        document.getElementById("longitudeHtml").value = lng;
        document.getElementById("latitudeHtml").value = lat;

        });
    };
</script>