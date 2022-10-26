<template>
  <section>
    <!-- Advanced Search bar -->
    <fieldset class="border border-4 p-3 mt-5">
      <legend class="float-none w-auto px-3">
        <span class="brand-color-2"> APPLICA FILTRO DI RICERCA</span>
      </legend>
      <div class="row g-4 align-items-center text-center py-3">
        <div class="col-12 col-md-6 col-lg-4">
          <label class="fw-bold" for="room-no">Numero di camere</label>
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

        <div class="col-12 col-md-6 col-lg-4">
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

        <div class="col-12 col-lg-4">
          <label class="fw-bold" for="search-range">Raggio di ricerca</label>
          <div class="d-flex align-items-center justify-content-center">
            <input
              type="range"
              name="search_range"
              id="search-range"
              default="20"
              min="10"
              max="1000"
              step="10"
              oninput="this.nextElementSibling.value = this.value"
              v-model="searchRange"
            />
            <span class="ms-1">{{ this.searchRange }}</span>
            <span class="ms-1"> km</span>
          </div>
        </div>
      </div>
      <div class="d-flex justify-content-center p-3">
        <button
          class="btn btn-lt btn-primary text-white mx-2"
          @click="resetFilters()"
        >
          Cancella filtri
        </button>
      </div>
    </fieldset>

    <h3 class="fw-bold text-center mt-3 mb-0">
      <span class="text-primary">Cerca</span> un appartamento
    </h3>
    <nav class="navbar bg-light mb-4">
      <div class="container-fluid">
        <div class="d-flex w-100" role="search">
          <input
            @keyup="getFilteredApartment()"
            class="form-control me-2"
            type="search"
            placeholder="Inserisci il luogo in cui vuoi trovare l'appartamento"
            aria-label="Search"
            v-model="filter"
          />
          <div v-if="filter != ''">
            <button
              class="btn btn-primary text-white"
              @click="$emit('sendApartments', getSomething())"
            >
              Cerca
            </button>
          </div>
          <div v-else>
            <button class="btn btn-primary text-white" disabled>Cerca</button>
          </div>
        </div>
        <ul id="addresses" class="addresses_container">
          <li
            role="button"
            @click="setCurrentAddress(address)"
            v-for="(address, index) in searchedAddresses"
            :key="index"
            class="
              list-group-item
              py-1
              px-2
              my-1
              list-group-item-action
              searched_address
            "
          >
            {{
              address.address.freeformAddress +
              ", " +
              address.address.countrySubdivision
            }}
          </li>
        </ul>
      </div>
    </nav>
  </section>
</template>

<script>
import axios from "axios";
export default {
  name: "HomePage",
  components: {},
  data: function () {
    return {
      apartments: [],
      filter: "",
      long: "",
      lat: "",
      searchedCoordinates: {},
      searchedAddresses: [],
      amenities: [],
      roomNo: 0,
      bedNo: 0,
      searchRange: 20,
    };
  },
  methods: {
    getFilteredApartment() {
      axios
        .get(
          `https://api.tomtom.com/search/2/search/${this.filter}.json?key=Y3utdtjiBc6ObgcZs8bNzOGza3HV7trG&countrySet=IT&typeahead=true&limit=5`
        )
        .then((response) => {
          console.log(response);
          this.searchedAddresses = "";
          this.searchedAddresses = response.data.results;
          this.lat = this.searchedAddresses[0].position.lat;
          this.long = this.searchedAddresses[0].position.lon;
        })
        .catch((error) => {
          console.warn(error);
        });
    },
    setCurrentAddress(a) {
      this.lat = a.position.lat;
      this.long = a.position.lon;
      this.filter =
        a.address.freeformAddress + ", " + a.address.countrySubdivision;
      this.searchedAddresses = "";
    },
    getSomething() {
      this.apartments = "";
      this.searchedAddresses = "";
      axios
        .get("/api/apartments", {
          params: {
            lat: this.lat,
            long: this.long,
            radius: this.searchRange,
            rooms: this.roomNo,
            beds: this.bedNo,
          },
        })
        .then((response) => {
          this.apartments = response.data.results;
          console.log(this.apartments);
          this.$emit("sendApartments", {
            apartment: this.apartments,
          });
        })
        .catch((error) => {
          console.log(error);
        });
    },

    getAmenities() {
      axios.get("http://127.0.0.1:8000/api/amenities").then((response) => {
        this.amenities = response.data.results;
      });
    },
    resetFilters() {
      this.roomNo = 0;
      this.bedNo = 0;
      this.searchRange = 20;
    },
  },
  created() {
    this.getAmenities();
  },
};
</script>

<style lang="scss" scoped>
.ms_search-box {
  padding: 20px;
}

// Fieldset border

.brand-color-2 {
  color: #3490dc;
}

fieldset {
  border-color: #3490dc !important;
}
</style>