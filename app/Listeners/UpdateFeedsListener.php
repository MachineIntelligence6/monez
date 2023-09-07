<?php

namespace App\Listeners;

use App\Events\ChannelSearched;
use App\Feed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class UpdateFeedsListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\ChannelSearched  $event
     * @return void
     */
    public function handle(ChannelSearched $event)
    {
        if(isset($event->feeds)){
            foreach ($event->feeds as $key => $feed) {
                Feed::where('id', $feed->id)->update([
                    'status'=>'live',
                    'last_activity_at'=>Carbon::now(),
                ]);
            }
        }
    }
}
