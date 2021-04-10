<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'addresses';

    protected $fillable = [
        'countryCodeSetId',
        'countryCodeId',
        'postalCodeSetId',
        'postalCodeId',
        'address1',
        'address2',
        'muncipalityCodeSetId',
        'muncipalityCodeId'
    ];
    protected $hidden = [];

    public function companiesPostal()
    {
        return $this->hasMany(Company::class, 'postalAddress_id', 'id');
    }

    public function companiesBussiness()
    {
        return $this->hasMany(Company::class, 'businessAddress_id', 'id');
    }
}
?>