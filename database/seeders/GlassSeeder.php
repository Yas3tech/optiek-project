<?php

namespace Database\Seeders;

use App\Models\Glass;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class GlassSeeder extends Seeder
{
    public function run(): void
    {
        $tags = [
            'Zonnebril' => Tag::create(['name' => 'Zonnebril']),
            'Leesbril' => Tag::create(['name' => 'Leesbril']),
            'Heren' => Tag::create(['name' => 'Heren']),
            'Dames' => Tag::create(['name' => 'Dames']),
            'Unisex' => Tag::create(['name' => 'Unisex']),
            'Premium' => Tag::create(['name' => 'Premium']),
            'Budget' => Tag::create(['name' => 'Budget']),
            'Sportbril' => Tag::create(['name' => 'Sportbril']),
        ];

        $glasses = [
            [
                'name' => 'Aviator Classic',
                'brand' => 'Ray-Ban',
                'price' => 159.00,
                'stock' => 15,
                'description' => 'Tijdloze zonnebril met metalen montuur en groene glazen.',
                'tags' => ['Zonnebril', 'Unisex', 'Premium'],
            ],
            [
                'name' => 'Wayfarer Original',
                'brand' => 'Ray-Ban',
                'price' => 145.00,
                'stock' => 20,
                'description' => 'Iconisch design, perfect voor elke gelegenheid.',
                'tags' => ['Zonnebril', 'Unisex'],
            ],
            [
                'name' => 'Holbrook',
                'brand' => 'Oakley',
                'price' => 129.00,
                'stock' => 12,
                'description' => 'Sportieve zonnebril met lichtgewicht O Matter frame.',
                'tags' => ['Zonnebril', 'Heren', 'Sportbril'],
            ],
            [
                'name' => 'GG0036S',
                'brand' => 'Gucci',
                'price' => 295.00,
                'stock' => 5,
                'description' => 'Luxe cat-eye zonnebril met gouden accenten.',
                'tags' => ['Zonnebril', 'Dames', 'Premium'],
            ],
            [
                'name' => 'Reading Pro',
                'brand' => 'EyeComfort',
                'price' => 49.00,
                'stock' => 50,
                'description' => 'Comfortabele leesbril met blaulichtfilter.',
                'tags' => ['Leesbril', 'Unisex', 'Budget'],
            ],
            [
                'name' => 'Executive',
                'brand' => 'Hugo Boss',
                'price' => 199.00,
                'stock' => 8,
                'description' => 'Stijlvolle bril voor de moderne professional.',
                'tags' => ['Leesbril', 'Heren', 'Premium'],
            ],
        ];

        foreach ($glasses as $glassData) {
            $tagNames = $glassData['tags'];
            unset($glassData['tags']);

            $glass = Glass::create($glassData);

            // Attach tags
            $tagIds = collect($tagNames)->map(fn($name) => $tags[$name]->id);
            $glass->tags()->attach($tagIds);
        }
    }
}
