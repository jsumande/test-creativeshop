<?php

namespace App;

use App\Observers\UserObserver;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected static function boot()
    {
        parent::boot();

        static::observe(UserObserver::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $appends = [
        'user_image_url', 'mobile_with_code', 'formatted_mobile'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function getUserImageUrlAttribute()
    {
        if (is_null($this->image)) {
            return asset('img/default-avatar-user.png');
        }
        return asset_url('avatar/' . $this->image);
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function completedBookings()
    {
        return $this->hasMany(Booking::class, 'user_id')->where('bookings.status', 'completed');
    }

    public function employeeGroup() {
        return $this->belongsTo(EmployeeGroup::class, 'group_id');
    }

    public function getMobileWithCodeAttribute()
    {
        return substr($this->calling_code, 1).$this->mobile;
    }

    public function getFormattedMobileAttribute()
    {
        if (!$this->calling_code) {
            return $this->mobile;
        }
        return $this->calling_code.'-'.$this->mobile;
    }

    public function routeNotificationForNexmo($notification)
    {
        return $this->mobile_with_code;
    }
    
    public function scopeAllCustomers()
    {
        return $this->where('is_admin', 0)->where('is_employee', 0)->get();
    }

    public function scopeAllEmployees()
    {
        return $this->where('is_employee', 1)->get();
    }

    public function scopeSample($query,$business_id){
    
        return DB::table('business_user')
                      ->join('businesses', 'business_user.business_id' , '=' , 'businesses.id' )
                      ->join('users', 'business_user.user_id' , '=' , 'users.id' )
                      ->select('businesses.*', 'business_user.*','users.*')
                      ->where('business_user.business_id',$business_id)
                      ->get();

        // return $query->where('is_employee', $business_id)->get();

        // return $query->get();

    }
}
