<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

/**
 * Description of Userstoken
 *
 * @author vikas
 */
class Usertoken  extends Model implements AuthenticatableContract, AuthorizableContract{

    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users_token';
    protected $primaryKey = 'token_id';
    protected $fillable = [
        'token_id','user_id', 'api_token', 'social_media_type'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'user_id','token_id'
    ];

}
