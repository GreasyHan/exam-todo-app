<template>
    <div class="container">
        <nav class="navbar navbar-light bg-light">
            <span class="navbar-brand mb-0 h1">Todo App</span>
            <div class="buttons" v-if="!isLoggedIn">
                <button @click="loginPage()" class="navbar-brand mb-0 h1">
                Login
                </button>
                <button @click="registerPage()" class="navbar-brand mb-0 h1">
                Register
                </button>
            </div>
            <div class="buttons" v-if="isLoggedIn">
                <button @click="logout()" class="navbar-brand mb-0 h1">
                Logout
                </button>
            </div>
        </nav>
        <div class="login-page" v-if="isloginPage">
            <login
                v-on:loggedIn="homePage()"
            ></login>
        </div>
        <div class="login-page" v-if="isregisterPage">
            <register
                v-on:loggedIn="homePage()">
            </register>
        </div>
        <div class="home-page" v-if="isLoggedIn">
            <home>
            </home>
        </div>
    </div>
</template>

<script>
import login from "./auth/login"
import register from "./auth/register"
import home from "./todoComponents/home"

export default {
    components: {
        login,
        register,
        home
    },
    data: function () {
        return {
            isLoggedIn: false,
            isloginPage: true,
            isregisterPage: false
        }
    },
    methods: {
        loginPage() {
            this.isloginPage = true;
            this.isLoggedIn = false;
            this.isregisterPage = false;
        },
        registerPage() {
            this.isloginPage = false;
            this.isLoggedIn = false;
            this.isregisterPage = true;
        },
        homePage() {
            this.isloginPage = false;
            this.isLoggedIn = true;
            this.isregisterPage = false;
        },
        logout() {
            axios.get('/sanctum/csrf-cookie').then(res => {
                axios.post('/logout').then(res => {
                    this.loginPage();
                });
            });
        }
    }
}
</script>

<style scoped>
.container{
    width:100%;
    background: #e6e6e6;
    display: contents;
}
.form {
    width:350px;
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    padding: 10px;
}
</style>
