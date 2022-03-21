<template>
    <div>
        <div v-for="(todo, index) in todos" :key="index">
            <listTodo
                :todo="todo"
                class="todo"
                v-on:itemChanged="$emit('reloadList')"
            />
        </div>
    </div>
</template>

<script>
import listTodo from "./listTodo"
import ListTodo from "./listTodo.vue"

export default {
    props: ['todos'],
    components: {
        listTodo
    }
}
</script>

<style scoped>
.todo {
    background: #e6e6e6;
    padding: 5px;
    margin-top: 5px;
}
</style>
