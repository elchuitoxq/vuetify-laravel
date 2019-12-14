<template>
    <v-container>
        <show-calendar></show-calendar>
    </v-container>
</template>
<script>
import ShowCalendar from '../../calendar/ShowCalendar.vue'
export default {
    name: 'Home',
    data() {
        return {
            
        }
    },
    components:{
        ShowCalendar
    }
}
</script>