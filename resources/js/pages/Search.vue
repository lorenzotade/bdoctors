<template>
    <div class="page-container">
        <div class="custom-container">
            <div class="container-left box">
                <div class="advanced-search">
                    <h3>Filtra i risultati</h3>
                    <div class="city">
                        <label for="city">Filtra per città di ricerca:</label>
                        <input
                            type="text"
                            id="city"
                            v-model="cityModel"
                            placeholder="ES: Milano"
                        />
                    </div>

                    <div class="avg-reviews">
                        <label for="avg-reviews">
                            Seleziona una media voti di base
                        </label>
                        <select
                            v-model="avgModel"
                            name="avg-reviews"
                            id="avg-reviews"
                        >
                            <option value="" hidden>-</option>
                            <option value="5">5</option>
                            <option value="4">4</option>
                            <option value="3">3</option>
                            <option value="2">2</option>
                            <option value="1">1</option>
                        </select>
                    </div>

                    <div class="ordered-results">
                        <label for="ordered_results">
                            Ordina in base a numero di recensioni:
                        </label>
                        <input
                            type="checkbox"
                            class="check"
                            id="ordered_results"
                            v-model="orderedModel"
                        />
                    </div> <!-- /end ordered-results -->

                    <div class="buttons">
                        <button @click="getData" class="btn">
                            Cerca
                        </button>
                        <button class="btn" @click="resetResearch">
                            Reset
                        </button>
                    </div> <!-- end button console -->
                </div> <!-- /end advanced-search -->
            </div> <!-- /end container-left -->

            <!-- CONTAINER RIGHT -->
            <div class="container-right">
                <div v-if="specSel.name" class="spec-border">
                    <h1>{{ specSel.name }}</h1>
                </div>
                <!-- CARD + SPONSORED -->
                <div>
                    <div
                        class="card-doctor box"
                        v-for="doctor in doctors"
                        :key="doctor.id"
                        :style="getBadge(doctor) ? (`border: 1px solid orange`) : null"
                        v-show="filter === true"
                    >
                        <!-- SPONSORED BADGE -->
                        <div v-if="getBadge(doctor)" class="sponsored-badge">
                            <i class="fas fa-gem"></i>
                            <p>Account Premium</p>
                        </div>

                        <!-- CARD TOP -->
                        <div class="card-top">
                            <!-- Picture-selection -->
                            <div
                                v-if="doctor.profile.picture"
                                class="profile-picture 1"
                                :style="{
                                    backgroundImage:
                                        'url(' +
                                        '../storage/' +
                                        doctor.profile.picture +
                                        ')'
                                }"
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
                            </div> <!-- /end doctor-detail -->
                        </div> <!-- /end card-top -->

                        <!-- CARD BOTTOM -->
                        <div class="card-bottom">
                            <h4>{{ doctor.city }}</h4>
                            <h4 v-if="doctor.avg_user">
                                {{ doctor.avg_user.toFixed(1) }}
                                <i class="fas fa-star"></i>
                                <span
                                    >({{
                                        doctor.reviews.length
                                    }}
                                    recensioni)</span
                                >
                            </h4>
                        </div> <!-- /end card-bottom -->

                        <router-link
                            :to="{name: 'detail', params: { slug: doctor.slug }}"
                        >
                            <button class="btn">visualizza dettagli</button>
                        </router-link>
                    </div> <!-- /end card + sponsored -->
                </div> <!-- /end outer card container -->
            </div> <!-- /end container-right -->
        </div> <!-- /end custom-container -->
    </div> <!-- /end page-container -->
</template>

<script>
import axios from "axios";

export default {
    name: "Search",
    props: {
        spec: Object,
        specSlug: String
    },
    data() {
        return {
            docsFilt: "",
            doctors: [],
            specs: [],
            specSel: this.$route.params.spec,
            avgModel: "",
            cityModel: "",
            orderedModel: "",
            filter: true,
            specIdProva: this.$route.params.spec.id,
            filteredDocs: [],
            ordinaryDocs: []
        };
    },
    methods: {
        getData() {
            axios
                .get("http://127.0.0.1:8000/api/users?", {
                    params: {
                        spec: this.specIdProva,
                        city: this.cityModel,
                        avg: this.avgModel,
                        ordered: this.orderedModel
                    }
                })
                .then(res => {
                    this.doctors = res.data.users;
                    this.specs = res.data.specialization;
                    this.filteredDocs = [];
                    this.ordinaryDocs = [];
                    this.doctors.forEach(doctor => {
                        if (doctor.sponsorships.length !== 0 && new Date(doctor.sponsorships[doctor.sponsorships.length - 1].pivot.due_date) >= new Date(this.currentDate())) {
                            this.filteredDocs.push(doctor);
                        } else {
                            this.ordinaryDocs.push(doctor);
                        }
                    });
                })
                .catch(err => {
                    console.log(err);
                });
        },
        getAvg() {
            this.doctors.forEach(doctor => {
                let voteArray = [];
                let sumVotes = 0;
                let avgVotes = 0;
                doctor.reviews.forEach(review => {
                    voteArray.push(review.vote);
                    sumVotes += review.vote;
                    avgVotes = (sumVotes / voteArray.length).toFixed(1);
                    doctor.avgVotes = avgVotes;
                    doctor.numReviews = voteArray.length;
                });
            });
        },
        resetResearch() {
            this.avgModel = "";
            this.cityModel = "";
            this.orderedModel = "";
            this.getData();
        },
        currentDate() {
            const current = new Date();
            const date = `${current.getFullYear()}-${current.getMonth() +
                1}-${current.getDate()} ${current.getHours()}:${current.getMinutes()}:${current.getSeconds()}`;
            return date;
        },
        getBadge(doctor) {
            if (doctor.sponsorships.length > 0) {
                if (new Date(doctor.sponsorships[doctor.sponsorships.length - 1].pivot.due_date) >= new Date(this.currentDate())) {
                    return true;
                }
            }
        }
    },
    created() {
        this.getData();
    }
};
</script>

<style lang="scss" scoped>

/* GENERAL */

$white: #ffff;
$green: #2ea497;
$background: #ffff;
$shadow: lightgray;
$btn-background: #9bd6cf;
* {
    list-style: none;
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

.buttons {
    display: flex;
    flex-direction: column;
    align-content: center;
}

input {
    background-color: $white;
    border-radius: 100px;
    height: 30px;
    width: 100%;
    border: 1px solid lightgray;
    padding: 15px 25px;
    margin-bottom: 20px;
    cursor: pointer;
    letter-spacing: 1px;
    transition: 0.1s;
    &:focus {
        border: 3px solid $green;
        outline: none;
    }
}

select {
    background-color: $white;
    border-radius: 100px;
    height: 30px;
    width: 100%;
    padding: 0 10px;
    border: 1px solid lightgray;
    margin-bottom: 20px;
    cursor: pointer;
    letter-spacing: 1px;
    transition: 0.1s;
    &:focus {
        border: 3px solid $green !important; /* important obbligatorio */
        outline: none !important; /* important obbligatorio */
    }
}

.box {
    background-color: $white;
    border-radius: 20px;
    padding: 15px 20px;
    border: 1px solid rgb(241, 241, 241);
    box-shadow: 0 0 5px 3px $shadow;
}

.dot-list {
    list-style-position: inside;
}

/* PAGE */

.page-container {
    background-color: $background;
    width: 100%;
    height: 100%;
    min-height: calc(100vh - 80px - 150px);
    font-family: sans-serif;
}

.custom-container {
    width: 80%;
    margin: auto;
    padding: 50px 0;
    display: flex;
}

.container-left {
    width: 25%;
    margin-right: 5%;
    height: 100%;
    h3 {
        position: relative;
        margin-bottom: 10px;
        padding-bottom: 10px;
        &::after {
            position: absolute;
            content: "";
            height: 3px;
            bottom: 0;
            left: 0;
            width: 100%;
            background: $green;
            border-radius: 5px;
        }
    }
    label {
        display: block;
        margin-left: 10px;
        margin-bottom: 0;
    }
    .ordered-results {
        display: flex;
        justify-content: space-between;
        align-items: center;
        label {
            width: 80%;
        }
        input {
            width: 20%;
            margin-top: 15px;
        }
    }
}

.container-right {
    width: 70%;
    height: 100%;
    .spec-border {
        border-radius: 20px;
        border: 5px solid $green;
        padding: 15px 25px;
        margin-bottom: 20px;
        h1 {
            margin-bottom: 0;
            letter-spacing: 2px;
        }
    }
}

/* CARD */

.card-doctor {
    width: 100%;
    margin-bottom: 30px;
    display: flex;
    flex-direction: column;
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
        .doctor-details {
            margin-left: 30px;
            margin-top: 10px;
        }
        h2 {
            margin-top: 5px;
        }
        .profile-picture {
            width: 100px;
            height: 100px;
            min-width: 100px;
            background-color: $background;
            border-radius: 50%;
            border: 3px solid $green;
            background-position: center;
            background-repeat: no-repeat;
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
    .card-bottom {
        margin: 0 10px;
        display: flex;
        justify-content: space-between;
        .fa-star {
            color: orange;
        }
    }
}

.box-red {
    background-color: red;
}
</style>
