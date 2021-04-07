<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Festival extends Model
{
    protected $table = 'festival';
    protected $fillable = ['name','year','start_at','end_at'];
    protected $hidden = [];
}
?>