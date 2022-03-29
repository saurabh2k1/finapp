<?php

namespace App\Exports;

use App\Models\TechDaily;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class BulkDailyExport implements FromView
{
    
    public function view(): View
    {
        return view('livewire.techdaily.template', ['records' => TechDaily::all()]);
    }
}
