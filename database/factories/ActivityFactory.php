<?php

namespace Database\Factories;

use App\Advertiser;
use App\Channel;
use App\Feed;
use App\Publisher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Activity>
 */
class ActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // $channel = Channel::all()->random();
        // $advertiser = Advertiser::all()->random();
        // $publisher = Publisher::all()->random();
        // $feed = Feed::all()->random();

        return [
            'activity_date' => fake()->date(),
            'revenue_share' => fake()->randomElement([324.34, 23.2, 324, 0.234, 23423.23]),
            // 'channel' => $channel->channelId,
            // 'advertiser' => $advertiser->advertiser_id,
            // 'publisher' => $publisher->publisher_id,
            // 'feed' => $feed->feedId,
            // 'channel_id' => $channel->id,
            // 'advertiser_id' => $advertiser->id,
            // 'publisher_id' => $publisher->id,
            // 'feed_id' => $feed->id,
            'channel' =>  fake()->randomElement(['c1', 'c2', 'c3', 'c4']),
            'advertiser' =>  fake()->randomElement(['a1', 'a2', 'a3', 'a4']),
            'publisher' =>  fake()->randomElement(['p1', 'p2', 'p3', 'p4']),
            'feed' => fake()->randomElement(['f1', 'f2', 'f3', 'f4']),
        ];
    }
}
