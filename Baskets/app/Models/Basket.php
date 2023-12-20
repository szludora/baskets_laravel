<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    use HasFactory;

    protected function setKeysForSaveQuery($query)
    {
        $query
        // az a lényeg, hogyan hívják őt a táblában --> user_id
        ->where('user_id', '=', $this->getAttribute('user_id'))
        ->where('item_id', '=', $this->getAttribute('item_id'));
        return $query;
    }


}
