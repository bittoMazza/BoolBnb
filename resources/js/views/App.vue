<template>
  <section>
    <HeaderWeb />

    <router-view> </router-view>

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
  // mounted() {
  //   let mapScriptCss = document.createElement("link");
  //   mapScriptCss.src =
  //     "https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.20.0/maps/maps.css";
  //   document.head.appendChild(mapScriptCss);

  //   let mapScriptJS = document.createElement("script");
  //   mapScriptJS.src =
  //     "https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.20.0/maps/maps-web.min.js";
  //   document.head.appendChild(mapScriptJS);

  //   let searchBoxCss = document.createElement("link");
  //   searchBoxCss.src =
  //     "https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.3-public-preview.0/SearchBox.css";
  //   document.head.appendChild(searchBoxCss);

  //   let searchBox = document.createElement("script");
  //   searchBox.src =
  //     "https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.3-public-preview.0/SearchBox-web.js";
  //   document.head.appendChild(searchBox);

  //   let servicesBox = document.createElement("script");
  //   servicesBox.src =
  //     "https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.20.0/services/services-web.min.js";
  //   document.head.appendChild(servicesBox);
  // },
};
</script>

<style lang="scss" scoped>
</style>