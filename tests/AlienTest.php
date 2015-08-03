<?php

namespace Sun;

class AlienTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_gives_you_the_ability_to_create_an_alias_for_your_class_and_its_also_injected_all_the_dependencies_of_your_class()
    {
        $this->assertEquals(FilesystemAlien::getDriverName(), 'dropbox');
    }

    /**
     * @test
     * @expectedException   \Sun\MethodNotFoundException
     * @expectedExceptionMessage    Method [ getAllFiles ] does not exist.
     */
    public function it_throws_method_not_found_exception_if_the_method_name_you_provide_does_not_exists()
    {
        FilesystemAlien::getAllFiles();
    }

    /**
     * @test
     * @expectedException \Sun\BindingException
     */
    public function it_throws_binding_exception_if_you_try_to_create_an_alien_for_an_interface()
    {
        FilesystemInterfaceAlien::getDriverName();
    }

    /**
     * @test
     * @expectedException Exception
     * @expectedExceptionMessage Alien does not implement registerAlien method.
     */
    public function it_throws_exception_when_alien_does_not_implement_registerAlien_method()
    {
        SessionAlien::get();
    }
}