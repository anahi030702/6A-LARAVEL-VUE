<script setup>
import { Link} from '@inertiajs/vue3'
</script>

<template>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
            <Link href="/personas" class="nav-link text-decoration-none text-reset fw-bold fs-5">Home</Link>    
        </li>
        <li class="nav-item dropdown">
          <Link class="nav-link dropdown-toggle fw-bold fs-5" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Personas
          </Link>
          <ul class="dropdown-menu">
                <Link href="/personas/form" class="dropdown-item text-decoration-none text-reset">Crear</Link>          
        </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container" style="margin-top: 2em;">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <slot />
        </div>
    </div>
</div>
</template>