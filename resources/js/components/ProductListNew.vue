<template>
    <div>
        <div class="container">
            <!-- <div id="messages" class="alert alert-success" hidden>
                Success
                <button
                    type="button"
                    class="close"
                    data-dismiss="alert"
                    aria-label="Close"
                >
                <span aria-hidden="true">&times;</span>
                </button>
            </div> -->
            <br />
            <br />
            <br />
            <table
                class="table table-card table-hover table-striped table-bordered"
            >
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(product, index) in products" :key="product.id">
                        <th scope="row">{{ index + 1 }}</th>
                        <td>
                            <div v-if="editId == product.id">
                              
                                    <input
                                        type="text"
                                        v-model="name"
                                        required
                                    />
                            </div>
                            <template v-else>
                                {{ product.name }}
                            </template>
                        </td>
                        <td>
                            <div v-if="editId == product.id">
                             
                                    <input
                                        type="number"
                                        v-model="price"
                                        required
                                    />
                            </div>
                            <template v-else>
                                {{ product.price }}
                            </template>
                        </td>
                        <!-- button -->
                        <td>
                            <template v-if="editId == product.id">
                                <button
                                    class="btn btn-success"
                                    type="button"
                                    @click="updateData(product)"
                                >
                                    Update
                                </button>
                            </template>
                            <template v-else>
                                <button
                                    class="btn btn-info"
                                    type="button"
                                    @click="editData(product)"
                                >
                                    Edit
                                </button>
                            </template>

                            <button
                                class="btn btn-danger"
                                type="button"
                                @click="deleteData(product.id)"
                            >
                                Delete
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <add-form v-on:addData="addData($event)"></add-form>
        </div>
    </div>
</template>

<script>
export default {
    name: "productlistnew",
    // props: ["products"],
    data() {
        return {
            products: "",
            name: "",
            price: "",
            editId: "",
        };
    },
    created() {
        this.fetchData();
    },
    methods: {
        fetchData() {
            axios
                .get(`/fetch`)
                .then(res => (this.products = res.data))
                .catch(err => console.log(err));
        },
        deleteData(id) {
            axios
                .post(`/delete-product-list/${id}`)
                .then(res => {
                    console.log(res);
                    this.fetchData();
                })
                .catch(err => console.log(err));
        },
        addData(object) {
            axios
                .post("/add-product-list", {
                    body: object
                })
                .then(res => {
                    console.log(res);
                    this.fetchData();
                })
                .catch(err => console.log(err));
        },
        editData(product) {
            this.name = product.name;
            this.price = product.price;
            this.editId = product.id;
        },
        updateData(product) {
            axios
                .put(`/update-product-list/${product.id}`, {
                    name: this.name,
                    price: this.price
                })
                .then(res => {
                            this.editId = "";
                    this.fetchData();
                })
                .catch(err => console.log(err));
        }
    }
};
</script>

<style></style>
