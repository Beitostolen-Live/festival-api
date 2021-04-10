<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyNote extends Model
{
    use SoftDeletes;
    
    protected $table = 'companynote';

    protected $fillable = [
        'noteCodeSetId',
        'noteCodeId',
        'note',
        'company_orgno',
        'companycrew_id'
    ];
    protected $hidden = [];

    public function company()
    {
    	return $this->belongsTo(Company::class, 'company_orgno', 'orgno');
    }

    public function companyCrew()
    {
        return $this->belongsTo(CompanyCrew::class, 'companycrew_id', 'id');
    }
}
?>