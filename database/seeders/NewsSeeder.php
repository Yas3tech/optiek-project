<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\User;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::where('email', 'admin@ehb.be')->first();

        if (!$admin) {
            return;
        }

        News::updateOrCreate(
            ['title' => 'Welkom bij onze Optiek'],
            [
                'user_id' => $admin->id,
                'content' => 'Wij zijn verheugd u te mogen verwelkomen in onze vernieuwde winkel. Kom langs voor een gratis oogmeting!',
                'published_at' => now(),
                'image_path' => null,
            ]
        );

        News::updateOrCreate(
            ['title' => 'Nieuwe collectie monturen'],
            [
                'user_id' => $admin->id,
                'content' => 'De nieuwe herfstcollectie is binnen. Meer dan 100 nieuwe modellen van topmerken.',
                'published_at' => now()->subDays(2),
                'image_path' => null,
            ]
        );
    }
}
