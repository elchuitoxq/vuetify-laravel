<template>
    <v-app-bar
        color="primary"
        dark
      >
        <v-toolbar-title>Dancing Death</v-toolbar-title>
        <v-spacer></v-spacer>
        <v-toolbar-items v-if="auth == false">
            <v-btn text to="/">Home</v-btn>
            <v-btn text to="/login">Login</v-btn>
            <v-btn text to="/signin">Signin</v-btn>
        </v-toolbar-items>
        <v-toolbar-items v-else>
            <v-menu
                left
                bottom
            >
                <template v-slot:activator="{ on }">
                    <v-btn text v-on="on">{{auth.name}}</v-btn>
                </template>

                <v-list>
                    <v-list-item>
                        <v-list-item-title @click="logout()">Logout</v-list-item-title>
                    </v-list-item>
                </v-list>
            </v-menu>
        </v-toolbar-items>
    </v-app-bar>
</template>
<script>

export default({
    name: 'Bar',
    props: {
        auth: {
            type: Object,
            default: false
        }
    },
    data() {
        return {
            logoutUrl: '/logout'
        }
    },
    methods: {
        logout(){
            const vm = this
            axios({
                method: 'post',
                url: vm.logoutUrl
            }).then(function(response){
                window.location.href = "/"
            });
        }
    },
})
</script>