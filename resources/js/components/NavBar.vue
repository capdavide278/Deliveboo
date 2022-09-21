<template>
    <div id="nav-color" class="container-fluid">
      <nav class="container navbar navbar-expand-lg">
        <a href="">
            <img class="logo_size" src="../img/logo_deliveboo.png" alt="">
        </a>
          <div class="">
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="navbar-nav">
                      <li v-for="(navItem, index) in navItems" :key="index" class="nav-item">
                          <router-link :to="{name: navItem.routeName}" class="nav-link active"><button class="btn btn-light">{{ navItem.label }}</button></router-link>
                      </li>
                      <li class="nav-item"><a class="nav-link active" href="/login"><button class="btn btn-light">Login</button></a></li>
                  </ul>
              </div>
          </div>
      </nav>
    </div>
  </template>

  <script>
  export default {
      name: 'NavBar',
      data() {
          return {
              navItems: [
                  {
                      label: 'Home',
                      routeName: 'home'
                  },
                  {
                      label: 'Cart',
                      routeName: 'cart'
                  },
              ]
          }
      }
  }
  </script>

  <style lang="scss" scoped>

    #nav-color {
        background-color: #00ccbc;
        .logo_size {
            width: 100px;
            height: 100px;
        }
    }

  </style>
