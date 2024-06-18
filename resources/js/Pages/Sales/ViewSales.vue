<script>
import MoviesLayout from '@/Layouts/MoviesLayout.vue';
import { Head, Link, router} from '@inertiajs/vue3';


export default {
  data(){
    return{
      sales:{
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
    sales : {
      type: Object,
      require: true
    }
  },
  methods:{
    evborrar(id) {
      router.delete(`/sales/borrar/${id}`);
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
      <h2 class="text-center">Sales</h2> 
      <table class="table text-center">
        <thead class="table-dark">
          <tr>
          <th>Id</th>
          <th>Seats</th>
          <th>Price</th>
          <th>Screening</th>
          <th>Room</th>
          <th>Movie</th>
          <th>Schedule</th>
          <th></th>
          <th></th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="sale in sales">
            <th>{{ sale.id }}</th>
            <th>{{ sale.seats }}</th>
            <th>{{ sale.price }}</th>
            <th>{{ sale.screening_id }}</th>
            <th>{{ sale.screening.room.name }}</th>
            <th>{{ sale.screening.movie.title }}</th>
            <td>{{ sale.screening.schedule.start_time }} - {{ sale.screening.schedule.end_time }}</td>
            <th class="text-warning">
              <button class="btn btn-warning btn-sm" @click="evupdate(sale.id)">Editar</button>
            </th>
            <th>
              <button class="btn btn-danger btn-sm" @click="evborrar(sale.id)">Eliminar</button>
            </th>
          </tr>
        </tbody>
      </table>
    </MoviesLayout>
    </template>
        