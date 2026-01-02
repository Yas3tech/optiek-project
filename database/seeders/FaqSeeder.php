<?php

namespace Database\Seeders;

use App\Models\Faq;
use App\Models\FaqCategory;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Garantie & Retour',
                'position' => 1,
                'faqs' => [
                    [
                        'question' => 'Wat is de garantie op mijn bril?',
                        'answer' => 'Op al onze brillen krijgt u 2 jaar garantie op materiaal- en fabricagefouten. Dit geldt voor zowel het montuur als de glazen.',
                        'position' => 1,
                    ],
                    [
                        'question' => 'Kan ik mijn bril retourneren?',
                        'answer' => 'Ja, u kunt uw bril binnen 14 dagen retourneren als u niet tevreden bent. De bril moet wel in onbeschadigde staat zijn en in de originele verpakking.',
                        'position' => 2,
                    ],
                ],
            ],
            [
                'name' => 'Glazen',
                'position' => 2,
                'faqs' => [
                    [
                        'question' => 'Welke soorten glazen bieden jullie aan?',
                        'answer' => "Wij bieden verschillende soorten glazen aan:\n- Enkelvoudige glazen\n- Bifocale glazen\n- Multifocale (varilux) glazen\n- Blauwlichtfilter glazen\n- Transitions (fotochromatische) glazen",
                        'position' => 1,
                    ],
                    [
                        'question' => 'Hoe lang duurt het om nieuwe glazen te maken?',
                        'answer' => 'Standaard glazen zijn binnen 5-7 werkdagen klaar. Voor speciale glazen of sterke correcties kan dit oplopen tot 2 weken.',
                        'position' => 2,
                    ],
                ],
            ],
            [
                'name' => 'Contactlenzen',
                'position' => 3,
                'faqs' => [
                    [
                        'question' => 'Kan ik zonder recept contactlenzen bestellen?',
                        'answer' => 'Nee, voor contactlenzen is altijd een recente oogmeting nodig. Wij adviseren een jaarlijkse controle bij onze optometrist.',
                        'position' => 1,
                    ],
                    [
                        'question' => 'Welke soorten contactlenzen verkopen jullie?',
                        'answer' => "Wij verkopen:\n- Daglenzen\n- Maandlenzen\n- Torische lenzen (voor astigmatisme)\n- Multifocale contactlenzen",
                        'position' => 2,
                    ],
                ],
            ],
            [
                'name' => 'Levering',
                'position' => 4,
                'faqs' => [
                    [
                        'question' => 'Leveren jullie aan huis?',
                        'answer' => 'Ja, wij bezorgen gratis in heel België. U ontvangt een track & trace code zodra uw bestelling is verzonden.',
                        'position' => 1,
                    ],
                    [
                        'question' => 'Kan ik mijn bestelling ophalen in de winkel?',
                        'answer' => 'Absoluut! U kunt kiezen voor gratis afhaling in onze winkel. Wij nemen contact met u op zodra uw bestelling klaar is.',
                        'position' => 2,
                    ],
                ],
            ],
        ];

        foreach ($categories as $categoryData) {
            $faqs = $categoryData['faqs'];
            unset($categoryData['faqs']);
            
            $category = FaqCategory::create($categoryData);
            
            foreach ($faqs as $faq) {
                $category->faqs()->create($faq);
            }
        }
    }
}
