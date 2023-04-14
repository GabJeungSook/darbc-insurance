<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use League\Csv\Reader;
use App\Models\InsuranceMembers;
use App\Models\Replacement;
use Illuminate\Support\Facades\Storage;

class Upload extends Component
{
    use WithFileUploads;
    public $insurance_member;
    public $replacement;
    public $date_of_death;
    public function render()
    {
        return view('livewire.upload');
    }

    public function uploadMember()
    {
        $csvContents = Storage::get($this->insurance_member->getClientOriginalName());
        $csvReader = Reader::createFromString($csvContents);
        $csvRecords = $csvReader->getRecords();

        foreach ($csvRecords as $csvRecord) {
            InsuranceMembers::create([
                'member_id' => $csvRecord[0],
                'name' => $csvRecord[1],
                'cluster' => $csvRecord[2],
                'gender' => $csvRecord[3],
                'birthday' => \Carbon\Carbon::parse($csvRecord[4])->format('Y-m-d'),
                'age' => $csvRecord[5],
                'tin_1' => $csvRecord[6],
                'tin_2' => $csvRecord[7],
                'tin_3' => $csvRecord[8],
            ]);
        }
    }

    public function uploadReplacement()
    {
        $csvContents = Storage::get($this->replacement->getClientOriginalName());
        $csvReader = Reader::createFromString($csvContents);
        $csvRecords = $csvReader->getRecords();

        foreach ($csvRecords as $csvRecord) {
            Replacement::create([
                'member_id' => $csvRecord[0],
                'name' => ltrim($csvRecord[1], '/ '),
                'relationship' => $csvRecord[2],
                'birthday' => \Carbon\Carbon::parse($csvRecord[3])->format('Y-m-d'),
                'age' => $csvRecord[4],
            ]);
        }
    }

    public function uploadDateOfDeath()
    {
        $csvContents = Storage::get($this->date_of_death->getClientOriginalName());
        $csvReader = Reader::createFromString($csvContents);
        $csvRecords = $csvReader->getRecords();
        $members = InsuranceMembers::get();
        foreach ($csvRecords as $csvRecord) {
            foreach($members as $member)
            {
                $string = $csvRecord[1];
                $substring = rtrim($member->name);

                if (strpos($string, $substring) !== false) {
                    $update = InsuranceMembers::find($member->id)->update([
                        'date_of_death' => \Carbon\Carbon::parse($csvRecord[0])->format('Y-m-d'),
                    ]);
                }
            }
        }
    }
}
