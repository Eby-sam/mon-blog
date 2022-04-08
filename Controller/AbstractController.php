<?php

namespace App\Controller;

use App\Model\Entity\Role;
use App\Model\Manager\RoleManager;use User;

abstract class AbstractController
{
    /**
     * @return mixed
     */
    abstract public function index();

    /**
     * @param string $template
     * @param array $data
     * @return void
     */
    public function render(string $template, array $data = [])
    {
        ob_start();
        require __DIR__ . '/../View/' . $template . '.html.php';
        $html = ob_get_clean();
        require __DIR__ . '/../View/base.html.php';
        exit;
    }

    /**
     * check if the form is submitted
     * @return bool
     */
    public function verifyFormSubmit(): bool
    {
        return isset($_POST['save']);
    }

    /**
     * checks if the user is logged in
     * @return bool
     */
    public static function verifyUserConnect(): bool
    {
        return isset($_SESSION['user']) && null !== ($_SESSION['user'])->getId();
    }

    /**
     * @return void
     */
    public function redirectIfConnected(): void
    {
        if(self::verifyUserConnect()) {
            $this->render('home/index');
        }
    }


    /**
     * @param string $field
     * @param $default
     * @return mixed|string
     */
    public function getFormField(string $field, $default = null)
    {
        if (!isset($_POST[$field])) {
            return (null === $default) ? '' : $default;
        }

        return $_POST[$field];
    }

    /**
     * @return void
     */
    public  function redirectIfNotConnected(): void
    {
        if(!self::verifyUserConnect()) {
            $this->render('home/index');
        }
    }

    /**
     * check role
     * @return bool
     */
    public static function verifyRole(): bool
    {
        if (isset($_SESSION['user'])) {
            $user = $_SESSION['user'];

            foreach ($user->getRole() as $role) {


                $currentRole = $role->getRoleName();
                if ($currentRole === 'ADMIN') {
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * sanitize data
     * @param $data
     * @return string
     */
    public function dataClean($data):string
    {
        $data = trim(strip_tags($data));
        $data = stripslashes($data);
        return htmlspecialchars($data);
    }
}