<?php

class AlienTest extends \PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        Mockery::close();
    }

    /** @test */
    public function it_gives_you_the_ability_to_create_an_alias_for_your_class_and_its_also_injected_all_the_dependencies_of_your_class()
    {
        $this->assertEquals(File::getDriverName(), 'dropbox');
    }

    /**
     * @test
     * @expectedException   \Sun\MethodNotFoundException
     * @expectedExceptionMessage    Method [ getAllFiles ] does not exist.
     */
    public function it_throws_method_not_found_exception_if_the_method_name_you_provide_does_not_exists()
    {
        File::getAllFiles();
    }

    /**
     * @test
     * @expectedException \Sun\BindingException
     */
    public function it_throws_binding_exception_if_you_try_to_create_an_alien_for_an_interface()
    {
        FileInterface::getDriverName();
    }

    /**
     * @test
     * @expectedException Exception
     * @expectedExceptionMessage Alien does not implement registerAlien method.
     */
    public function it_throws_exception_when_alien_does_not_implement_registerAlien_method()
    {
        Session::get();
    }

    /** @test */
    public function it_checks_mock_expectation_of_the_registered_alien_class()
    {
        // arrange
        $user = new \Sun\User;

        Helper::shouldReceive('profileLinkGenerator')
                ->once()
                ->andReturn('mocked');

        // act
        $profileLink = $user->profileLink('...');

        // assert
        $this->assertEquals('mocked', $profileLink);
    }
}