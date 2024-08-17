<?php

namespace App\Livewire\Forms;

use App\Livewire\Trait\CommonTrait;
use Livewire\Attributes\Validate;
use Livewire\Form;

class GetListForm extends Form
{
    public bool $sortAsc = true;
    public string $perPage = "25";
    public string $activeRecord = "1";
    public string $sortField = 'vname';

    public string $searches = "";

    public function sortBy($field): void
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }
        $this->sortField = $field;
    }


    public function getList($modelClass, callable $queryCallback = null)
    {
        if (!class_exists($modelClass)) {
            throw new \InvalidArgumentException("Model class {$modelClass} does not exist.");
        }

        $query = $modelClass::query();

        if ($queryCallback) {
            $queryCallback($query);
        }

        $query = $query->when($this->searches, function ($query, $search) {
            return $query->where('vname', 'like', '%' . $search . '%');
        })
            ->where('active_id', '=', $this->activeRecord)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');

        return $query->paginate($this->perPage);
    }
}
