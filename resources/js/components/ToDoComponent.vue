<template>
    <div class="container">
        <h1 class="title">To Do List</h1>
        <form class="form">
            <input v-model="input" name="todo"/>
            <button type="button" @click="addList" >Submit</button>
        </form>
        <ul class="list">
            <li v-for="(item, index) in list">
                {{item.title}} <span class="delete" @click="deleteList(index)">Hapus</span>
            </li>
        </ul>
    </div>
</template> 
<script>
export default {
  data() {
    return {
      list: [{
          title: "Hello World"
        },{
          title: "Welcome to Todo"
        }],
        input: null,
      }
  },
  methods:{
    addList(){
        let newList = {
        title: this.input 
        }
        this.list.push(newList)
        this.input = null;
    },
    deleteList(index){
      this.list.splice(index, 1)
    }
  }
}
</script>