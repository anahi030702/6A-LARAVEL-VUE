<script>
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
        cinema_id: null,
        room_id: null,
        screening_id: null,
        seats : null,
        price: null
      },
      cinemas: [],
      rooms: [],
      screenings: []
    }
  },
  methods: {
    evguardar() {
      router.post('/sales/create', this.form)
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
    loadRooms(cinema_id) {
      axios.get(`/cinemas/${cinema_id}/rooms`)
        .then(response => {
          this.rooms = response.data.rooms;
        })
        .catch(error => {
          console.error("Hubo un error al cargar las salas", error);
        });
    },
    loadScreenings(room_id) {
      axios.get(`/cinemas/${room_id}/screenings`)
        .then(response => {
          this.screenings = response.data.screenings;
        })
        .catch(error => {
          console.error("Hubo un error al cargar las proyecciones", error);
        });
    },
    calculatePrice() {
      if (this.form.seats) {
        const pricePerSeat = 80; 
        this.form.price = (this.form.seats * pricePerSeat).toFixed(2);
      } else {
        this.form.price = null;
      }
    }
  },
  watch: {
    'form.cinema_id': function(newVal) {
      if (newVal) {
        this.loadRooms(newVal); 
      }
    },
    'form.room_id': function(newVal) {
      if (newVal) {
        this.loadScreenings(newVal); 
      }
    },
    'form.seats': function(newVal) {
      this.calculatePrice();
    }
  },
  mounted() {
    this.loadCinemas();
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
}
</script>


<template>
  <MoviesLayout>
    <Head title="Crear Cine"/>
    <form class="row needs-validation" novalidate @submit.prevent="evguardar">
      <div class="row mb-2">
        <label for="cinema" class="col-3 col-form-label">Cineme</label>
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
        <label for="room" class="col-3 col-form-label">Rooms</label>
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
        <label for="screening" class="col-3 col-form-label">Screenings</label>
        <div class="col-6">
          <select class="form-select" v-model="form.screening_id" id="screening" required>
            <option v-for="screening in screenings" :key="screening.id" :value="screening.id">
              {{ screening.movie.title }} - {{ screening.schedule.start_time }} a {{ screening.schedule.end_time }}
            </option>
          </select>
          <div v-if="errors.screening_id" class="invalid-feedback">
            {{ errors.screening_id }}
          </div>
        </div>
      </div>
      <div class="row mb-2">
        <label for="seats" class="col-3 col-form-label">Seats</label>
        <div class="col-6">
          <input type="number" class="form-control" id="seats" placeholder="2" v-model="form.seats" min="1" max="250" required>
          <div v-if="errors.seats" class="invalid-feedback">
            {{ errors.seats }}
          </div>
        </div>
      </div>
      <div class="row mb-2">
        <label for="price" class="col-3 col-form-label">Price</label>
        <div class="col-6">
          <input class="form-control" id="price" placeholder="150.00" v-model="form.price" step="0.01" min="1.00" maxlength="2000.00" readonly>
          <div v-if="errors.price" class="invalid-feedback">
            {{ errors.price }}
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col text-center" style="margin-top: 2em;">
          <button class="btn btn-success">End Sale</button>
        </div>
      </div>
    </form>
  </MoviesLayout>
</template>
