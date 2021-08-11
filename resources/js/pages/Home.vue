<template>
    <div>

        <!-- JUMBOTRON -->
        <div class="cont-j">
            <div class="container-jumbo">
                <h1>La più grande piattaforma di medici online</h1>

                <div class="search">
                    <select
                        class="searchTerm"
                        name="specs"
                        id="specs"
                        v-model="selectedSpec"
                    >
                        <option value="" disabled>Seleziona una specializzazione</option>
                        <option
                            v-for="spec in specs"
                            :key="spec.id"
                            :value="spec"
                            @click="getSpecId(spec.id)"
                        >{{ spec.name }}
                        </option>
                    </select>
                    <router-link
                        :to="{name: 'search', params: {spec: selectedSpec, specSlug: selectedSpec.slug}}"
                    >
                        <button class="searchButton">Cerca</button>
                    </router-link>
                </div> <!-- /end search -->
            </div> <!-- /end container-jumbo -->
        </div> <!-- /end cont-j --> <!-- /JUMBOTRON -->

        <!-- SPONSORED DOCTORS  -->
        <div class="sponsored-doctors">
            <h2 class="text-center">Utenti Premium che potrebbero fare al caso tuo:</h2>
            <carousel>
                <slide v-for="doctor in filteredDocs" :key="doctor.id">
                    <div class="card-doctor box">

                        <!-- SPONSORED BADGE -->
                        <div class="sponsored-badge">
                            <i class="fas fa-gem"></i>
                            <p>Account Premium</p>
                        </div>

                        <!-- CARD TOP -->
                        <div class="card-top">
                            <!-- Picture-selection -->
                            <div
                                v-if="doctor.profile.picture"
                                class="profile-picture 1"
                                :style="{backgroundImage: 'url(' + '../storage/' + doctor.profile.picture + ')'}"
                            ></div> <!-- /end picture -->
                            <div
                                v-else-if="doctor.gender == 0"
                                class="profile-picture 2"
                                style="background-image: url('../img/default_male.jpeg')"
                            ></div>
                            <div
                                v-else
                                class="profile-picture 3"
                                style="background-image: url('../img/default_female.jpeg')"
                            ></div>

                            <!-- CONTENT -->
                            <div class="doctor-details">
                                <h2 v-if="doctor.gender === 0">
                                    Dott. {{ doctor.first_name }}
                                    {{ doctor.last_name }}
                                </h2>
                                <h2 v-else>
                                    Dott.ssa {{ doctor.first_name }}
                                    {{ doctor.last_name }}
                                </h2>

                                <ul class="specs">
                                    <li
                                        class="badge"
                                        v-for="(spec, index) in doctor.specs"
                                        :key="index"
                                    >
                                        {{ spec.name }}
                                    </li>
                                </ul>
                            </div> <!-- /end doctor-details -->
                        </div> <!-- /end card-top -->

                        <div class="card-lower-box">
                            <div class="card-bottom">
                                <h4>{{ doctor.city }}</h4>
                                <h4 v-if="doctor.avg_user">
                                    {{ doctor.avg_user.toFixed(1) }}
                                    <i class="fas fa-star"></i>
                                    <span>({{doctor.reviews.length}}recensioni)</span>
                                </h4>
                            </div> <!-- /end card-bottom -->

                            <router-link
                                :to="{name: 'detail', params: { slug: doctor.slug }}"
                            >
                                <button class="btn">visualizza dettagli</button>
                            </router-link>
                        </div> <!-- /end card-lower-box -->
                    </div> <!-- /end card-doctor -->
                </slide> <!-- /end slide -->
            </carousel> <!-- /end carousel -->
        </div> <!-- /end sponsored-doctors -->

        <!-- FIRST MAIN -->

        <div class="cont-m">
            <div class="container-main">
                <div class="box-1">
                    <div class="background"></div>
                    <div class="text">
                        <h3>Scegli il Medico</h3>
                        <p>
                            Fai la scelta migliore secondo le tue esigenze:
                            valuta curriculum, prezzo delle prestazioni,
                            patologie trattate e recensioni degli altri
                            pazienti.
                        </p>
                    </div>
                </div> <!-- /end box-1 -->
                <div class="box-2">
                    <div class="background"></div>
                    <div class="text">
                        <h3>Prenota la visita</h3>
                        <p>
                            Ti bastano pochi secondi: è facile e veloce, non
                            serve telefonare e non è richiesta la carta di
                            credito: pagherai direttamente al medico.
                        </p>
                    </div>
                </div> <!-- /end box-2 -->
                <div class="box-3">
                    <div class="background"></div>
                    <div class="text">
                        <h3>Vai all'appuntamento</h3>
                        <p>
                            Vai dal Medico scelto, nel giorno e nell'ora
                            selezionati. Dopo la visita potrai lasciare una tua
                            recensione che sarà utile per gli altri pazienti.
                        </p>
                    </div>
                </div> <!-- /end box-3 -->
            </div> <!-- /end container-main -->
        </div> <!-- /end cont-m -->

        <!-- SECONDO MAIN -->

        <div class="cont-squares">
            <div class="container-squares">
                <div class="square1">
                    <h1>{{ this.doctors.length }}</h1>
                    <h3>Medici</h3>
                </div>
                <div class="square2">
                    <h1>{{ this.reviews.length }}</h1>
                    <h3>Recensioni</h3>
                </div>
                <div class="square3">
                    <h1>{{ this.messages.length }}</h1>
                    <h3>Messaggi</h3>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

import { Carousel, Slide } from "vue-carousel";

const buildSlideMarkup = count => {
    let slideMarkup = "";
    for (var i = 1; i <= count; i++) {
        slideMarkup += '<slide><span class="label">' + i + "</span></slide>";
    }
    return slideMarkup;
};

export default {
    name: "Home",
    components: {
        Carousel,
        Slide
    },
    template:
        '<div><carousel>' +
        buildSlideMarkup(10) +
        "</carousel></div>",
    data() {
        return {
            doctors: [],
            specs: [],
            reviews: [],
            messages: [],
            selectedSpec: {},
            selectedSpecId: "",
            filteredDocs: []
        };
    },
    methods: {
        getData() {
            axios
                .get(`http://127.0.0.1:8000/api/users`)
                .then(res => {
                    this.doctors = res.data.users;
                    this.specs = res.data.specialization;
                    this.reviews = res.data.reviews;
                    this.messages = res.data.messages;
                    this.doctors.forEach(doctor => {
                        if (doctor.sponsorships.length !== 0) {
                            /* console.log(
                                "due_date",
                                doctor.sponsorships[
                                    doctor.sponsorships.length - 1
                                ].pivot.due_date
                            ); */
                            if (
                                new Date(
                                    doctor.sponsorships[
                                        doctor.sponsorships.length - 1
                                    ].pivot.due_date
                                ) >= new Date(this.currentDate())
                            ) {
                                this.filteredDocs.push(doctor);
                            }
                        }
                    });
                    /* console.log(this.doctors); */
                    /* console.log("filtered doc", this.filteredDocs); */
                })
                .catch(err => {
                    console.log(err);
                });
        },
        currentDate() {
            const current = new Date();
            const date = `${current.getFullYear()}-${current.getMonth() +
                1}-${current.getDate()} ${current.getHours()}:${current.getMinutes()}:${current.getSeconds()}`;
            return date;
        },

        getSpecId(id) {
            this.selectedSpecId = id;
            console.log("id selezionato", this.selectedSpecId);
        }
    },
    created() {
        this.getData();
    }
};
</script>

<style lang="scss" scoped>
$white: #ffff;
$green: #2ea497;
$background: #ffff;
$shadow: lightgray;
$btn-background: #9bd6cf;
/* JUMBO */

.cont-j {
    height: 300px;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}
.container-jumbo {
    height: 200px;
    width: 80%;
    display: flex;
    justify-content: space-evenly;
    align-items: center;
    flex-direction: column;
}
.container-jumbo h1 {
    font-size: 40px;
    text-align: center;
    color: #2b7871;
}

/* Searchbar */

.search {
    width: 60%;
    height: 40px;
    margin: 0 auto;
    display: flex;
}
select {
    background-color: $white;
    border-radius: 100px;
    height: 30px;
    width: 100%;
    border: 1px solid lightgray;
    margin-bottom: 20px;
    cursor: pointer;
    letter-spacing: 1px;
    transition: 0.1s;
    &:focus {
        border: 3px solid $green !important; /* important obbligatorio per select */
        outline: none !important; /* important obbligatorio per select */
    }
}
.searchTerm {
    height: 100%;
    width: 85%;
    font-size: 20px;
}
.searchButton {
    width: 100%;
    height: 100%;
    border: 3px solid $green;
    background-color: $green;
    color: $white;
    text-transform: uppercase;
    text-align: center;
    border-radius: 100px;
    cursor: pointer;
    font-weight: bold;
    letter-spacing: 1px;
    padding: 0 15px;
    margin-left: 10px;
    transition: 0.1s;
    &:hover {
        background-color: $btn-background;
    }
}

.btn {
    width: 100%;
    background-color: $green;
    color: $white;
    border-radius: 100px;
    border: 3px solid $green;
    padding: 5px 25px;
    margin-top: 5px;
    cursor: pointer;
    text-transform: uppercase;
    font-weight: bold;
    letter-spacing: 1px;
    transition: 0.1s;
    &:hover {
        background-color: $btn-background;
    }
}

.sponsored-doctors {
    .VueCarousel-slide {
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: $btn-background;
        padding: 20px 0;
    }
}

/* CARD */
.card-doctor {
    width: 100%;
    max-width: 700px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    position: relative;
    .sponsored-badge {
        position: absolute;
        top: 5px;
        right: 5px;
        display: flex;
        color: $white;
        background-color: orange;
        border-radius: 20px;
        padding: 2px 10px;
        * {
            margin-bottom: 0;
            padding-bottom: 0;
        }
        .fa-gem {
            margin-top: 3px;
            margin-right: 3px;
        }
    }
    .card-top {
        display: flex;
        h2 {
            margin-top: 5px;
        }
        .doctor-details {
            margin-left: 30px;
            margin-top: 10px;
        }
        .profile-picture {
            width: 100px;
            height: 100px;
            min-width: 100px;
            background-color: $background;
            border-radius: 50%;
            border: 3px solid $green;
            background-position: center;
            background-repeat: no-repeat; /* Do not repeat the image */
            background-size: cover;
        }
        .specs {
            display: flex;
            flex-wrap: wrap;
            .badge {
                background-color: $green;
                color: $white;
                text-align: center;
                padding: 8px 10px;
                margin-right: 10px;
                margin-bottom: 5px;
                margin-top: 5px;
                border-radius: 5px;
                letter-spacing: 1px;
            }
        }
    }
}

.card-doctor {
    .card-bottom {
        margin-bottom: 70px;
    }
    position: relative;
    .btn {
        position: absolute;
        width: 92%;
        bottom: 10px;
        margin: 0 auto;
    }
    .card-bottom {
        display: flex;
        justify-content: space-between;
        .fa-star {
            color: orange;
        }
    }
}

.box {
    background-color: $white;
    width: 90%;
    height: 90%;
    border-radius: 20px;
    padding: 15px 20px;
    border: 1px solid orange;
}

/* Primo main */

.cont-m {
    height: 1250px;
    width: 100%;
    padding-top: 50px;
}
.container-main {
    background-color: #2ea397;
    border-radius: 30px;
    height: 90%;
    width: 90%;
    margin: auto;
    h3 {
        border-bottom: 1px solid white;
        padding-bottom: 10px;
    }
}

/* BOX 1 */

.box-1 {
    width: 100%;
    height: calc(100% / 3);
    display: flex;
    justify-content: center;
}
.box-1 .background {
    background-image: url(/img/img4.jpg);
    background-repeat: no-repeat;
    background-size: cover;
    height: auto;
    width: 50%;
    border-radius: 30px 0 0 0;
}
.box-1 .text {
    width: 50%;
    padding-right: 50px;
    padding-left: 50px;
    padding-top: 30px;
    color: #fff;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

/* BOX 2 */

.box-2 {
    width: 100%;
    height: calc(100% / 3);
    display: flex;
    flex-direction: row-reverse;
    justify-content: center;
}
.box-2 .background {
    background-image: url(/img/img3.jpg);
    background-repeat: no-repeat;
    background-size: cover;
    height: auto;
    width: 50%;
}
.box-2 .text {
    width: 50%;
    padding-right: 50px;
    padding-left: 50px;
    padding-top: 30px;
    color: #fff;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

/* BOX 3 */

.box-3 {
    width: 100%;
    height: calc(100% / 3);
    display: flex;
    justify-content: center;
}
.box-3 .background {
    background-image: url(/img/img1.jpg);
    background-repeat: no-repeat;
    background-size: cover;
    height: auto;
    width: 50%;
    border-radius: 0 0 0 30px;
}
.box-3 .text {
    width: 50%;
    padding-right: 50px;
    padding-left: 50px;
    padding-top: 30px;
    color: #fff;
    display: flex;
    flex-direction: column;
    justify-content: center;
}
/* QUADRATONI */

.cont-squares {
    width: 100%;
    height: 300px;
    margin-bottom: 100px;
}
.container-squares {
    width: 100%;
    height: 100%;
    margin: auto;
    display: flex;
    color: #fff;
}
.container-squares .square1 {
    width: calc(100% / 3);
    height: 100%;
    background-color: #2ea397;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}
.container-squares .square2 {
    width: calc(100% / 3);
    height: 100%;
    background-color: #278d83;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}
.container-squares .square3 {
    width: calc(100% / 3);
    height: 100%;
    background-color: #247e75;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}

/* Media Query */

@media (max-width: 640px) {
    /* JUMBO */

    .container-jumbo h1 {
        font-size: 28px;
    }

    /* Searchbar */

    .search {
        width: 100%;
    }
    .searchTerm {
        font-size: 15px;
    }

    /* Primo main */

    .cont-m {
        height: 2250px;
        margin-bottom: 50px;
        padding-top: 0px;
    }
    .container-main {
        width: 100%;
        height: 100%;
        border-radius: 0;
    }

    /* BOX 1 */

    .box-1 {
        width: 100%;
        flex-wrap: wrap;
    }
    .box-1 .background {
        width: 100%;
        border-radius: 0;
    }
    .box-1 .text {
        width: 100%;
    }

    /* BOX 2 */

    .box-2 {
        width: 100%;
        flex-wrap: wrap;
    }
    .box-2 .background {
        width: 100%;
    }
    .box-2 .text {
        width: 100%;
    }

    /* BOX 3 */

    .box-3 {
        width: 100%;
        flex-wrap: wrap;
    }
    .box-3 .background {
        width: 100%;
        border-radius: 0;
    }
    .box-3 .text {
        width: 100%;
    }

    /* QUADRATONI */

    .cont-squares {
        width: 100%;
        height: 900px;
        margin-bottom: 50px;
    }
    .container-squares {
        width: 100%;
        height: 100%;
        flex-wrap: wrap;
    }
    .container-squares .square1,
    .container-squares .square2,
    .container-squares .square3 {
        width: 100%;
        height: 300px;
    }
}

@media screen and (min-width: 641px) and (max-width: 768px) {
    /* JUMBO */

    .container-jumbo h1 {
        font-size: 33px;
    }

    /* Searchbar */

    .search {
        width: 100%;
    }
    .searchTerm {
        font-size: 15px;
    }

    /* Primo main */

    .cont-m {
        height: 2250px;
        margin-bottom: 50px;
        padding-top: 0px;
    }
    .container-main {
        width: 100%;
        height: 100%;
        border-radius: 0;
    }

    /* BOX 1 */

    .box-1 {
        width: 100%;
        flex-wrap: wrap;
    }
    .box-1 .background {
        width: 100%;
        border-radius: 0;
    }
    .box-1 .text {
        width: 100%;
    }

    /* BOX 2 */

    .box-2 {
        width: 100%;
        flex-wrap: wrap;
    }
    .box-2 .background {
        width: 100%;
    }
    .box-2 .text {
        width: 100%;
    }

    /* BOX 3 */

    .box-3 {
        width: 100%;
        flex-wrap: wrap;
    }
    .box-3 .background {
        width: 100%;
        border-radius: 0;
    }
    .box-3 .text {
        width: 100%;
    }

    /* QUADRATONI */

    .cont-squares {
        width: 100%;
        height: 300px;
        margin-bottom: 50px;
    }
    .container-squares {
        width: 100%;
        height: 100%;
        flex-wrap: wrap;
    }
    .container-squares .square1,
    .container-squares .square2,
    .container-squares .square3 {
        height: 300px;
    }
}

@media screen and (min-width: 769px) and (max-width: 978px) {
    /* JUMBO */

    .container-jumbo h1 {
        font-size: 35px;
    }
    .container-jumbo h3 {
        font-size: 15px;
    }
    .container-jumbo h2 {
        font-size: 20px;
        display: inline-block;
    }

    /* Searchbar */

    .search {
        width: 60%;
    }
    .searchTerm {
        font-size: 15px;
    }

    /* Primo main */

    .cont-m {
        height: 2250px;
        margin-bottom: 50px;
        padding-top: 0px;
    }
    .container-main {
        width: 100%;
        height: 100%;
        border-radius: 0;
    }

    /* BOX 1 */

    .box-1 {
        width: 100%;
        flex-wrap: wrap;
    }
    .box-1 .background {
        width: 100%;
        border-radius: 0;
    }
    .box-1 .text {
        width: 100%;
    }

    /* BOX 2 */

    .box-2 {
        width: 100%;
        flex-wrap: wrap;
    }
    .box-2 .background {
        width: 100%;
    }
    .box-2 .text {
        width: 100%;
    }

    /* BOX 3 */

    .box-3 {
        width: 100%;
        flex-wrap: wrap;
    }
    .box-3 .background {
        width: 100%;
        border-radius: 0;
    }
    .box-3 .text {
        width: 100%;
    }

    /* QUADRATONI */

    .cont-squares {
        width: 100%;
        height: 300px;
        margin-bottom: 50px;
    }
    .container-squares {
        width: 100%;
        height: 100%;
        flex-wrap: wrap;
    }
    .container-squares .square1,
    .container-squares .square2,
    .container-squares .square3 {
        width: calc(100% / 3);
        height: 300px;
    }
}
</style>
