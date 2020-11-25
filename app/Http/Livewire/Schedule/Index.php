<?php

namespace App\Http\Livewire\Schedule;

use App\Models\Cashier;
use Livewire\WithPagination;
use Livewire\Component;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $sortBy='Employee';

    public $sortDirection='asc';

    public $perPage=10;

    public $search='';

    public function render()
    {
        $datacashier = Cashier::query()
        ->search($this->search)
        ->orderBy($this->sortBy,$this->sortDirection)
        ->paginate($this->perPage);
        return view('livewire.schedule.index',compact('datacashier'));
    }

    public function sortBy($field)
    {
        if ($this->sortDirection == 'asc'){
            $this->sortDirection = 'desc';
        }
        else{
            $this->sortDirection = 'asc';
        }

        return $this->sortBy = $field;
    }
}
