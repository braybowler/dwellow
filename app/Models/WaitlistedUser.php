<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaitlistedUser extends Model
{
    /** @use HasFactory<\Database\Factories\WaitlistedUserFactory> */
    use HasFactory;

    protected $guarded = [];
}
