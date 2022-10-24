<template>
  <main class="container">
    <div class="row">
      <div class="col-12">
        <!-- Contenuto principale in home -->
        <div class="content py-3">
          <!-- Typewriter text  -->

          <div class="typewriter-jumbo text-center">
            <h1 class="home-title fw-bold">Scopri un posto&nbsp;</h1>

            <h3
              class="typewrite fw-bold text-highlight-warning"
              data-period="2000"
              data-type='[ "dove amerai vivere.", "da sogno."]'
            >
              <span class="wrap"></span>
            </h3>
          </div>
        </div>

        <!-- Search bar avanzata -->
        <h3 class="fw-bold text-center mt-3 mb-0">
          <span class="text-primary">Cerca</span> un appartamento
        </h3>
        <nav class="navbar bg-light mb-4">
          
          <div class="container-fluid">
            <form class="d-flex w-100" role="search">
              <input @keyup="getFilteredApartment()" class="form-control me-2" type="search" placeholder="Inserisci il luogo in cui vuoi trovare l'appartamento" aria-label="Search" v-model="filter"/>
            </form>
            <button class="btn btn-primary text-white" @click="getSomething()">
              Cerca
            </button>
          </div>
        </nav>

        <!-- Advanced Search bar -->
        <div class="row">
            <div class="col" v-for="amenity in amenities" :key="amenity.id">
                <input type="checkbox" :value="amenity.id" :name="amenity.name + '_check'" :id="amenity.name + '-check'" v-model="apartmentAmenities">
                <label :for="amenity.name + '-check'">{{ amenity.name }}</label>
            </div>
        </div>

        <div class="d-flex align-items-center">
            <div class="col">
              <label for="room-no">Numero camere</label>
              <select name="room_no" id="room-no" v-model="roomNo">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
              </select>
            </div>

            <div class="col">
              <label for="bed-no">Posti letto</label>
              <select name="bed_no" id="bed-no" v-model="bedNo">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
              </select>
            </div>

            <div class="col">
              <label for="room-no">Numero bagni</label>
              <select name="bath_no" id="bath-no" v-model="bathNo">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
              </select>
            </div>

            <div class="col">
              <label for="search-range">Raggio di ricerca</label>
              <div class="d-flex align-items-center">
                  <input type="range" name="search_range" id="search-range" default="20" min="10" max="1000" step="10" oninput="this.nextElementSibling.value = this.value" v-model="searchRange">
                  <output class="ms-1">20 </output> <span class="ms-1"> km</span>
              </div>
            </div>
        </div>
        
        <div class="d-flex justify-content-center p-3">
            <button class="btn btn-lt btn-primary text-white mx-2" @click="sendFiltersData()">Applica filtri</button>
        </div>

        <!-- Appartamenti in evidenza -->
        <div class="py-4 container">
          <div class="text-center mb-4">
            <span class="tag fs-5">IN EVIDENZA</span>
          </div>

          <div class="in_evidence p-5 row row-cols-4 gx-4">
            <!-- CARD -->
            <div class="col" v-for="apartment in apartments" :key="apartment.id">
              <div class="card px-0 shadow-sm">
                <a href="">
                  <img 
                    :src="getCover(apartment.images)"
                    alt="title"
                    class="card-img-top"
                  />
                </a>
                <div class="card-body card-body-cascade pb-0">
                  <h5 class="card-title">
                    <strong>
                      <a href="#"> {{ apartment.title }} </a>
                    </strong>
                  </h5>
                  <p class="fst-italic pb-1">{{ apartment.address }}</p>
                </div>
              </div>
            </div>
            <!-- FINE CARD DUPLICATE -->
          </div>
        </div>

        <!-- Lista Appartamenti -->
        <div class="p-4 container">
          <div class="text-center mb-4">
            <h4 class="fw-bold">APPARTAMENTI</h4>
          </div>

          <div class="p-5 row row-cols-4 gx-4">
            <!-- CARD -->
            <div class="col mb-4">
              <div class="card px-0 shadow-sm">
                <a href="">
                  <img
                    src="https://www.italiapartment.com/images/camere-home/ok_FRI5524_00025.jpg"
                    alt="title"
                    class="card-img-top"
                  />
                </a>
                <div class="card-body card-body-cascade pb-0">
                  <h5 class="card-title">
                    <strong>
                      <a href="#"> Titolo Appartamento </a>
                    </strong>
                  </h5>
                  <p class="fst-italic pb-1">Indirizzo</p>
                </div>
              </div>
            </div>

            <!-- INIZIO CARD DUPLICATE -->
            <div class="col mb-4">
              <div class="card px-0 shadow-sm">
                <a href="">
                  <img
                    src="https://www.italiapartment.com/images/camere-home/ok_FRI5524_00025.jpg"
                    alt="title"
                    class="card-img-top"
                  />
                </a>
                <div class="card-body card-body-cascade pb-0">
                  <h5 class="card-title">
                    <strong>
                      <a href="#"> Titolo Appartamento </a>
                    </strong>
                  </h5>
                  <p class="fst-italic pb-1">Indirizzo</p>
                </div>
              </div>
            </div>

            <div class="col mb-4">
              <div class="card px-0 shadow-sm">
                <a href="">
                  <img
                    src="https://www.italiapartment.com/images/camere-home/ok_FRI5524_00025.jpg"
                    alt="title"
                    class="card-img-top"
                  />
                </a>
                <div class="card-body card-body-cascade pb-0">
                  <h5 class="card-title">
                    <strong>
                      <a href="#"> Titolo Appartamento </a>
                    </strong>
                  </h5>
                  <p class="fst-italic pb-1">Indirizzo</p>
                </div>
              </div>
            </div>

            <div class="col mb-4">
              <div class="card px-0 shadow-sm">
                <a href="">
                  <img
                    src="https://www.italiapartment.com/images/camere-home/ok_FRI5524_00025.jpg"
                    alt="title"
                    class="card-img-top"
                  />
                </a>
                <div class="card-body card-body-cascade pb-0">
                  <h5 class="card-title">
                    <strong>
                      <a href="#"> Titolo Appartamento </a>
                    </strong>
                  </h5>
                  <p class="fst-italic pb-1">Indirizzo</p>
                </div>
              </div>
            </div>

            <div class="col mb-4">
              <div class="card px-0 shadow-sm">
                <a href="">
                  <img
                    src="https://www.italiapartment.com/images/camere-home/ok_FRI5524_00025.jpg"
                    alt="title"
                    class="card-img-top"
                  />
                </a>
                <div class="card-body card-body-cascade pb-0">
                  <h5 class="card-title">
                    <strong>
                      <a href="#"> Titolo Appartamento </a>
                    </strong>
                  </h5>
                  <p class="fst-italic pb-1">Indirizzo</p>
                </div>
              </div>
            </div>

            <div class="col mb-4">
              <div class="card px-0 shadow-sm">
                <a href="">
                  <img
                    src="https://www.italiapartment.com/images/camere-home/ok_FRI5524_00025.jpg"
                    alt="title"
                    class="card-img-top"
                  />
                </a>
                <div class="card-body card-body-cascade pb-0">
                  <h5 class="card-title">
                    <strong>
                      <a href="#"> Titolo Appartamento </a>
                    </strong>
                  </h5>
                  <p class="fst-italic pb-1">Indirizzo</p>
                </div>
              </div>
            </div>

            <div class="col mb-4">
              <div class="card px-0 shadow-sm">
                <a href="">
                  <img
                    src="https://www.italiapartment.com/images/camere-home/ok_FRI5524_00025.jpg"
                    alt="title"
                    class="card-img-top"
                  />
                </a>
                <div class="card-body card-body-cascade pb-0">
                  <h5 class="card-title">
                    <strong>
                      <a href="#"> Titolo Appartamento </a>
                    </strong>
                  </h5>
                  <p class="fst-italic pb-1">Indirizzo</p>
                </div>
              </div>
            </div>

            <div class="col mb-4">
              <div class="card px-0 shadow-sm">
                <a href="">
                  <img
                    src="https://www.italiapartment.com/images/camere-home/ok_FRI5524_00025.jpg"
                    alt="title"
                    class="card-img-top"
                  />
                </a>
                <div class="card-body card-body-cascade pb-0">
                  <h5 class="card-title">
                    <strong>
                      <a href="#"> Titolo Appartamento </a>
                    </strong>
                  </h5>
                  <p class="fst-italic pb-1">Indirizzo</p>
                </div>
              </div>
            </div>
            <!-- FINE CARD DUPLICATE -->
          </div>
        </div>
      </div>
    </div>
  </main>
</template>
<!-- $filter = $request->input("filter");

$radius = $request->input("radius");

$coordinate = Http::get('https://api.tomtom.com/search/2/search/.json?key=Z4C8r6rK8x69JksEOmCX43MGffYO83xu&query=' . $filter . '&countrySet=IT' . '&limit=1');
    $lat = $coordinate["results"][0]["position"]["lat"];
    $lon = $coordinate["results"][0]["position"]["lon"]; -->
<script>
import axios from 'axios';
export default {
  name: "HomePage",
  components: {},
  data: function () {
    return {
      apartments: [],
      filter: '',
      long: '',
      lat: '',
      searchedCoordinates: {},
      radius: 20,
    };
  },
  methods: {
    getFilteredApartment() {
      axios.get('https://api.tomtom.com/search/2/search/.json?key=Z4C8r6rK8x69JksEOmCX43MGffYO83xu&query=' + this.filter +'&countrySet=IT' + '&limit=1').then((response) => {
        console.log(response.data);
        this.searchedCoordinates = response.data;
        this.lat = this.searchedCoordinates["results"][0]["position"]["lat"];
        this.long = this.searchedCoordinates["results"][0]["position"]["lon"];
        console.log(this.lat);
        console.log(this.long);
      }).catch((error) => {
        console.warn(error);
      });
    },
    getCover(images){
      for(let i=0;i<images.length;i++){
        if(images[i].is_cover == true){
          return images[i].image;
        }
      }
    },
    getSomething(){
      axios.get('/api/apartments', {params:{
        lat: this.lat ,
        long: this.long, 
        radius: this.radius,}      
      })
      .then((response) => {
        console.log(response);
        this.apartments = response.data.results;
      }).catch((error) => {
        console.log(error);
      })
    }
  },
  created() {

  }
};

class txtType {
  constructor(el, toRotate, period) {
    this.toRotate = toRotate;
    this.el = el;
    this.loopNum = 0;
    this.period = parseInt(period, 10) || 2000;
    this.txt = "";
    this.tick();
    this.isDeleting = false;
  }
  tick() {
    let i = this.loopNum % this.toRotate.length;
    let fullTxt = this.toRotate[i];

    if (this.isDeleting) {
      this.txt = fullTxt.substring(0, this.txt.length - 1);
    } else {
      this.txt = fullTxt.substring(0, this.txt.length + 1);
    }

    this.el.innerHTML = '<span class="wrap">' + this.txt + "</span>";

    let that = this;
    let delta = 200 - Math.random() * 100;

    if (this.isDeleting) {
      delta /= 2;
    }

    if (!this.isDeleting && this.txt === fullTxt) {
      delta = this.period;
      this.isDeleting = true;
    } else if (this.isDeleting && this.txt === "") {
      this.isDeleting = false;
      this.loopNum++;
      delta = 500;
    }

    setTimeout(function () {
      that.tick();
    }, delta);
  }
}

window.onload = function () {
  let elements = document.getElementsByClassName("typewrite");
  for (let i = 0; i < elements.length; i++) {
    let toRotate = elements[i].getAttribute("data-type");
    let period = elements[i].getAttribute("data-period");
    if (toRotate) {
      new txtType(elements[i], JSON.parse(toRotate), period);
    }
  }
  // INJECT CSS
  let css = document.createElement("style");
  css.type = "text/css";
  css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #3490dc}";
  document.body.appendChild(css);
};

</script>

<style lang="scss" scoped>
.content {
  width: 100%;
  height: 55vh;
  max-height: 55vh;
  background-image: url("https://wallpaperaccess.com/full/3434829.jpg");
  background-repeat: no-repeat;
  background-clip: border-box;
  background-size: cover;
}

// Jumbo-text

.typewriter-jumbo {
  float: left;
  margin-top: 10rem;
  margin-left: 12rem;
}

.home-title {
  font-size: 4em;
  text-shadow: 0.5px 0.5px #333;
}

.typewrite {
  color: #3490dc;
  font-size: 2em;
  margin-left: 7rem;
  text-shadow: 0.5px 0.5px #fff;
}

.tag {
  padding: 6px 8px;
  background-color: #19bab3;
  color: white;
}

.in_evidence {
  border: 2px solid #19bab3;
}
</style>