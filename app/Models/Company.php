<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Company extends Model
{
    protected $table = 'companies';

    protected $primaryKey = 'id';

    public function product() {
        return $this->hasMany('App\Models\Product','id');
    }

    protected $fillable = [
        'company_name',
        'street_address',
        'representative',
        'created_at',
        'updated_at'
    ];
}
