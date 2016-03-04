<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PresentationTest extends TestCase
{
   
    use DatabaseTransactions;

    public function testHomeLogin(){
        $user = factory(App\User::class)->create();
        $this->actingAs($user)->
             visit(route('home'))->
             see('Presentations');
    }

    public function testPresentationPage(){
        $user = factory(App\User::class)->create();
        $this->actingAs($user)->
            visit(route('home'))->
            click('Presentation')->
            see('Create Presentation');
    }

    public function testCreatePresentationStudent(){
        $user = factory(App\User::class)->create();
        $presentation = factory(App\Presentation::class, 'student_presentation')->
            make();

        $response = $this->actingAs($user)->
            visit(route('presentation.create'))->
            type($presentation['professor_name'], 'professor_name')->
            type($user['name'], 'student_name')->
            select($presentation['course_id'], 'course_id')->
            type($presentation['title'], 'title')->
            select($presentation['type'], 'type')->
            press('Save');
        $this->seeInDatabase('presentations', ['title' => $presentation['title']]);;
    }
}
