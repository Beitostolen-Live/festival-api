<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'supplier';

    protected $fillable = ['name','address','postalcode','postal','comment'];
    protected $hidden = [];

    public function persons()
    {
    	return $this->hasMany(Person::class);
    }
}
?>