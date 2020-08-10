<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deductionitem extends Model
{

    protected $fillable =  ['name','deductionmode_id','defaultamount','f1',
        'f2',
        'f3',
        'f4',
        'f5',
        'f6',
        'f7',
        'f8',
        'f9',
        'f10',
        'f11',
        'f12',
        'f13',
        'f14',
        'f15',
        'f16',
        'f17',
        'f18',
        'f19',
        'f20',
        'f21',
        'f22',
        'f23',
        'f24',
    ];

    public function deductionmode(){

        return $this->belongsTo('App\Deductionmode');

    }
}
