<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;
    
    protected $table = 'companies';
    protected $primaryKey = 'orgno';

    protected $fillable = [
        'companyCategoryCodeSetId',
        'companyCategoryCodeId',
        'name',
        'orgformCodeSetId',
        'orgformCodeId',
        'postalAddress_id',
        'businessAddress_id'
    ];
    protected $hidden = [];

    public function postalAddress()
    {
    	return $this->belongsTo(Address::class, 'postalAddress_id', 'id');
    }

    public function businessAddress()
    {
        return $this->belongsTo(Address::class, 'businessAddress_id', 'id');
    }

    public function crew()
    {
        return $this->hasMany(CompanyCrew::class, 'orgno', 'orgno');
    }

    public function notes()
    {
        return $this->hasMany(CompanyNote::class, 'company_orgno', 'orgno');
    }
}
?>