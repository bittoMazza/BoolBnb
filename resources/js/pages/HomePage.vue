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

        <!-- Search bar -->
        <SearchBar @sendApartments="SearchedApartments" />

        <!-- Appartamenti in evidenza -->
        <div class="py-4 container">
          <fieldset class="border border-4 p-3">
            <legend class="float-none w-auto px-3">
              <span class="brand-color-2"> RISULTATI DI RICERCA</span>
            </legend>
            <div v-if="apartments != ''" class="row row-cols-4 gx-4">
              <div
                class="col"
                v-for="apartment in apartments"
                :key="apartment.id"
              >
                <ApartmentsCards :apartment="apartment" />
              </div>
            </div>
            <!-- FINE CARD DUPLICATE -->
            <div v-else class="text-center fs-4 user_search_message">
              {{ userMessage }}
            </div>
          </fieldset>
          </div>
        </div>

        <!-- Lista Appartamenti -->
        <div class="p-4 container">
          <div class="text-center mb-4">
            <h4 class="fw-bold">APPARTAMENTI</h4>
          </div>

          <div class="p-5 row row-cols-4 gx-4">
            <!-- CARD -->
            <div class="col-md-4 col-sm-6 mb-4">
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
            <div class="col-md-4 col-sm-6 mb-4">
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

            <div class="col-md-4 col-sm-6 mb-4">
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

            <div class="col-md-4 col-sm-6 mb-4">
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

            <div class="col-md-4 col-sm-6 mb-4">
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

            <div class="col-md-4 col-sm-6 mb-4">
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

            <div class="col-md-4 col-sm-6 mb-4">
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

            <div class="col-md-4 col-sm-6 mb-4">
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
  </main>
</template>
<script>
import ApartmentsCards from "../components/ApartmentsCards.vue";
import SearchBar from "../pages/SearchBar.vue";

export default {
  name: "HomePage",
  components: {
    ApartmentsCards,
    SearchBar,
  },
  data: function () {
    return {
      apartments: [],
      userMessage: "Qui vedrai gli appartmenti che rispettano i tuoi criteri",
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
          "OPS!! Non sono stati trovati appartamenti , prova con un altro indirizzo";
      }
    },
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

.margin-for-fixed{
  margin-top:20rem;
}
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