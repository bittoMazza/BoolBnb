<template>
  <header>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
      <div class="container">
        <a class="p-0 me-4" href="/">
          <img class="header_img ms-2" src="https://i.ibb.co/7b1zqYZ/Logo-sm.png" alt="BoolBnB"/>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav w-100 d-flex justify-content-end align-middle mt-2">
            <li class="nav-item fw-bold">
              <a href="/host" class="nav-link"> Gestisci i tuoi appartamenti </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
</template>

<script>
export default {
  name: "HeaderWeb",
};
</script>

<style lang="scss" scoped>
</style>