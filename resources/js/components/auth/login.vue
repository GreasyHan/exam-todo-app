<template>
    <div class="form">
        <h3>Login</h3>
        <form action="#" @submit.prevent="attemptLogin">
            <div class="form-row">
                <input type="email" class="form-control" v-model="formData.email" placeholder="Email Address" />
            </div>
            <div class="form-row">
                <input type="password" class="form-control" v-model="formData.password" placeholder="Password" />
            </div>
            <div class="form-row">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>
</template>

<script>
    

    export default {
        data: function () {
            return {
                formData: {
                    email: "",
                    password: ""
                }
            }
        },
        methods: {
            attemptLogin() {
                axios.get('/sanctum/csrf-cookie').then(res => {
                    axios.post('/login', this.formData).then(res => {
                        this.$emit("loggedIn");
                    });
                });
            }
        }
    }
</script>

<style scoped>
.form-row {
    padding: 10px;

}
</style>
