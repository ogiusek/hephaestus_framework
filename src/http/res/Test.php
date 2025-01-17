<?php namespace fusion\http;

class ResTest extends \PHPUnit\Framework\TestCase {
  function test_running_body() {
    $res = new Res(
      body: $body = new Body("output"),
    );
    ob_start();
    $res->run();
    $output = ob_get_clean();
    $this->assertEquals($output, $body->text());
  }

  function test_running_status() {
    $res = new Res(
      status: $status = Status::ACCEPTED
    );
    $res->run();
    $output_status = http_response_code();
    $this->assertEquals($output_status, $status->value);
  }

  // function test_headers() {
  //   cannot check headers in tests because headers_list() returns empty array
  // }
}