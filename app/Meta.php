<?php

namespace App;

use Illuminate\Support\Facades\DB;

class Meta
{
    public function __construct(private $type, private $key)
    {
    }

    public function get()
    {
        return DB::table('meta')
            ->where(['type' => $this->type, 'key' => $this->key])
            ->pluck('value')
            ->transform(function ($value) {
                if (str($value)->isJson()) {
                    return json_decode($value, true);
                }

                return $value;
            });
    }

    public function first()
    {
        return $this->get()->first();
    }

    public function insert($value)
    {
        if (is_array($value)) {
            $value = json_encode($value);
        }

        return DB::table('meta')->insert([
            'type' => $this->type,
            'key' => $this->key,
            'value' => $value,
        ]);
    }

    public function save($value)
    {
        if (is_array($value)) {
            $value = json_encode($value);
        }

        return DB::table('meta')->updateOrInsert(
            ['type' => $this->type, 'key' => $this->key],
            ['value' => $value],
        );
    }

    public function delete($value = '')
    {
        $query = DB::table('meta')->where(['type' => $this->type, 'key' => $this->key]);

        if ($value !== '') {
            $query->where('value', $value);
        }

        return $query->delete();
    }
}
