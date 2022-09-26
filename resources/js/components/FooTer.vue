<template>
    <footer id="footer">
        <div class="container mt-5">
            <div class="row">
                <div class="col-10 col-sm-5 col-xl-3 py-5">
                    <div class="card bg-dark">
                        <h3 class="white-footer card-header">Domande frequenti</h3>
                        <div class="card-body">
                            <ul>
                                <li><a href="#">Cos'è deliveboo?</a></li>
                                <li><a href="#">Privacy</a></li>
                                <li><a href="#">Lavora con noi</a></li>
                                <li><a href="#">Metodi di pagamento</a></li>
                                <li><a href="#">Modifica informazioni account</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-10 col-sm-5 col-xl-3 py-5">
                    <div class="card bg-dark">
                        <h3 class="white-footer card-header">Buoni pasto</h3>
                        <div class="card-body">
                            <ul>
                                <li><a href="#">Acquista un buono pasto</a></li>
                                <li><a href="#">Codice acquisto buonipasto</a></li>
                                <li><a href="#">Sconto clienti</a></li>
                                <li><a href="#">Regala un pasto</a></li>
                                <li><a href="#">Punti vendita</a></li>
                                <!-- <li><a href="#">Informazioni attività</a></li> -->
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-10 col-sm-5 col-md-6 col-xl-3 py-5">
                    <div class="card bg-dark">
                        <h3 class="white-footer card-header">Siamo anche su</h3>
                        <div class="card-body altezza">
                                <span id="loghi">
                                    <a href="#"><img src="../img/fb.png" alt="logo facebook"></a>
                                    <a href="#"><img src="../img/twitter-icon.svg" alt="logo facebook"></a>
                                    <a href="https://cdnlogo.com/logo/instagram_475.html"><img src="https://cdn.cdnlogo.com/logos/i/92/instagram.svg"></a>
                                    <a href="https://cdnlogo.com/logo/tiktok-app-icon_542.html"><img src="https://cdn.cdnlogo.com/logos/t/6/tiktok-app-icon.svg"></a>
                                </span>
                        </div>
                    </div>
                </div>

                <div class="col-10 col-sm-5 col-xl-3 py-5">
                    <div class="card bg-dark">
                        <h3 class="white-footer card-header">Ceo and Founder</h3>
                        <div class="card-body altezza">
                            <ul>
                                <li><a href="#">Gloria Gherardi</a></li>
                                <li><a href="#">Giuseppe Acito</a></li>
                                <li><a href="#">Davide Franco</a></li>
                                <li><a href="#">Andrea Scacchi</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>



</template>

<script>

</script>

<style lang="scss" scoped>

    #footer {
        margin-top: 120px;
        background-color: #ffeae4;


        .white-footer{
            color: white;
        }
    }

    .altezza{
        height: 168px;
        width: 100%;
    }

    img{
        height: 50px;
        margin: 2%;
        margin-top: 12%;
    }

    a{
        color: white;
        text-decoration: none;
    }
    a:hover {
        color: rgb(0, 255, 213);
    }

    li{
        list-style: none;
    }
</style>
