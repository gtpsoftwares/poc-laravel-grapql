<?php
namespace App\GraphQL\Mutations;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;
use App\Product;

class UpdateProductMutation extends Mutation
{
    protected $attributes = [
        'name' => 'UpdateProduct'
    ];
    public function type() : Type {
        return GraphQL::type('Product');
    }
    public function args(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'Id of the Product',
            ],
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
        $product = Product::find($args['id']);
        if (!$product) {
            return null;
        }
        $product->product_name = $args['product_name'];
        $product->quantity = $args['quantity'];
        $product->sku = $args['sku'];
        $product->category = $args['category'];
        $product->sub_category = $args['sub_category'];
        $product->save();
        return $product;
    }
}