<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Assess extends Model
{
	protected $table = 'assess';

	protected $primaryKey = 'assess_id';

	public $timestamps = true;
}