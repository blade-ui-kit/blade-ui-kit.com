<?php

namespace App\Models;

class Icon extends BaseModel
{
    public function keywords()
    {
        return $this->hasMany(IconKeywords::class);
    }

    public function set()
    {
        return $this->belongsTo(IconSet::class, 'icon_set_id');
    }
}
