<template>
  <footer>
    <ul
      class="
        d-flex
        justify-content-center
        align-items-center
        text-white
        p-3
      "
    >
      <li><i class="bi bi-c-circle"></i>2022 Boolbnb, Inc</li>
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

<style>
footer {
  height: 60px;
  position: fixed;
  bottom: 0;
  width: 100%;
  background-color: #3490dc;
}

  li {
    padding-left: 1rem;
    font-size: 1.2rem;
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