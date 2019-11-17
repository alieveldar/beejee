<?php


class Controller_Login extends Controller
{

    public function action_index()
    {
        if ($this->is_admin()) {
            $this->action_login();
        } else {
            if (isset($_POST["password"])) {
                $this->action_login();
            } else {
                $this->view->generate('login_view.php', 'template_view.php', $data);
            }
        }
    }

    public function action_login()
    {
        $start = "0";
        $stop = "3";
        if (!$this->is_admin()) {
            $admin = new Model_Login();
            if ($admin->get_admin($_POST["name"], $_POST["password"])) {
                $data = $this->model->get_data();
                $_SESSION["admin"] = 1;
                $this->view->generate('dashboard_view.php', 'template_view.php', $data);
            } else {
                $err = '<div class="alert alert-danger" role="alert">Пользователь не найден!</div>';
                $this->view->generate('login_view.php', 'template_view.php', "", $err);
            }
        } else {

            if (isset($_GET["page"]) && (int)$_GET["page"] > 1) {

                $start = ((int)$_GET["page"] * 3) - 3;
                $start = (string)$start;
            }
            $column = $_COOKIE["column"];
            $sort = $_COOKIE["sort"];
            $data = $this->model->get_data($start, $stop, $column, $sort);

            $this->view->generate('dashboard_view.php', 'template_view.php', $data);
        }
    }

    public function action_done()
    {
        if ($this->is_admin()) {
            if (isset($_POST["done"])) {
                $id = $_POST["id"];
                $done = $_POST["done"];
                $task = new Model_Login();
                $task->make_done($id, $done);
            } else {
                return "Ошибка БД";
            }
        } else {
            return 0;
        }
    }

    public function action_save()
    {
        if ($this->is_admin()) {
            $id = $_POST["id"];
            $text = $_POST["text"];
            $task = new Model_Login();
            $result = $task->save_text($id, $text);
            echo 1;

        } else {
            echo 0;
        }
    }


    protected
    function is_admin()
    {
        if ($_SESSION["admin"] == 1) {
            return 1;
        } else {
            return 0;
        }
    }

    public
    function action_exit()
    {
        $host = "http://" . $_SERVER["HTTP_HOST"];
        unset($_SESSION["admin"]);
        header("Status: 302");
        header('Location:' . $host);
    }
}