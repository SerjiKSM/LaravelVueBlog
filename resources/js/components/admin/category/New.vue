<template>
    <section class="content">
        <div class="row justify-content-around">
            <div class="col-8">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add new category</h3>
                    </div>
                    <form role="form" @click.prevent="addCategory()">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="categoryId">Add new category</label>
                                <input type="text" class="form-control" id="categoryId" placeholder="Add new category"
                                       v-model="form.cat_name" name="cat_name"
                                       :class="{ 'is-invalid': form.errors.has('cat_name') }"
                                >
                                <has-error :form="form" field="cat_name"></has-error>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
</template>

<script>
    export default {
        name: "new",
        data() {
            return {
                form: new Form({
                    cat_name: ''
                })
            }
        },
        methods: {
            addCategory() {
                this.form.post('/add-category')
                    .then((response) => {
                        this.$router.push('/category-list')
                        // toast({
                        //     type: 'success',
                        //     title: 'Category Added successfully'
                        // })

                        // toast.fire({
                        //     type: 'success',
                        //     title: 'Category Added successfully'
                        // })

                        this.$swal("Category Added successfully!", {
                            icon: "success",
                        });

                    })
                    .catch(() => {
                        console.log(error);
                    })
            }
        }
    }
</script>

<style scoped>

</style>
