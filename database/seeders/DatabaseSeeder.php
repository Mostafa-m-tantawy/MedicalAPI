<?php

namespace Database\Seeders;

use App\Models\Diagnosis;
use App\Models\Doctor;
use App\Models\MedicalRecord;
use App\Models\Meta;
use App\Models\User;
use App\Models\Vital;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
for ($i=0 ; $i<100 ;$i++){
    $meta = Meta::factory()->create();
    $user = User::factory()->create();
    $doctor = Doctor::factory()->create();
    $vital = Vital::factory()->create();
    $diagnosis = Diagnosis::factory()->create();


    $medical = MedicalRecord::factory()
        ->count(1)

        ->for($vital)
        ->for($diagnosis)
        ->for($meta)
        ->for($user)
        ->for($doctor)
        ->create();

}
    }
}
