<?php
/**
 * Created by PhpStorm.
 * User: jencmart
 * Date: 10/20/18
 * Time: 8:50 PM
 */


namespace App;


use App\Model\Database;

class Router
{
    /** @var \Twig_Environment */
    protected $twig;

    protected $database;

    /**
     * Router constructor.
     * @param \Twig_Environment $twig
     * @param Database $database
     */
    public function __construct(\Twig_Environment $twig, $database)
    {
        $this->database = $database;
        $this->twig = $twig;
    }

    public function process($parameters): string
    {
        $page = $this->getParameter($parameters, 'page', 'index');

        switch ($page) {
            case 'index':
                return $this->routeIndex();

            case 'list':
                $query = $this->getParameter($parameters, 'query');
                return $this->routeList($query);

            case 'detail':
                $id = $this->getParameter($parameters, 'id');
                return $this->routeDetail($id);

            default:
                return $this->routeNotFound();
        }
    }

    protected function getParameter($array, $key, $default = null)
    {
        if (array_key_exists($key, $array))
            return $array[$key];
        return $default;
    }

    protected function routeIndex(): string
    {
        $template = $this->twig->load('index.html.twig');
        return $template->render(array());
    }

    protected function routeList($query): string
    {
        $template = $this->twig->load('list.html.twig');
        $users = $this->database->getUsers();
        return $template->render(array('users' => $users, 'query' => $query));
    }

    protected function routeDetail($id): string
    {
        $template = $this->twig->load('detail.html.twig');
        $user = $this->database->getUser($id);
        return $template->render(array('user' => $user));
    }

    protected function routeNotFound(): string
    {
        /** todo */
    }

    protected function routeInternalServerError(\Throwable $ex): string
    {
        /** todo */
    }
}
