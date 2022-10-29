<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DBConnector extends Model
{
    use HasFactory;

    public function getCourse(){
        return DB::select('select * from COURSE');
    }
}
