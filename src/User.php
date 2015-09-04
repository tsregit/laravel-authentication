<?php namespace Speelpenning\Authentication;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Speelpenning\Contracts\Authentication\CanRegister;

class User extends Model implements AuthenticatableContract, CanRegister {

    use Authenticatable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * Registers a new user.
     *
     * @param null|string $name
     * @param string $email
     * @param string $password
     * @return User
     */
    public static function register($name = null, $email, $password)
    {
        return new static(compact('name', 'email', 'password'));
    }

}
