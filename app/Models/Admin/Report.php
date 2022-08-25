<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Patient;
use App\Models\Admin\Country;
use App\Models\Admin\Document;
use App\Models\Admin\Agency;
use App\Models\Admin\TestResult;

class Report extends Model
{
    use HasFactory;
    protected $guared=[];

    public function patient(){
    	return $this->belongsTo(Patient::class);
    }

    public function country(){
    	return $this->belongsTo(Country::class);
    }

    public function documents(){
    	return $this->hasMany(Document::class);
    }

    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }

     public function testResults()
    {
        return $this->hasMany(TestResult::class);
    }

    

}
