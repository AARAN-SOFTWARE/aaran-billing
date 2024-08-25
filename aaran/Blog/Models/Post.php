<?php

namespace Aaran\Blog\Models;

use Aaran\Common\Models\Common;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{

    protected $guarded = [];

    public static function common($id)
    {
        return Common::find($id)->vname;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
