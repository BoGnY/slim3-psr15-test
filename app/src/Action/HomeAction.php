<?php
namespace App\Action;

use Slim\Views\Twig;
use Psr\Log\LoggerInterface;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Container;

final class HomeAction
{
    private $view;
    private $logger;

    public function __construct(Container $c)
    {
        $this->view = $c->get("view");
        $this->logger = $c->get("logger");
    }

    public function __invoke(Request $request, Response $response, $args)
    {
        $this->logger->info("Home page action dispatched");
        
        $this->view->render($response, 'home.twig');
        return $response;
    }
}
