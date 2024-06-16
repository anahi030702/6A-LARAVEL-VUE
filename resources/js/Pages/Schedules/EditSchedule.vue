<script>
import MoviesLayout from '@/Layouts/MoviesLayout.vue';
import { Head, router } from '@inertiajs/vue3';

export default {
    components: {
    MoviesLayout,
    Head,
    router

  }, props:{
    schedule : {
        type: Object,
        required: true
    },
    errors: {
        type: Object,
        require: false
    }
  },
  methods:{
    evactualizar(){		
        router.put('/schedules/update', this.form)		
    }
  },
  data(){
    return{
        form:{
            id : this.schedule.id,
            start_time: this.schedule.start_time,
            end_time: this.schedule.end_time
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
            <label for="start" class="col-3 col-form-label">Start Time</label>
            <div class="col-6">
                <input type="hidden" class="form-control" v-model="form.id">
                <input type="text" class="form-control" id="start" placeholder="15:00" v-model="form.start_time" pattern="^([01]\d|2[0-3]):([0-5]\d):([0-5]\d)$" required>
                <div v-if="errors.start_time" class="invalid-feedback">
                    {{ errors.start_time }}
                </div>
            </div>
        </div>
        <div class="row mb-2">
            <label for="end" class="col-3 col-form-label">End Time</label>
            <div class="col-6">
                <input type="text" class="form-control" id="end" placeholder="18:45" v-model="form.end_time" pattern="^([01]\d|2[0-3]):([0-5]\d):([0-5]\d)$" required>
                <div v-if="errors.end_time" class="invalid-feedback">
                    {{ errors.end_time }}
                </div>            
            </div>
        </div>
        <div class="row">
            <div class="col text-center" style="margin-top: 2em;">
                <button class="btn btn-success">Update schedule</button>
            </div>
        </div>
        </form>
    </MoviesLayout>
</template>