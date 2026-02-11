<?php

namespace App\Traits;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

trait PaginatesAndSearches
{
    protected function paginateAndSearch(Builder $query, Request $request, array $searchFields = []): LengthAwarePaginator
    {
        if ($search = $request->query('search')) {
            $query->where(function (Builder $q) use ($search, $searchFields) {
                foreach ($searchFields as $field) {
                    $q->orWhere($field, 'like', "%{$search}%");
                }
            });
        }

        $perPage = in_array($request->integer('per_page'), [10, 25, 50])
            ? $request->integer('per_page')
            : 10;

        return $query->paginate($perPage)->withQueryString();
    }
}
