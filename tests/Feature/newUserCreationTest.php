<?php

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use DTApi\Repository\UserRepository;

class newUserCreation extends TestCase
{
    use RefreshDatabase;
 
    public function test_new_users_can_register()
    {
        $userRepository = new UserRepository();
        $response = $userRepository->createOrUpdate('/register', [
            'role' => 'admin',
            'company_id' => 5,
            'department_id' =>5,
            'dob_or_orgid' => '03/03/1996',
            'phone' => '+923356226783',
            'mobile' => '+923356226783',
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password'
            
        ]);
 
        $this->assertTrue($response['created']);
    }

    public function test_enabling_user()
    {
        $userRepository = new UserRepository();
        $response = $userRepository->enable(5);
        $this->assertTrue($response);
    }
}