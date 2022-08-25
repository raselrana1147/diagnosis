<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use\App\Models\Admin\Package;
use App\Models\Admin\Test;

class Country extends Model
{
    use HasFactory;

    protected $guared=[];


    public function package()
    {
    	return $this->belongsTo(Package::class);
    }

    public function tests()
    {
    	return $this->hasMany(Test::class);
    }
}
