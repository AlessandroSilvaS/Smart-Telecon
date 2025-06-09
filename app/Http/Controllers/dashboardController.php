<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserPlan;
use App\Models\contract;
use Illuminate\Http\Request;

class dashboardController extends Controller
{

     public function upDashboard()
    {
        $providers = User::where('is_admin', 0)->get();

        $plans = UserPlan::all();

        $contracts = contract::all();

        $data = [

            'total_users' => $providers->count(),
            'users' => $providers->map(function ($user) {
                return [
                    'name' => $user->name,
                    'email' => $user->email,
                    'cnpj' => $user->cnpj,
                ];
                
            }),

            'total_plans' => $plans->count(),

            'renda_total' => UserPlan::sum('price_plan'),

            'plans' => $plans->map(function($plan){
                return [
                    'name' => $plan->name_plan,
                    'speed' => $plan->speed_plan,
                    'type' => $plan->type_plan,
                    'price' => $plan->price_plan,
                ];
            }),

            'total_contracts' => $contracts->count(),

            'contract' => $contracts->map(function($contract){
                return [];
            }),

        ];

        return view('dashboard', compact('data'));
    }

    public function chartPlanTypes()
{
    $tiposDesejados = ['Optíca', 'HTC', 'Satélite', 'ADSL'];

    $tiposNoBanco = UserPlan::whereIn('type_plan', $tiposDesejados)
        ->selectRaw('type_plan, COUNT(*) as total')
        ->groupBy('type_plan')
        ->pluck('total', 'type_plan');

    $series = [];
    foreach ($tiposDesejados as $tipo) {
        $series[] = $tiposNoBanco[$tipo] ?? 0;
    }

    return response()->json([
        'labels' => $tiposDesejados,
        'series' => $series
    ]);
}

    
}
