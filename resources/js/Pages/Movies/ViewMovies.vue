<script>
import MoviesLayout from '@/Layouts/MoviesLayout.vue';
import { Head, Link, router} from '@inertiajs/vue3';


export default {
  data(){
    return{
      movies:{
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
    movies : Array
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
          <th>Title</th>
          <th>Director</th>
          <th>Gender</th>
          <th>Duration</th>
          <th>Classification</th>
          <th></th>
          <th></th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="movie in movies">
            <th>{{ movie.id }}</th>
            <th>{{ movie.title }}</th>
            <th>{{ movie.director }}</th>
            <th>{{ movie.gender }}</th>
            <th>{{ movie.duration }}</th>
            <th>{{ movie.classification }}</th>
            <th class="text-warning">
              <button class="btn btn-warning btn-sm" @click="evupdate(movie.id)">Editar</button>
            </th>
            <th>
              <button class="btn btn-danger btn-sm" @click="evborrar(movie.id)">Eliminar</button>
            </th>
          </tr>
        </tbody>
      </table>
    </MoviesLayout>
    </template>
        