<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Test;

class TestResult extends Model
{
    use HasFactory;

    public function test()
    {
    	return $this->belongsTo(Test::class);
    }
}
