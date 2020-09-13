<?php
namespace App\GraphQL\Mutations;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;
use App\Product;

class DeleteProductMutation extends Mutation
{
    protected $attributes = [
        'name' => 'DeleteProduct'
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
            ]
        ];
    }
    public function resolve($root, $args) {
        $product = Product::find($args['id']);
        if ($product) {
            $product->delete();
            
        }
        return null;
    }
}