<template>
  <main class="container">
    <div class="row">
      <div class="col-12">
        <!-- Contenuto principale in home -->
        <div class="row content py-3">
          <!-- Typewriter text  -->
          <div class="col">
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
        </div>

        <!-- APPARTAMENTI IN EVIDENZA -->
        <div class="mt-2 mb-5 container">
          <h3 class="text-center fw-bold mb-3 text-white bg-primary">APPARTAMENTI IN EVIDENZA</h3>
          <div class="row g-4">
            <div class="col-12 col-md-6 col-lg-4 col-xl-3" v-for="apartment in sponsoredApartment" :key="apartment.id">
              <div v-if="apartment.isSponsored == true">
                  <ApartmentsCards :apartment="apartment" />
              </div>
            </div>
            <div class="fst-italic text-center">Appartamenti sponsorizzati dai proprietari in evidenza</div>
          </div>
        </div>
        <!-- APPARTAMENTI IN EVIDENZA -->

        <div class="fw-bold text-center fs-2 mb-1 ">
            <span class="text-primary">Cerca</span> un appartamento
        </div>
        <div class="fw-bold fst-italic text-center fs-5 mb-1">Per iniziare a cercare un appartamento inserisci l'indirizzo di dove vorresti alloggiare, <span class="text-primary">puoi anche aggiungere dei filtri alla tua ricerca!</span></div>

        <!-- Search bar -->
        <SearchBar @sendApartments="SearchedApartments" />

        <!-- Risultati di ricerca Appartamenti -->
        <div class="py-5 container">
          <fieldset class="border border-4 p-4 mb-5">
            <legend class="float-none w-auto px-3">
              <span class="brand-color-2"> RISULTATI DI RICERCA</span>
            </legend>
            <div v-if="apartments != ''" class="row g-4">
              <div class="col-12 col-md-6 col-lg-4 col-xl-3" v-for="apartment in apartments" :key="apartment.id">
                <ApartmentsCards :apartment="apartment" />
              </div>
            </div>

            <div v-else class="text-center fs-5 user_search_message">
              {{ userMessage }}
            </div>
          </fieldset>
          </div>
        </div>
      </div>
  </main>
</template>
<script>
import ApartmentsCards from "../components/ApartmentsCards.vue";
import SearchBar from "../pages/SearchBar.vue";
import axios from "axios";

export default {
  name: "HomePage",
  components: {
    ApartmentsCards,
    SearchBar,
  },
  data: function () {
    return {
      apartments: [],
      userMessage: "Qui vedrai gli appartamenti che rispettano i tuoi criteri di ricerca",
      sponsoredApartment: [],
    };
  },
  methods: {
    getCover(images) {
      for (let i = 0; i < images.length; i++) {
        if (images[i].is_cover == true) {
          return images[i].image;
        }
      }
    },
    SearchedApartments(a) {
      this.apartments = a.apartment;
      if (this.apartments == "") {
        this.userMessage =
          "OPS!! Non sono stati trovati appartamenti, prova con un altro indirizzo";
      }
    },
    ApartmentSponsored(){
      axios.get('http://127.0.0.1:8000/api/apartments/sponsor', {})
        .then((response) => {
          // console.log(response.data.results);
          this.sponsoredApartment = response.data.results;
          // console.log(this.sponsoredApartment);
        })
        .catch((error) => {
          console.log(error);
        });
    }
  },
  created() {
    this.ApartmentSponsored();
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

.margin-for-fixed{
  margin-top:20rem;
}
.content {
  // width: 100%;
  height: 55vh;
  max-height: 55vh;
  background-image: url("https://wallpaperaccess.com/full/3434829.jpg");
  background-repeat: no-repeat;
  background-clip: border-box;
  background-size: cover;
  background-position: center;
  clip-path: polygon(0 0, 100% 0%, 100% 90%, 0 90%, 0% 50%);
}

// Jumbo-text

.typewriter-jumbo {
  float: left;
  margin-top: 5rem;
  margin-left: 3rem;
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

// Fieldset border

.brand-color-2 {
  color: #19bab3;
}

fieldset {
  border-color: #19bab3 !important;
}

// SEARCHBAR \\
.ms_width{
  width: 90%;
}
// SEARCHBAR \\

// ! MEDIAQUERY ! \\
@media all and (min-width: 500px){
  .ms_width{
    width: 87%;
  }
}
// ! MEDIAQUERY ! \\
</style>