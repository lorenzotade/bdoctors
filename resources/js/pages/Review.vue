<template>
    <div class="page-container">
        <div class="custom-container">
            <button style="margin-bottom: 20px" class="btn" @click="goBack">
                Torna al dottore
            </button>
            <div class="form-container box">
                <h1 v-if="doctor.gender === 0">
                    Recensisci: Dott. {{ doctor.first_name }}
                    {{ doctor.last_name }}
                </h1>
                <h1 v-else>
                    Recensisci: Dott.ssa {{ doctor.first_name }}
                    {{ doctor.last_name }}
                </h1>

                <!-- ERRORS -->
                <div class="errors" v-if="this.errors.length">
                    <b>Si sono verificati degli errori:</b>
                    <ul>
                        <li v-for="(error, index) in errors" :key="index">
                            {{ error }}
                        </li>
                    </ul>
                </div> <!-- /end errors -->

                <form @submit.prevent="checkForm">
                    <div class="name-form">
                        <label for="name">Inserisci il tuo nome:</label>
                        <input
                            v-model="name"
                            type="text"
                            placeholder="Nome"
                            id="name"
                        />
                    </div>
                    <div class="vote-form">
                        <label for="vote">Voto:</label>
                        <select v-model="vote" type="number" id="vote">
                            <option value="" hidden>-</option>
                            <option value="5">5</option>
                            <option value="4">4</option>
                            <option value="3">3</option>
                            <option value="2">2</option>
                            <option value="1">1</option>
                        </select>
                    </div>
                    <div class="title-form">
                        <label for="title">Titolo:</label>
                        <input
                            v-model="title"
                            type="title"
                            placeholder="Titolo"
                            id="title"
                        />
                    </div>
                    <div class="content-form">
                        <label for="content">Contenuto:</label>
                        <textarea
                            v-model="content"
                            id="content"
                            cols="30"
                            rows="10"
                            placeholder="Inizia a scrivere..."
                        ></textarea>
                    </div>

                    <button type="submit" class="btn">Invia recensione</button>

                </form>
            </div> <!-- /end form-container -->
        </div> <!-- /end custom-container -->
    </div> <!-- /end page-container -->
</template>

<script>
import axios from "axios";

export default {
    name: "Review",
    props: {
        doctor: Object
    },
    data() {
        return {
            doctorId: this.doctor.id,
            name: "",
            vote: "",
            title: "",
            content: "",
            slug: this.doctor.slug,
            errors: []
        };
    },
    methods: {
        checkForm() {
            this.errors = [];

            if (!this.name || this.name.length < 4 || this.name.length > 255) {
                this.errors.push(
                    "Il nome è obbligatorio e deve essere compreso tra i 3 e i 255 caratteri."
                );
            }
            if (!this.vote || this.vote < 1 || this.vote > 5) {
                this.errors.push(
                    "Il voto è obbligatorio e deve essere un numero compreso tra 1 e 5."
                );
            }
            if (!this.title || this.title.length < 4 || this.title.length > 255) {
                this.errors.push(
                    "Il titolo è obbligatorio e deve essere compreso tra i 3 e i 255 caratteri."
                );
            }
            if (!this.content || this.content.length < 4 || this.content.length > 65000) {
                this.errors.push(
                    "Il contenuto è obbligatorio e deve essere compreso tra i 3 e i 65000 caratteri."
                );
            }
            if (!this.errors.length) {
                this.sendForm();
            }
        },
        sendForm() {
            axios
                .post("/api/reviews", {
                    user_id: this.doctor.id,
                    name: this.name,
                    title: this.title,
                    content: this.content,
                    vote: this.vote
                })
                .then(resp => {
                    console.log(resp);
                })
                .catch(err => {
                    console.log(err);
                });

            this.$router.push({ name: "detail", params: { slug: this.slug } });
        },
        goBack() {
            this.$router.push({ name: "detail", params: { slug: this.slug } });
        }
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
    background-color: $green;
    color: white;
    border-radius: 100px;
    border: 3px solid $green;
    padding: 15px 25px;
    cursor: pointer;
    text-transform: uppercase;
    font-weight: bold;
    letter-spacing: 1px;
    transition: 0.1s;
    &:hover {
        background-color: $btn-background;
    }
}

input {
    background-color: $white;
    border-radius: 100px;
    height: 30px;
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

h1 {
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
}

.errors {
    color: #ff0000;
}

form {
    display: flex;
    flex-direction: column;
    label {
        display: block;
        margin-left: 10px;
    }
    .name-form input {
        width: 100%;
        max-width: 400px;
    }
    .title-form input {
        width: 100%;
    }
    textarea {
        resize: none;
        background-color: $white;
        width: 100%;
        border-radius: 10px;
        border: 1px solid lightgray;
        padding: 15px 25px;
        cursor: pointer;
        letter-spacing: 1px;
        transition: 0.1s;
        &:focus {
            border: 3px solid $green;
            outline: none;
        }

        /* width */
        &::-webkit-scrollbar {
            width: 15px;
        }
        &::-webkit-scrollbar-track {
            border-radius: 100px;
            background-color: $white;
            padding: 10px;
        }

        /* Handle */
        &::-webkit-scrollbar-thumb {
            background: gray;
            border-radius: 10px;
            border: 3px solid $white;
        }

        /* Handle on hover */
        &::-webkit-scrollbar-thumb:hover {
            background: $green;
        }
    }
    button {
        text-transform: uppercase;
        width: 100%;
        max-width: 500px;
        margin: 15px auto 0;
    }
}

select {
    background-color: $white;
    border-radius: 100px;
    height: 30px;
    width: 100%;
    max-width: 400px;
    min-width: 300px;
    padding: 0 10px;
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
</style>
