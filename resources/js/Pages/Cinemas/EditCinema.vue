<script>
import MoviesLayout from '@/Layouts/MoviesLayout.vue';
import { Head, router } from '@inertiajs/vue3';

export default {
    components: {
    MoviesLayout,
    Head,
    router

  }, props:{
    cinema : {
        type: Object,
        require: true
    },
    errors: {
        type: Object,
        require: false
    }
  },
  methods:{
    evactualizar(){		
        router.put('/cinemas/update', this.form)		
    }
  },
  data(){
    return{
        form:{
            id: this.cinema.id,
            name: this.cinema.name,
            address: this.cinema.address,
            city: this.cinema.city,
            phone : this.cinema.phone,
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
    <MoviesLayout>
        <Head title="Update"/>
        <form class="row g needs-validation" novalidate @submit.prevent="evactualizar">
        <div class="row mb-2">
            <label for="name" class="col-3 col-form-label">Name</label>
            <div class="col-6">
                <input type="hidden" class="form-control" v-model="form.id">
                <input type="text" class="form-control" id="title" placeholder="Cinepolis Galerias" v-model="form.name" minlength="10" maxlength="50" required >
                <div v-if="errors.name" class="invalid-feedback">
                    {{ errors.name }}
                </div>            
            </div>
        </div>
        <div class="row mb-2">
            <label for="address" class="col-3 col-form-label">Address</label>
            <div class="col-6">
                <textarea type="text" class="form-control" id="address" placeholder="Periférico Raúl López Sánchez 6000, Residencial el Fresno, 27018" v-model="form.address" minlength="20" maxlength="150" required > </textarea>
                <div v-if="errors.address" class="invalid-feedback">
                    {{ errors.address }}
                </div>            
            </div>
        </div>
        <div class="row mb-2">
            <label for="city" class="col-3 col-form-label">City</label>
            <div class="col-6">
                <input type="text" class="form-control" id="city" placeholder="Torreón" v-model="form.city" minlength="5" maxlength="50" required >
                <div v-if="errors.city" class="invalid-feedback">
                    {{ errors.city }}
                </div>            
            </div>
        </div>
        <div class="row mb-2">
            <label for="phone" class="col-3 col-form-label">Phone</label>
            <div class="col-6">
                <input type="text" class="form-control" id="phone" placeholder="8715261156" v-model="form.phone" pattern="^\d+$"  minlength="10" maxlength="10" required >
                <div v-if="errors.phone" class="invalid-feedback">
                    {{ errors.phone }}
                </div>            
            </div>
        </div>
        <div class="row">
            <div class="col text-center" style="margin-top: 2em;">
                <button class="btn btn-success">Update cinema</button>
            </div>
        </div>
        </form>
    </MoviesLayout>
</template>