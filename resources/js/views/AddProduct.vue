<template>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <label>Add Product</label>
          <router-link :to="{ name: 'products' }" style="float:right;">Product List</router-link>
        </div>
        <div class="card-body">
        <form @submit="submit">
          <fieldset>
          <div class="form-group">
            <label for="product_name">Product Name:</label>
            <input type="text" class="form-control" id="product_name" placeholder="Enter Product Name" v-model="product_name">
          </div>
          <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input type="text" class="form-control" id="quantity" placeholder="Enter Quantity" v-model="quantity">
          </div>
          <div class="form-group">
            <label for="quantity">Sku:</label>
            <input type="text" class="form-control" id="sku" placeholder="Enter Unique sku" v-model="sku">
          </div>
          <div class="form-group">
            <label for="category">Category:</label>
            <input type="text" class="form-control" id="category" placeholder="Enter Category" v-model="category">
          </div>
          <div class="form-group">
            <label for="subcategory">Subcategory:</label>
            <input type="text" class="form-control" id="subcategory" placeholder="Enter Subcategory" v-model="sub_category">
          </div>
          </fieldset>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>
</template>

<script>
import gql from "graphql-tag";
import { InMemoryCache } from "apollo-cache-inmemory";

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

const ADD_PRODUCT = gql`
  mutation addProducts(
    $product_name: String!
    $quantity: String!
    $sku: String!
    $category: String!
    $sub_category: String!
  ) {
    AddProduct(
     
        
          product_name: $product_name
          quantity: $quantity
          sku: $sku
          category: $category
          sub_category: $sub_category
        
      
    ) {
     id,
     product_name,
     quantity,
     sku,
     category,
     sub_category
    }
  }
`;
export default {
  name: "AddProduct",
  data() {
    return {
      product_name: "",
      quantity: "",
      sku: "",
      category: "",
      sub_category: ""
    };
  },
  apollo: {},
  methods: {
    submit(e) {
      // e.preventDefault();
      this.$apollo.mutate({
        mutation: gql`mutation addProducts($product_name: String! $quantity: String! $sku: String! $category: String! $sub_category: String!) {
        AddProduct(product_name: $product_name quantity: $quantity sku: $sku category: $category sub_category: $sub_category) {
          id,
          product_name,
          quantity,
          sku,
          category,
          sub_category
        }
        }`,
        variables:{
          product_name: this.product_name,
          quantity: this.quantity,
          sku: this.sku,
          category: this.category,
          sub_category: this.sub_category
          },
          refetchQueries: ["getProducts"]
      })
    }
  }
};
</script>