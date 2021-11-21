<?php

declare(strict_types = 1);

namespace App\Charts;

use App\Models\Eszkozok;
use App\Models\Project;
use App\Models\Szabadsagoks;
use App\Models\User;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

class OsszesChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $projects = Project::all()->count();
        $users = User::all()->count();
        $eszkozok = Eszkozok::all()->count();
        $szabadsagok = Szabadsagoks::all()->count();
        return Chartisan::build()
            ->labels(['Projektek', 'Felhasználók', 'Eszközök', 'Gépek', 'Szabadságok'])
            ->dataset('Összes', [$projects, $users, $eszkozok, 7, $szabadsagok]);
    }
}