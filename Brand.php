<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Relationship\BrandRelationship;
use App\Models\Traits\Method\BrandMethod;
class Brand extends Model
{
    use BrandRelationship,
    	BrandMethod;

    protected $table = 'brands';

	protected $fillable = [
		'name',
		'description'


	];
}


