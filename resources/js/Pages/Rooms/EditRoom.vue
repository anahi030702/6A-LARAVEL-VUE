<script>
import MoviesLayout from '@/Layouts/MoviesLayout.vue';
import { Head, router } from '@inertiajs/vue3';

export default {
    components: {
    MoviesLayout,
    Head,
    router

  }, props:{
    room : Array,
    errors: {
        type: Object,
        require: false
    }
  },
  methods:{
    evactualizar(){		
        router.put('/rooms/update', this.form)		
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
  data(){
    return{
        form:{
            id: this.room.id,
            name: this.room.name,
            capacity: this.room.capacity,
            cinema_id: this.room.cinema_id
        },
        cinemas: []
    }
  },
  mounted() {
    this.loadCinemas(); 
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
        <form class="row g-3 needs-validation" novalidate @submit.prevent="evactualizar">
        <div class="row mb-2">
            <label for="name" class="col-3 col-form-label">Name</label>
            <div class="col-6">
                <input type="hidden" class="form-control" v-model="form.id">
                <input type="text" class="form-control" id="title" placeholder="Room 1" v-model="form.name" minlength="4" maxlength="50" required >
                <div v-if="errors.name" class="invalid-feedback">
                    {{ errors.name }}
                </div>          
            </div>
        </div>
        <div class="row mb-2">
            <label for="capacity" class="col-3 col-form-label">Capacity</label>
            <div class="col-6">
                <input type="number" class="form-control" id="capacity" placeholder="50" v-model="form.capacity" min="50" max="250" pattern="^\d+$" required >
                <div v-if="errors.capacity" class="invalid-feedback">
                    {{ errors.capacity }}
                </div>            
            </div>
        </div>
        <div class="row mb-2">
        <label for="cinema" class="col-3 col-form-label">Cinema</label>
        <div class="col-6">
          <select class="form-select" v-model="form.cinema_id" id="cinema" required>
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
                <button class="btn btn-success">Update room</button>
            </div>
        </div>
        </form>
    </MoviesLayout>
</template>