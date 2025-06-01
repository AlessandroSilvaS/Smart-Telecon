<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $adm = User::create([
            'name' => 'Adiministrador',
            'email' => 'adminSmartTelecon@gmail.com',
            'passeorld' => bcrypt('adm1234')
        ]);

        $team = $user->ownedTeams()->create([

            'name' => 'Time adiministrador',
            'persoanal_team' => true

        ]);

        $adm->teams()->updateExistingPivot($team->id, [
            'role'=>'admin'
        ]);
    }
}
