<template>
  <div>
    <div class="container">
      <div class="row bg-light">
        <div class="col-12">
          <h1 class="card-title my-4 fw-bold">
            <i class="bi bi-house me-1"></i> {{ apartment.title }}
          </h1>
          <h5 class="card-title my-4 fst-italic">
            Indirizzo:
            <span class="fw-semibold">{{ apartment.address }}</span> -
            {{ apartment.lat }}, {{ apartment.long }}
          </h5>
        </div>
      </div>
      <div><img :src="apartment.images" alt="apartment.title" /></div>
      <h3 class="fw-bold">Cosa troverai:</h3>
      <ul class="fs-5">
        <li class="list-group-item py-2">
          <i class="bi bi-house-door-fill me-2"></i> Stanze:
          {{ apartment.rooms }}
        </li>
        <li class="list-group-item py-2">
          <i class="bi bi-hdd-fill me-2"></i> Letti: {{ apartment.beds }}
        </li>
        <li class="list-group-item py-2">
          <i class="bi bi-door-closed-fill me-2"></i> Bagni:
          {{ apartment.bathrooms }}
        </li>
        <li class="list-group-item py-2">
          <i class="bi bi-fullscreen me-2"></i> Metri quadrati:
          {{ apartment.square_meters }}m²
        </li>
        <li class="list-group-item py-2">
          <i class="bi bi-info-square-fill me-2"></i> Servizi :
        </li>
        <li>
          <ul
            v-for="apartment in amenity.apartments"
            :key="apartment.id"
            :apartment="apartment"
          >
            <li class="list-group-item py-1">
              {{ amenity.name }}
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      apartment: {},
      amenity: {},
    };
  },
  methods: {
    getApartment() {
      axios
        .get("/api/apartments/" + this.$route.params.id)
        .then((response) => {
          this.apartment = response.data.results.data;
        });
    },
  },
  mounted() {
    this.getApartment();
   
  },
};

</script>

<style>
</style>