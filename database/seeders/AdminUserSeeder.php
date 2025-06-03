<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AdminUserSeeder extends Seeder
{
    public function run(): void
    {

        //cria ou atualiza o user adimin

        $admin = User::updateOrCreate(
            ['email' => 'adminSmartTelecon@gmail.com'],
            [
                'name' => 'Administrador',
                'password' => Hash::make('adm1234'),
                'is_admin' => true, 
            ]
        );

        ///cria o time do adiministrador

        $team = $admin->ownedTeams()->create([

            'name' => 'Time adiministrador',
            'personal_team' => true

        ]);

        $admin->teams()->updateExistingPivot($team->id, [
            'role'=>'admin'
        ]);
    }
}
