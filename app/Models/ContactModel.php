<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactModel extends Model
{
    use HasFactory;

    protected $table = "contact";

    // $fillable -> polja koja se mogu modifikovati i koristiti
    protected $fillable = [
        "email", "subject", "message"
    ];
}
