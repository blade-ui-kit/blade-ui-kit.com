<?php

namespace App\Models;

class Icon extends BaseModel
{
    public function keywords()
    {
        return $this->hasMany(IconKeywords::class);
    }
}
