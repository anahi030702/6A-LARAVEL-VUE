<script>
import MoviesLayout from '@/Layouts/MoviesLayout.vue';
import { Head, Link, router} from '@inertiajs/vue3';


export default {
  data(){
    return{
      schedule:{
        id: null
      }
    }
  },
  components: {
    MoviesLayout,
    Head,
    Link,
    router
  },
  props:{
    schedules : Array
  },
  methods:{
    evborrar(id) {
      router.delete(`schedules/borrar/${id}`);
    },
    evupdate(id) {
      router.get(`schedules/formedit/${id}`);
    }
  }
}
</script>

<template>
    <Head title="Home"/>
    <MoviesLayout>
      <table class="table text-center">
        <thead class="table-dark">
          <tr>
          <th>Id</th>
          <th>Start Time</th>
          <th>End Time</th>
          <th></th>
          <th></th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="schedule in schedules">
            <th>{{ schedule.id }}</th>
            <th>{{ schedule.start_time }}</th>
            <th>{{ schedule.end_time }}</th>
            <th class="text-warning">
              <button class="btn btn-warning btn-sm" @click="evupdate(schedule.id)">Editar</button>
            </th>
            <th>
              <button class="btn btn-danger btn-sm" @click="evborrar(schedule.id)">Eliminar</button>
            </th>
          </tr>
        </tbody>
      </table>
    </MoviesLayout>
    </template>
        