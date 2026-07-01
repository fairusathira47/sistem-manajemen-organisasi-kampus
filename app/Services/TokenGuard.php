<?php

namespace App\Services;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Auth\GuardHelpers;
use Illuminate\Http\Request;

class TokenGuard implements Guard
{
    use GuardHelpers;

    private Request $request;

    public function __construct(UserProvider $provider, Request $request)
    {
        $this->provider = $provider;
        $this->request = $request;
    }

    /**
     * Dapatkan user terautentikasi saat ini.
     */
    public function user()
    {
        if ($this->user !== null) {
            return $this->user;
        }

        // Ambil token dari header API-Key
        $token = $this->request->header('API-Key');
        if ($token) {
            $this->user = $this->provider->retrieveByCredentials(['token' => $token]);
        }

        return $this->user;
    }

    /**
     * Validasi kredensial user.
     */
    public function validate(array $credentials = [])
    {
        $token = $credentials['token'] ?? null;
        if (!$token) {
            return false;
        }

        $user = $this->provider->retrieveByCredentials(['token' => $token]);
        return $user !== null;
    }

    /**
     * Set request baru.
     */
    public function setRequest(Request $request): void
    {
        $this->request = $request;
    }
}
