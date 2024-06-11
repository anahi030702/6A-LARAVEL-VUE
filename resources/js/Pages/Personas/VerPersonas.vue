<script>
import InicioLayout from '@/Layouts/InicioLayout.vue';
import { Head, Link, router} from '@inertiajs/vue3';


export default {
  data(){
    return{
      persona:{
        id: null
      }
    }
  },
  components: {
    InicioLayout,
    Head,
    Link,
    router
  },
  props:{
    personas : Array
  },
  methods:{
    evborrar(id) {
      router.delete(`personas/borrar/${id}`);
    },
    evupdate(id) {
      router.get(`personas/formedit/${id}`);
    }
  }
}
</script>

<template>
    <Head title="Home"/>
    <InicioLayout>
      <table class="table">
        <thead class="table-dark">
          <tr>
          <th>Id</th>
          <th>Nombre</th>
          <th>Apellido Paterno</th>
          <th>Apellido Materno</th>
          <th></th>
          <th></th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="persona in personas">
            <th>{{ persona.id }}</th>
            <th>{{ persona.nombre }}</th>
            <th>{{ persona.ap_paterno }}</th>
            <th>{{ persona.ap_materno }}</th>
            <th class="text-warning">
              <button class="btn btn-warning btn-sm" @click="evupdate(persona.id)">Editar</button>
            </th>
            <th>
              <button class="btn btn-danger btn-sm" @click="evborrar(persona.id)">Eliminar</button>
            </th>
          </tr>
        </tbody>
      </table>
     
    </InicioLayout>
</template>