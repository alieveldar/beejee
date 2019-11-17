<?php


class Model_Task extends Model
{

    public function get_data($start = "", $stop = "", $column = "", $sort = "")
    {
        return self::get_tasks($start, $stop , $column , $sort);
    }

    public function add_data($post)
    {
        $mysqli = $this->get_conection();
        $sql = "INSERT  INTO `task` (`email`, `name` ,`text`) VALUES ('" . self::no_xxs($post["email"]) . "',' " . self::no_xxs($post["name"]) . "', '" . self::no_xxs($post["text"]) . "') ";
        if (!$result = $mysqli->query($sql)) {
            echo "Query error";
            exit;
        }
        if ($result->num_rows > 0) {
            return $result;
        }
    }

    protected function get_tasks($start, $stop, $column, $sort)
    {

        $sql = "SELECT * FROM `task` ";
        if ($column && $sort !== "") {
            $order = " ORDER BY `$column` $sort";
            $sql .= $order;
        }
        if ($stop !=="") {
            $limit = " LIMIT $start,$stop";
            $sql .= $limit;
        }else {
            $sql = "SELECT * FROM `task` ORDER  BY `ID` ASC";
        }
        $mysqli = $this->get_conection();

        if (!$result = $mysqli->query($sql)) {
            echo "Query error";
            exit;
        }
        $sql= "SELECT COUNT(*) FROM `task`";
        $count = $mysqli->query($sql)->fetch_assoc();
        $count = $count["COUNT(*)"];
        return [$result,$count];
    }


}