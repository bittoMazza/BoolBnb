<template>
  <section>
    <HeaderWeb />

    <router-view>

    </router-view>
    
    <FooterWeb />
  </section>
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

<style lang="scss" scoped>

</style>