<template>
    <div class="page-container">
        <div class="custom-container">
            <div class="container-left">
                <div class="doctor-top">
                    <div
                        v-if="doctor.profile.picture"
                        class="profile-picture 1"
                        :style="{backgroundImage:'url(' + '../storage/' + doctor.profile.picture + ')'}"
                    ></div>
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

                    <div class="doctor-detail">
                        <div class="doctor-detail-top">
                            <h1 v-if="doctor.gender === 0">
                                Dott. {{ doctor.first_name }}
                                {{ doctor.last_name }}
                            </h1>
                            <h1 v-else>
                                Dott.ssa {{ doctor.first_name }}
                                {{ doctor.last_name }}
                            </h1>

                            <ul class="specs">
                                <li
                                    class="badge"
                                    v-for="spec in doctor.specs"
                                    :key="spec.id"
                                >
                                    {{ spec.name }}
                                </li>
                            </ul>
                        </div> <!-- /end doctor-detail top -->

                        <div class="doctor-detail-bottom">
                            <div class="btn-container">
                                <router-link
                                    style="margin-top: 10px;"
                                    :to="{
                                        name: 'review',
                                        params: { doctor: doctor }
                                    }"
                                    ><button class="btn">
                                        Lascia una recensione
                                    </button></router-link
                                >

                                <router-link
                                    style="margin-top: 10px;"
                                    :to="{
                                        name: 'contact',
                                        params: { doctor: doctor }
                                    }"
                                    ><button class="btn">
                                        Invia un messaggio
                                    </button></router-link
                                >
                            </div>

                            <div class="vote" v-if="doctor.avg_user">
                                <h4>
                                    {{ doctor.avg_user.toFixed(1) }}
                                    <i class="fas fa-star"></i>
                                    <span
                                        >({{
                                            doctor.reviews.length
                                        }}
                                        recensioni)</span
                                    >
                                </h4>
                            </div>
                        </div> <!-- /end doctor-detail bottom -->
                    </div> <!-- /end doctor-detail -->
                </div> <!-- /end doctor-top -->

                <div class="doctor-bottom">
                    <ul class="details box">
                        <li v-if="doctor.profile.education">
                            <h2>Educazione</h2>
                            <p style="white-space: pre-wrap;">{{ doctor.profile.education }}</p>
                        </li>

                        <li v-if="doctor.profile.experience">
                            <h2>Esperienza</h2>
                            <p style="white-space: pre-wrap;">{{ doctor.profile.experience }}</p>
                        </li>

                        <li v-if="doctor.services">
                            <h2>Prestazioni</h2>
                            <ul class="dot-list">
                                <li
                                    v-for="service in doctor.services"
                                    :key="service.id"
                                >
                                    {{ service.name }} - € {{ service.price }}
                                </li>
                            </ul>
                        </li>
                    </ul> <!-- /end details -->

                    <div v-if="doctor.reviews" class="reviews box">
                        <h2>Recensioni</h2>
                        <ul>
                            <li
                                v-for="review in doctor.reviews"
                                :key="review.id"
                            >
                                <div class="review-top">
                                    <div class="review-left">
                                        <p>{{ review.name }}</p>
                                        <h4>{{ review.title }}</h4>
                                    </div>
                                    <div class="review-right">
                                        <h4>{{ review.vote }}</h4>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                                <p>{{ review.content }}</p>
                            </li>
                        </ul>
                    </div> <!-- /end reviews -->
                </div> <!-- /end doctor-bottom -->
            </div>

            <div class="container-right box">
                <h3>Contatti</h3>
                <ul>
                    <li>
                        <i class="fas fa-city"></i>
                        {{ doctor.city }} (CAP {{ doctor.postal_code }})
                    </li>
                    <li>
                        <i class="fas fa-map-marker-alt"></i>
                        {{ doctor.street }}
                    </li>
                    <li v-if="doctor.profile.telephone">
                        <i class="fas fa-phone-alt"></i>
                        {{ doctor.profile.telephone }}
                    </li>
                    <li v-if="doctor.profile.cellphone">
                        <i class="fas fa-mobile-alt"></i>
                        {{ doctor.profile.cellphone }}
                    </li>
                </ul>
            </div> <!-- /end container-right -->
        </div> <!-- /end custom-container -->
    </div> <!-- /end page-container -->
</template>

<script>
import axios from "axios";

export default {
    name: "DoctorDetail",
    props: ["slug"],
    data() {
        return {
            selectedSlug: this.$route.params.slug,
            doctor: {}
        };
    },
    methods: {
        getData() {
            axios
                .get(
                    "http://127.0.0.1:8000/api/users/" + this.$route.params.slug
                )
                .then(res => {
                    this.doctor = res.data.result;
                })
                .catch(err => {
                    console.log(err);
                });
        }
    },
    mounted() {
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

.fas {
    width: 10px;
    color: $green;
    margin-right: 20px;
}

.fa-star {
    color: orange;
}

.btn {
    background-color: $green;
    border-radius: 100px;
    border: 3px solid $green;
    font-size: 0.8rem;
    color: white;
    width: 220px;
    height: 40px;
    cursor: pointer;
    text-transform: uppercase;
    font-weight: bold;
    letter-spacing: 1px;
    transition: 0.1s;
    display: flex;
    justify-content: center;
    align-items: center;
    text-decoration: none;
    &:hover {
        background-color: $btn-background;
        text-decoration: none;
    }
}

.box {
    background-color: $white;
    border-radius: 20px;
    padding: 15px 20px;
    border: 1px solid lightgray;
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
    padding-top: 50px;
    display: flex;
    .container-left {
        width: 80%;
    }
    .container-right {
        width: 20%;
        margin-left: 20px;
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
        li {
            margin-bottom: 10px;
            &:last-child {
                margin-bottom: 0;
            }
        }
    }
}

.doctor-top {
    width: 100%;
    display: flex;
    .profile-picture {
        width: 250px;
        height: 250px;
        min-width: 250px;
        background-color: $background;
        border-radius: 50%;
        border: 5px solid $green;
        background-position: center;
        background-repeat: no-repeat; /* Do not repeat the image */
        background-size: cover;
    }
    .doctor-detail {
        margin-left: 50px;
        margin-top: 50px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
    .doctor-detail-top {
        .specs {
            display: flex;
            flex-wrap: wrap;
            .badge {
                background-color: $green;
                color: $white;
                font-size: 1rem;
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
    .doctor-detail-bottom {
        width: 100%;
        display: flex;
        justify-content: space-between;
        .btn-container {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            .btn {
                margin-right: 10px;
            }
        }
        .vote {
            width: 100%;
            display: flex;
            align-items: flex-end;
        }
    }
}

.doctor-bottom {
    margin-bottom: 50px;
    > * {
        width: 100%;
        margin-top: 30px;
    }
    li {
        margin-bottom: 30px;
        &:last-child {
            margin-bottom: 0;
        }
    }
    .dot-list {
        margin-left: 20px;
        li {
            margin-bottom: 10px;
            &::before {
                content: "\2022"; /* Add content: \2022 is the CSS Code/unicode for a bullet */
                color: $green; /* Change the color */
                font-weight: bold;
                display: inline-block;
                width: 1em;
                margin-left: -1em;
            }
        }
    }
    h2 {
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
}

.reviews {
    li {
        position: relative;
        margin-bottom: 10px;
        padding-bottom: 10px;
        border-bottom: 1px solid lightgray;
        * {
            margin-bottom: 0;
        }
        &:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border: none;
        }
        .review-top {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            .review-right {
                display: flex;
                align-items: center;
                justify-content: center;
            }
        }
    }
}
</style>
