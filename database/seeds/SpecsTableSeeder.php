<?php

use App\Spec;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SpecsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specs = [
          'Dermatologia',
          'Pediatria',
          'Urologia',
          'Odontoiatria',
          'Ginecologia',
          'Neurologia',
          'Psicologia',
          'Psichiatria',
          'Geriatria',
          'Oncologia',
          'Allergologia',
          'Ortopedia',
          'Reumatologia'
        ];

        foreach($specs as $spec){
          $new_spec = new Spec();
          $new_spec->name = $spec;
          $new_spec->slug = Str::slug($spec, '-');
          $new_spec->save();
        }
        
    }
}
