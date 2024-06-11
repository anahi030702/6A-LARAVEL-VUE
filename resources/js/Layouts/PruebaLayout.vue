<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="container">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4 align-content-center">
                <Link href="/">
                <ApplicationLogo class="img-sm rounded" />
            </Link>
            </div>
        </div>

        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <slot name="uno" />
            </div>
            <div class="col-4">
                <slot name="dos"/>
            </div>
        </div>
    </div>
</template>
