<?php

/**
 * This file implements assertions for the HTTP responses.
 */

namespace dbeurive\Slim\PHPUnit;

use Slim\Http\Response;

/**
 * Trait TraitAssertResponse
 *
 * This trait implements assertions for the HTTP responses.
 *
 * @package dbeurive\Slim\PHPUnit
 */
trait TraitAssertResponse
{
    /**
     * Asserts that the value of the status code is equal to a given value.
     * @param int $inExpected Expected value.
     * @param Response $inResponse HTTP response.
     * @param string $message
     */
    public function assertResponseStatusCodeEquals($inExpected, Response $inResponse, $message = '') {
        \PHPUnit_Framework_Assert::assertEquals($inExpected, $inResponse->getStatusCode(), $message);
    }

    /**
     * Asserts that the value of the status code is between 200 (included) and 300 (excluded).
     * This value means that the request is successful.
     * @param Response $inResponse HTTP response.
     * @param string $message
     */
    public function assertResponseIsSuccessful(Response $inResponse, $message = '') {
        \PHPUnit_Framework_Assert::assertTrue($inResponse->isSuccessful(), $message);
    }

    /**
     * Asserts that the value of the status code is 301, 302, 303 or 307
     * This value means that the response is a redirect.
     * @param Response $inResponse HTTP response.
     * @param string $message
     */
    public function assertResponseIsRedirect(Response $inResponse, $message = '') {
        \PHPUnit_Framework_Assert::assertTrue($inResponse->isRedirect(), $message);
    }

    /**
     * Asserts that the value of the status code is between 300 (included) and 400 (excluded).
     * This value means that the response if a redirection.
     * @param Response $inResponse HTTP response.
     * @param string $message
     */
    public function assertResponseIsRedirection(Response $inResponse, $message = '') {
        \PHPUnit_Framework_Assert::assertTrue($inResponse->isRedirection(), $message);
    }

    /**
     * Asserts that the value of the status code is 204, 205 or 304.
     * This value means that the response is empty.
     * @param Response $inResponse HTTP response.
     * @param string $message
     */
    public function assertResponseIsEmpty(Response $inResponse, $message = '') {
        \PHPUnit_Framework_Assert::assertTrue($inResponse->isEmpty(), $message);
    }

    /**
     * Asserts that the value of the status code is 403.
     * This value means that the user is not authorised to access the requested URL.
     * @param Response $inResponse HTTP response.
     * @param string $message
     */
    public function assertResponseIsForbidden(Response $inResponse, $message = '') {
        \PHPUnit_Framework_Assert::assertTrue($inResponse->isForbidden(), $message);
    }

    /**
     * Asserts that the value of the status code is between 100 (included) and 200 (excluded).
     * This value means that the response contains a informative message.
     * @param Response $inResponse HTTP response.
     * @param string $message
     */
    public function assertResponseIsInformational(Response $inResponse, $message = '') {
        \PHPUnit_Framework_Assert::assertTrue($inResponse->isInformational(), $message);
    }

    /**
     * Asserts that the value of the status code is 404.
     * This value means that the requested URL was not found.
     * @param Response $inResponse HTTP response.
     * @param string $message
     */
    public function assertResponseIsNotFound(Response $inResponse, $message = '') {
        \PHPUnit_Framework_Assert::assertTrue($inResponse->isNotFound(), $message);
    }

    /**
     * Asserts that the value of the status code is 200.
     * This value means that the requested was OK.
     * @note Please note that "OK" is not "SUCCESSFUL".
     *       - OK: status code is 200.
     *       - SUCCESSFUL: status code is between 200 (included) and 300 (excluded).
     * @param Response $inResponse HTTP response.
     * @param string $message
     */
    public function assertResponseIsOk(Response $inResponse, $message = '') {
        \PHPUnit_Framework_Assert::assertTrue($inResponse->isOk(), $message);
    }

    /**
     * Asserts that the value of the status code is between 500 (included) and 600 (excluded).
     * This value means that the response signals a processing error.
     * @param Response $inResponse HTTP response.
     * @param string $message
     */
    public function assertResponseIsServerError(Response $inResponse, $message = '') {
        \PHPUnit_Framework_Assert::assertTrue($inResponse->isServerError(), $message);
    }

    /**
     * Asserts that the body of the response is equal to a given string.
     * @param string $inExpected The expected response's body.
     * @param Response $inResponse HTTP response.
     * @param string $message
     */
    public function assertResponseBodyEquals($inExpected, Response $inResponse, $message = '') {
        \PHPUnit_Framework_Assert::assertEquals($inExpected, $inResponse->getBody(), $message);
    }

    /**
     * Asserts that the response has a given header.
     * @param string $inHeader Name of the header.
     * @param Response $inResponse HTTP response.
     * @param string $message
     */
    public function assertResponseHasHeader($inHeader, Response $inResponse, $message = '') {
        \PHPUnit_Framework_Assert::assertTrue($inResponse->hasHeader($inHeader), $message);
    }

    /**
     * Asserts that the body of the response is equal to the content of a given file.
     * @param string $inExpected Path to the file.
     * @param Response $inResponse HTTP response.
     * @param string $message
     */
    public function assertResponseBodyEqualsFile($inExpected, Response $inResponse, $message = '') {
        \PHPUnit_Framework_Assert::assertStringEqualsFile($inExpected, $inResponse->getBody(), $message);
    }
}