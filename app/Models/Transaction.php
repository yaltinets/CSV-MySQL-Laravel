<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';
    protected $fillable = [
        'code', 'name', 'lvl1', 'lvl2', 'lvl3', 'price', 'price_sp', 'total', 'field_property',
        'joint_purchase', 'unit', 'picture', 'main_view', 'description'
    ];

    public function insertData($data)
    {
        if (!Transaction::where('code', $data['code'])->exists()) {
            Transaction::create($data);
        }
    }

    public function getData()
    {
        return Transaction::get();
    }
}
