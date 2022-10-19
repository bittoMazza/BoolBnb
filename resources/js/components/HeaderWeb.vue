<template>
  <header>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
      <div class="container">
        <a class="p-0 me-4" href="/">
          <img
            class="header_img"
            src="https://tinypic.host/images/2022/10/14/Logo_sm.png"
            alt="BoolBnB"
          />
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul
            class="navbar-nav w-100 d-flex justify-content-between align-middle"
          >
            <div class="d-flex">
              <li class="nav-item active fw-bold mt-2">
                <router-link class="nav-link" to="/"> Home </router-link>
              </li>
            </div>

            <div class="d-flex mt-2">
              <li class="nav-item fw-bold">
                <a href="/host" class="nav-link"> LOGIN </a>
              </li>
              <li class="nav-item fw-bold">
                <a href="/host" class="nav-link"> REGISTRATI </a>
              </li>
            </div>
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