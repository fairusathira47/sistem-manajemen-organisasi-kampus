<?php

namespace App\Policies;

use App\Models\Kegiatan;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class KegiatanPolicy
{
    /**
     * Hook before yang dieksekusi sebelum method lainnya.
     * Pengguna dengan role 'superadmin' otomatis memiliki semua akses.
     */
    public function before(User $user, string $ability)
    {
        if ($user->role === 'superadmin') {
            return true;
        }
    }

    /**
     * Determine whether the user can view any models.
     * Menggunakan '?User' agar Guest tetap bisa melihat daftar kegiatan.
     */
    public function viewAny(?User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Kegiatan $kegiatan): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Kegiatan $kegiatan): bool
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     * Hanya admin yang diperbolehkan menghapus data.
     */
    public function delete(User $user, Kegiatan $kegiatan): bool
    {
        return $user->role === 'admin';
    }
}
