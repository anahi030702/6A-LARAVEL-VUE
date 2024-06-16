<script>
import MoviesLayout from '@/Layouts/MoviesLayout.vue';
import { Head, Link, router} from '@inertiajs/vue3';


export default {
  data(){
    return{
      screening:{
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
    screenings : {
        type: Object,
        require: true
    },
    room_name: String,
    movie_name: String,
    schedule_name: String
  },
  methods:{
    evborrar(id) {
      router.delete(`screenings/borrar/${id}`);
    },
    evupdate(id) {
      router.get(`screenings/formedit/${id}`);
    }
  }
}
</script>

<template>
    <Head title="Home"/>
    <MoviesLayout>
      <h2 class="text-center">Screenings</h2> 
      <table class="table text-center">
        <thead class="table-dark">
          <tr>
          <th>Id</th>
          <th>Room</th>
          <th>Movie</th>
          <th>schedule</th>
          <th>date</th>
          <th></th>
          <th></th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="screening in screenings">
            <th>{{ screening.id }}</th>
            <th>{{ screening.room.name }}</th>
            <th>{{ screening.movie.title }}</th>
            <td>{{ screening.schedule.start_time }} - {{ screening.schedule.end_time }}</td>
            <th>{{ screening.date }}</th>
            <th class="text-warning">
              <button class="btn btn-warning btn-sm" @click="evupdate(screening.id)">Editar</button>
            </th>
            <th>
              <button class="btn btn-danger btn-sm" @click="evborrar(screening.id)">Eliminar</button>
            </th>
          </tr>
        </tbody>
      </table>
    </MoviesLayout>
    </template>
        