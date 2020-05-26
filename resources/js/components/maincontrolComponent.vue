<template>
  <div>
      <div class="row pt-3">
          <!-- <div class="col">
              <div class="d-flex justify-content-center ">
                  <button :disabled="picture == 'feed'? true:false" @click="toggle_Feed_Temperature('feed')"
                      class="btn btnGrafico btn-success">Alimentación</button>
                  <button :disabled="picture == 'temp'? true:false" @click="toggle_Feed_Temperature('temp')"
                      class="btn btnGrafico btn-success ml-2">Temperatura</button>
              </div>
          </div> -->
          <div class="col">
              <button @click="toggle_production()" class="btn"
                  :class="{'btn-primary': !productionActive, 'btn-danger': productionActive, }">
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
          <div class="col-4 px-0">
              <div class="">
                  <div id="silo" class="silo-progressbar"></div>
              </div>
          </div>
          <div class="col-5 px-0">
              <div class="row">
                  <div class="col">
                      <div class="form-group">
                          <label>Cantidad del Comedero: </label>
                          <div class="d-flex">
                              <input type="text" v-model="lote.control.quantity_feeder" class="form-control" readonly>
                              <label class="my-auto ml-2">Kg.</label>
                          </div>
                      </div>
                  </div>
                  <div class="col">
                      <div class="form-group">
                          <label>Cantidad minima Comedero: </label>
                          <div class="d-flex">
                              <input type="text" v-model="lote.control.min_quantity_feeder" class="form-control"
                                  readonly>
                              <label class="my-auto ml-2">Kg.</label>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col">
                      <div class="form-group">
                          <label>Cantidad del Silo: </label>
                          <div class="d-flex">
                              <input type="text" v-model="lote.control.quantity_Silo" class="form-control" readonly>
                              <label class="my-auto ml-2">Kg.</label>
                          </div>
                      </div>
                  </div>
                  <div class="col">
                      <div class="form-group">
                          <label>Cantidad min. Silo: </label>
                          <div class="d-flex">
                              <input type="text" v-model="lote.control.min_quantity_Silo" class="form-control" readonly>
                              <label class="my-auto ml-2">Kg.</label>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col">

                      <div class="form-group">
                          <label>Temperatura Máxima: </label>
                          <div class="d-flex">
                              <input type="text" v-model="lote.control.max_temp" class="form-control" readonly>
                              <label class="my-auto ml-2">ºC</label>
                          </div>
                      </div>
                  </div>
                  <div class="col">

                      <div class="form-group">
                          <label>Temperatura Mínima: </label>
                          <div class="d-flex">
                              <input type="text" v-model="lote.control.min_temp" class="form-control" readonly>
                              <label class="my-auto ml-2">ºC</label>
                          </div>
                      </div>
                  </div>
              </div>

              <div class="form-group">
                  <button data-toggle="modal" data-target="#modal_lossesConfig" data-backdrop="false"
                      class="btn btn-primary btn-block shadow">Agregar Unidades Perdidas</button>
              </div>

          </div>
          <div class="col-3 px-0">
              <div class="ml-auto">
                  <div id="termo" class="silo-progressbar"></div>
              </div>
          </div>
      </div>
  </div>
</template>

<script>

        
export default {
    data() {
        return {
            picture: 'feed',
            productionActive: false,
            date: '',
           
        }
    },
    props: ['lote'],
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
            
        },
        addLosses(){
            
        }
    },
    mounted () {
        this.date = moment().format('LL');
        
    },
}
</script>

<style>

</style>