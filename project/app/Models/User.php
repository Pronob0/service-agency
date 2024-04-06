<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'photo',
        'phone',
        'country',
        'city',
        'email_verified',
        'verification_link',
        'address',
        'status',
        'zip',
        'password',
        'owner_id',
        'force_login'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    // domain relation
    public function domain()
    {
        return $this->belongsTo(Domain::class,'domain_id','id');
    }

    public function user_package()
    {
        return $this->hasOne(PackageOrder::class,'user_id','id')->orderBy('id','DESC')->where('status',1)->with('package_info');
    }

    public function package_orders()
    {
        return $this->hasMany(PackageOrder::class,'user_id','id')->orderBy('id','DESC')->with('package_info')->orderby('id','DESC');
    }

    public function products()
    {
        return $this->hasMany(Product::class,'user_id','id')->with('category','brand','subcategory')->orderby('id','DESC');
    }

    public function orders()
    {
        return $this->hasMany(Order::class,'user_id','id')->orderby('id','DESC');
    }

    public function users()
    {
        return $this->hasMany(User::class,'owner_id','id')->orderby('id','DESC');
    }

    public function categories()
    {
        return $this->hasMany(Category::class,'user_id','id')->orderby('id','DESC');
    }

    public function brands()
    {
        return $this->hasMany(Brand::class,'user_id','id')->orderby('id','DESC');
    }

    public function requestDomain()
    {
        return $this->hasMany(DomainRequest::class,'user_id')->orderby('id','DESC');
    }

    public function IsUserDemo(){
        if ($this->id == 22) {
            return true;
        }
        return false;
    }
    
   
}
