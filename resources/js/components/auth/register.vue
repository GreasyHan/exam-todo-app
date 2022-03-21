<template>
    <div class="form">
        <h3>Register</h3>
        <form action="#" @submit.prevent="attemptRegister">
            <div class="form-row">
                <input type="text" class="form-control" v-model="formData.name" placeholder="Username" />
            </div>
            <div class="form-row">
                <input type="email" class="form-control" v-model="formData.email" placeholder="Email Address" />
            </div>
            <div class="form-row">
                <input type="password" class="form-control" v-model="formData.password" placeholder="Password" />
            </div>
            <div class="form-row">
                <input type="password" class="form-control" v-model="formData.password_confirmation" placeholder="Confirm Password" />
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
                    name: "",
                    email: "",
                    password: "",
                    password_confirmation: ""
                }
            }
        },
        methods: {
            attemptRegister() {
                axios.get('/sanctum/csrf-cookie').then(res => {
                    axios.post('/register', this.formData).then(res => {
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
