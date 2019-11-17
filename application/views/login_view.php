<?php echo $save_ok; ?>
<form action="login" method="post">
  <div class="form-group">
    <label for="adminname">Логин</label>
    <input name="name" type="text" class="form-control" id="adminname" aria-describedby="emailHelp" placeholder="Введите логин">
  </div>
  <div class="form-group">
    <label for="password">Пароль</label>
    <input name="password" type="password" class="form-control" id="password" placeholder="Пароль">
  </div>
  <button type="submit" class="btn btn-primary">Войти</button>
</form>