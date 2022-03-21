<template>
    <div class="todo">
        <input
            type="checkbox"
            @change="updateCheck()"
            v-model="todo.done"
        />
        <span :class="[ todo.done ? 'done' : '', 'todoNote']"> {{ todo.note }} </span>
        <button @click="removeTodo()" class="trashcan">
            <font-awesome-icon icon="trash" />
        </button>
    </div> 
</template>

<script>
export default {
    props: ['todo'],
    methods: {
        updateCheck() {
            axios.put('api/todo/update/' + this.todo.id, {
                todo: this.todo
            })
            .then( res => {
                if ( res.status == 200 ) {
                    this.$emit('itemChanged');
                }
            })
            .catch(error => {
                console.log(error);
            });
        },
        removeTodo() {
            axios.delete('api/todo/delete/' + this.todo.id)
            .then( res => {
                if (res.status == 200) {
                    this.$emit('itemChanged');
                }
            })
            .catch ( error => {
                console.log( error );
            });
        }
    }
}
</script>

<style>
.done {
    text-decoration: line-through;
    color: #999999;
}
.todoNote {
    width: 100%;
    margin-left: 20px
}
.todo {
    display:flex;
    justify-content: center;
    align-items: center;
}
.trashcan {
    background: #e6e6e6;
    border: none;
    color: #FF0000;
    outline: none;
}
</style>
