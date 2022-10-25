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
              :src="getMainImage(apartment.images)"
              alt=""
            />

            <div class="col-4">
              <div v-for="images in apartment.images" :key="images.id">
                
                <img v-if="images.is_cover == false"
                  class="w-75 rounded-end"
                  :src="images.image"
                  alt=""
                />
                <div v-else>

                </div>
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
                  type="text"
                  class="form-control"
                  v-model="name"
                  required
                />
              </div>
              <div class="mb-3">
                <label class="form-label"
                  >Cognome</label
                >
                <input
                  type="text"
                  v-model = "surname"
                  class="form-control"
                  required
                  />
              </div>
              <div class="mb-3">
                <label class="form-label"
                  >Indirizzo email</label
                >
                <input
                  type="email"
                  v-model = "email"
                  class="form-control"
                  required
                />
              </div>
              <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label"
                  >Messaggio</label
                >
                <textarea type="text" class="form-control" rows="3" id="exampleFormControlTextarea1" v-model="content" required>
                </textarea>
              </div>

              <button type="submit" @click="sendMessage(apartment.id)" class="btn btn-blue text-white fw-bold">
                Invia
              </button>

              <h6 class="text-center fw-bold form-message">{{ messageForm }}</h6>
            </form>
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
      apartment:{},
      secondaryImages:[],
      name :'',
      surname:'',
      email:'',
      content:'',
      messageForm:'',
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
        },
    sendMessage(id){
      event.preventDefault();
      axios.post(`/api/messages?apartment_id=${id}&name=${this.name}&surname=${this.surname}&email=${this.email}&content=${this.content}`)
      .then((response) => {
        this.name = "";
        this.surname = "";
        this.email = "";
        this.content = "";
        this.messageForm = "Messaggio inviato correttamente!"
      }).catch((error) => {
        console.log(error);
      })
    },
    getMainImage(images){
      let cover;
      images.forEach(image => {
        if(image.is_cover == true){
          cover = image.image;
        }
      }
      )
      return cover; 
    },    
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

.form-message{
  color:#19bab3;
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