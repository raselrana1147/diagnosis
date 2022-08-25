<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Test;

class Test extends Model
{
    use HasFactory;


    public function country(){
    	return $this->belongsTo(Country::class);
    }
}
