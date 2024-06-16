<script>
import MoviesLayout from '@/Layouts/MoviesLayout.vue';
import { Head, router } from '@inertiajs/vue3';


export default {
  components: {
    MoviesLayout,
    Head,
    router
  },
  props:{
    errors: {
        type: Object,
        require: false
    }
  },
  data(){
    return{
        form:{
            name: null,
            capacity: null,
            cinema_id: null,
        },
        cinemas : []
    }
  },
  methods: {
    evguardar(){
        router.post('/rooms/create', this.form)
    },
    loadCinemas() {
        let self = this;
        window.axios.get('/cinemas/prueba')
        .then((response) => {
          self.cinemas = response.data.cinemas;
        })
        .catch(error => {
          console.error("Hubo un error", error);
        });
    }
  }, 
  mounted() {
    this.loadCinemas(); 
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
    <MoviesLayout>
        <Head title="Create"/>
        <form class="row g-3 needs-validation" novalidate  @submit.prevent="evguardar">
        <div class="row mb-2">
            <label for="name" class="col-3 col-form-label">Name</label>
            <div class="col-6">
                <input type="text" class="form-control" id="title" placeholder="Room 1" v-model="form.name" minlength="4" maxlength="50" required >
                <div v-if="errors.name" class="invalid-feedback">
                    {{ errors.name }}
                </div>
            </div>
        </div>
        <div class="row mb-2">
            <label for="capacity" class="col-3 col-form-label">Capacity</label>
            <div class="col-6">
                <input type="number" class="form-control" id="capacity" placeholder="50" v-model="form.capacity" pattern="^\d+$" min="50" max="250" required >
                <div v-if="errors.capacity" class="invalid-feedback">
                    {{ errors.capacity }}
                </div>            
            </div>
        </div>
        <div class="row mb-2">
        <label for="cinema" class="col-3 col-form-label">Cinema</label>
        <div class="col-6">
          <select class="form-select" aria-label="Default select example" v-model="form.cinema_id" id="classification" required>
            <option v-for="cinema in cinemas" :key="cinema.id" :value="cinema.id">
              {{ cinema.name }}
            </option>
          </select>
          <div v-if="errors.cinema_id" class="invalid-feedback">
            {{ errors.cinema_id }}
          </div>
        </div>
      </div>
        <div class="row">
            <div class="col text-center" style="margin-top: 2em;">
                <button class="btn btn-success">Create room</button>
            </div>
        </div>
        </form>
    </MoviesLayout>
</template>