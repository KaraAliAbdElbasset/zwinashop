<template>
    <div>
        <div class="tile">
            <h3 class="tile-title">Attributes</h3>
            <hr>
            <div class="tile-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="parent">Select an Attribute <span class="m-l-5 text-danger"> *</span></label>
                            <select id=parent class="form-control custom-select mt-15" v-model="attribute" @change="selectAttribute(attribute)">
                                <option :value="attribute" v-for="attribute in attributes"> {{ attribute.name }} </option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tile" v-if="attributeSelected">
            <h3 class="tile-title">Add Attributes To Product</h3>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="values">Select an value <span class="m-l-5 text-danger"> *</span></label>
                        <select id=values class="form-control custom-select mt-15" v-model="value" @change="selectValue(value)">
                            <option :value="value" v-for="value in attributeValues"> {{ value.name }} </option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row" v-if="valueSelected">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label" for="image">Image</label>
                        <input class="form-control" @change="prepareForUpload()" type="file" ref="file" id="image" />

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label" for="price">Price</label>
                        <input class="form-control" type="text" id="price" v-model="currentPrice"/>
                        <small class="text-danger">This price will be added to the main price of product on frontend.</small>
                    </div>
                </div>
                <div class="col-md-12">
                    <button class="btn btn-sm btn-primary" @click.prevent="addProductAttribute()">
                        <i class="fa fa-plus"></i> Add
                    </button>
                </div>
            </div>
        </div>
        <div class="tile">
            <h3 class="tile-title">Product Attributes</h3>
            <div class="tile-body">
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                        <tr class="text-center">
                            <th>Image</th>
                            <th>Attribute</th>
                            <th>Value</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="pa in productAttributes">
                            <td style="width: 25%" class="text-center"><img class=" img-fluid  img-thumbnail" width="80px" height="40px" :src="pa.image_url" :alt="pa.value"></td>
                            <td style="width: 25%" class="text-center">{{ pa.attribute}}</td>
                            <td style="width: 25%" class="text-center">{{ pa.value}}</td>
                            <td style="width: 25%" class="text-center">{{ pa.price}}</td>
                            <td style="width: 25%" class="text-center">
                                <button class="btn btn-sm btn-danger" @click.prevent="deleteProductAttribute(pa)">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "product-attributes",
        props: ['productid'],
        data() {
            return {
                productAttributes: [],
                attributes: [],
                attribute: {},
                attributeSelected: false,
                attributeValues: [],
                value: {},
                valueSelected: false,
                currentAttributeId: '',
                currentValue: '',
                image: '',
                currentPrice: '',
            }
        },
        mounted: function() {
            this.loadAttributes();
            this.loadProductAttributes(this.productid);
        },
        methods: {
            loadProductAttributes(id) {
                let _this = this;
                axios.post('/admin/products/attributes', {
                    id: id
                }).then (function(response){
                    _this.productAttributes = response.data;
                }).catch(function (error) {
                    console.log(error);
                });
            },
            loadAttributes() {
                let _this = this;
                axios.get('/admin/products/attributes/load').then (function(response){
                    _this.attributes = response.data;
                }).catch(function (error) {
                    console.log(error);
                });
            },
            prepareForUpload(){
                this.image = this.$refs.file.files[0];
            },
            selectAttribute(attribute) {
                let _this = this;
                this.currentAttributeId = attribute.id;
                axios.post('/admin/products/attributes/values', {
                    id: attribute.id
                }).then (function(response){
                    _this.attributeValues = response.data;
                }).catch(function (error) {
                    console.log(error);
                });
                this.attributeSelected = true;
            },
            selectValue(value) {
                this.valueSelected = true;
                this.currentValue = value.value;
                this.currentQty = value.quantity;
                this.currentPrice = value.price;
            },
            addProductAttribute() {
                if ( this.currentPrice === null) {

                    this.$swal("Error, Some values are missing.", {
                        icon: "error",
                    });
                } else {
                    let _this = this;
                    let data = new FormData;
                    data.append('attribute_id',this.currentAttributeId);
                    data.append('price',this.currentPrice);
                    data.append('product_id',this.productid);
                    data.append('attribute_id',this.currentAttributeId);
                    data.append('attribute_value_id',this.value.id);
                    data.append('value',this.value.name);
                    data.append('attribute',this.attribute.name);
                    data.append('image',this.image);

                    axios.post('/admin/products/attributes/add', data).then (function(response){

                        _this.$swal.fire({
                            icon: 'success',
                            title: "Success",
                            text: response.data.message
                        });
                        _this.currentValue = '';
                        _this.image = null;
                        _this.currentPrice = '';
                        _this.valueSelected = false;

                        _this.loadProductAttributes(_this.productid);
                    }).catch(function (error) {
                        console.log(error);
                    });
                }
            },
            deleteProductAttribute(pa) {
                let _this = this;
                this.$swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        axios.post('/admin/products/attributes/delete', {
                            id: pa.id,
                        }).then (function(response){
                            if (response.data.status === 'success') {
                                _this.$swal.fire({
                                    icon: 'success',
                                    title: "Success",
                                    text: 'Product attribute has been deleted'
                                });
                                _this.loadProductAttributes(_this.productid);

                            } else {
                                _this.$swal("Your Product attribute not deleted!");
                            }
                        }).catch(function (error) {
                            console.log(error);
                        });
                    } else {
                        this.$swal("Action cancelled!");
                    }

                });
            }

        }
    }

</script>

<style scoped>

</style>
