<script>
import InicioLayout from '@/Layouts/InicioLayout.vue';
import { Head, router } from '@inertiajs/vue3';

export default {
    components: {
    InicioLayout,
    Head,
    router

  }, props:{
    persona : Array,
    errors: {
        type: Object,
        require: false
    }
  },
  methods:{
    evactualizar(){		
        router.put('/personas/update', this.form)		
    }
  },
  data(){
    return{
        form:{
            nombre: this.persona.nombre,
            ap_paterno: this.persona.ap_paterno,
            ap_materno: this.persona.ap_materno,
            id: this.persona.id
        }
    }
  },
  mounted() {
    (() => {
      'use strict';
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
        <Head title="Update"/>
        <form class="row g-3 needs-validation" novalidate onsubmit="return false">
        <div class="row mb-2">
            <label for="nombre" class="col-3 col-form-label">Nombre</label>
            <div class="col-6">
                <input type="hidden" class="form-control" v-model="form.id">
                <input type="text" class="form-control" v-model="form.nombre" required minlength="3" maxlength="30" pattern="[A-Za-z]+">
                <div v-if="errors.nombre" class="invalid-feedback">
                    {{ errors.nombre }}
                </div>            
            </div>
        </div>
        <div class="row mb-2">
            <label for="ap_paterno" class="col-3 col-form-label">Apellido Paterno</label>
            <div class="col-6">
                <input type="text" class="form-control" v-model="form.ap_paterno" required minlength="4" maxlength="50" pattern="[A-Za-z]+">
                <div v-if="errors.ap_paterno" class="invalid-feedback">
                    {{ errors.ap_paterno }}
                </div>             
            </div>
        </div>
        <div class="row mb-2">
            <label for="ap_materno" class="col-3 col-form-label">Apellido Materno</label>
            <div class="col-6">
                <input type="text" class="form-control" v-model="form.ap_materno" required minlength="4" maxlength="50" pattern="[A-Za-z]+">
                <div v-if="errors.ap_materno" class="invalid-feedback">
                    {{ errors.ap_materno }}
                </div>             
            </div>
        </div>
        <div class="row">
            <div class="col text-center" style="margin-top: 2em;">
                <button class="btn btn-success" @click="evactualizar">Actualizar persona</button>
            </div>
        </div>
        </form>
    </InicioLayout>
</template>