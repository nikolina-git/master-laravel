<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Pacijent extends Model
{
    use HasFactory;
    protected $fillable=['name_and_surname','description'];


    public function pacijents(){

        return $this->belongsTo(User::class);
    }

}
