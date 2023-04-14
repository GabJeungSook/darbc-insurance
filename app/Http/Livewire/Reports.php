<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\InsuranceMembers;
class Reports extends Component
{
    public $report_get;
    public function render()
    {
        return view('livewire.reports', [
            'old_members' => InsuranceMembers::where('age', '>=', 51)->where('age', '<=', 60)->get(),
            'older_members' => InsuranceMembers::where('age', '>', 50)->get()
        ]);
    }
}
