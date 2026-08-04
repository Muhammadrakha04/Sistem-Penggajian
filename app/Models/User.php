<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Log;

#[Fillable([
    'name',
    'email',
    'password',
    'role',
])]

#[Hidden([
    'password',
    'remember_token',
])]

class User extends Authenticatable implements FilamentUser
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Relasi ke tabel karyawan.
     */
    public function karyawan(): HasOne
    {
        return $this->hasOne(Karyawan::class, 'user_id', 'id');
    }

    /**
     * Apakah user adalah admin.
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    /**
     * Apakah user adalah karyawan.
     */
    public function isKaryawan(): bool
    {
        return $this->role === 'karyawan';
    }

    /**
     * Hak akses ke panel Filament.
     */
    public function canAccessPanel(Panel $panel): bool
    {
        Log::info('Filament Panel Access', [
            'panel'   => $panel->getId(),
            'user_id' => $this->id,
            'email'   => $this->email,
            'role'    => $this->role,
        ]);

        return match ($panel->getId()) {
            'admin' => $this->isAdmin(),
            'karyawan' => $this->isKaryawan(),
            default => false,
        };
    }

    /**
     * Attribute casting.
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
}