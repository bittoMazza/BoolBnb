<template>
  <footer>
    <ul class=" d-flex justify-content-center align-items-center text-white pt-3 m-0">
      <li><i class="bi bi-c-circle"></i><a href="https://github.com/bittoMazza/BoolBnb" class="text-decoration-none text-white">2022 Boolbnb, Inc</a></li>
      <i class="bi bi-circle-fill"></i>
      <li>Privacy</li>
      <i class="bi bi-circle-fill"></i>
      <li>Termini</li>
      <i class="bi bi-circle-fill"></i>
      <li>Mappa del sito</li>
    </ul>
  </footer>
</template>

<script>
export default {};
</script>

<style lang="scss" scoped>
footer {
  height: 60px;
  width: 100%;
  background-color: #3066bd;
}

  li {
    padding-left: 1rem;
    cursor: pointer;
  }


.bi-circle-fill {
  color: white;
  font-size: 0.2em;
  padding-left: 1rem;
}

.bi-c-circle {
  font-size: 0.8em;
  margin-right: 0.3rem;
}
</style>