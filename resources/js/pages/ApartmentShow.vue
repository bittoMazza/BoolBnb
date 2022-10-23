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

      <div v-for="image in images" :key="image.id">
        <img :src="image" alt="" />
      </div>

      <ul class="fs-5 list-group list-group-horizontal">
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
      </ul>
    </div>
    <div class="container">
      <div class="row">
        <div class="col">
          <hr />
          <br />
          <h4 class="fw-bold">
            <i class="bi bi-geo-alt claim-icons"></i>Ottima posizione
          </h4>
          <p>
            Il 100% degli ospiti ha valutato la posizione come:
            <strong>ottima</strong>.
          </p>
          <h4 class="fw-bold">
            <i class="bi bi-key claim-icons"></i>Ottima esperienza di check-in
          </h4>
          <p>
            Il 98% degli ospiti ha valutato l'eperienza di check-in come:
            <strong>ottima</strong>.
          </p>
          <h4 class="fw-bold">
            <i class="bi bi-house-heart claim-icons"></i>Animali domestici
          </h4>
          <p>Porta in vacanza con te i tuoi animali domestici.</p>
          <br />
          <hr />
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col">
          <br />
          <h3 class="fw-bold">Cosa troverai:</h3>
          <ul>
            <li>Servizi</li>
            <li>Servizi</li>
            <li>Servizi</li>
            <li>Servizi</li>
          </ul>
          <br />
        </div>
      </div>
      <hr />
    </div>

    <div class="container">
      <div class="row">
        <div class="col">
          <h3 class="fw-bold">Dove ti troverai</h3>
          <h5>{{ apartment.address }}</h5>
          <h1 class="text-center">MAPPA</h1>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      apartment: {},
    };
  },
  methods: {
    getApartment() {
      const id = this.$route.params.id;
      axios.get(`/api/apartments/${id}`).then((response) => {
        this.apartment = response.data.results.data;
      });
    },
  },
  mounted() {
    this.getApartment();
  },
};
</script>

<style lang="scss" scoped>
.claim-icons {
  margin-right: 1rem;
  font-size: 1.3em;
  font-weight: bold;
}
p {
  margin-left: 2.8rem;
}
</style>