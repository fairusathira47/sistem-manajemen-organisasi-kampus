<?php

namespace App\Policies;

use App\Models\Anggota;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AnggotaPolicy
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
     * Menggunakan '?User' agar Guest (tamu belum login) tetap bisa melihat daftar.
     */
    public function viewAny(?User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Anggota $anggota): bool
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
    public function update(User $user, Anggota $anggota): bool
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     * Hanya admin yang diperbolehkan menghapus data.
     */
    public function delete(User $user, Anggota $anggota): bool
    {
        return $user->role === 'admin';
    }
}
