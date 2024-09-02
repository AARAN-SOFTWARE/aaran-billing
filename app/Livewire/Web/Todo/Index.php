<?php

namespace App\Livewire\Web\Todo;

use Aaran\Web\Models\Todo;
use App\Livewire\Trait\CommonTraitNew;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class Index extends Component
{
    use CommonTraitNew;
    use WithFileUploads;

    #region[Properties]
    public $slno = '';
    public $vdate = '';
    public $ename = '';
    public bool $completed = false;
    public bool $editmode = false;
    public $subjective = false;
    public $active_id = '1';
    #endregion
    public function mount()
    {
        $this->slno=Todo::nextNo( );
        $this->vdate = Carbon::parse(Carbon::now());
    }

    public function saveTodo()
    {
        $this->slno=Todo::nextNo();
        Todo::create([
            'slno' => $this->slno,
            'vdate' => $this->vdate,

        ]);
    }

    public function clearFields(): void
    {
        $this->slno = '1';
        $this->vdate = Carbon::parse(Carbon::now());
        $this->common->vname = '';
        $this->ename = '';
        $this->completed = false;
        $this->common->active_id = '1';

    }

    public function isChecked($id): void
    {
        $todo = Todo::find($id);
        $todo->completed = !$todo->completed;
        $todo->save();
        $this->clearFields();
        $this->refreshComponent();
    }
    public function edit($id)
    {
        $this->ename = $id;
    }

    public function updateTodo($id)
    {
        $todo = Todo::find($id);
        $todo->slno = $this->slno;
        $todo->common->vname = $this->ename;
        $todo->save();
        $this->clearFields();
        $this->refreshComponent();

        $this->ename = '';
    }
    public function markAsPublic($id): void
    {
        $todo = Todo::find($id);
        $todo->subjective = !$todo->subjective;
        $todo->save();
        $this->clearFields();
        $this->refreshComponent();
    }

    public function getDelete($id)
    {
        $todo = Todo::find($id);
        $todo->delete();
        $this->clearFields();
        $this->refreshComponent();
    }
    protected function refreshComponent(): void
    {
        $this->dispatch('$refresh');
    }

    public function render()
    {
        return view('livewire.web.todo.index')->with([
            'list' => $this->getListForm->getList(Todo::class, function ($query) {
                return $query->where('user_id','=',auth()->id())
                    ->orwhere('subjective','=',true);
            }),
        ]);
    }
}
