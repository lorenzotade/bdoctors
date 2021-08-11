<template>
    <footer>
        <!-- SOCIAL BUTTONS -->
        <ul class="social">
            <li>
                <a class="i-blue">
                    <i class="fab fa-facebook-f"> </i>
                </a>
            </li>
            <li>
                <a class="i-cyan">
                    <i class="fab fa-twitter"> </i>
                </a>
            </li>
            <li>
                <a class="i-red">
                    <i class="fab fa-google-plus-g"> </i>
                </a>
            </li>
            <li>
                <a class="i-link">
                    <i class="fab fa-linkedin-in"> </i>
                </a>
            </li>
            <li>
                <a class="i-pink">
                    <i class="fab fa-dribbble"> </i>
                </a>
            </li>
        </ul> <!-- /end buttons -->

        <!-- COPYRIGHT -->
        <div class="copyright">
            © 2020 Copyright:
            <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">&nbsp;bDoctors.it</a>
        </div>

    </footer>
</template>

<script>

    export default {
        name: "Footer"
    };

</script>

<style lang="scss" scoped>

footer {
    width: 100%;
    height: 150px;
    background-color: #2ea397;
    display: flex;
    flex-direction: column;
}
.social {
    background-color: #2ea397;
    height: 75%;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}

/* SOCIAL */

.social {
    list-style: none;
    margin-top: 10px;
}
.social li {
    display: inline;
    margin-left: 30px;
    margin-right: 30px;
}
.social a {
    text-decoration: none;
    color: white;
    font-size: 30px;
    &:hover {
      filter: brightness(1.2);
    }
}
.social a.i-blue {
    background-color: #3c5998;
    padding: 5px 13px 5px 13px;
    border-radius: 50%;
    transition: 0.1s;
}
.social a.i-cyan {
    background-color: #55acee;
    padding: 5px 7px 5px 7px;
    border-radius: 50%;
    transition: 0.1s;
}
.social a.i-red {
    background-color: #dd4b39;
    padding: 5px 5px 5px 5px;
    border-radius: 50%;
    transition: 0.1s;
}
.social a.i-link {
    background-color: #1a82ca;
    padding: 5px 10px 5px 10px;
    border-radius: 50%;
    transition: 0.1s;
}
.social a.i-pink {
    background-color: #ec4a89;
    padding: 5px 9px 5px 9px;
    border-radius: 50%;
    transition: 0.1s;
}

/* COPYRIGHT */

.copyright {
    background-color: #2b7871;
    height: 25%;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: flex-end;
    color: lightgray;
}
.copyright a {
    text-decoration: none;
    color: white;
}

/* MEDIA QUERY */

@media (max-width: 420px) {

    .social li {
        margin-left: 10px;
        margin-right: 10px;
    }
}

@media screen and (min-width: 421px) and (max-width: 550px) {
    
    .social li {
        display: inline;
        margin-left: 20px;
        margin-right: 20px;
    }
}

</style>
