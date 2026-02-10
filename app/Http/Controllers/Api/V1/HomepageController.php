<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\FeatureCategory;
use App\Models\HomepageSection;
use App\Models\ServiceHighlight;
use App\Models\Setting;
use App\Models\TrustIndicator;
use Illuminate\Http\JsonResponse;

class HomepageController extends Controller
{
    public function index(): JsonResponse
    {
        $hero = HomepageSection::where('section_key', 'hero')->first();
        $projections = HomepageSection::where('section_key', 'projections')->first();

        $trustIndicators = TrustIndicator::active()
            ->orderBy('sort_order')
            ->get()
            ->map(fn ($ti) => [
                'name' => $ti->name,
                'logo_url' => $ti->logo_url,
                'row_group' => $ti->row_group,
            ]);

        $features = FeatureCategory::with(['items' => fn ($q) => $q->orderBy('sort_order')])
            ->orderBy('sort_order')
            ->get()
            ->map(fn ($cat) => [
                'name' => $cat->name,
                'slug' => $cat->slug,
                'items' => $cat->items->map(fn ($item) => [
                    'title' => $item->title,
                    'description' => $item->description,
                    'icon' => $item->icon,
                ]),
            ]);

        $serviceHighlights = ServiceHighlight::active()
            ->orderBy('sort_order')
            ->get()
            ->map(fn ($sh) => [
                'title' => $sh->title,
                'content' => $sh->content,
            ]);

        $contact = Setting::getByGroup('contact');

        return response()->json([
            'hero' => $hero ? [
                'title' => $hero->title,
                'subtitle' => $hero->subtitle,
                'description' => $hero->description,
                'content' => $hero->content,
            ] : null,
            'trust_indicators' => $trustIndicators,
            'features' => $features,
            'service_highlights' => $serviceHighlights,
            'projections' => $projections?->content,
            'contact' => $contact,
        ]);
    }
}
