<?php

namespace App\Livewire\Trait;

use App\Livewire\Forms\CommonForm;
use App\Livewire\Forms\GetListForm;
use JetBrains\PhpStorm\NoReturn;

trait CommonTraitNew
{
    public CommonForm $common;
    public GetListForm $getListForm;

    public bool $showEditModal = false;
    public bool $showFilters = false;
    public bool $showDeleteModal = false;

    public function toggleShowFilters(): void
    {
        $this->showFilters = !$this->showFilters;
    }

    public function sortBy($field)
    {
        $this->getListForm->sortBy($field);
    }

    public function create(): void
    {
        $this->common->clearFields();
        $this->showEditModal = true;
    }

    public function resetFilters()
    {
        $this->getListForm->activeRecord='1';
        $this->resetPage();
        $this->showFilters = false;
    }

    public function save(): void
    {
        $message = $this->getSave();
        session()->flash('success', '"' . $this->common->vname . '"  has been' . $message . ' .');
//        $this->showEditModal = false;
    }

    public function edit($id): void
    {
        $this->common->clearFields();
        $this->getObj($id);
        $this->showEditModal = true;
    }

    public function getDelete($id): void
    {
        if ($id) {
            $this->common->clearFields();
            $this->getObj($id);
            $this->showDeleteModal = true;
        }
    }
    public function trashData()
    {
        if ($this->common->vid) {
            $obj = $this->getObj($this->common->vid);
            $obj->delete();
            $this->showDeleteModal = false;
            $this->common->clearFields();
        }
    }

}
