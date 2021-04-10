<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StorageLocation extends Model
{
    use SoftDeletes;

    protected $table = 'storagelocation';

    protected $fillable = ['name','description','long', 'lat'];
    protected $hidden = [];

    public function inventories()
    {
        return $this->hasMany(Inventory::class, 'storagelocation_id', 'id');
    }
}
?>