<script>
import InicioLayout from '@/Layouts/InicioLayout.vue';
import { Head, router } from '@inertiajs/vue3';


export default {
  components: {
    InicioLayout,
    Head,
    router
  },
  data(){
    return{
        form:{
            nombre: null,
            ap_paterno: null,
            ap_materno: null
        }
    }
  },
  methods: {
    evguardar(){
        router.post('/personas/create', this.form)
    }
  }, 
  mounted() {
    (() => {
     // 'use strict';
      const forms = document.querySelectorAll('.needs-validation');

      Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
          if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    })();
}
}
</script>

<template>
    <InicioLayout>
        <Head title="Create"/>
        <form class="row g-3 needs-validation" novalidate onsubmit="return false">
        <div class="row mb-2">

            <label for="nombre" class="col-3 col-form-label">Nombre</label>
            <div class="col-6">
                <input type="text" class="form-control" id="nombre" placeholder="Juan" v-model="form.nombre" required minlength="3" maxlength="30" pattern="[A-Za-z]+">
                <div class="invalid-feedback">
                    El nombre es obligatorio y debe tener entre 3 y 30 caracteres
                </div>
            </div>
        </div>
        <div class="row mb-2">
            <label for="ap_paterno" class="col-3 col-form-label">Apellido Paterno</label>
            <div class="col-6">
                <input type="text" class="form-control" id="ap_paterno" placeholder="Perez" v-model="form.ap_paterno" required minlength="4" maxlength="50" pattern="[A-Za-z]+">
                <div class="invalid-feedback">
                    El apellido paterno es obligatorio y debe tener entre 4 y 30 caracteres
                </div>            
            </div>
        </div>
        <div class="row mb-2">
            <label for="ap_materno" class="col-3 col-form-label">Apellido Materno</label>
            <div class="col-6">
                <input type="text" class="form-control" id="ap_materno" placeholder="Chavez" v-model="form.ap_materno" required minlength="4" maxlength="50" pattern="[A-Za-z]+">
                <div class="invalid-feedback">
                    El apellido materno es obligatorio y debe tener entre 4 y 30 caracteres
                </div>            
            </div>
        </div>
        <div class="row">
            <div class="col text-center" style="margin-top: 2em;">
                <button class="btn btn-success" @click="evguardar">Crear persona</button>
            </div>
        </div>
        </form>
    </InicioLayout>
</template>