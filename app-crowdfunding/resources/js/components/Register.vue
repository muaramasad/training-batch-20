<template>
    <v-card>
        <v-toolbar dark color="success">
            <v-btn icon dark @click.native="close">
                <v-icon>mdi-close</v-icon>
            </v-btn>
        </v-toolbar>
        <v-divider></v-divider>
        <v-container fluid>
            <v-form ref="form" v-model="valid" lazy-validation>
                <v-text-field
                    v-model="email"
                    :rules="emailRules"
                    label="E-mail"
                    required
                    append-icon="mdi-email"
                ></v-text-field>
                <v-text-field
                    v-model="name"
                    label="Name"
                    required
                    append-icon="mdi-email"
                ></v-text-field>

                <div class="text-xs-center">
                    <v-btn
                        color="success lighten=1"
                        :disabled="!valid"
                        @click="submit"
                    >
                        Register
                        <v-icon right dark>mdi-lock-open</v-icon>
                    </v-btn>
                </div>
            </v-form>
        </v-container>
    </v-card>
</template>

<script>
    import { mapGetters, mapActions } from 'vuex';
    export default {
        name: "register",
        data() {
            return {
                valid: true,
                email: "example@example.com",
                emailRules: [
                    v => !!v || 'Email is required',
                    v => /([a-zA-Z0-9_]{1,})(@)([a-zA-Z0-9_]{2,}).([a-zA-Z0-9_])+/.test(v) || 'Email must be valid'
                ],
                showPassword: false,
                name: ''
            }
        },
        computed: {
            ...mapGetters({
                user: 'auth/user'
            })
        },
        methods: {
            ...mapActions({
                setAlert: 'alert/set',
                setAuth: 'auth/set',
                setDialogStatus: 'dialog/setStatus'
            }),
            submit(){
                if(this.$refs.form.validate()){
                    let formData = {
                        'email': this.email,
                        'name': this.name
                    };
                    let url = '/api/auth/register';
                    axios.post(url, formData)
                        .then((response) => {
                            let { data } = response.data;
                            this.setAlert({
                                status: true,
                                color: 'success',
                                text: 'register success, please check your email address for verification'
                            });
                            this.close();
                        })
                        .catch((error) => {
                            let response = error.response
                            this.setAlert({
                                status: true,
                                text: response.data.error,
                                color: 'error'
                            })
                        })
                }
            },
            close() {
                this.$emit('closed', false);
            }
        }
    }
</script>

<style scoped>

</style>
