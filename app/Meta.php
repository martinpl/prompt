<?php

namespace App;

use Illuminate\Support\Facades\DB;

class Meta
{
    public function __construct(private $type, private $key)
    {
    }

    public function get($id = '')
    {
        $column = [
            'type' => $this->type,
            'key' => $this->key,
        ];

        if ($id !== '') {
            $column['id'] = $id;
        }

        $collection = DB::table('meta')
            ->where($column)
            ->get()
            ->mapWithKeys(fn ($meta) => [$meta->id => str($meta->value)->isJson() ? json_decode($meta->value, true) : $meta->value]);

        if ($id !== '') {
            return $collection->first();
        }

        return $collection;
    }

    public function first()
    {
        return $this->get()->first();
    }

    public function insert($value)
    {
        return DB::table('meta')->insert([
            'type' => $this->type,
            'key' => $this->key,
            'value' => is_array($value) ? json_encode($value) : $value,
        ]);
    }

    public function save($value, $previousValue = '', $id = '')
    {
        $attributes = [
            'type' => $this->type,
            'key' => $this->key,
        ];

        if ($previousValue !== '') {
            $attributes['value'] = is_array($previousValue) ? json_encode($previousValue) : $previousValue;
        }

        if ($id !== '') {
            $attributes['id'] = $id;
        }

        return DB::table('meta')->updateOrInsert(
            $attributes,
            ['value' => is_array($value) ? json_encode($value) : $value]
        );
    }

    public function delete($value = '', $id = '')
    {
        $query = DB::table('meta')
            ->where([
                'type' => $this->type,
                'key' => $this->key,
            ]);

        if ($value !== '') {
            $query->where('value', $value);
        }

        if ($id !== '') {
            $query->where('id', $id);
        }

        return $query->delete();
    }
}
