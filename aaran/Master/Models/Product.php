<?php

namespace Aaran\Master\Models;

use Aaran\Common\Models\Common;
use Aaran\Master\Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function common(): BelongsTo
    {
        return $this->belongsTo(Common::class);
    }

    public static function search(string $searches)
    {
        return empty($searches) ? static::query()
            : static::where('vname', 'like', '%' . $searches . '%');
    }

    protected static function newFactory(): ProductFactory
    {
        return new ProductFactory();
    }

}
