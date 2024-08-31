<?php

namespace Aaran\Transaction\Models;

use Aaran\Master\Models\Contact;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;

    public function contact(): BelongsTo
    {
        return $this->belongsTo(Contact::class);
    }
}
