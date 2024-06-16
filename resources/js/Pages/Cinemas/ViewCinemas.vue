<script>
import MoviesLayout from '@/Layouts/MoviesLayout.vue';
import { Head, Link, router} from '@inertiajs/vue3';


export default {
  data(){
    return{
      cinema:{
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
    cinemas : {
        type: Object,
        require: true
    }
  },
  methods:{
    evborrar(id) {
      router.delete(`cinemas/borrar/${id}`);
    },
    evupdate(id) {
      router.get(`cinemas/formedit/${id}`);
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
          <th>Name</th>
          <th>Address</th>
          <th>City</th>
          <th>Phone</th>
          <th></th>
          <th></th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="cinema in cinemas">
            <th>{{ cinema.id }}</th>
            <th>{{ cinema.name }}</th>
            <th>{{ cinema.address }}</th>
            <th>{{ cinema.city }}</th>
            <th>{{ cinema.phone }}</th>
            <th class="text-warning">
              <button class="btn btn-warning btn-sm" @click="evupdate(cinema.id)">Editar</button>
            </th>
            <th>
              <button class="btn btn-danger btn-sm" @click="evborrar(cinema.id)">Eliminar</button>
            </th>
          </tr>
        </tbody>
      </table>
    </MoviesLayout>
    </template>
        