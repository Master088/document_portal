<template>
    <header class="bg-light">
      <div class="head-container py-3">
        <a href="#"><p class="logout"><i class="bi bi-box-arrow-left icon-size"></i> John Doe</p></a>
      </div>
    </header>
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
.head-container{
  overflow: hidden;
}
.logout{
  float: right;
  margin-top: -8px;
  color: black;
  padding: 10px;
  /* border: solid 1px rgba(0, 0, 0, 0.312); */
  /* border-radius: 10px; */
}
.icon-size{
  font-size: 1.2rem;
}
</style>
  