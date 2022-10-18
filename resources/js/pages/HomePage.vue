<template>
  <main class="container">
    <div class="row">
      <div class="col-12">
        <!-- Contenuto principale in home -->
        <div class="content py-3">
          <h2 class="fw-bold text-center py-3">
            <span>Scopri un appartamento </span><span class="text-primary">dove amerai vivere</span>
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

.advanced {
  text-decoration: none;
  font-size: 15px;
  font-weight: 500;
}

.btn-secondary,
.btn-secondary:focus,
.btn-secondary:active {
  color: #fff;
  background-color: #00838f !important;
  border-color: #00838f !important;
  box-shadow: none;
}

.advanced {
  color: #00838f !important;
}

.form-control:focus {
  box-shadow: none;
  border: 1px solid #00838f;
}
</style>