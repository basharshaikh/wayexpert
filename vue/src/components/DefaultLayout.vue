<!-- This example requires Tailwind CSS v2.0+ -->
<template>
    <div class="min-h-full">
      <header class="bg-black shadow">
          <nav class="flex items-center justify-between flex-wrap bg-teal-500 p-6">
          <div class="flex items-center flex-shrink-0 text-white mr-6">
              <span class="font-semibold text-xl tracking-tight">Admin Dashboard</span>
          </div>
          <div class="block lg:hidden">
              <button class="flex items-center px-3 py-2 border rounded text-teal-200 border-teal-400 hover:text-white hover:border-white">
              <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
              </button>
          </div>
          <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
              <div class="text-sm lg:flex-grow">
                  <router-link :to="{name: 'Dashboard'}" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
                      Dashboard
                  </router-link>
              </div>
              <div>
              <a @click="logout" class="cursor-pointer inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4 lg:mt-0">Logout</a>
              </div>
          </div>
          </nav>
      </header>
  
      <router-view></router-view>
  <!-- <pre>
    {{store.state.user}}
  </pre> -->
      <!-- <Notification /> -->
    </div>
  </template>
  
  <script setup>
  import { useRoute, useRouter } from 'vue-router';
  import { useStore } from 'vuex';
//   import Notification from './Notification.vue';

  
  
  const store = useStore();
  const router = useRouter();
  
  function logout(){
      store.dispatch('logout') 
      .then(() => {
          router.push({
              name: 'Login'
          })
      })
      .catch((err) => {
        console.log(err.response.data);
    })
  }
  
  

  
  </script>