<?php

namespace LaraDex;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public function roles() {
        return $this->belongsToMany('App\Role');
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

    /**
     * Route notifications for the Slack channel.
     *
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return string weebhook URI
     */
    public function routeNotificationForSlack($notification)
    {
        //return config('app.slack_webhook');
        return 'https://hooks.slack.com/services/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';
    }
}
