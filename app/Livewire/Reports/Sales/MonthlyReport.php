<?php

namespace App\Livewire\Reports\Sales;

use Aaran\Common\Models\Common;
use Aaran\Entries\Models\Sale;
use Aaran\Master\Models\Product;
use App\Livewire\Trait\CommonTraitNew;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class MonthlyReport extends Component
{
    use CommonTraitNew;
    #region[properties]
    public $month;
    public $year;
    #endregion

    public function getPercent($id,$salesType)
    {
       $obj=DB::table('saleitems')
            ->select('saleitems.product_id')
            ->where('saleitems.sale_id', $id)
            ->distinct()->get();
       foreach ($obj as $item) {
       $product=Product::find($item->product_id);
       $data[]= $salesType=='CGST-SGST'?
           'HSN Code - '.Common::find($product->hsncode_id)->vname.' - '.(Common::find($product->gstpercent_id)->vname/2).'%':
           'HSN Code - '.Common::find($product->hsncode_id)->vname.' - '.Common::find($product->gstpercent_id)->vname.'%';
       }
        $dataString = implode(', ', $data);
       return $dataString;
    }

    #region[getList]
    public function getList()
    {
        return Sale::whereMonth('invoice_date','=',$this->month?:Carbon::now()->format('m'))->whereYear('invoice_date','=',$this->year?:Carbon::now()->format('Y'))
            ->where('company_id','=',session()->get('company_id'))->get();
    }
    #endregion

    public function prit()
    {
        return $this->redirect(route('monthlyReport.print',['month'=>$this->month?:Carbon::now()->format('m'),'year'=>$this->year?:Carbon::now()->format('Y')]));
    }


    public function render()
    {
        return view('livewire.reports.sales.monthly-report')->with([
            'list'=>$this->getList(),
        ]);
    }
}
