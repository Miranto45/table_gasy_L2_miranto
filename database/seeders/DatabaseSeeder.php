<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Table;
use App\Models\Zone;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $salle = Zone::create(['nom' => 'Salle principale', 'description' => 'Salle intérieure']);
        $terrasse = Zone::create(['nom' => 'Terrasse', 'description' => 'Espace extérieur']);

        foreach ([['T1',2,20,20],['T2',4,50,20],['T3',6,80,20],['T4',2,20,60],['T5',4,50,60]] as $t) {
            Table::create(['zone_id'=>$salle->id,'numero'=>$t[0],'capacite'=>$t[1],'pos_x'=>$t[2],'pos_y'=>$t[3]]);
        }
        foreach ([['E1',2,30,30],['E2',4,70,50]] as $t) {
            Table::create(['zone_id'=>$terrasse->id,'numero'=>$t[0],'capacite'=>$t[1],'pos_x'=>$t[2],'pos_y'=>$t[3]]);
        }

        Client::create(['nom'=>'Dupont','prenom'=>'Jean','telephone'=>'0601020304','email'=>'jean@example.com']);
        Client::create(['nom'=>'Martin','prenom'=>'Sophie','telephone'=>'0605060708','email'=>'sophie@example.com']);
    }
}
