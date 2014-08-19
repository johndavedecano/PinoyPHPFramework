<?php

namespace spec\Framework\Environment;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class EnvironmentSpec extends ObjectBehavior
{
    function let($environments = array())
    {
        $this->beConstructedWith($environments);
    }
    function it_is_initializable()
    {
        $this->shouldHaveType('Framework\Environment\Environment');
    }

    function it_should_detect_environment()
    {
        $this->beConstructedWith(array('development'   =>  array('localhost','d4mdev')));

        $this->detect('d4mdev')->shouldReturnAnInstanceOf('Framework\Environment\Environment');
    }

    function it_should_get_environment()
    {
        $this->beConstructedWith(array('development'   =>  array('localhost','d4mdev')));

        $this->detect('d4mdev')->shouldReturnAnInstanceOf('Framework\Environment\Environment');

        $this->get()->shouldBeString();
    }
}
