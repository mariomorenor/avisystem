<template>
  <div>
      <div class="row">
          <div class="col">
              <div class="d-flex justify-content-center ">
                  <button :disabled="picture == 'feed'? true:false" @click="toggle_Feed_Temperature('feed')"
                      class="btn btnGrafico btn-success">Alimentación</button>
                  <button :disabled="picture == 'temp'? true:false" @click="toggle_Feed_Temperature('temp')"
                      class="btn btnGrafico btn-success ml-2">Temperatura</button>
              </div>
          </div>
          <div class="col">
                <button @click="toggle_production()" class="btn" :class="{'btn-primary': !productionActive, 'btn-danger': productionActive, }">
                    <div v-show="!productionActive">
                        <i class="fas fa-play-circle"></i>
                        <span>INICIAR</span>
                    </div>
                    <div v-show="productionActive">
                        <i class="fas fa-stop-circle"></i>
                        <span>DETENER</span>
                    </div>
                    </button>
          </div>
      </div>
      <div class="row">
          <div class="col-4">
              <div v-show="picture=='feed'" class="">
                  <div id="silo" class="silo-progressbar"></div>
              </div>
              <div v-show="picture=='temp'" class="">
                  <div id="termo" class="silo-progressbar"></div>
              </div>
          </div>
          <div class="col-8"></div>
      </div>
  </div>
</template>

<script>

        
export default {
    data() {
        return {
            picture: 'feed',
            productionActive: false,
        }
    },
    methods:{
        toggle_Feed_Temperature(option){
            this.picture = option === 'feed'?'feed':'temp';
            //  socket.emit('temperatura');
        },
        toggle_production(){
            if (this.productionActive) {
                            Swal.fire({
                icon: 'info',
                title: 'Está seguro de DETENER la producción?',
                showCancelButton: true,
            }).then((result)=> {
                if (result.value) {
                    this.productionActive = this.productionActive ? false:true;
                }
              })
            }else{

                this.productionActive = this.productionActive ? false:true;
            }
            
        }
    }
}
</script>

<style>

</style>