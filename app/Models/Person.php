<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'person';

    protected $fillable = ['name','phone','email','comment'];
    protected $hidden = [];

    public function supplier()
    {
    	return $this->belongsTo(Supplier::class);
    }
}
?>