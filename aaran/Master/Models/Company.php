<?php

namespace Aaran\Master\Models;

use Aaran\Common\Models\Common;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection;

class Company extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function search(string $searches)
    {
        return empty($searches) ? static::query()
            : static::where('vname', 'like', '%' . $searches . '%');
    }

    public static function printDetails($ids): Collection
    {
        $obj = self::find($ids);

        return collect([
            'company_name' => $obj->display_name,
            'address_1' => $obj->address_1,
            'address_2' => $obj->address_2,
            'city' => $obj->city->vname . ' - ' . $obj->pincode->vname,
            'state' => $obj->state->vname . ' - ' . $obj->state->state_code,
            'contact' => ' Contact : ' . $obj->mobile,
            'email' => 'Email : ' . $obj->email,
            'gstin' => 'GST : ' . $obj->gstin,
            'gst' => $obj->gstin,
            'msme' => 'MSME No : ' . $obj->msme_no,
            'logo' => $obj->logo,
            'bank' => $obj->bank,
            'acc_no' => $obj->acc_no,
            'ifsc_code' => $obj->ifsc_code,
            'branch' => $obj->branch,
        ]);
    }

    public function common(): BelongsTo
    {
        return $this->belongsTo(Common::class);
    }

}
