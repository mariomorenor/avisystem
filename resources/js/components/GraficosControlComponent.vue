<template>
  <div>
            <div class="row my-1">
          <div class="d-flex mx-auto ">
              <button :disabled="picture == 'feed'? true:false" @click="toggle_Feed_Temperature('feed')" class="btn btnGrafico btn-success">Alimentación</button>
              <button :disabled="picture == 'temp'? true:false" @click="toggle_Feed_Temperature('temp')" class="btn btnGrafico btn-success ml-2">Temperatura</button>
          </div>
      </div>
      <div v-show="picture=='feed'" id="graficoAlimentacion" class="border-dark mx-auto">
          <div id="silo" class="silo-progressbar"></div>
      </div>
      <div v-show="picture=='temp'" id="graficoTemperatura" class="border-dark mx-auto">
          <div id="termo" class="silo-progressbar"></div>
      </div>
  </div>
</template>


<script>


export default {
    data() {
        return {
            picture: 'feed'
        }
    },
    methods:{
        toggle_Feed_Temperature(option){
            this.picture = option === 'feed'?'feed':'temp';
        }
    }
}
</script>

<style>

</style>