<?php

namespace App\Models;
use App\Notifications\CustomVerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use LaravelGravatar\Gravatar as Gravatar;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name', 'email', 'telefono', 'password','token', 'id',
        'connection_id',
        'user_status', 'profile_photo_path', 'user_image'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];
    public function getGravatarAttribute()
    {
        $hash = md5(strtolower(trim($this->attributes['email'])));
        return "http://www.gravatar.com/avatar/$hash";
    }
    /**
     * Send the email verification notification.
     *
     * @return void
     */
    // public function sendEmailVerificationNotification()
    // {
    //     $this->notify(new CustomVerifyEmail);
    // }
    public function infoAdicionalCliente(){
        return $this->hasOne(InfoAdicionalCliente::class, 'id_cliente', 'id');
    }
    public function cancelaciones(){
        return $this->hasMany(Cancelacion::class, 'id_user');
    }
    public function reservas(){
        return $this->hasMany(Reserva::class); // Asegúrate de que 'Reserva' sea el nombre correcto del modelo de reservas
    }
    // Relación: Un usuario tiene muchos descuentos
    public function descuentos()
    {
        return $this->hasMany(Descuento::class, 'id_user');
    }
    public function inasistencias()
    {
        return $this->hasMany(Inasistencia::class, 'id_user');
    }
}
