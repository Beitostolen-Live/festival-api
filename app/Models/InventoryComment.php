<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InventoryComment extends Model
{
    use SoftDeletes;
    
    protected $table = 'inventorycomment';

    protected $fillable = [
        'comment',
        'user_id',
        'inventory_id'
    ];
    protected $hidden = [];

    public function inventory()
    {
        return $this->belongsTo(Inventory::class, 'inventory_id', 'id');
    }
}
?>