<?php
declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: wilbur
 * Date: 2019/9/19
 * Time: 17:17
 */
namespace WilburOo\HyperFWhoops;

use Hyperf\Utils\Context;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Throwable;

class WhoopsMiddleware implements MiddlewareInterface
{
	/**
	 * Process an incoming server request.
	 *
	 * @param ServerRequestInterface  $request
	 * @param RequestHandlerInterface $handler
	 *
	 * @return ResponseInterface
	 * @throws Throwable
	 */
	public function process(ServerRequestInterface $request, RequestHandlerInterface $handler) : ResponseInterface
	{
		try {
			return $handler->handle($request);
		} catch (Throwable $e) {
			$whoops   = \make(WhoopsHandler::class);
			$content  = $whoops->run($e, $request);
			$response = Context::get(ResponseInterface::class);

			return $response->withHeader(HttpContentType::KEY, HttpContentType::HTML)->withContent($content);
		}
	}
}