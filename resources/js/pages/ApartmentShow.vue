<template>
  <div>
    
  </div>
</template>

<script>
export default {
  name: "ApartmentShow",
  components: {
  },

  data: function () {
    return {
      apartments: [],
    };
  },

  methods: {
    getApartments() {
      const id = this.$route.params.id;
      axios
        .get(`/api/aartmentss/${id}`)
        .then((response) => {
          console.log(response.data.results);
          this.apartments = response.data.results;
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
  created() {
    this.getApartments();
  },
};
</script>

<style>

</style>