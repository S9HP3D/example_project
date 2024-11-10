<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Hellpers\RegionCode\Region;

class Guest extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone', 'country'
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        if (isset($attributes['phone']) &&!isset($attributes['country'])) {
            $this->attributes['country'] = Region::getCountryFromPhone($attributes['phone']);

        }
    }

}
