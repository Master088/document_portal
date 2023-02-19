<template>
  <div class="wrapper">
      <div class="sidebar">
        <div class="logo-container" align="center">
          <img class="img-logo" src="../assets/logos/logo.png" alt="logo">
          <p class="text-white mt-1">CLSU <br> DOCUMENT PORTAL </p>
        </div>
        <div class="underline px-1">
          <hr />
        </div>
          <ul>
            <li class="nav-bar">
              
              
              <router-link to="/department/dashboard" ><i class="bi bi-file-earmark-text"></i> <span class="px-4">Dashboard</span></router-link>
            
            </li>
            <li class="nav-bar"><a href="#"><i class="bi bi-archive"></i> <span class="px-4">Archive</span></a></li>
          </ul>
      </div>
  </div>
  
</template>
<script>


export default {
  components: {
  
  },
}
</script>

<style scoped>
*{
margin: 0;
padding: 0;
box-sizing: border-box;
list-style: none;
text-decoration: none;
font-family: 'Poppins', sans-serif;
}
.img-logo{
height: 90px;
width: auto;
}
.underline{
margin-top: 10px;
color: #fff;
}
.wrapper{
display: flex;
position: relative;
}

.wrapper .sidebar{
width: 200px;
height: 100%;
background: #16796F;
padding: 30px 0px;
position: relative;

}
.wrapper .sidebar ul{
margin-top: 100px;
padding: 5px;

}
.wrapper .sidebar ul .nav-bar{
padding: 10px;
border-radius: 5px;
transition: all .5s ease;
}    

.wrapper .sidebar ul .nav-bar a{
color: #ffffff;
display: block;

}
.wrapper .sidebar ul .nav-bar:hover{
background-color: #10564F;

}
a{
color: inherit;
}
.wrapper .sidebar ul .nav-bar:hover a{
color: #fff;
}
</style>
