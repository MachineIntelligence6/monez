<?php

namespace App\Observers;

use App\Feed;
use App\Channel;

class FeedStatusObserver
{
    /**
     * Handle the Feed "created" event.
     *
     * @param  \App\Feed  $feed
     * @return void
     */
    public function created(Feed $feed)
    {
        //
    }

    /**
     * Handle the Feed "updated" event.
     *
     * @param  \App\Feed  $feed
     * @return void
     */
    public function updated(Feed $feed)
    {
        $this->updateFeedStatus($feed);
    }

    /**
     * Handle the Feed "deleted" event.
     *
     * @param  \App\Feed  $feed
     * @return void
     */
    public function deleted(Feed $feed)
    {
        //
    }

    /**
     * Handle the Feed "restored" event.
     *
     * @param  \App\Feed  $feed
     * @return void
     */
    public function restored(Feed $feed)
    {
        //
    }

    /**
     * Handle the Feed "force deleted" event.
     *
     * @param  \App\Feed  $feed
     * @return void
     */
    public function forceDeleted(Feed $feed)
    {
        //
    }

    private function updateFeedStatus(Feed $feed)
    {
        $assignedChannels = $feed->channels;

        if ($assignedChannels->isEmpty()) {
            $feed->update(['status' => 'available']);
        } else {
            $disabledChannelsCount = $assignedChannels->where('state', 'disabled')->count();
            if ($disabledChannelsCount > 0) {
                $feed->update(['status' => 'available']);
            }
        }
    }
}
