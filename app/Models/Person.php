<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    public function supplier()
    {
    	return $this->belongsTo(Supplier::class);
    }
}
?>