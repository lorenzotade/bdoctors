<template>
  <header>
    
    <div class="h-container">

      <div class="logo">
        <router-link to="/" tag="img" src="img/logo1.svg" class="logo-img logo-big"></router-link>
        <router-link to="/" tag="img" src="img/logosmall.svg" class="logo-img logo-small"></router-link>
        <!-- !!! AL REFRESH DI PAGINE NON HOME IL LOGO SCOMPARE !!! -->
      </div>

      <!-- LOGIN - REGISTER LINKS -->
      <div id="myLinks">
        <a href="http://127.0.0.1:8000/login">Accedi</a>
        <a href="http://127.0.0.1:8000/register">Sei un medico?</a>
      </div>
      <!-- HAMBURGER MENU -->
      <a href="javascript:void(0);" class="icon hamburger" v-on:click="open = false" :class="open === false ? 'active' : null">
        <i class="fa fa-bars"></i>
      </a>
      <a href="javascript:void(0);" class="icon cross" v-on:click="open = true" :class="open === true ? 'active' : true">
        <i class="fas fa-times"></i>
      </a>

    </div> <!-- /end h-container -->

    <div class="link-container" :class="open === false ? 'active' : null">
      <div id="myLinks">
        <a class="first-link" href="http://127.0.0.1:8000/login">Accedi</a>
        <a class="second-link" href="http://127.0.0.1:8000/register">Sei un medico?</a>
      </div>
    </div>
    
  </header>
</template>

<script>
export default {
  name: 'Header',
  data(){
    return {
      open: true
    }
  },
}
</script>

<style lang="scss" scoped>
$white: #ffff;
$green: #2ea497;
$background: #EAFDFA;
$btn-background: #9bd6cf;
  
.h-container{
  padding-left: 30px;
  padding-right: 30px;
  width: 100%;
  background-color: #2ea497;
  height: 80px;
  margin: auto;
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.h-container .logo{
  height: 100%;
  display: flex;
  align-items: center;
}
.h-container .logo-small{
  display: none;
}
.logo img{
  height: 60%;
  margin: auto;
  cursor: pointer;
  transition: 0.1s;
  &:hover {
    filter: brightness(0) invert(1);
  }
}
.h-container div a{
  color: white;
  border: 2px solid $white;
  padding: 5px 15px;
  border-radius: 10px;
  text-decoration: none;
  font-size: 25px;
  margin-left: 20px;
  transition: 0.2s;
  &:hover{
    color: white;
    border-color: white;
    background-color: #2B7871;
  }
}
.link-container.active{
  height:100px;
  width: 100%;
  position: relative;
  left: 0px;
  background-color: #2B7871;
  display: block;
}
.link-container{
  height:100px;
  width: 30%;
  position: relative;
  background-color: #2B7871;
  left: 70%;
  display: none;
}
.link-container a{
  text-decoration: none;
  color: white;
  font-size: 20px;
  cursor: pointer;
}
.link-container a.first-link{
  top: 20%;
  right: 20px;
  position: absolute;
}
.link-container a.second-link{
  top: 60%;
  right: 20px;
  position: absolute;
}
.h-container #myLinks.active {
display: block;
}
.h-container .cross.active{
    display: none;
}
.h-container .hamburger.active{
  display: none;
}
.h-container .hamburger{
  display: none;
}

/* MEDIA QUERY */

@media (max-width:515px) {

  .link-container a{
  font-size: 13px;
  cursor: pointer;
  }
  .h-container i {
  color: white;
  font-size: 30px;
  }
  .h-container .hamburger{
  color: white;
  font-size: 30px;
  display: block;
  }
  .h-container .cross{
  color: white;
  font-size: 30px;
  display: block;
  }
  .h-container #myLinks {
  display: none;
  }
  .h-container .logo-small{
    display: block;
  }
  .h-container .logo-big{
    display: none;
  }

}

@media screen and (min-width: 516px) and (max-width: 768px) {

  .h-container i {
  color: white;
  font-size: 30px;
  }
  .h-container .hamburger{
  color: white;
  font-size: 30px;
  display: block;
  }
  .h-container .cross{
  color: white;
  font-size: 30px;
  display: block;
  }
  .h-container #myLinks {
  display: none;
  }
  .h-container .logo-small{
    display: none;
  }

}

</style>