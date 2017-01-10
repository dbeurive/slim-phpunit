<?php

use dbeurive\Slim\PHPUnit\TestCase as TestCase;
use Slim\Http\Response;

class TraitAssertResponseTest extends TestCase
{
    public function testAssertResponseStatusCodeEquals() {
        $response = new Response();
        $response = $response->withStatus(200);
        $this->assertResponseStatusCodeEquals(200, $response);
    }

    public function testAssertResponseStatusCodeEqualsKo() {
        $response = new Response();
        $response = $response->withStatus(200);

        try {
            $this->assertResponseStatusCodeEquals(201, $response);
        } catch (\Exception $e) {
            return;
        }
        $this->fail("The test should have failed!");
    }

    public function testAssertResponseIsSuccessful() {
        for ($status = 200; $status < 300; $status++) {
            $response = new Response();
            $response = $response->withStatus($status, 'The operation is successful');
            $this->assertResponseIsSuccessful($response);
        }
    }

    public function testAssertResponseIsSuccessfulKo() {
        for ($status = 100; $status < 200; $status++) {
            $response = new Response();
            $response = $response->withStatus($status, 'The operation is successful');

            try {
                $this->assertResponseIsSuccessful($response);
            } catch (\Exception $e) {
                continue;
            }
            $this->fail("The test should have failed!");
        }
    }

    public function testAssertResponseIsRedirect() {
        foreach ([301, 302, 303, 307] as $_status) {
            $response = new Response();
            $response = $response->withStatus($_status);
            $this->assertResponseIsRedirect($response);
        }
    }

    public function testAssertResponseIsRedirectKo() {
        foreach ([201, 202, 203, 207] as $_status) {
            $response = new Response();
            $response = $response->withStatus($_status);

            try {
                $this->assertResponseIsRedirect($response);
            } catch (\Exception $e) {
                continue;
            }
            $this->fail("The test should have failed!");
        }
    }

    public function testAssertResponseIsRedirection() {
        for ($status = 300; $status < 400; $status++) {
            $response = new Response();
            $response = $response->withStatus($status, 'This is a redirection');
            $this->assertResponseIsRedirection($response);
        }
    }

    public function testAssertResponseIsRedirectionKo() {
        for ($status = 200; $status < 300; $status++) {
            $response = new Response();
            $response = $response->withStatus($status, 'This is a redirection');

            try {
                $this->assertResponseIsRedirection($response);
            } catch (\Exception $e) {
                continue;
            }
            $this->fail("The test should have failed!");
        }
    }

    public function testAssertResponseIsEmpty() {
        foreach ([204, 205, 304] as $_status) {
            $response = new Response();
            $response = $response->withStatus($_status);
            $this->assertResponseIsEmpty($response);
        }
    }

    public function testAssertResponseIsEmptyKo() {
        foreach ([404, 405, 406] as $_status) {
            $response = new Response();
            $response = $response->withStatus($_status);
            try {
                $this->assertResponseIsEmpty($response);
            } catch (\Exception $e) {
                continue;
            }
            $this->fail("The test should have failed!");
        }
    }

    public function testAssertResponseIsForbidden() {
        $response = new Response();
        $response = $response->withStatus(403);
        $this->assertResponseIsForbidden($response);
    }

    public function testAssertResponseIsForbiddenKo() {
        $response = new Response();
        $response = $response->withStatus(404);
        try {
            $this->assertResponseIsForbidden($response);
        } catch (\Exception $e) {
            return;
        }
        $this->fail("The test should have failed!");
    }

    public function testAssertResponseIsInformational() {
        for ($status = 100; $status < 200; $status++) {
            $response = new Response();
            $response = $response->withStatus($status, 'The is an information');
            $this->assertResponseIsInformational($response);
        }
    }

    public function testAssertResponseIsInformationalKo() {
        for ($status = 300; $status < 400; $status++) {
            $response = new Response();
            $response = $response->withStatus($status, 'The is an information');
            try {
                $this->assertResponseIsInformational($response);
            } catch (\Exception $e) {
                continue;
            }
            $this->fail("The test should have failed!");
        }
    }

    public function testAssertResponseIsNotFound() {
        $response = new Response();
        $response = $response->withStatus(404);
        $this->assertResponseIsNotFound($response);
    }

    public function testAssertResponseIsNotFoundKo() {
        $response = new Response();
        $response = $response->withStatus(405);
        try {
            $this->assertResponseIsNotFound($response);
        } catch (\Exception $e) {
            return;
        }
        $this->fail("The test should have failed!");
    }

    public function testAssertResponseIsOk() {
        $response = new Response();
        $response = $response->withStatus(200);
        $this->assertResponseIsOK($response);
    }

    public function testAssertResponseIsOkKo() {
        $response = new Response();
        $response = $response->withStatus(201);
        try {
            $this->assertResponseIsOK($response);
        } catch (\Exception $e) {
            return;
        }
        $this->fail("The test should have failed!");
    }

    public function testAssertResponseIsServerError() {
        for ($status = 500; $status < 600; $status++) {
            $response = new Response();
            $response = $response->withStatus($status, 'The is an information');
            $this->assertResponseIsServerError($response);
        }
    }

    public function testAssertResponseIsServerErrorKo() {
        for ($status = 100; $status < 200; $status++) {
            $response = new Response();
            $response = $response->withStatus($status, 'The is an information');
            try {
                $this->assertResponseIsServerError($response);
            } catch (\Exception $e) {
                continue;
            }
            $this->fail("The test should have failed!");
        }
    }

    public function testAssertResponseBodyEquals() {
        $response = new Response();
        $fp = fopen("php://temp", 'r+');
        fwrite($fp, 'azerty');
        rewind($fp);
        $body = new \Slim\Http\Body($fp);
        $response = $response->withBody($body);
        $this->assertResponseBodyEquals('azerty', $response);
    }

    public function testAssertResponseBodyEqualsKo() {
        $response = new Response();
        $fp = fopen("php://temp", 'r+');
        fwrite($fp, 'azerty');
        rewind($fp);
        $body = new \Slim\Http\Body($fp);
        $response = $response->withBody($body);
        try {
            $this->assertResponseBodyEquals('qsdfgh', $response);
        } catch (\Exception $e) {
            return;
        }
        $this->fail("The test should have failed!");
    }

    public function testAssertResponseHasHeader() {
        $response = new Response();
        $response = $response->withHeader('my-header', 123);
        $this->assertResponseHasHeader('my-header', $response);
    }

    public function testAssertResponseHasHeaderKo() {
        $response = new Response();
        $response = $response->withHeader('my-header', 123);
        try {
            $this->assertResponseHasHeader('my-unknown-header', $response);
        } catch (\Exception $e) {
            return;
        }
        $this->fail("The test should have failed!");
    }

    public function testAssertResponseBodyEqualsFile() {
        $tempFile = tempnam(sys_get_temp_dir(), __CLASS__ . '::');
        if (false === file_put_contents($tempFile, 'azerty')) {
            throw new \Exception("Can not create file $tempFile");
        }

        $response = new Response();
        $fp = fopen("php://temp", 'r+');
        fwrite($fp, 'azerty');
        rewind($fp);
        $body = new \Slim\Http\Body($fp);
        $response = $response->withBody($body);
        $this->assertResponseBodyEqualsFile($tempFile, $response);
    }

    public function testAssertResponseBodyEqualsFileKo() {
        $tempFile = tempnam(sys_get_temp_dir(), __CLASS__ . '::');
        if (false === file_put_contents($tempFile, 'azerty')) {
            throw new \Exception("Can not create file $tempFile");
        }

        $response = new Response();
        $fp = fopen("php://temp", 'r+');
        fwrite($fp, 'qsdfgh');
        rewind($fp);
        $body = new \Slim\Http\Body($fp);
        $response = $response->withBody($body);
        try {
            $this->assertResponseBodyEqualsFile($tempFile, $response);
        } catch (\Exception $e) {
            return;
        }
        $this->fail("The test should have failed!");
    }
}