<?php

namespace Aaran\Transaction\Models;

use Aaran\Common\Models\Common;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AccountBook extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function bank(): BelongsTo
    {
        return $this->belongsTo(Common::class);
    }

    public function accountType(): BelongsTo
    {
        return $this->belongsTo(Common::class);
    }

    public function transType(): BelongsTo
    {
        return $this->belongsTo(Common::class);
    }

}
