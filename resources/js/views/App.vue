<template>
  <section>
    <HeaderWeb />
    <router-view></router-view>
  </section>
</template>

<script>
import HeaderWeb from "../components/HeaderWeb.vue";
import ApartmentShow from "../components/ApartmentShow.vue";
export default {
  components: {
    HeaderWeb,
    ApartmentShow,
  },
};
</script>

<style>
</style>