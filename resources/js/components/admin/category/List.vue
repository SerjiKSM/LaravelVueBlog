<template>
    <div>
    <!-- Main content -->
    <section class="content">
        <div class="row justify-content-around">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Category list</h3>
                        <div class="card-tools">
                            <button class="btn btn-primary">
                                <router-link to="/add-category" style="color: #FFF">Add category</router-link>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>S1</th>
                                <th>Category name</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(category,index) in getAllCategory" :key="category.id">
                                <td>{{index+1}}</td>
                                <td>{{category.cat_name}}</td>
                                <td>{{category.created_at | timeformat}}</td>
                                <td>
                                    <a href="" class="btn btn-primary">Edit</a>
                                    <a href="" @click.prevent = "deleteCategory(category.id)" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
    </div>
</template>

<script>
    export default {
        name: "List",
        // data(){
        //     return{
                // categoryItem:[],
                // select:'',
                // all_select:false
        //     }
        // },
        mounted(){
            this.$store.dispatch("allCategory")
        },
        computed:{
            getAllCategory(){
                return this.$store.getters.getCategory
            }
        },
        methods:{
            deleteCategory(id){
                axios.get('/category/'+id)
                    .then(()=>{
                        this.$store.dispatch("allCategory")
                        // toast({
                        //     type: 'success',
                        //     title: 'Category Deleted successfully'
                        // })
                        // toast.fire({
                        //     type: 'success',
                        //     title: 'Category Deleted successfully'
                        // })
                        this.$swal("Category Deleted successfully!", {
                            icon: "success",
                        });
                    })
                    .catch(()=>{
                    })
            },
            // deleteSelected(){
            //     console.log(this.categoryItem)
            //     axios.get('/deletecategory/'+this.categoryItem)
            //         .then(()=>{
            //             this.categoryItem = []
            //             this.$store.dispatch("allCategory")
            //             toast({
            //                 type: 'success',
            //                 title: 'Category Deleted successfully'
            //             })
            //         })
            // },
            // selectAll(){
            //     if(this.all_select==false){
            //         this.all_select = true
            //         for(var category in this.getallCategory){
            //             this.categoryItem.push(this.getallCategory[category].id)
            //         }
            //     }else{
            //         this.all_select = false
            //         this.categoryItem = []
            //     }
            // }
        }
    }
</script>

<style scoped>

</style>
