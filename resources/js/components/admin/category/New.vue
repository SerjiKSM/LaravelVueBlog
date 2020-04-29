<template>
    <section class="content">
        <div class="row justify-content-around">
            <div class="col-8">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add new category</h3>
                    </div>
                    <form role="form">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="category">Add new category</label>
                                <input type="text" class="form-control" id="category" placeholder="Add new category">
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
        name: "new"
    }
</script>

<style scoped>

</style>
