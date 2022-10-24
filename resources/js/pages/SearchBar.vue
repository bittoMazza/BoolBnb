<template>
  <section>
    <h3 class="fw-bold text-center mt-3 mb-0">
          <span class="text-primary">Cerca</span> un appartamento
        </h3>
        <nav class="navbar bg-light mb-4">
          
          <div class="container-fluid d-flex">
            <form class="d-flex w-100" role="search">
              <input @keyup="getFilteredApartment()" class="form-control me-2" type="search" placeholder="Inserisci il luogo in cui vuoi trovare l'appartamento" aria-label="Search" v-model="filter"/>
              <button class="btn btn-primary text-white" @click="getSomething()">
                Cerca
              </button>
            </form>
          </div>
        </nav>

        <!-- Advanced Search bar -->
        <div class="ms_search-box mb-4">
          <div class="row justify-content-around">
            <div class="text-center mb-4">
              <span class="fw-bold">Seleziona i servizi aggiuntivi che cerchi:</span>
            </div>
            <div class="col-1 form-check form-switch" v-for="amenity in amenities" :key="amenity.id">
                <input class="form-check-input" type="checkbox" :value="amenity.id" :name="amenity.name + '_check'" :id="amenity.name + '-check'" v-model="apartmentAmenities">
                <label class="form-check-label" :for="amenity.name + '-check'">{{ amenity.name }}</label>
            </div>
          </div>

          <div class="d-flex align-items-center text-center mt-4">
                <div class="col">
                  <label class="fw-bold" for="room-no">Numero camere</label>
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
                <label class="fw-bold" for="bed-no">Posti letto</label>
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
                <label class="fw-bold" for="room-no">Numero bagni</label>
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
                <label class="fw-bold" for="search-range">Raggio di ricerca</label>
                <div class="d-flex align-items-center justify-content-center">
                    <input type="range" name="search_range" id="search-range" default="20" min="10" max="1000" step="10" oninput="this.nextElementSibling.value = this.value" v-model="searchRange">
                    <output class="ms-1">20 </output> <span class="ms-1"> km</span>
                </div>
              </div>
          </div>
          
          <div class="d-flex justify-content-center p-3">
              <button class="btn btn-lt btn-primary text-white mx-2" @click="sendFiltersData()">Applica filtri</button>
          </div>
        </div>
  </section>
</template>

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
      amenities: [],
      bathNo: 0,
      roomNo: 0,
      bedNo: 0,
      squareMeters: 0,
      searchRange: 20,
      apartmentAmenities: [],
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
    },

    getAmenities() {
      axios.get("http://127.0.0.1:8000/api/amenities")
      .then((response) => {
          console.log(response.data.results);
          this.amenities = response.data.results;
      })
    },
  },
  created() {
    this.getAmenities();
  }
};
</script>

<style lang="scss" scoped>
.ms_search-box{
  border: solid 5px #3490dc;
  padding: 20px;
}
</style>