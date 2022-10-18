<template>
  <main class="container">
    <div class="row">
      <div class="col-12">

        <!-- Contenuto principale in home -->
        <div class="content py-3">
          <h2 class="fw-bold text-center py-3">
            <span>Scopri una casa </span><span class="text-primary">dove amerai vivere</span>
          </h2>

          <img src="https://img2.goodfon.com/wallpaper/nbig/f/a8/interer-stil-dizayn-5853.jpg" alt="jumbo" />
        </div>

        <!-- Search bar avanzata -->
        <h3 class="fw-bold text-center mt-3 mb-1"><span class="text-primary">Cerca</span> un appartamento</h3>
        <nav class="navbar bg-light mb-4">
          <div class="container-fluid">
            <form class="d-flex w-100" role="search">
              <input class="form-control me-2" type="search" placeholder="Inserisci il luogo in cui vuoi trovare l'appartamento" aria-label="Search">
              <button class="btn btn-primary text-white" type="submit">Cerca</button>
            </form>
          </div>
        </nav>

        <!-- Appartamenti in evidenza -->
        <div class="py-4 container">
          <div class="text-center mb-4">
            <span class="tag fs-5">IN EVIDENZA</span>
          </div>

          <div class="in_evidence p-5 row justify-content-between">
            
            <!-- CARD -->
            <div class="col me-5 card mb-2 px-0 shadow-sm">
              <a href="">
                <img src="https://www.italiapartment.com/images/camere-home/ok_FRI5524_00025.jpg" alt="title" class="card-img-top" />
              </a>
              <div class="card-body card-body-cascade pb-0">
                  <h5 class="card-title"><strong>
                      <a href="#">
                          Titolo Appartamento                                                       
                      </a>
                  </strong></h5>
                  <p class="fst-italic pb-1">Indirizzo</p>
              </div>
            </div>

            <div class="col me-5 card mb-2 px-0 shadow-sm">
              <a href="">
                <img src="https://www.italiapartment.com/images/camere-home/ok_FRI5524_00025.jpg" alt="title" class="card-img-top" />
              </a>
              <div class="card-body card-body-cascade pb-0">
                  <h5 class="card-title"><strong>
                      <a href="#">
                          Titolo Appartamento                                                       
                      </a>
                  </strong></h5>
                  <p class="fst-italic pb-1">Indirizzo</p>
              </div>
            </div>

            <div class="col me-5 card mb-2 px-0 shadow-sm">
              <a href="">
                <img src="https://www.italiapartment.com/images/camere-home/ok_FRI5524_00025.jpg" alt="title" class="card-img-top" />
              </a>
              <div class="card-body card-body-cascade pb-0">
                  <h5 class="card-title"><strong>
                      <a href="#">
                          Titolo Appartamento                                                       
                      </a>
                  </strong></h5>
                  <p class="fst-italic pb-1">Indirizzo</p>
              </div>
            </div>

            <div class="col me-5 card mb-2 px-0 shadow-sm">
              <a href="">
                <img src="https://www.italiapartment.com/images/camere-home/ok_FRI5524_00025.jpg" alt="title" class="card-img-top" />
              </a>
              <div class="card-body card-body-cascade pb-0">
                  <h5 class="card-title"><strong>
                      <a href="#">
                          Titolo Appartamento                                                       
                      </a>
                  </strong></h5>
                  <p class="fst-italic pb-1">Indirizzo</p>
              </div>
            </div>

          </div>

        </div>
      </div>
    </div>
  </main>
</template>

<script>
export default {
  name: "HomePage",
  components: {},
};
</script>

<style lang="scss" scoped>
.content {
  img {
    height: 500px;
    width: 100%;
    object-fit: cover;
  }
}

.tag{
  padding: 6px 8px;
  background-color: #19bab3;
  color: white;
}

.in_evidence{
  border: 2px solid #19bab3;
}

</style>