<?php

namespace Rfussien\DbDictionary;

use Exception;
use Illuminate\Database\Eloquent\Model;

class Column extends Model
{
    protected $table = 'information_schema.columns';

    /**
     * @param $query
     * @return mixed
     * @throws Exception
     */
    public function scopeOfTheDefaultDatabase($query)
    {
        $dbConfig = 'database.connections.' . config('database.default');

        if (config($dbConfig . '.driver') != 'mysql') {
            throw new Exception('unsupported driver');
        }

        return $query->whereTableSchema(config($dbConfig . '.database'));
    }
}
