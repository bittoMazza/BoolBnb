<template>
  <section>
    <HeaderWeb />
    <router-view></router-view>
  </section>
</template>

<script>
import HeaderWeb from "../components/HeaderWeb.vue";
export default {
  components: {
    HeaderWeb,
  },
};
</script>

<style>
</style>