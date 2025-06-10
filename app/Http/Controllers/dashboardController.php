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
        $providers = User::where('is_admin', 0)
                 ->where('name', '!=', 'Test User')
                 ->get();

        $plans = UserPlan::all();

        $contracts = contract::all();

        $data = [

            'total_users' => $providers->count(),
            'users' => $providers->map(function ($user) {
                return [
                    'id' =>$user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'cnpj' => $user->cnpj,
                ];
                
            }),

            'total_plans' => $plans->count(),

            'renda_total' => UserPlan::sum('price_plan'),

            'plans' => $plans->map(function($plan){
                return [
                    'id'=> $plan->id,
                    'name' => $plan->name_plan,
                    'speed' => $plan->speed_plan,
                    'type' => $plan->type_plan,
                    'price' => $plan->price_plan,
                ];
            }),

            'total_contracts' => $contracts->count(),

            'contract' => $contracts->map(function($contract){
                return [
                    'cliente', 
                    'CNPJ' => $contract->cnpj, 
                    'cidade' => $contract->cidade,
                    'valor' => $contract->valor, 
                    'início' => $contract->vigencia_inicio, 
                    'fim' => $contract->vigencia_fim,
                ];
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
public function destroyUser($id)
{
    $user = User::find($id);

    if (!$user) {
        return response()->json(['error' => 'Usuário não encontrado.'], 404);
    }

    // Evita apagar o admin ou usuário de teste
    if ($user->is_admin || $user->name === 'Test User') {
        return response()->json(['error' => 'Não é permitido excluir este usuário.'], 403);
    }

    $user->delete();

    return response()->json(['success' => 'Usuário excluído com sucesso.']);
}

public function destroyPlan($id)
{
    $plan = UserPlan::find($id);

    if (!$plan) {
        return response()->json(['error' => 'Plano não encontrado.'], 404);
    }

    $plan->delete();

    return response()->json(['success' => 'Plano excluído com sucesso.']);
}


public function destroyContract($id)
{
    $contract = contract::find($id);

    if (!$contract) {
        return response()->json(['error' => 'Contrato não encontrado.'], 404);
    }

    $contract->delete();

    return response()->json(['success' => 'Contrato excluído com sucesso.']);
}

    public function storeProvider(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:6',
        'cnpj' => 'nullable|string|max:20',
    ]);

    $user = User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => bcrypt($validated['password']),
        'cnpj' => $validated['cnpj'],
        'is_admin' => 0,
    ]);

            // Criar um novo time para o usuário (se necessário)
    $team = $user->ownedTeams()->create([
        'user_id' => $user->id,
        'name' => explode(' ', $user->name, 2)[0]."'s Team", // ou outro nome padrão
        'personal_team' => true,
    ]);

    // Definir o current_team_id
    $user->current_team_id = $team->id;
    $user->save();


    return redirect()->back()->with('success', 'Usuário criado com sucesso!');
}
public function storePlan(Request $request)
{
    $validated = $request->validate([
        'name_plan' => 'required|string|max:255',
        'speed_plan' => 'required|string|max:100',
        'type_plan' => 'required|string|max:100',
        'price_plan' => 'required|numeric|min:0',
    ]);

    UserPlan::create([
        'name_plan' => $validated['name_plan'],
        'speed_plan' => $validated['speed_plan'],
        'type_plan' => $validated['type_plan'],
        'price_plan' => $validated['price_plan'],
        'user_id' => auth()->id(),
        'team_id' => 1, 
    ]);

    return redirect()->back()->with('success', 'Plano criado com sucesso!');
}

//edit

 // Editar Usuário (Providers)
    public function editUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'cnpj' => 'nullable|string|max:20',
        ]);

        $user->update($validated);

        return response()->json(['success' => 'Usuário atualizado com sucesso.']);
    }

    // Editar Plano
    public function editPlan(Request $request, $id)
    {
        $plan = UserPlan::findOrFail($id);

        $validated = $request->validate([
            'name_plan' => 'required|string|max:255',
            'speed_plan' => 'required|string|max:100',
            'type_plan' => 'required|string|max:100',
            'price_plan' => 'required|numeric|min:0',
        ]);

        $plan->update($validated);

        return response()->json(['success' => 'Plano atualizado com sucesso.']);
    }

    // Editar Contrato
    public function editContract(Request $request, $id)
    {
        $contract = Contract::findOrFail($id);

        $validated = $request->validate([
            'cnpj' => 'required|string|max:20',
            'cidade' => 'required|string|max:255',
            'valor' => 'required|numeric|min:0',
            'vigencia_inicio' => 'required|date',
            'vigencia_fim' => 'required|date|after_or_equal:vigencia_inicio',
        ]);

        $contract->update($validated);

        return response()->json(['success' => 'Contrato atualizado com sucesso.']);
    }
}