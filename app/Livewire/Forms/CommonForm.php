<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class CommonForm extends Form
{
    #[Rule('required')]
    public $vname = '';
    public bool $active_id = false;
    public $vid='';

    public function rules(): array
    {
        return [
            'vname' => 'required',
        ];
    }

    public function save($model, $extraFields = [])
    {
        $model->vname = $this->vname;
        $model->active_id = $this->active_id;
        foreach ($extraFields as $key => $value) {
            $model->$key = $value;
        }
        if ($model->save()) {

            return true;
        }

        return false;
    }

    public function edit($model, $extraFields = [])
    {

        $model->vname = $this->vname;
        $model->active_id = $this->active_id;

        foreach ($extraFields as $key => $value) {
            $model->$key = $value;
        }

        if ($model->save()) {
            return true;
        }

        return false;
    }



}
