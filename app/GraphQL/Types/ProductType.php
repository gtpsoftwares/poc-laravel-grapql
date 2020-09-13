<?php

namespace App\GraphQL\Types;

use App\Product;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class ProductType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Product',
        'description' => 'Details about a product',
        'model' => Product::class
    ];

    public function fields() : array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'Id of the wine',
            ],
            'product_name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The name of the product',
            ],
            'product_image' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Short image of the product',
            ],
            'quantity' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The quantity of the products',
            ],
            'sku' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The sku of product',
            ],
            'category' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The Category of the product',
            ],
            'sub_category' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The Subcategory of the product',
            ]
        ];
    }
}