<template>
  <div>
    <div class="container">
      <div class="row bg-light">
        <div class="col">
          <h1 class="card-title my-4 fw-bold ms-4">
            <i class="bi bi-house me-1"></i> {{ apartment.title }}
          </h1>
          <h5 class="card-title my-4 fst-italic ms-4">
            <span class="fw-semibold">{{ apartment.address }}</span> -
            {{ apartment.lat }}, {{ apartment.long }}
          </h5>
        </div>
      </div>

      <div class="container mb-3">
        <div class="row">
          <div class="col d-flex">
            <img
              class="w-75 rounded-start"
              src="https://a0.muscache.com/im/pictures/monet/Luxury-660649704045467259/original/50434f11-d7bd-4986-a78a-fac692d0e062?im_w=1440"
              alt=""
            />

            <div class="col-4">
              <div class="upper-images">
                <img
                  class="w-75 rounded-end"
                  src="https://a0.muscache.com/im/pictures/monet/Luxury-660649704045467259/original/08155438-9751-401c-b0d7-fa31be950053?im_w=1440"
                  alt=""
                />
                <img
                  class="w-75"
                  src="https://a0.muscache.com/im/pictures/monet/Luxury-660649704045467259/original/d15bc9d6-7fed-44f4-8762-9a4c94658a50?im_w=1440"
                  alt=""
                />
              </div>

              <div class="bottom-images">
                <img
                  class="w-75"
                  src="https://a0.muscache.com/im/pictures/monet/Luxury-660649704045467259/original/f5787391-ca20-4a9e-a1b4-263914fc5612?im_w=1440"
                  alt=""
                />
                <img
                  class="w-75 rounded-end"
                  src="https://a0.muscache.com/im/pictures/monet/Luxury-660649704045467259/original/5971b9c9-172c-409e-8d8a-759023c48615?im_w=1440"
                  alt=""
                />
              </div>
            </div>
          </div>
        </div>

        <ul class="fs-5 list-group list-group-horizontal mt-4">
          <li class="list-group-item py-2 text-white">
            <i class="bi bi-house-door-fill me-2"></i> Stanze:
            {{ apartment.rooms }}
          </li>
          <li class="list-group-item py-2 text-white">
            <i class="bi bi-hdd-fill me-2"></i> Letti:
            {{ apartment.beds }}
          </li>
          <li class="list-group-item py-2 text-white">
            <i class="bi bi-door-closed-fill me-2"></i>Bagni:
            {{ apartment.bathrooms }}
          </li>
          <li class="list-group-item py-2 text-white">
            <i class="bi bi-fullscreen me-2"></i> Metri quadrati:
            {{ apartment.square_meters }}m²
          </li>
        </ul>
      </div>
      <div class="container">
        <div class="row">
          <div class="col">
            <hr style="width: 60%" />
            <br />
            <h3 class="fw-bold">
              <i class="bi bi-geo-alt claim-icons"></i>Ottima posizione
            </h3>
            <p>
              Il 100% degli ospiti ha valutato la posizione come:
              <strong>ottima</strong>.
            </p>
            <h3 class="fw-bold">
              <i class="bi bi-key claim-icons"></i>Ottima esperienza di check-in
            </h3>
            <p>
              Il 98% degli ospiti ha valutato l'eperienza di check-in come:
              <strong>ottima</strong>.
            </p>
            <h3 class="fw-bold">
              <i class="bi bi-house-heart claim-icons"></i>Animali domestici
            </h3>
            <p>Porta in vacanza con te i tuoi animali domestici.</p>
            <br />
          </div>
        </div>
      </div>
      <div class="container d-flex justify-content-between">
        <div class="row">
          <div class="col">
            <br />
            <h3 class="fw-bold">Cosa troverai:</h3>
            <ul>
              <li v-for="amenity in apartment.amenities" :key="amenity.id">
                {{ amenity.name }}
              </li>
            </ul>
            <br />
          </div>
        </div>
        <div class="row form-border me-4">
          <div class="col">
            <form>
              <div class="mb-3">
                <h3>Scrivi un messaggio al proprietario</h3>
                <label for="nome" class="form-label">Nome</label>
                <input
                  type="email"
                  class="form-control"
                  id="exampleInputEmail1"
                  aria-describedby="emailHelp"
                />
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"
                  >Indirizzo email</label
                >
                <input
                  type="email"
                  class="form-control"
                  id="exampleInputEmail1"
                  aria-describedby="emailHelp"
                />
              </div>
              <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label"
                  >Messaggio</label
                >
                <textarea
                  class="form-control"
                  id="exampleFormControlTextarea1"
                  rows="3"
                ></textarea>
              </div>

              <button type="submit" class="btn btn-blue text-white fw-bold">
                Invia
              </button>
            </form>
          </div>
        </div>
      </div>

      <div class="container">
        <br />
        <hr />
        <br />
        <div class="row">
          <div class="col">
            <h3 class="fw-bold">Dove ti troverai</h3>
            <h5>{{ apartment.address }}</h5>
            <h1 class="text-center">MAPPA</h1>
            <!-- <div id="map-div"></div> -->
          </div>
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
    getApartment(){
            const id = this.$route.params.id;
            /* Facciamo una chiamata al metodo show dell'api*/
            axios.get(`/api/apartments/${id}`,{
            }).then((response) => {
                console.log(response);
                this.apartment = response.data.results[0];
            }).catch((error) => {
                console.error(error);
            })
        }
  },
  mounted() {
    // let mapScriptCss = document.createElement("link");
    // mapScriptCss.src =
    //   "https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.20.0/maps/maps.css";
    // document.head.appendChild(mapScriptCss);

    // let mapScriptJS = document.createElement("script");
    // mapScriptJS.src =
    //   "https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.20.0/maps/maps-web.min.js";
    // document.head.appendChild(mapScriptJS);

    // let searchBoxCss = document.createElement("link");
    // searchBoxCss.src =
    //   "https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.3-public-preview.0/SearchBox.css";
    // document.head.appendChild(searchBoxCss);

    // let searchBox = document.createElement("script");
    // searchBox.src =
    //   "https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.3-public-preview.0/SearchBox-web.js";
    // document.head.appendChild(searchBox);

    // let servicesBox = document.createElement("script");
    // servicesBox.src =
    //   "https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.20.0/services/services-web.min.js";
    // document.head.appendChild(servicesBox);
  },
  created(){
   this.getApartment();
  }
};
</script>

<style lang="scss" scoped>
/* General Image Styling */
img {
  width: 100%;
  object-fit: cover;
  padding: 0.2rem;
}

.claim-icons {
  margin-right: 1rem;
  font-size: 1.3em;
  font-weight: bold;
}

p {
  font-size: 1.2em;
  margin-left: 3rem;
}

.list-group-item {
  background-color: #3066bd;
}

.form-border {
  border: 3px solid #19bab3;
  border-radius: 5px;
  padding: 1rem;
}

.btn-blue {
  background-color: #3066bd;
}

// Map style
#map-div {
  width: 90vw;
  height: 90vh;
}

#marker {
  background-image: url("https://cdn0.iconfinder.com/data/icons/small-n-flat/24/678111-map-marker-512.png");

  background-size: cover;

  width: 40px;

  height: 50px;
}
</style>