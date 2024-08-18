<?php

namespace App\Livewire\Master\Product;

use Aaran\Common\Models\Common;
use Aaran\Master\Models\Product;
use App\Livewire\Trait\CommonTraitNew;
use Illuminate\Support\Collection;
use Livewire\Component;

class Index extends Component
{
    use CommonTraitNew;

    #region[Properties]
    public $product_type;
    public $common_id;
    public $units;
    public $gst_percent;
    public $quantity;
    #endregion

    #region[Get-Save]
    public function getSave(): void
    {
        if ($this->common->vname != '') {
            if ($this->common->vid == '') {
                $Product = new Product();
                $extraFields = [
                    'product_type' => $this->product_type,
                    'common_id' => $this->common_id,
                    'units' => $this->units,
                    'gst_percent' => $this->gst_percent,
                    'quantity' => $this->quantity,
                    'user_id' => auth()->id(),
                ];
                $this->common->save($Product, $extraFields);
                $message = "Saved";
            } else {
                $Product = Product::find($this->common->vid);
                $extraFields = [
                    'product_type' => $this->product_type,
                    'common_id' => $this->common_id,
                    'units' => $this->units,
                    'gst_percent' => $this->gst_percent,
                    'quantity' => $this->quantity,
                    'user_id' => auth()->id(),
                ];
                $this->common->edit($Product, $extraFields);
                $message = "Updated";
            }
            $this->dispatch('notify', ...['type' => 'success', 'content' => $message . ' Successfully']);
        }
    }
    #endregion

    #region[hsn-code]

    public $common_no = '';
    public Collection $commonCollection;
    public $highlightCommon = 0;
    public $commonTyped = false;

    public function decrementCommon(): void
    {
        if ($this->highlightCommon === 0) {
            $this->highlightCommon = count($this->commonCollection) - 1;
            return;
        }
        $this->highlightCommon--;
    }

    public function incrementCommon(): void
    {
        if ($this->highlightCommon === count($this->commonCollection) - 1) {
            $this->highlightCommon = 0;
            return;
        }
        $this->highlightCommon++;
    }

    public function setCommon($name, $id): void
    {
        $this->common_no = $name;
        $this->common_id = $id;
        $this->getCommon();
    }

    public function enterCommon(): void
    {
        $obj = $this->commonCollection[$this->highlightCommon] ?? null;

        $this->common_no = '';
        $this->commonCollection = Collection::empty();
        $this->highlightCommon = 0;

        $this->common_no = $obj['vname'] ?? '';;
        $this->common_id = $obj['id'] ?? '';;
    }

    #[On('refresh-common')]
    public function refreshCommon($v): void
    {
        $this->common_id = $v['id'];
        $this->common_no = $v['name'];
        $this->commonTyped = false;
    }

    public function commonSave($name)
    {
        $obj = Common::create([
            'vname' => $name,
            'active_id' => '1'
        ]);
        $v = ['name' => $name, 'id' => $obj->id];
        $this->refreshCommon($v);
    }

    public function getCommonList(): void
    {
        $this->commonCollection = $this->common_no ? Common::search(trim($this->common_no))->where('label_id', '=', 5)->get() :
            Common::all()->where('label_id', '=', 5);
    }
    #endregion

    #region[Get-Obj]
    public function getObj($id)
    {
        if ($id) {
            $Product = Product::find($id);
            $this->common->vid = $Product->id;
            $this->common->vname = $Product->vname;
            $this->common->active_id = $Product->active_id;
            $this->product_type = $Product->product_type;
            $this->common_id = $Product->common_id;
            $this->units = $Product->units;
            $this->gst_percent = $Product->gst_percent;
            $this->quantity = $Product->quantity;
            return $Product;
        }
        return null;
    }
    #endregion

    #region[Clear-Fields]
    public function clearFields(): void
    {
        $this->common->vid = '';
        $this->common->vname = '';
        $this->common->active_id = '1';
        $this->product_type = '';
        $this->common_id = '';
        $this->units = '';
        $this->gst_percent = '';
        $this->quantity = '';
    }
    #endregion

    #region[Render]
    public function getRoute()
    {
        return route('products');
    }

    public function render()
    {
        $this->getCommonList();
        return view('livewire.master.product.index')->with([
            'list' => $this->getListForm->getList(Product::class, function ($query) {
                return $query->where('id', '>', '');
            }),
        ]);
    }
    #endregion
}
