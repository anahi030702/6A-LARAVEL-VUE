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
          <Link href="/cinemas" class="nav-link text-decoration-none text-reset fw-bold fs-5">Home</Link>    
        </li>
        <li class="nav-item dropdown">
          <Link class="nav-link dropdown-toggle fw-bold fs-5" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Cinemas
          </Link>          
          <ul class="dropdown-menu">
            <Link href="/cinemas" class="dropdown-item text-decoration-none text-reset">View Cinemas</Link>  
            <Link href="/cinemas/form" class="dropdown-item text-decoration-none text-reset">Create Cinema</Link>                  
          </ul>
        </li>
        <li class="nav-item dropdown">
          <Link class="nav-link dropdown-toggle fw-bold fs-5" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Rooms
          </Link>          
          <ul class="dropdown-menu">
            <Link href="/rooms" class="dropdown-item text-decoration-none text-reset">View Rooms</Link>  
            <Link href="/rooms/form" class="dropdown-item text-decoration-none text-reset">Create Room</Link>                  
          </ul>
        </li>
        <li class="nav-item dropdown">
          <Link class="nav-link dropdown-toggle fw-bold fs-5" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Screenings
          </Link>          
          <ul class="dropdown-menu">
            <Link href="/screenings" class="dropdown-item text-decoration-none text-reset">View Screenings</Link>  
            <Link href="/screenings/form" class="dropdown-item text-decoration-none text-reset">Create Screening</Link>                  
          </ul>
        </li>
        <li class="nav-item dropdown">
          <Link class="nav-link dropdown-toggle fw-bold fs-5" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Tickets
          </Link>          
          <ul class="dropdown-menu">
            <Link href="/screenings" class="dropdown-item text-decoration-none text-reset">View Tickets</Link>  
            <Link href="/screenings/form" class="dropdown-item text-decoration-none text-reset">Create Ticket</Link>                  
          </ul>
        </li>
        <li class="nav-item dropdown">
          <Link class="nav-link dropdown-toggle fw-bold fs-5" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Movies
          </Link>          
          <ul class="dropdown-menu">
            <Link href="/movies" class="dropdown-item text-decoration-none text-reset">View Movies</Link>  
            <Link href="/movies/form" class="dropdown-item text-decoration-none text-reset">Create Movie</Link>                  
          </ul>
        </li>

        <li class="nav-item dropdown">
          <Link class="nav-link dropdown-toggle fw-bold fs-5" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Schedules
          </Link>          
          <ul class="dropdown-menu">
            <Link href="/schedules" class="dropdown-item text-decoration-none text-reset">View Schedules</Link>  
            <Link href="/schedules/form" class="dropdown-item text-decoration-none text-reset">Create Schedule</Link>                  
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