<template>
  <div class="min-h-full test">
    <div class="sidebar">
      <Sidebar></Sidebar>
      <div class="header">
        <Header></Header>
        <router-view :key="$route.path" ></router-view>
        <div class="footer">
          <Footer></Footer>
        </div>
      </div>
      
    </div>
    
  </div>
</template>

<script>
 
 
import { useStore } from "vuex";
import { computed } from "vue";
import { useRouter } from "vue-router";
import Header from "./Header.vue";
import Sidebar from "./Sidebar.vue";
import Footer from "./Footer.vue";
 

const navigation = [
  { name: "Dashboard", to: { name: "Dashboard" } },
  { name: "surveys", to: { name: "Surveys" } },
];

export default {
  components: {
    Header,
    Sidebar,
    Footer,
  },
  setup() {
    const store = useStore();
    const router = useRouter();

    function logout() {
      store.dispatch("logout").then(() => {
        router.push({
          name: "Login",
        });
      });
    }

    // store.dispatch("getUser");

    return {
      user: computed(() => store.state.user.data),
      navigation,
      logout,
    };
  },
};
</script>

<style scoped>
.sidebar{
  display: flex;
  min-height: 100vh !important;
  position: relative;
  
}
.header{
  flex-grow: 1;
}
.footer{
  position: sticky;
  top: 100%;
}
</style>