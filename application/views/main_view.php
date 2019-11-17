<?php echo $save_ok; ?>
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
        echo '<tr>';
        echo '<td>' . $tr["name"] . '</td>';
        echo '<td>' . $tr["email"] . '</td>';
        echo '<td>' . $tr["text"] . '</td>';
        if ($tr["state"] && $tr["a_edited"] == 1) {
            echo '<td><span class="badge badge-success">Выполнено</span><br><span class="badge badge-danger">Отредактировано администратором</span></td>';
        } elseif ($tr["state"] == 1) {
            echo '<td><span class="badge badge-success">Выполнено</span></td>';
        } elseif ($tr["a_edited"] == 1) {
            echo '<td><span class="badge badge-danger">Отредактировано администратором</span></td>';
        }else{
            echo '<td></td>';
        }
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
            echo '<li class="page-item"><a class="page-link" href="/main/index/?page='.$i.'">'.$i.'</a></li>';
        }
        ?>
    </ul>
</nav>
<form action="/" method="post">
    <div class="form-group">
        <label for="mail">Email</label>
        <input type="email" name="email" class="form-control" id="mail" placeholder="name@example.com" required>
    </div>
    <div class="form-group">
        <label for="name">Имя</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Ваше имя" required>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Текст задачи</label>
        <textarea  name="text" class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary mb-2">Создать</button>
</form>

