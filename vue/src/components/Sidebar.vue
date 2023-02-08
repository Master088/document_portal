<template>
    <div class="wrapper">
        <div class="sidebar">
          <div class="logo-container" align="center">
            <img class="img-logo" src="../assets/logos/logo.png" alt="logo">
            <p class="text-white mt-1">CLSU DOCUMENT PORTAL </p>
          </div>
          <div class="underline px-1">
            <hr />
          </div>
            
            <ul>
                <li class="nav-bar"><a data-bs-toggle="collapse" href="#collapseExample" role="button"> <i class="bi bi-file-earmark-text"></i><span class="px-4">My Files</span></a></li>
                <div class="collapse mt-2 mb-2" id="collapseExample">
                  <div class="card card-body">
                    <li class="sub-nav"><a href="#"><span>Name Here</span></a></li>
                    <li class="sub-nav"><a href="#"><span>Name Here</span></a></li>
                  </div>
                </div>
                <li class="nav-bar"><a href="#"><i class="bi bi-archive"></i> <span class="px-4">Archive</span></a>
                </li>
                
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
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;600;700&display=swap');

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
.sub-nav{
  padding: 10px;
  border-radius: 5px;
}
.sub-nav:hover{
  background-color: #10564F;
}   
.sub-nav:hover a{
  color: #fff;
}
.wrapper .sidebar ul .nav-bar:hover a{
  color: #fff;
}
@media (max-height: 500px){
  .social_media{
    display: none !important;
  }
}
</style>
  