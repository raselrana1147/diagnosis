<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Report;

class Document extends Model
{
    use HasFactory;

    public  function report(){
    	return $this->belongsTo(Report::class);
    }
}
