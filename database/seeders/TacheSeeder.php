<?php

namespace Database\Seeders;

use App\Models\Tache;
use Carbon\Carbon;
use Database\Factories\TacheFactory;
use Illuminate\Database\Seeder;

class TacheSeeder extends Seeder
{
    public function run()
    {
        $tasks=[];
                
        function generateRandomTaskDescription() {
            $descriptions = [
                'learning Laravel',
                'learning html/css',
                'learning english',
                'learning germany',
                'learning JavaScript',
                'learning MongoDB',
                'testing the application',
                'testing PHP',
                'testing React',
                'testing MySQL',
                'implementing new features',
                'optimizing performance',
                'fixing bugs',
                'integrating with external APIs',
                'writing documentation',
            ];
        
            return $descriptions[array_rand($descriptions)];
        }
        
        function generateRandomTaskStatus() {
            $statuses = ['en cours', 'terminé'];
        
            return $statuses[array_rand($statuses)];
        }
        for ($i = 1; $i <= 100; $i++) {
            $task = [
                'titre' => 'Tache ' . $i,
                'description' => 'This task is about ' . generateRandomTaskDescription(),
                'date_echeance' => Carbon::now()->addDays($i),
                'statut' => generateRandomTaskStatus(),
            ];
        
            $tasks[] = $task;
        }
        Tache::factory()->createMany($tasks);
    }
}
