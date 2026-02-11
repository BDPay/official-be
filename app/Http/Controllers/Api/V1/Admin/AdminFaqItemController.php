<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\AdminFaqItemResource;
use App\Models\FaqItem;
use App\Traits\PaginatesAndSearches;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class AdminFaqItemController extends Controller
{
    use PaginatesAndSearches;

    public function index(Request $request): AnonymousResourceCollection
    {
        $query = FaqItem::with('category')->orderBy('sort_order');
        $paginated = $this->paginateAndSearch($query, $request, ['question', 'answer']);
        return AdminFaqItemResource::collection($paginated);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'faq_category_id' => 'required|exists:faq_categories,id',
            'question' => 'required|array',
            'question.en' => 'required|string',
            'question.id' => 'nullable|string',
            'answer' => 'required|array',
            'answer.en' => 'required|string',
            'answer.id' => 'nullable|string',
            'sort_order' => 'nullable|integer',
        ]);

        $item = FaqItem::create($validated);
        return response()->json(['data' => new AdminFaqItemResource($item)], 201);
    }

    public function show(string $id): JsonResponse
    {
        $item = FaqItem::find($id);
        if (!$item) {
            return response()->json(['message' => 'Not found.'], 404);
        }
        return response()->json(['data' => new AdminFaqItemResource($item)]);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $item = FaqItem::find($id);
        if (!$item) {
            return response()->json(['message' => 'Not found.'], 404);
        }

        $validated = $request->validate([
            'faq_category_id' => 'required|exists:faq_categories,id',
            'question' => 'required|array',
            'question.en' => 'required|string',
            'question.id' => 'nullable|string',
            'answer' => 'required|array',
            'answer.en' => 'required|string',
            'answer.id' => 'nullable|string',
            'sort_order' => 'nullable|integer',
        ]);

        $item->update($validated);
        return response()->json(['data' => new AdminFaqItemResource($item)]);
    }

    public function destroy(string $id): JsonResponse
    {
        $item = FaqItem::find($id);
        if (!$item) {
            return response()->json(['message' => 'Not found.'], 404);
        }
        $item->delete();
        return response()->json(['message' => 'Deleted successfully.']);
    }
}
