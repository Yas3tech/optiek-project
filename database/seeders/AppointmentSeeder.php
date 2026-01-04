<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Database\Seeder;

class AppointmentSeeder extends Seeder
{
    public function run(): void
    {
        $yassine = User::where('email', 'eddouksy@gmail.com')->first();
        $test = User::where('email', 'test@ehb.be')->first();
        $test2 = User::where('email', 'test2@ehb.be')->first();

        if ($yassine) {
            Appointment::create([
                'user_id' => $yassine->id,
                'date' => now()->addDays(3),
                'time_slot' => '10:00',
                'reason' => 'Oogtest',
                'phone' => '+32 470 12 34 56',
                'status' => 'pending',
            ]);

            Appointment::create([
                'user_id' => $yassine->id,
                'date' => now()->addDays(7),
                'time_slot' => '14:30',
                'reason' => 'Nieuwe bril',
                'status' => 'approved',
            ]);
        }

        if ($test) {
            Appointment::create([
                'user_id' => $test->id,
                'date' => now()->addDays(5),
                'time_slot' => '11:00',
                'reason' => 'Contactlenzen aanpassing',
                'phone' => '+32 486 98 76 54',
                'status' => 'pending',
            ]);
        }

        if ($test2) {
            Appointment::create([
                'user_id' => $test2->id,
                'date' => now()->subDays(2),
                'time_slot' => '15:00',
                'reason' => 'Reparatie',
                'status' => 'rejected',
            ]);

            Appointment::create([
                'user_id' => $test2->id,
                'date' => now()->addDays(10),
                'time_slot' => '09:30',
                'reason' => 'Adviesgesprek',
                'status' => 'pending',
            ]);
        }
    }
}
