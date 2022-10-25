<template>
<div>
  <section>
    <HeaderWeb />

    <router-view></router-view>
    
  </section>
  <FooterWeb />
  </div>
</template>

<script>
import HeaderWeb from "../components/HeaderWeb.vue";
import FooterWeb from "../components/FooterWeb.vue";

export default {
  components: {
    HeaderWeb,
    FooterWeb,
  },
};
</script>

<style>

body {
  margin-bottom: 20rem;
}
</style>