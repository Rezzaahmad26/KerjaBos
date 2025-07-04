<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'occupation',
        'role',
        'connect',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function wallet() {
        return $this->hasOne(Wallet::class);
    }

    public function projects() {
        return $this->hasMany(Project::class, 'client_id', 'id')->orderByDesc('id');
        //user->projects () menampilkan seluruh project dari user tersebut
    }

    public function proposals() {
        return $this->hasMany(ProjectApplicant::class, 'freelancer_id', 'id')->orderByDesc('id');
        //user->proposals () menampilkan seluruh proposal dari user tersebut
    }

    public function hasAppliedToProject($projectId) {
        return ProjectApplicant::where('project_id', $projectId)
            ->where('freelancer_id', $this->id)
            ->exists(); // tipe data yang dilempar true/false
    }

    public function latestConnectTopup()
        {
            return $this->hasOne(ConnectTopup::class)->latestOfMany();
        }

    public function connectTopups()
        {
            return $this->hasMany(ConnectTopup::class);
        }



}
