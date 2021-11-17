<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use App\Models\Project;

class SampleChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $projekt = Project::find(1);
$szabad = $projekt->eszkozoks()
    ->wherePivot('project_id', '=', '1')
    ->count();

        return Chartisan::build()
            ->labels(['Eszközök', 'Gépek', 'Munkások'])
            ->dataset('Szabad kapacitások', [$szabad, 3, 7]);
    }
}