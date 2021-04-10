<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inventory extends Model
{
    use SoftDeletes;
    
    protected $table = 'inventory';

    protected $fillable = [
        'inventoryCategoryCodeSetId',
        'inventoryCategoryCodeId',
        'name',
        'storagelocation_id',
        'description'
    ];
    protected $hidden = [];

    public function storagelocation()
    {
        return $this->belongsTo(StorageLocation::class, 'storagelocation_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(InventoryComment::class, 'inventory_id', 'id');
    }

    public function counts()
    {
        return $this->hasMany(InventoryCount::class, 'inventory_id', 'id');
    }
}
?>