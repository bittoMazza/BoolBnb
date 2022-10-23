<template>
  <div>
    <div class="col-12">
      <div class="card px-0 shadow-sm">
        <router-link :to="'apartments/' + apartment.id">
          <img :src="apartment.images" alt="title" class="card-img-top" />
        </router-link>

        <div class="card-body card-body-cascade pb-0">
          <h5 class="card-title">
            <strong>
              <a href="#"> {{ apartment.title }} </a>
            </strong>
          </h5>
          <p class="fst-italic pb-1">{{ apartment.address }}</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "ApartmentCards",
  props: {
    apartment: Object,
  },
};
</script>

<style lang="scss" scoped>
</style>