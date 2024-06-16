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
    }
  },
  methods:{
    evborrar(id) {
      router.delete(`movies/borrar/${id}`);
    },
    evupdate(id) {
      router.get(`movies/formedit/${id}`);
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
          <th>Room_id</th>
          <th>Movie_id</th>
          <th>schedule_id</th>
          <th>date</th>
          <th></th>
          <th></th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="screening in screenings">
            <th>{{ screening.id }}</th>
            <th>{{ screening.title }}</th>
            <th>{{ screening.director }}</th>
            <th>{{ screening.gender }}</th>
            <th>{{ screening.duration }}</th>
            <th>{{ screening.classification }}</th>
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
        