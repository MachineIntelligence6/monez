<?php

namespace Database\Factories;

use App\Channel;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Channel>
 */
class ChannelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Channel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'advertiser' => 001,            
            'feedId' => 1,
            'feedPath' => 'https://www.google.com/search',
            // $table->string("keywordParameter")->nullable();
            // $table->integer("priorityScore")->nullable();
            // $table->string("staticParameters")->nullable();
            // $table->string("dynamicParameters")->nullable();
            // $table->string("comments")->nullable();
            'status' => 'paused',
            'is_default'=> '0',
        
        ];
    }
}    
