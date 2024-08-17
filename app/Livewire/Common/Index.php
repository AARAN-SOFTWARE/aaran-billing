<?php

namespace App\Livewire\Common;

use Aaran\Common\Models\Common;
use Aaran\Common\Models\Label;
use App\Livewire\Trait\CommonTraitNew;
use Livewire\Component;

class Index extends Component
{
    use CommonTraitNew;
    public $desc;
    public $desc_1;
    public $label_id;
    public $labelData;
    public array $filter=[];

    public function mount($id=null)
    {
        if ($id!=null) {
            $this->filter[] = $id;
        }
        $this->labelData=Label::all()->when($this->filter,function ($query,$filter){
            return $query->whereIn('id',$filter);
        });
    }

    public function getSave(): void
    {
        if ($this->common->vid == '') {
            $Common = new Common();
            $extraFields=[
                'desc'=>$this->desc,
                'label_id'=>$this->label_id,
                'desc_1'=>$this->desc_1,
            ];
            $this->common->save($Common,$extraFields);
            $this->clearFields();
            $message = "Saved";
        } else {
            $Common = Common::find($this->common->vid);
            $extraFields=[
                'desc'=>$this->desc,
                'label_id'=>$this->label_id,
                'desc_1'=>$this->desc_1,
            ];
            $this->common->edit($Common,$extraFields);
            $this->clearFields();
            $message = "Updated";
        }
        $this->dispatch('notify', ...['type' => 'success', 'content' => $message . ' Successfully']);
    }

    public function getObj($id)
    {
        if ($id) {
            $Common = Common::find($id);
            $this->common->vid = $Common->id;
            $this->common->vname = $Common->vname;
            $this->common->active_id = $Common->active_id;
            $this->desc = $Common->desc;
            $this->desc_1 = $Common->desc_1;
            $this->label_id = $Common->label_id;
            return $Common;
        }
        return null;
    }

    public function clearFields():void
    {
        $this->common->vid = '';
        $this->common->vname = '';
        $this->common->active_id = '1';
        $this->desc = '';
        $this->desc_1 = '';
        $this->label_id = '';
    }

    public function getRoute()
    {
        return route('commons');
    }
    public function render()
    {
        return view('livewire.common.index')->with([
            'list' => $this->getListForm->getList(Common::class,function ($query){
                return $query->orderBy('label_id', 'asc' )
                    ->when($this->filter,function ($query,$filter){
                        return $query->whereIn('label_id',$filter);
                    });
            }),
        ]);
    }
}
