<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Committee extends Model
{
    public function reps() {
        return $this->belongsToMany('\App\Rep', 'committees_reps', 'committee_id', 'rep_id')->withPivot('membership_type');
    }
}
