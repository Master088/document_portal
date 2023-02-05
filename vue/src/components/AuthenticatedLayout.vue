<!-- This example requires Tailwind CSS v2.0+ -->
<template>
  <div class="min-h-full">
    <Sidebar></Sidebar>
    <Header></Header>
    <router-view :key="$route.path"></router-view>
    <Footer></Footer>
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

</style>