<template>
    <div class="todoListContainer">
        <div class="heading">
            <h2 id="title">Todo list</h2>
            <addTodoForm 
                v-on:reloadList="getList()"
            />
        </div>
        <listView
            :todos="todos"
            v-on:reloadList="getList()"
        />
    </div>
</template>

<script>
import addTodoForm from "./addTodoForm"
import listView from "./listTodoView"

export default {
    components: {
        addTodoForm,
        listView
    },
    data: function () {
        return {
            todos: []
        }
    },
    methods: {
        getList () {
            axios.get('api/todos')
            .then( response => {
                this.todos = response.data
            })
            .catch(error => {
                console.log(error)
            });
        }
    },
    created() {
        this.getList();
    }
}
</script>

<style scoped>
.todoListContainer{
    width: 350px;
    margin: auto;
}

.heading {
    background: #e6e6e6;
    padding: 10px;
}

#title {
    text-align: center;
}

</style>
