<?php


namespace Tests\Unit;

use App\Models\Contractor;
use Tests\TestCase;


class CreateContractorTest extends TestCase
{
    protected $etalon_name = 'Name Name';

    public function test_create_contractor()
    {
        $article = Contractor::factory()->make([
            'name' => $this->etalon_name
        ]);

        $this->assertEquals($this->etalon_name, $article->name);
    }

}
