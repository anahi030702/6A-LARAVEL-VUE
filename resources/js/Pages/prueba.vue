<script setup>
import { Head } from '@inertiajs/vue3';
import PruebaLayout from '@/Layouts/PruebaLayout.vue';
import { defineProps } from 'vue';

const props = defineProps({
    validador: Object,
    errors: Object
});
</script>

<template>
    <Head title="Prueba" />
    <PruebaLayout>
        <template #uno>
            <div class="py-12">
                <div>
                    <h2>Validación:</h2>
                    <pre>{{ validador }}</pre>
                </div>
                <div>
                    <h2>Errores:</h2>
                    <ul>
                        <li v-if="errors.nombre">Nombre: {{ errors.nombre[0] }}</li>
                        <li v-if="errors.ap_paterno">Apellido Paterno: {{ errors.ap_paterno[0] }}</li>
                        <li v-if="errors.ap_materno">Apellido Materno: {{ errors.ap_materno[0] }}</li>
                    </ul>
                </div>
            </div>
        </template>
        <template #dos>
            <button type="button" class="btn btn-primary">Primary</button>
        </template>
    </PruebaLayout>
</template>
