<script>
import MoviesLayout from '@/Layouts/MoviesLayout.vue';
import { Head, Link, router} from '@inertiajs/vue3';


export default {
  data(){
    return{
      room:{
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
    rooms : {
        type: Object,
        require: true
    }
  },
  methods:{
    evborrar(id) {
      router.delete(`rooms/borrar/${id}`);
    },
    evupdate(id) {
      router.get(`rooms/formedit/${id}`);
    },
    evget(id) {
      router.get(`/rooms/getscreenings/${id}`);
    }
  }
}
</script>

<template>
    <Head title="Home"/>
    <MoviesLayout>
      <h2 class="text-center">Rooms</h2> 
      <table class="table text-center">
        <thead class="table-dark">
          <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Capacity</th>
          <th>Cinema</th>
          <th></th>
          <th></th>
          <th></th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="room in rooms">
            <th>{{ room.id }}</th>
            <th>{{ room.name }}</th>
            <th>{{ room.capacity }}</th>
            <th>{{ room.cinema.name }}</th>
            <th class="text-warning">
              <button class="btn btn-warning btn-sm" @click="evupdate(room.id)">Editar</button>
            </th>
            <th>
              <button class="btn btn-danger btn-sm" @click="evborrar(room.id)">Eliminar</button>
            </th>
            <th>
              <button class="btn btn-primary btn-sm" @click="evget(room.id)">View Screenings</button>
            </th>
          </tr>
        </tbody>
      </table>
    </MoviesLayout>
    </template>
        