<?php

namespace Tests\Feature;

use App\Models\Anggota;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Crypt;
use Tests\TestCase;

class OrganizationPortalTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test guest redirected on protected routes.
     */
    public function test_guest_is_redirected_to_login(): void
    {
        $response = $this->get('/anggota/create');
        $response->assertRedirect('/login');
    }

    /**
     * Test phone number validation rule (IndonesianPhoneNumber).
     */
    public function test_phone_number_validation(): void
    {
        $user = User::create([
            'name' => 'Operator User',
            'email' => 'operator@example.com',
            'password' => bcrypt('password'),
            'role' => 'operator',
        ]);

        // Kirim data dengan no_hp tidak valid (huruf)
        $response = $this->actingAs($user)->post('/anggota', [
            'nama' => 'Budi Utomo',
            'nim' => '123456789',
            'jurusan' => 'Informatika',
            'jabatan' => 'Sekretaris',
            'no_hp' => '0812abc123', // Tidak valid
        ]);

        $response->assertSessionHasErrors(['no_hp']);
    }

    /**
     * Test phone number encryption/decryption in Anggota model (Crypt Facade).
     */
    public function test_phone_number_is_encrypted_in_database(): void
    {
        $phone = '081234567890';
        
        $anggota = Anggota::create([
            'nama' => 'Budi Utomo',
            'nim' => '123456789',
            'jurusan' => 'Informatika',
            'jabatan' => 'Sekretaris',
            'no_hp' => $phone,
        ]);

        // Ambil data langsung dari DB mentah menggunakan query builder biasa untuk melewati model accessor
        $rawDbData = \Illuminate\Support\Facades\DB::table('anggotas')->where('id', $anggota->id)->first();

        // Data di DB harus berupa ciphertext terenkripsi (tidak sama dengan nomor asli)
        $this->assertNotEquals($phone, $rawDbData->no_hp);

        // Model accessor harus mengembalikan data yang sudah didekripsi (nomor asli)
        $this->assertEquals($phone, $anggota->no_hp);
    }

    /**
     * Test Policy constraints: Admin can delete, Operator cannot delete.
     */
    public function test_policy_authorization(): void
    {
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        $operator = User::create([
            'name' => 'Operator User',
            'email' => 'operator@example.com',
            'password' => bcrypt('password'),
            'role' => 'operator',
        ]);

        $anggota = Anggota::create([
            'nama' => 'Ahmad',
            'nim' => '987654321',
            'jurusan' => 'Sistem Informasi',
            'jabatan' => 'Anggota',
            'no_hp' => '085299887766',
        ]);

        // Operator mencoba menghapus -> 403 Forbidden
        $response1 = $this->actingAs($operator)->delete('/anggota/' . $anggota->id);
        $response1->assertStatus(403);

        // Admin mencoba menghapus -> 302 Redirect (Berhasil)
        $response2 = $this->actingAs($admin)->delete('/anggota/' . $anggota->id);
        $response2->assertStatus(302);
        
        $this->assertDatabaseMissing('anggotas', ['id' => $anggota->id]);
    }

    /**
     * Test Custom API Guard with Token header authentication.
     */
    public function test_custom_api_guard(): void
    {
        $user = User::create([
            'name' => 'User Token',
            'email' => 'token@example.com',
            'password' => bcrypt('password'),
            'role' => 'operator',
            'api_token' => 'my-secret-token',
        ]);

        // Tanpa token -> 401 Unauthorized
        $response1 = $this->getJson('/api/users/current');
        $response1->assertStatus(401);

        // Menggunakan token valid -> 200 OK
        $response2 = $this->withHeaders([
            'HTTP_API_KEY' => 'my-secret-token'
        ])->getJson('/api/users/current');
        
        $response2->assertStatus(200)
                  ->assertJsonFragment(['email' => 'token@example.com']);
    }
}
