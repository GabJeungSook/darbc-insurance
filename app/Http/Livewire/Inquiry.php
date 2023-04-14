<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Filament\Tables;
use App\Models\InsuranceMembers;
use App\Models\Replacement;
use Illuminate\Database\Eloquent\Builder;
use WireUi\Traits\Actions;
use Carbon\Carbon;
use DB;

class Inquiry extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;
    use Actions;

    public $addReplacement = false;
    public $member_id;
    public $name;
    public $relationship;
    public $birthday;
    public $age;

    protected function getTableQuery(): Builder
    {
        return InsuranceMembers::query();
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('name')->label('NAME')->searchable(),
            Tables\Columns\TextColumn::make('gender')->label('GENDER')->searchable(),
            Tables\Columns\TextColumn::make('birthday')->label('BIRTHDAY')->date('F d, Y'),
            Tables\Columns\TextColumn::make('age')->label('AGE'),
            Tables\Columns\TextColumn::make('replacement.name')->label('REPLACEMENT\'S NAME')->searchable(),
            Tables\Columns\TextColumn::make('replacement.relationship')->label('REPLACEMENT\'S NAME')->searchable(),
            Tables\Columns\TextColumn::make('replacement.birthday')->label('REPLACEMENT\'S BIRTHDAY')->date('F d, Y'),
            Tables\Columns\TextColumn::make('replacement.age')->label('REPLACEMENT\'S AGE'),
            Tables\Columns\TextColumn::make('tin_1')->label('TIN'),
            Tables\Columns\TextColumn::make('tin_2')->label('TIN'),
            Tables\Columns\TextColumn::make('tin_3')->label('TIN'),
        ];
    }

    public function save()
    {
        $this->validate([
            'member_id' => 'required',
            'name' => 'required',
            'relationship' => 'required',
            'birthday' => 'required',
            'age' => 'required',
        ]);

        DB::beginTransaction();
        $member = Replacement::create([
            'member_id' => $this->member_id,
            'name' => $this->name,
            'relationship' => $this->relationship,
            'birthday' => $this->birthday,
            'age' => $this->age,
        ]);
        DB::commit();

        $this->dialog()->success(
            $title = 'Success',
            $description = 'Replacement added successfully'
        );

        $this->addReplacement = false;
        $this->reset(['member_id','name', 'relationship', 'birthday', 'age']);
    }

    public function render()
    {
        return view('livewire.inquiry', [
            'members' => InsuranceMembers::pluck('name', 'id')->all(),
        ]);
    }
}
