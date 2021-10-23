<?php

namespace App\GraphQL\Queries\Category;

use App\Models\Category;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class CategoriesQuery extends Query
{
    /*
        The attributes function is used as the query configuration.
    */
    protected $attributes = [
        'name' => 'categories',
    ];

    /*
        The type function is used to declare what type of object this query will return.
    */
    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Category'));
    }

    /*
        The args function is used to declare what arguments this query will accept. 
        In our case we only need the id of the quest.
    */

    public function resolve($root, $args)
    {
        return Category::all();
    }
}