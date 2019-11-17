<h1>Управление</h1>
<table class="table table-dark">
    <thead>
    <tr>
        <th id="name"  scope="col" onclick="changeSort('name');">Имя</th>
        <th id="email" scope="col" onclick="changeSort('email');">E-Mail</th>
        <th scope="col">Текст</th>
        <th id="state" scope="col" onclick="changeSort('state');">Статус</th>
    </tr>
    </thead>
    <tbody>
    <?php while ($tr = $data[0]->fetch_assoc()) {
        echo "<tr id=".$tr["ID"].">";
        echo '<td>' . $tr["name"] . '</td>';
        echo '<td>' . $tr["email"] . '</td>';
        echo '<td><textarea id="text'.$tr["ID"].'" class="form-control" id="exampleFormControlTextarea1" rows="3">' . $tr["text"] . '</textarea>
  </td>';
        if($tr["state"] == 1){
            $checked = "checked";
        }else{
            $checked = "";
        }
        if ($tr["state"] && $tr["a_edited"] == 1) {

            echo '<td><span class="badge badge-success">Выполнено</span><br><span class="badge badge-danger">Отредактировано администратором</span></td>';
        } elseif ($tr["state"] == 1) {

            echo '<td><span class="badge badge-success">Выполнено</span></td>';
        } elseif ($tr["a_edited"] == 1) {

            echo '<td><span class="badge badge-danger">Отредактировано администратором</span></td>';
        }else{

            echo "<td></td>";
        }
        echo '<td><div class="form-group form-check">
    <input id="chk'.$tr["ID"].'" name="done" onchange="makeDone('.$tr["ID"].')" type="checkbox" value="done"  class="form-check-input" '.$checked.' >
    <label class="form-check-label" for="done">Выполнено</label>
  </div><button type="button" onclick="save('.$tr["ID"].');" class="btn btn-warning">Сохранить</button></td>';
        echo '</tr>';
    } ?>
    </tbody>
</table>
<nav aria-label="Page navigation example">
    <ul class="pagination">
        <?php
        $pages = ceil($data[1]/3);
        $current_page = $_GET["page"];
        for ($i=1; $i <= $pages; $i++){
            echo '<li class="page-item"><a class="page-link" href="/login/index/?page='.$i.'">'.$i.'</a></li>';
        }
        ?>
    </ul>
</nav>
<script type="text/javascript" src="/js/admin.js"></script>

