<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class TestFilter extends AbstractFilter
{
    //https://www.youtube.com/watch?v=cL1eXKsnRJI&list=PLd2_Os8Cj3t8pnG4ubQemoqnTwf0VFEtU&index=33
    public const TITLE = 'title';
    public const CONTENT = 'content';
    public const CATEGORY_ID = 'category_id';


    protected function getCallbacks(): array
    {
        return [
            self::TITLE => [$this, 'title'],
            self::CONTENT => [$this, 'content'],
            self::CATEGORY_ID => [$this, 'categoryId'],
        ];
    }

    public function title(Builder $builder, $value)
    {
        $builder->where('title', 'like', "%{$value}%");
    }

    public function content(Builder $builder, $value)
    {
        $builder->where('content', 'like', "%{$value}%");
    }

    public function categoryId(Builder $builder, $value)
    {
        $builder->where('category_id', $value);
    }
}
