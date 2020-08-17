<?php

namespace App\Models;

class Icon extends BaseModel
{
    public function set()
    {
        return $this->belongsTo(IconSet::class, 'icon_set_id');
    }

    public function getRouteKeyName()
    {
        return 'name';
    }
}
