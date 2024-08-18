<?php

namespace Aaran\Master\Models;

use Aaran\Common\Models\Common;
use Aaran\Master\Database\Factories\ContactDetailFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ContactDetail extends Model
{
    use HasFactory;

    protected $guarded = [];


    protected static function newFactory(): ContactDetailFactory
    {
        return new ContactDetailFactory();
    }

    public function common(): BelongsTo
    {
        return $this->belongsTo(Common::class);
    }
}
