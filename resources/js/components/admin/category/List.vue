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
                                    <th>
                                        <select name="" id="" v-model="select" @change="deleteSelected">
                                            <option value="">Select</option>
                                            <option value="">Delete all</option>
                                        </select><br>
                                        <input type="checkbox" @click.prevent="selectAll" v-model="all_select">
                                        <span v-if="all_select==false">Check All</span>
                                        <span v-else>Uncheck All</span>
                                    </th>
                                    <th>S1</th>
                                    <th>Category name</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(category,index) in getAllCategory" :key="category.id">
                                    <td><input type="checkbox" v-model="categoryItem" :value="category.id"></td>
                                    <td>{{index+1}}</td>
                                    <td>{{category.cat_name}}</td>
                                    <td>{{category.created_at | timeformat}}</td>
                                    <td>
                                        <router-link :to="`/edit-category/${category.id}`" class="btn btn-primary">
                                            Edit
                                        </router-link>
                                        <a href="" @click.prevent="deleteCategory(category.id)" class="btn btn-danger">Delete</a>
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
        data() {
            return {
                categoryItem: [],
                select: '',
                all_select: false
            }
        },
        mounted() {
            this.$store.dispatch("allCategory")
        },
        computed: {
            getAllCategory() {
                return this.$store.getters.getCategory
            }
        },
        methods: {
            deleteCategory(id) {
                axios.get('/category/' + id)
                    .then(() => {
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
                    .catch(() => {
                    })
            },
            deleteSelected() {
                console.log(this.categoryItem);
                axios.get('/delete-category/' + this.categoryItem)
                    .then(() => {
                        this.categoryItem = [];
                        this.$store.dispatch("allCategory");
                        // toast({
                        //     type: 'success',
                        //     title: 'Category Deleted successfully'
                        // })
                        this.$swal("Category Deleted successfully!", {
                            icon: "success",
                        });
                    })
            },
            selectAll() {
                if (this.all_select == false) {
                    this.all_select = true
                    for (var category in this.getAllCategory) {
                        this.categoryItem.push(this.getAllCategory[category].id)
                    }
                } else {
                    this.all_select = false
                    this.categoryItem = []
                }
            }
        }
    }
</script>

<style scoped>

</style>
