<script>
import MoviesLayout from '@/Layouts/MoviesLayout.vue';
import { Head, router } from '@inertiajs/vue3';

export default {
    components: {
    MoviesLayout,
    Head,
    router

  }, props:{
    movie : Array,
    errors: {
        type: Object,
        require: false
    }
  },
  methods:{
    evactualizar(){		
        router.put('/movies/update', this.form)		
    }
  },
  data(){
    return{
        form:{
            id: this.movie.id,
            title: this.movie.title,
            director: this.movie.director,
            gender: this.movie.gender,
            duration : this.movie.duration,
            classification : this.movie.classification
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
        <form class="row g-3 needs-validation" novalidate @submit.prevent="evactualizar">
        <div class="row mb-2">
            <label for="title" class="col-3 col-form-label">Title</label>
            <div class="col-6">
                <input type="hidden" class="form-control" v-model="form.id">
                <input type="text" class="form-control" v-model="form.title" minlength="2" maxlength="50" required >
                <div v-if="errors.title" class="invalid-feedback">
                    {{ errors.title }}
                </div>            
            </div>
        </div>
        <div class="row mb-2">
            <label for="director" class="col-3 col-form-label">Director</label>
            <div class="col-6">
                <input type="text" class="form-control" v-model="form.director" minlength="3" maxlength="50" required >
                <div v-if="errors.director" class="invalid-feedback">
                    {{ errors.director }}
                </div>             
            </div>
        </div>
        <div class="row mb-2">
            <label for="gender" class="col-3 col-form-label">Gender</label>
            <div class="col-6">
                <input type="text" class="form-control" v-model="form.gender" required minlength="3" maxlength="50">
                <div v-if="errors.gender" class="invalid-feedback">
                    {{ errors.gender }}
                </div>             
            </div>
        </div>
        <div class="row mb-2">
            <label for="duration" class="col-3 col-form-label">Duration</label>
            <div class="col-6">
                <input type="number" class="form-control" id="duration" placeholder="150" v-model="form.duration" min="90" max="250" pattern="^\d+$" required >
                <p class="fst-italic" style="font-size: 12px;"> Duration should be in minutes</p>
                <div v-if="errors.duration" class="invalid-feedback">
                    {{ errors.duration }}
                </div>            
            </div>
        </div>
        <div class="row">
            <label for="classification" class="col-3 col-form-label">Classification</label>
            <div class="col-6">
                <select class="form-select" v-model="form.classification" required>
                <option value="AA">AA</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="B-15">B-15</option>
                <option value="C">C</option>
                <option value="D">D</option>
                </select>
                <div v-if="errors.classification" class="invalid-feedback">
                    {{ errors.classification }}
                </div> 
            </div>
        </div>
        <div class="row">
            <div class="col text-center" style="margin-top: 2em;">
                <button class="btn btn-success">Update movie</button>
            </div>
        </div>
        </form>
    </MoviesLayout>
</template>