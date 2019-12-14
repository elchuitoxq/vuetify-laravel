<template>
  <div>
    <bar :auth="auth"></bar>
    <v-content>
      <transition name="fade" mode="out-in">
        <router-view></router-view>
      </transition>
    </v-content>
  </div>
</template>

<script>
import Bar from './layouts/Bar.vue'
export default {
  name: 'App',
  data() {
    return {
      
    }
  },
  props:{
    auth: {
      type: Object,
      default: false
    }, 
  },
  components:{
    Bar
  },
  mounted() {
    console.log('Component mounted.')
  }
}
</script>
