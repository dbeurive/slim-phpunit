<?php

/**
 * This file implements a list of PHPUnit assertions for the Slim framework.
 * Please note that the assertions are implemented within traits.
 */

namespace dbeurive\Slim\PHPUnit;

/**
 * Class Unit
 *
 * This class implements a list of PHPUnit assertions for the Slim framework.
 *
 * @package dbeurive\Slim\PHPUnit
 */
class TestCase extends \PHPUnit_Framework_TestCase
{
    // Assertions for testing responses.
    use TraitAssertResponse;
}