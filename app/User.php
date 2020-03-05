<?php

namespace App;

use App\Http\Controllers\ProductReviewController;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    public function run()
    {
      
    }

    
    protected $fillable = [
        'name', 'email', 'password',
    ];
    
  

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function review()
    {
        return $this->hasOne(ProductReview::class);
    }
    public function book()
    {
        return $this->hasOne(PackageBook::class);
    }


}
