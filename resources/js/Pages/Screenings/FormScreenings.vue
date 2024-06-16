<script>
import axios from 'axios';
import MoviesLayout from '@/Layouts/MoviesLayout.vue';
import { Head, router } from '@inertiajs/vue3';

export default {
  components: {
    MoviesLayout,
    Head,
    router
  },
  props: {
    errors: {
      type: Object,
      required: false
    }
  },
  data() {
    return {
      form: {
        room_id: null,
        movie_id: null,
        schedule_id: null,
        date: null,
      },
      cinemas: [],
      rooms: [] ,
      movies: [],
      schedules: []
    };
  },
  methods: {
    evguardar() {
      router.post('/screenings/create', this.form);
    },
    loadCinemas() {
      axios.get('/cinemas/prueba')
        .then(response => {
          this.cinemas = response.data.cinemas;
        })
        .catch(error => {
          console.error("Hubo un error", error);
        });
    },
    loadMovies() {
      axios.get('/movies/get')
        .then(response => {
          this.movies = response.data.movies;
        })
        .catch(error => {
          console.error("Hubo un error", error);
        });
    },
    loadSchedules() {
      axios.get('/schedules/get')
        .then(response => {
          this.schedules = response.data.schedules;
        })
        .catch(error => {
          console.error("Hubo un error", error);
        });
    },
    loadRooms(cinema_id) {
      axios.get(`/cinemas/${cinema_id}/rooms`)
        .then(response => {
          this.rooms = response.data.rooms;
        })
        .catch(error => {
          console.error("Hubo un error al cargar las salas", error);
        })
        .finally(() => {
          console.log('Carga de salas completada');
        });
    }
  },
  watch: {
    'form.cinema_id': function(newVal) {
      if (newVal) {
        this.loadRooms(newVal); 
      }
    }
  },
  mounted() {
    this.loadCinemas();
    this.loadMovies();
    this.loadSchedules();
    (() => {
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
};
</script>

<template>
  <MoviesLayout>
    <Head title="Create"/>
    <form class="row g-3 needs-validation" novalidate  @submit.prevent="evguardar">
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
      <div class="row mb-2">
        <label for="room" class="col-3 col-form-label">Room</label>
        <div class="col-6">
          <select class="form-select" v-model="form.room_id" id="room" required>
            <option v-for="room in rooms" :key="room.id" :value="room.id">
              {{ room.name }}
            </option>
          </select>
          <div v-if="errors.room_id" class="invalid-feedback">
            {{ errors.room_id }}
          </div>
        </div>
      </div>
      <div class="row mb-2">
        <label for="movie" class="col-3 col-form-label">Movies</label>
        <div class="col-6">
          <select class="form-select" v-model="form.movie_id" id="movie" required>
            <option v-for="movie in movies" :key="movie.id" :value="movie.id">
              {{ movie.title }}
            </option>
          </select>
          <div v-if="errors.movie_id" class="invalid-feedback">
            {{ errors.movie_id }}
          </div>
        </div>
      </div>
      <div class="row mb-2">
        <label for="date" class="col-3 col-form-label">Date</label>
        <div class="col-6">
          <input type="text" class="form-control" id="date" v-model="form.date" placeholder="2024/06/24" pattern="\d{4}-\d{2}-\d{2}" required>
          <div v-if="errors.date" class="invalid-feedback">
            {{ errors.date }}
          </div>
        </div>
      </div>
      <div class="row mb-2">
        <label for="schedule" class="col-3 col-form-label">Horarios</label>
        <div class="col-6">
          <select class="form-select" v-model="form.schedule_id" id="schedule" required>
            <option v-for="schedule in schedules" :key="schedule.id" :value="schedule.id">
              {{ schedule.start_time }} - {{ schedule.end_time }} 
            </option>
          </select>
          <div v-if="errors.schedule_id" class="invalid-feedback">
            {{ errors.schedule_id }}
          </div>
        </div>
      </div>
      
      <div class="row">
        <div class="col text-center" style="margin-top: 2em;">
          <button class="btn btn-success">Create Screening</button>
        </div>
      </div>
    </form>
  </MoviesLayout>
</template>
