<template>
    <div id="nav-color" class="container-fluid">
      <nav class="navbar navbar-expand-lg" id="nav-color">
        <div class="container-fluid">
            <router-link :to="{name: 'home'}" class="nav-link active mx-3">
                <img class="logo_size" src="../img/logo_deliveboo.png" alt="">
            </router-link>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"></span>
            </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                      <li v-for="(navItem, index) in navItems" :key="index" class="nav-item">
                          <router-link :to="{name: navItem.routeName}" class="nav-link active">
                            <div class="divNavbello">
                                <h1>
                                    <span class="spanNavBello nav-link">{{ navItem.label }}</span>
                                </h1>
                            </div>
                        </router-link>
                      </li>
                      <li class="nav-item">
                        <div class="divNavbello">
                                <h1>
                                    <span class="spanNavBello nav-link" href="/login">Login Ristoratore</span>
                                </h1>
                        </div>
                    </li>
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
                      label: 'Carrello',
                      routeName: 'cart'
                  },
                ],

          }
      },
      mounted(){

      }
  }
  </script>

  <style lang="scss" scoped>

    #nav-color {
        background-color: #00ccbc;
        height: 120px;
        width: 100%;
        position: fixed;
        top:0;
        left: 0;
        z-index: 500;
            .logo_size {
                width: 80px;
                height: 80px;
            }
            #navbarSupportedContent{
                background-color: #00ccbc;

            }
            .divNavbello{
                background-color: #00ccbc;
                height: 100%;
                display: flex;
                align-items: center;
                height: 100%;
                color: rgba(252, 255, 243);
                font-family: 'Righteous', cursive;
                font-size: 18px;
            .spanNavBello{
                font-size: 25px;
                font-weight: bolder;
                    width: 100%;
                background-image: linear-gradient(
                    to bottom,
                    rgba(189, 202, 154, 0) 50%,
                    rgb(252, 250, 243) 50%,
                    rgb(255, 255, 255) 60%,
                    rgba(189, 202, 154, 0) 60%,
                );
                background-size: 0 100%;
                background-repeat: no-repeat;
                transition: 250ms linear;
                transform: rotate(-5deg);
                &:hover {
                    background-size: 100% 100%;
                }
        }
        }
    }




  </style>
