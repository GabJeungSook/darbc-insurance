<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Filament\Tables;
use App\Models\InsuranceMembers;
use Illuminate\Database\Eloquent\Builder;
use WireUi\Traits\Actions;
use Carbon\Carbon;
use DB;

class Cluster extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;
    use Actions;

    public $addCluster = false;
    public $member_id;
    public $name;
    public $cluster;
    public $gender;
    public $birthday;
    public $age;
    public $tin_1;
    public $tin_2;
    public $tin_3;
    public $date_of_death;

    protected function getTableQuery(): Builder
    {
        return InsuranceMembers::query();
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('name')->label('NAME')->searchable(),
            Tables\Columns\TextColumn::make('cluster')->label('CLUSTER')->formatStateUsing(function ($record) {
                if($record->cluster == "")
                {
                    return '0';
                }else{
                    return $record->cluster;
                }
            })->searchable(),
        ];
    }

    public function save()
    {
        $this->validate([
            'member_id' => 'required',
            'name' => 'required',
            'cluster' => 'required',
            'gender' => 'required',
            'birthday' => 'required',
            'age' => 'required',
        ]);

        DB::beginTransaction();
        $member = InsuranceMembers::create([
            'member_id' => $this->member_id,
            'name' => $this->name,
            'cluster' => $this->cluster,
            'gender' => $this->gender == 1 ? 'Male' : 'Female',
            'birthday' => $this->birthday,
            'age' => $this->age,
            'tin_1' => $this->tin_1,
            'tin_2' => $this->tin_2,
            'tin_3' => $this->tin_3,
            'date_of_death' => $this->date_of_death,
        ]);
        DB::commit();

        $this->dialog()->success(
            $title = 'Success',
            $description = 'Member added successfully'
        );

        $this->addCluster = false;
        $this->reset(['member_id','name', 'cluster', 'gender', 'age', 'tin_1', 'tin_2', 'tin_3', 'date_of_death']);
    }


    public function render()
    {
        return view('livewire.cluster');
    }
}
