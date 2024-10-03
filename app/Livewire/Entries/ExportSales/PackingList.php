<?php

namespace App\Livewire\Entries\ExportSales;

use App\Livewire\Trait\CommonTraitNew;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PackingList extends Component
{
    use CommonTraitNew;
    #region[property]
    public $exportSales_id='';
    public $exportSalesItem='';

    public $exportSalesItem_index='';
    public $nos='';
    public $net_wt='';
    public $grs_wt='';
    public $dimension='';
    public $cbm='';

    public string $itemIndex = "";
    public $itemList = [];
    #endregion

    #region[save]
    public function save()
    {
        if ($this->common->vid == "") {
            foreach ($this->itemList as $sub) {
                \Aaran\Entries\Models\PackingList::create([
                    'export_sales_id' => $this->exportSales_id,
                    'export_sales_item_id' =>$this->exportSalesItem[$sub['exportSalesItem_index']]->id,
                    'nos' => $sub['nos'],
                    'net_wt' => $sub['net_wt'],
                    'grs_wt' => $sub['grs_wt'],
                    'dimension' => $sub['dimension'] ?: '0',
                    'cbm' => $sub['cbm'] ?: '0',
                ]);
            }
            $message = "Saved";
        }else{
            DB::table('packing_lists')->where('export_sales_id','=',$this->exportSales_id)->delete();
            foreach ($this->itemList as $sub) {
                \Aaran\Entries\Models\PackingList::create([
                    'export_sales_id' => $this->exportSales_id,
                    'export_sales_item_id' =>$this->exportSalesItem[$sub['exportSalesItem_index']]->id,
                    'nos' => $sub['nos'],
                    'net_wt' => $sub['net_wt'],
                    'grs_wt' => $sub['grs_wt'],
                    'dimension' => $sub['dimension'] ?: '0',
                    'cbm' => $sub['cbm'] ?: '0',
                ]);
            }
            $message = "Updated";
        }
        $this->dispatch('notify', ...['type' => 'success', 'content' => $message.' Successfully']);
        $this->getRoute();
    }
    #endregion

    #region[addItem]
    public function addItems():void
    {
        if ($this->itemIndex==""){
            if (!(empty($this->exportSalesItem_index)))
            {
                $this->itemList[]=[
                    'exportSalesItem_index'=>round($this->exportSalesItem_index),
                    'nos'=>$this->nos,
                    'net_wt'=>$this->net_wt,
                    'grs_wt'=>$this->grs_wt,
                    'dimension'=>$this->dimension,
                    'cbm'=>$this->cbm,
                ];
            }
        }else{
            $this->itemList[$this->itemIndex]=[
                'exportSalesItem_index'=>$this->exportSalesItem_index,
                'nos'=>$this->nos,
                'net_wt'=>$this->net_wt,
                'grs_wt'=>$this->grs_wt,
                'dimension'=>$this->dimension,
                'cbm'=>$this->cbm,
            ];
        }
        $this->resetsItems();
    }

    public function resetsItems():void
    {
        $this->itemIndex='';
        $this->exportSalesItem_index='';
        $this->nos='';
        $this->net_wt='';
        $this->grs_wt='';
        $this->dimension='';
        $this->cbm='';
    }

    public function changeItems($index): void
    {
        $items=$this->itemList[$index];
        $this->exportSalesItem_index=$items['exportSalesItem_index'];
        $this->nos=$items['nos'];
        $this->net_wt=$items['net_wt'];
        $this->grs_wt=$items['grs_wt'];
        $this->dimension=$items['dimension'];
        $this->cbm=$items['cbm'];
    }

    public function removeItems($index): void
    {
        unset($this->itemList[$index]);
        $this->itemList = collect($this->itemList);
    }
    #endregion

    #region[mount]
    public function mount($id)
    {
        $this->exportSales_id = $id;
        $this->exportSalesItem=DB::table('export_sale_items')
            ->select(
                'export_sale_items.*',
                'products.vname as product_name',
                'sizes.vname as size_name',
                'colours.vname as colour_name',
            )
            ->join('products', 'export_sale_items.product_id', '=', 'products.id')
            ->join('commons as sizes', 'export_sale_items.size_id', '=', 'sizes.id')
            ->join('commons as colours', 'export_sale_items.colour_id', '=', 'colours.id')
            ->where('export_sale_items.export_sales_id',$id)
            ->get();
        dd( $this->exportSalesItem);
        $obj=DB::table('packing_lists')->select('packing_lists.*')
            ->where('export_sales_id',$id)->get()->transform(function ($obj){
                return [
                    'exportSalesItem_index'=>0,
                    'nos'=>$obj->nos,
                    'net_wt'=>$obj->net_wt,
                    'grs_wt'=>$obj->grs_wt,
                    'dimension'=>$obj->dimension,
                    'cbm'=>$obj->cbm,
                ];
            });
        if ($obj){
            $this->itemList = $obj;
        }
    }
    #endregion

    #region[getRoute]
    public function getRoute(): void
    {
        $this->redirect(route('exportsales'));
    }
    #endregion

    #region[render]
    public function render()
    {
        return view('livewire.entries.export-sales.packing-list');
    }
    #endregion
}
