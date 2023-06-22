<?php

namespace App\Http\Controllers;

use App\Charts\StatChart;
use App\Models\Apartment;
use ArielMejiaDev\LarapexCharts\Facades\LarapexChart;
use Illuminate\Http\Request;

class StatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $apartments = Apartment::where('user_id', $user->id)->get();
        $labels = [];
        $dataSet = [];


        foreach ($apartments as $apartment) {
            if (!in_array($apartment->city, $labels)) {
                $data = Apartment::where('city', $apartment->city)->where('user_id', $user->id)->count();
                array_push($labels, $apartment->city);
                array_push($dataSet, $data);
            }
        }

        $chart = LarapexChart::setType('donut')
            ->setTitle('your apartments')
            ->setDataset($dataSet)
            ->setLabels($labels);
        return view('admin.stats.index', compact('chart'));
    }
}
