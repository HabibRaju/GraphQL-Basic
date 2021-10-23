<?php

// app/graphql/queries/quest/QuestQuery 

namespace App\GraphQL\Queries\Quest;

use App\Models\Quest;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class QuestQuery extends Query
{
    /*
        The attributes function is used as the query configuration.
    */
    protected $attributes = [
        'name' => 'quest',
    ];

    /*
        The type function is used to declare what type of object this query will return.
    */
    public function type(): Type
    {
        return GraphQL::type('Quest');
    }
    /*
        The args function is used to declare what arguments this query will accept. 
        In our case we only need the id of the quest.
    */
    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int(),
                'rules' => ['required']
            ]
        ];
    }
    /*
        The resolve function does the bulk of the work – it returns the actual object using eloquent.
    */
    public function resolve($root, $args)
    {
        return Quest::findOrFail($args['id']);
    }
}