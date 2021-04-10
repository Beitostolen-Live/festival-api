<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyCrew extends Model
{
    use SoftDeletes;
    
    protected $table = 'companycrew';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'comment'
    ];
    protected $hidden = [];

    public function company()
    {
    	return $this->belongsTo(Company::class, 'orgno', 'orgno');
    }

    public function notes()
    {
        return $this->hasMany(CompanyNote::class, 'companycrew_id', 'id');
    }
}
?>