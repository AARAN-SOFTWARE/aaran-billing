<?php

namespace App\Http\Controllers\Transaction;

use Aaran\Common\Models\Common;
use Aaran\Master\Models\Company;
use Aaran\Transaction\Models\Transaction;
use App\Http\Controllers\Controller;
use function Spatie\LaravelPdf\Support\pdf;

class PaymentController extends Controller
{
    public $mode_id;
    public $mode_name;

    public function __invoke($id)
    {
        if ($id == 1) {
            $this->mode_id = 83;
            $this->mode_name = Common::find(83)->vname;
        } elseif ($id == 2) {
            $this->mode_id = 82;
            $this->mode_name = Common::find(82)->vname;
        }


        return pdf('pdf-view.Transaction.payment', [
            'list' => $this->getList(),
            'cmp' => Company::printDetails(session()->get('company_id')),
            'mode_id' => $this->mode_id,
            'mode_name' => $this->mode_name,

        ]);

    }

    public function getList()
    {
        return Transaction::where('mode_id', $this->mode_id)
            ->where('active_id','=','1')->get();
    }
    #endregion
}
