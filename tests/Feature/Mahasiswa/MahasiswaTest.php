<?php

namespace Tests\Feature\Mahasiswa;

use App\Models\MahasiswaModel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MahasiswaTest extends TestCase
{

    use WithFaker;
    /**
     * A basic feature test example.
     */

    public function testCreateMahasiswa()
    {
        $name = $this->faker->name;

        $response = $this->postJson('mahasiswa/create', ['name' => $name]);

        $response->assertStatus(200)
            ->assertJson([
                'message' => 'success',
                'data' => [
                    'name' => $name
                ]
            ]);

        $this->assertDatabaseHas('tb_mahasiswa', ['name' => $name]);
    }

    public function test_get_data()
    {

        $response = $this->getJson('/mahasiswa');
        $data = $response->json()['data'];


        if (empty($data)) {
            echo "data not found";
        } else {
            $dataCount = count($data);
            // $this->assertEquals(10, $dataCount);
            echo "total data $dataCount";
            $response->assertStatus(200);
        }
    }
}
