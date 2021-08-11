<template>
    <div class="page-container">
        <div class="custom-container">
            <button style="margin-bottom: 20px" class="btn" @click="goBack">Torna al dottore</button>
            <div class="form-container box">
                <h1 v-if="doctor.gender === 0">
                    Invia un messaggio a: Dott. {{ doctor.first_name }}
                    {{ doctor.last_name }}
                </h1>
                <h1 v-else>
                    Invia un messaggio a: Dott.ssa {{ doctor.first_name }}
                    {{ doctor.last_name }}
                </h1>

                <div 
                class="errors"
                v-if="this.errors.length"
                >
                    <b>Si sono verificati degli errori:</b>
                    <ul>
                        <li v-for="(error, index) in errors" :key="index">{{ error }}</li>
                    </ul>
                </div>

                <form @submit.prevent="checkForm">
                    <div>
                        <label style="display:none" for="user_id"
                            >User Id</label
                        >
                        <input
                            v-model="doctorId"
                            style="display:none"
                            type="text"
                            placeholder="user id, da rimuovere"
                            id="user_id"
                        />
                    </div>
                    <div class="name-form">
                        <label for="name">Inserisci il tuo nome:</label>
                        <input
                            v-model="name"
                            type="text"
                            placeholder="Nome"
                            id="name"
                        />
                    </div>
                    <div class="email-form">
                        <label for="email">Inserisci la tua e-mail:</label>
                        <input
                            v-model="email"
                            type="email"
                            placeholder="Email"
                            id="email"
                        />
                    </div>
                    <div class="object-form">
                        <label for="object">Inserisci l'oggetto:</label>
                        <input
                            v-model="object"
                            type="text"
                            placeholder="Oggetto"
                            id="object"
                        />
                    </div>
                    <div class="content-form">
                        <label for="content">Inserisci il testo del messaggio:</label>
                        <textarea
                            v-model="content"
                            id="content"
                            placeholder="ES: Salve, vorrei organizzare una visita."
                            cols="30"
                            rows="10"
                        ></textarea>
                    </div>

                    <button type="submit" class="btn">Invia messaggio</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "Contact",
    props: {
        doctor: Object
    },
    data() {
        return {
            doctorId: this.doctor.id,
            name: "",
            email: "",
            object: "",
            content: "",
            slug: this.doctor.slug,
            errors: []
        };
    },
    methods: {
        checkForm() {

            this.errors = [];

            if(!this.name || this.name.length < 4 || this.name.length > 255) {
                this.errors.push('Il nome è obbligatorio e deve essere compreso tra i 3 e i 255 caratteri');
            }
            if(!this.email || this.email.length < 4 || !this.email.includes('@')) {
                this.errors.push('Il contenuto è obbligatorio e deve essere un indirizzo email');
            }
            if(!this.object || this.object.length < 4 || this.object.length > 255) {
                this.errors.push('L\'oggetto è obbligatorio e deve essere compreso tra i 3 e i 255 caratteri');
            }
            if(!this.content || this.content.length < 4 || this.content.length > 65000) {
                this.errors.push('Il contenuto è obbligatorio e deve essere compreso tra i 3 e i 65000 caratteri');
            }
            if (!this.errors.length) {
                this.sendForm();
            }

        },
        sendForm() {
            axios
                .post("/api/messages", {
                    user_id: this.doctor.id,
                    name: this.name,
                    email: this.email,
                    object: this.object,
                    content: this.content
                })
                .then(resp => {
                    console.log(resp);
                })
                .catch(err => {
                    console.log(err);
                });

            this.$router.push({ name:'detail', params: {slug:this.slug}})
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
    color: #FF0000;
}

form {
    display: flex;
    flex-direction: column;
    label {
        display: block;
        margin-left: 10px;
    }
    .name-form input {
        max-width: 400px;
    }
    .email-form input {
        max-width: 400px;
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

</style>
