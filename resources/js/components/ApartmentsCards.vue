<template>
  <div class="card px-0 shadow-sm">
      <router-link  class="nav-link" :to="'/apartments/'+ apartment.slug" >
        <img v-if="getCover(apartment.images).includes('uploads')"
              class="card_img"
              :src="'/storage/'+getCover(apartment.images)"
              alt=""
            />
            <img v-else
              class="card_img"
              :src="getCover(apartment.images)"
              alt=""
            />
      </router-link>
      <div class="card-body card-body-cascade pb-0">
        <h5 class="card-title">
          <strong>
            <router-link :to="'/apartments/'+ apartment.slug" class="nav-link">{{ apartment.title }}</router-link>
          </strong>
        </h5>
        <p class="fst-italic pb-1">{{ apartment.address }}</p>
      </div>
  </div>
</template>

<script>
export default {
  name: "ApartmentCards",
  props: {
    apartment: Object,
  },
  methods:{
    getCover(images){
      for(let i=0;i<images.length;i++){
        if(images[i].is_cover == true){
          return images[i].image;
        }
      }
    },
  }
};
</script>

<style lang="scss" scoped>

.card_img{
  height: 200px;
  width: 100%;
}
</style>