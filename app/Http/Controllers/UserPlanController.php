<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Jetstream\Jetstream;
use App\Models\UserPlan;

class UserPlanController extends Controller
{
    public function showTable(Request $request){

        $teamId = $request->user()->currentTeam->id;

        $query = UserPlan::where('team_id', $teamId);

        if ($request->filled('name_plan')) {
            $query->where('name_plan', 'like', '%' . $request->name_plan . '%');
        }

        if ($request->filled('speed_plan')) {
            $query->where('speed_plan', $request->speed_plan);
        }

        if ($request->filled('type_plan')) {
            $query->where('type_plan', $request->type_plan);
        }

        $plans = $query->paginate(10);

        return view('presentation.provider', compact('plans'));

    }

    public function store(Request $request)
{
    $user = $request->user();

    if (! $user->hasTeamRole($user->currentTeam, 'owner') &&
        ! $user->hasTeamRole($user->currentTeam, 'member')) {
        abort(403, 'Você não tem permissão para criar planos.');
    }

    $validated = $request->validate([
        'name_plan' => 'required|string',
        'speed_plan' => 'required|string',
        'type_plan' => 'required|string',
        'price_plan' => 'required|string',
    ]);

    $validated['user_id'] = auth()->id(); 
    $validated['team_id'] = $request->user()->currentTeam->id; 

    UserPlan::create($validated);

    return redirect()->back()->with('success', 'Plano adicionado com sucesso!');
}

}
