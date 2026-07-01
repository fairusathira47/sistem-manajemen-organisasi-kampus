<?php

namespace App\Services;

use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Contracts\Auth\Authenticatable;
use App\Models\User;

class SimpleUserProvider implements UserProvider
{
    /**
     * Ambil user berdasarkan ID.
     */
    public function retrieveById($identifier)
    {
        return User::find($identifier);
    }

    /**
     * Ambil user berdasarkan token (remember token).
     */
    public function retrieveByToken($identifier, $token)
    {
        return null;
    }

    /**
     * Update remember token di database.
     */
    public function updateRememberToken(Authenticatable $user, $token)
    {
        // Not used
    }

    /**
     * Ambil user berdasarkan kredensial (di sini kita menggunakan API-Key / token).
     */
    public function retrieveByCredentials(array $credentials)
    {
        $token = $credentials['token'] ?? null;
        if (!$token) {
            return null;
        }

        // Mencari user berdasarkan api_token di database
        return User::where('api_token', $token)->first();
    }

    /**
     * Validasi kredensial user.
     */
    public function validateCredentials(Authenticatable $user, array $credentials)
    {
        return true;
    }

    /**
     * Rehash password jika diperlukan (diperlukan oleh Laravel 11 UserProvider contract).
     */
    public function rehashPasswordIfRequired(Authenticatable $user, array $credentials, bool $force = false)
    {
        // Tidak digunakan untuk API key token auth
    }
}
