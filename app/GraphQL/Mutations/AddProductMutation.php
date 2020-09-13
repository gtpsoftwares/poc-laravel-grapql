<?php
namespace App\GraphQL\Mutations;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;
use App\Product; 

class AddProductMutation extends Mutation
{
    protected $attributes = [
        'name' => 'AddProduct'
    ];
    public function type(): Type
    {
        return GraphQL::type('Product');
    }
    public function args(): array
    {
        return [
            'product_name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The name of the product',
            ],
            'quantity' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'quantity of product',
            ],
            'sku' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'sku of product',
            ],
            'category' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'category of product',
            ],
             'sub_category' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'sub category of product',
            ]
        ];
    }
    public function resolve($root, $args) {
       $product = Product::create($args);
        if (!$product) {
            return null;
        }
        return $product;
    }
}