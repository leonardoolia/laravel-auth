<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Generator $faker): void
    {
        // Array di labels 
        $labels = ['Frontend', 'Backend', 'Fullstack', 'UI-UX', 'DESIGN'];

        // Ciclo per girare sulle labels
        foreach ($labels as $label) {
            // Istanza di type
            $type = new Type();

            // Riempiamo i campi
            $type->label = $label;
            $type->color = $faker()->hexColor();
        }
    }
}
