<?php

namespace App\Http\Controllers\Transaction;

use Aaran\Common\Models\Common;
use Aaran\Master\Models\Company;
use Aaran\Transaction\Models\Transaction;
use App\Http\Controllers\Controller;
use function Spatie\LaravelPdf\Support\pdf;

class TransController extends Controller
{
    public $trans_type_id;
    public $trans_type_name;

    public function __invoke($id)
    {
        if ($id == 1) {
            $this->trans_type_id = 80;
            $this->trans_type_name = Common::find(80)->vname;
        } elseif ($id == 2) {
            $this->trans_type_id = 81;
            $this->trans_type_name = Common::find(81)->vname;
        }

        return pdf('pdf-view.Transaction.trans', [
            'list' => $this->getList(),
            'cmp' => Company::printDetails(session()->get('company_id')),
            'trans_type_id' => $this->trans_type_id,
            'trans_type_name' => $this->trans_type_name,

        ]);

    }

    public function getList()
    {
        return Transaction::where('trans_type_id', $this->trans_type_id)
            ->where('active_id','=','1')->get();
    }

}
