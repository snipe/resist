<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use McCool\LaravelAutoPresenter\HasPresenter;
use App\Presenters\RepPresenter;


class Rep extends Model implements HasPresenter
{

    /*
     *
     */
    public function committees() {
        return $this->belongsToMany('\App\Committee', 'committees_reps', 'rep_id', 'committee_id')->withPivot('membership_type');

    }

    public function getPresenterClass()
    {
        return RepPresenter::class;
    }

    public function getTwitterLinks(): array
    {
        $twitter_handles = explode(' ',$this->twitter);
        $twitter='';

        foreach ($twitter_handles as $twitter_handle) {
           // if ($twitter_handle!='') {
                $twitter[] = str_replace('@','',$twitter_handle);
            //}

        }
        return $twitter;
    }
}
