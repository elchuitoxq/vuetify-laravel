<template>
    <v-container fluid fill-height>
        <v-layout align-center justify-center>
            <v-flex xs12 sm8 md4>
                <v-card class="elevation-12">
                    <v-toolbar dark color="primary">
                        <v-toolbar-title>Signin</v-toolbar-title>
                    </v-toolbar>
                    <v-form ref="form">
                        <v-card-text>
                            <v-text-field
                                outlined
                                label="Name"
                                v-model="name"
                                prepend-inner-icon="person"
                                :rules="nameRules"
                                required>
                            </v-text-field>
                            <v-text-field
                                outlined
                                label="Email"
                                v-model="email"
                                prepend-inner-icon="email"
                                :rules="emailRules"
                                required>
                            </v-text-field>
                            <v-text-field
                                outlined
                                label="Password"
                                v-model="password"
                                prepend-inner-icon="lock"
                                min="8"
                                :append-icon="e1 ? 'visibility_off' : 'visibility'"
                                @click:append="appendIconCallback"
                                :type="e1 ? 'password' : 'text'"
                                :rules="passwordRules"
                                required>
                            </v-text-field>
                            <v-layout justify-space-between>
                                <v-btn color="primary" @click="submit" :class=" { 'blue darken-4 white--text' : valid, disabled: !valid }">Register</v-btn>
                            </v-layout>
                        </v-card-text>
                    </v-form>
                </v-card>
            </v-flex>
        </v-layout>
    </v-container>
</template>
<script>
  export default {
      name: 'Signin',
    data() {
        return {
            alert: false,
            message: '',
            valid: false,
            e1: true,
            name: '',
            nameRules: [
                (v) => !!v || 'Name is required',
                (v) => (v && v.length >= 8) || 'Name must have more than 8 characters'
            ],
            password: '',
            passwordRules: [
                (v) => !!v || 'password is required',
                (v) => (v && v.length >= 8) || 'Password must have more than 8 characters'
            ],
            email: '',
            emailRules: [
                (v) => !!v || 'E-mail is required',
                (v) => /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(v) || 'E-mail must be valid'
            ],
            urlSave:'/register',
        }
    },
    props: {
      source: String,
    },
    methods:{
        appendIconCallback(){
            if(this.e1 == true){
                this.e1 = false;
            } else {
                this.e1 = true
            }
        },
        submit () {
            if (this.$refs.form.validate()) {
                axios.post(this.urlSave,{
                    name: this.name,
                    email: this.email,
                    password: this.password
                }).then(function(){
                    window.location.href = "/"
                }).catch(function(res){
                    console.log(res)
                    vm.alert = true
                    vm.message = 'The given data was invalid.'
                })
            }
        },
        clear () {
            this.$refs.form.reset()
        }
    }
  }
</script>
