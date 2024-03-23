<?php

namespace App\Support\Macros;

use Illuminate\Support\Collection;

class CollectionMacros
{
    public static function bootstrap()
    {
        self::index();
        self::meta();
    }

    private static function index()
    {
        Collection::macro('index', fn ($index) => $this->slice($index, 1)->first());
    }

    private static function meta()
    {
        Collection::macro('pushWithMeta', function ($item, $meta) {
            $meta->insert($item);

            return $this->push($item);
        });

        Collection::macro('forgetWithMeta', function ($id, $meta) {
            $meta->delete(id: $id);

            return $this->forget($id);
        });

        Collection::macro('updateWithMeta', function ($item, $id, $meta) {
            $meta->save($item, id: $id);
            $this[$id] = $item;

            return $this;
        });
    }
}
