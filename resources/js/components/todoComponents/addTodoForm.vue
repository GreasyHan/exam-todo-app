<template>
    <div class="addItem">
        <input type="text" v-model="todo.note"/>
        <font-awesome-icon 
            icon="plus-circle"
            @click="addTodo()"
            :class="[ todo.note ? 'active' : 'inactive', 'plus' ]"
        />
    </div>
</template>

<script>
export default {
    data : function () {
        return {
            todo: {
                note: ""
            }
        }
    },
    methods: {
        addTodo() {
            if ( this.todo.note == '' ) {
                return;
            }

            axios.post('api/todo/create', {
                todo: this.todo
            })
            .then( res => {
                if ( res.status == 201 ) {
                    this.todo.note = "";
                    this.$emit('reloadList');
                }
            })
            .catch(error => {
                console.log(error);
            });
        }
    }
}
</script>

<style scoped>
.addItem {
    display: flex;
    justify-content: center;
    align-items: center;
}

input {
    background: #f7f7f7;
    border: 0px;
    outline: none;
    padding: 5px;
    margin-right: 10px;
    width: 100%;
}
.plus {
    font-size: 20px;
}
.active {
    color: #00CE25;
}
.inactive {
    color: #999999;
}
</style>
