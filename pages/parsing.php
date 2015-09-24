<p><a href="#" class="btn btn-success">Опубликовать выбранные</a>
<a href="index.php?page=parsing&act=refresh" class="btn btn-primary">Обновить данные</a>
<a href="index.php?page=parsing&act=del" class="btn btn-danger">Удалить выбранное</a></p>
<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>#</th>
      <th></th>
      <th>Изображение</th>
      <th>Заголовок</th>
      <th>Цена</th>
    </tr>
  </thead>
  <tbody>
  <form method="post">
  <?php foreach ($allContentArray as $row) { ?>
    <tr>
      <td>1</td>
      <td><input type="checkbox" value="<?php echo $row['id']; ?>" name="selectRow[]" checked></td>
      <td><img width="50" height="50" src="<?php echo $row['img']; ?>"></td>
      <td><?php echo $row['title']; ?></td>
      <td><?php echo $row['price']; ?></td>
    </tr>
  <?php } ?>
  <input type="submit">
  </form>
  </tbody>
</table> 