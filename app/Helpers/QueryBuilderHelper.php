<?php

namespace App\Helpers;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class QueryBuilderHelper
{
    /**
     * @return Builder
     */
    public static function sortingQuery(Builder $builder): mixed
    {
        $requestQuery = app('request')->query();

        $order = isset($requestQuery['order']) ? $requestQuery['order'] : 'id';
        $sort = isset($requestQuery['sort']) ? $requestQuery['sort'] : 'DESC';

        return $builder->orderBy($order, $sort);
    }

    /**
     * id,name,email
     */
    public static function searchQuery(Builder $builder): mixed
    {
        $requestQuery = app('request')->query();
        $search = isset($requestQuery['search']) ? $requestQuery['search'] : null;
        $columns = isset($requestQuery['columns']) ? $requestQuery['columns'] : null;

        if ($search && $columns) {
            $columns = explode(',', $columns);
            $searchableFields = collect($columns);

            return $builder->where(function (Builder $builder) use ($search, $searchableFields) {
                return $searchableFields->map(function ($field) use ($search, $builder, $searchableFields) {
                    $method = $searchableFields->first() === $field ? 'where' : 'orWhere';

                    return $builder->{$method}($field, 'LIKE', "%$search%");
                });
            });
        }

        return $builder;
    }

    /**
     * @return Builder
     */
    public static function paginationQuery(Builder $builder): mixed
    {
        $requestQuery = app('request')->query();
        $page = isset($requestQuery['page']) ? $requestQuery['page'] : null;
        $perPage = isset($requestQuery['per_page']) ? $requestQuery['per_page'] : null;

        if ($page && $perPage) {
            return $builder->paginate(perPage: $perPage, page: $page)->appends($requestQuery);
        }

        return $builder->get();
    }

    /**
     * @return Builder
     */
    public static function filterQuery(Builder $builder): mixed
    {
        $requestQuery = app('request')->query();
        $filter = isset($requestQuery['filter']) ? $requestQuery['filter'] : null;
        $value = isset($requestQuery['filter_value']) ? $requestQuery['filter_value'] : null;

        if ($filter && $value) {
            $filterableFields = explode(',', $filter);
            $values = explode(',', $value);

            foreach ($filterableFields as $key => $field) {
                $payload[$field] = $values[$key];
            }

            return $builder->where($payload);
        }

        return $builder;
    }

    /**
     * @return Builder
     */
    public static function filterDateQuery(Builder $builder): mixed
    {
        $requestQuery = app('request')->query();
        $chooseDate = isset($requestQuery['date']) ? $requestQuery['date'] : null;
        $chooseColumn = isset($requestQuery['date_column']) ? $requestQuery['date_column'] : 'created_at';

        if ($chooseDate && $chooseColumn) {
            return $builder->whereDate($chooseColumn, Carbon::createFromDate($chooseDate)->startOfDay());
        }

        return $builder;
    }

    public static function filterBetweenDateQuery(Builder $builder): mixed
    {
        $requestQuery = app('request')->query();
        $start_date = isset($requestQuery['start_date']) ? $requestQuery['start_date'] : null;
        $end_date = isset($requestQuery['end_date']) ? $requestQuery['end_date'] : null;

        if ($start_date && $end_date) {
            $startDate = Carbon::createFromFormat('Y-m-d', $start_date)->startOfDay();
            $endDate = Carbon::createFromFormat('Y-m-d', $end_date)->endOfDay();

            return $builder->whereBetween('created_at', [$startDate, $endDate]);
        }

        return $builder;
    }

    public static function distanceQuery(Builder $builder): mixed
    {

        $requestQuery = app('request')->query();
        $lat = isset($requestQuery['lat']) ? $requestQuery['lat'] : null;
        $long = isset($requestQuery['long']) ? $requestQuery['long'] : null;
        $distance = isset($requestQuery['distance']) ? $requestQuery['distance'] : null;

        if ($lat && $long && $distance) {
            $builder->select(['*'])
                ->selectRaw(
                    '(6371 * acos(cos(radians(?)) * cos(radians(latitude)) * cos(radians(longitude) - radians(?)) + sin(radians(?)) * sin(radians(latitude)))) AS distance',
                    [$lat, $long, $lat]
                )
                ->having('distance', '<', $distance);
        }

        return $builder;
    }
}
