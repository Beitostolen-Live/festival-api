<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InventoryCount extends Model
{
    use SoftDeletes;

    protected $table = 'inventorycounting';

    protected $fillable = [
        'inventory_id',
        'counted_at',
        'count',
        'user_id'
    ];
    protected $hidden = [];

    public function inventory()
    {
        return $this->belongsTo(Inventory::class, 'inventory_id', 'id');
    }
}
?>