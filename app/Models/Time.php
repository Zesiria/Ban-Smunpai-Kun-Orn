<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Time extends Model
{
    use HasFactory;

    protected $table = "TIME";

    public function fetchTable(){
        $connector = new DBConnector();
        for($i = 1 ;$i < 5;$i++ ){
            $day = Carbon::today()->addDays($i);
            for ($j = 8;$j < 16;$j++){
                if($j == 12){
                    continue;
                }
                $day->setTime($j,0,0,0);
                if($connector->findTime((string)$day) == [])
                    $connector->addTime((string)$day);
            }
        }
    }
}
