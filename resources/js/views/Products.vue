<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <label>Product List</label>
                        <router-link :to="{ name: 'addproduct' }" style="float:right;">Add Product</router-link>
                    </div>

                    <div class="card-body">
                    <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">quantity</th>
                        <th scope="col">Sku</th>
                        <th scope="col">Category</th>
                        <th scope="col">Subcategory</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody v-for="(product,index) in products" :key="product.id">
                        <tr>
                        <th scope="row">{{index + 1}}</th>
                        <td>{{product.product_name}}</td>
                        <td>{{product.quantity}}</td>
                        <td>{{product.sku}}</td>
                        <td>{{product.category}}</td>
                        <td>{{product.sub_category}}</td>
                        <td><router-link :to="{ name: 'editproduct', params: { pid: product.id }}" class="btn btn-primary">Edit</router-link></td>
                        <td>
                          <a href="#" @click.prevent="handleProductDelete(product.id)" class="btn btn-danger">Delete</a>
                        </td>
                        </tr>
                    </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import gql from "graphql-tag";

const GET_PRODUCTS = gql`
  query getProducts {
    products {
      id
      product_name
      quantity
      sku
      category
      sub_category
    }
  }
`;

const GET_SINGLE_PRODUCT = gql`
  query getProduct($productId: ID!) {
    product(id: $productId) {
      id
      product_name
      quantity
      sku
      category
      sub_category
    }
  }
`;

export default {
  name: "Products",
  data() {
    return {
      products: []
    };
  },
  apollo: {
    products: {
      query: GET_PRODUCTS
    }
  },
  methods: {
    handleProductDelete(prodid) {
      if (confirm("Are you sure to delete it ?")) {
      this.$apollo.mutate({
        mutation: gql`mutation deleteProduct($id: Int!){
        DeleteProduct(id: $id){
          id
        }
        }`,
        variables:{
          id: prodid,
        }
      })
      .then(data => {
        this.$apollo.queries.products.refetch()
      });
      }
    }
  }
   
};
</script>
