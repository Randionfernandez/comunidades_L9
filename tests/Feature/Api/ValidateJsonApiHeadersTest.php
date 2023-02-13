<?php

namespace Tests\Feature\Api;

use App\Http\Middleware\ValidateJsonApiHeaders;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class ValidateJsonApiHeadersTest extends TestCase
{

    protected function setup(): void
    {
        parent::setup();

        Route::any('test_route', fn() => 'OK')
            ->middleware(ValidateJsonApiHeaders::class);
    }

    /**
     * @test
     */
    public function accept_header_must_be_present_in_all_requests()
    {

        $this->get('test_route')->assertStatus(406);

        $this->get('test_route', [
            'Accept' => 'application/vnd.api+json'
        ])->assertSuccessful();
    }

    /**
     * @test
     */
    public function content_type_header_must_be_present_on_all_post_request()
    {

        $this->post('test_route')->assertStatus(406);

        $this->post('test_route', [], [
            'Accept' => 'application/vnd.api+json',
        ])->assertStatus(415);

        $this->post('test_route', [], [
            'Accept' => 'application/vnd.api+json',
            'Content-Type' => 'application/vnd.api+json'
        ])->assertSuccessful();


    }

    /**
     * @test
     */
    public function content_type_header_must_be_present_on_all_patch_request()
    {

        $this->patch('test_route')->assertStatus(406);

        $this->patch('test_route', [], [
            'Accept' => 'application/vnd.api+json',
        ])->assertStatus(415);

        $this->patch('test_route', [], [
            'Accept' => 'application/vnd.api+json',
            'Content-Type' => 'application/vnd.api+json'
        ])->assertSuccessful();
    }

    /**
     * @test
     */
    public function content_type_header_must_be_present_in_responses()
    {

        $this->get('test_route', [
            'Accept' => 'application/vnd.api+json'
        ])->assertHeader('content-type', 'application/vnd.api+json');

        $this->post('test_route', [], [
            'Accept' => 'application/vnd.api+json',
            'Content-Type' => 'application/vnd.api+json'
        ])->assertHeader('content-type', 'application/vnd.api+json');

        $this->patch('test_route', [], [
            'Accept' => 'application/vnd.api+json',
            'Content-Type' => 'application/vnd.api+json'
        ])->assertHeader('content-type', 'application/vnd.api+json');

        $this->delete('test_route', [], [
            'Accept' => 'application/vnd.api+json',
        ])->assertHeader('content-type', 'application/vnd.api+json');
    }

    /**
     * @test
     */
    public function content_type_header_must_not_be_present_in_empty_responses()
    {
        Route::any('empty_response', fn() => response()->noContent())
            ->middleware(ValidateJsonApiHeaders::class);

        $this->get('empty_response', [
            'Accept' => 'application/vnd.api+json'
        ])->assertHeaderMissing('content-type');

        $this->post('empty_response', [], [
            'Accept' => 'application/vnd.api+json',
            'Content-type' => 'application/vnd.api+json'
        ])->assertHeaderMissing('content-type');

        $this->patch('empty_response', [], [
            'Accept' => 'application/vnd.api+json',
            'Content-Type' => 'application/vnd.api+json'
        ])->assertHeaderMissing('content-type');

        $this->delete('empty_response', [], [
            'Accept' => 'application/vnd.api+json',
            'Content-Type' => 'application/vnd.api+json'
        ])->assertHeaderMissing('content-type');
    }

}
