<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function trips() {
        return $this->belongsToMany('App\Trip')->withTimestamps();
    }

    # Tag.php

    public static function getForCheckboxes()
    {
        return self::orderBy('name')->select(['name', 'id'])->get();
    }
}
