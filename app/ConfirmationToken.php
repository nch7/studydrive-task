<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConfirmationToken extends Model {

    protected $fillable = ['user_id', 'token'];
    public $timestamps = false;

    public function user () {
        return $this->belongsTo('App\User');
    }
}
