<h4>Выбор категорий</h4>
<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>#</th>
      <th></th>
      <th>Название</th>
      <th>URL</th>
    </tr>
  </thead>
  <tbody>
<form method="post" action="index.php?page=parsing">
  <?php $i = 0; foreach ($allCatArray as $row) { $i++;?>
    <tr>
      <td><?php echo $i; ?></td>
        <td><input type="checkbox" value="<?php echo $row['url']; ?>" name="inputCat[]"></td>
      <td><?php echo $row['title']; ?></td>
      <td><?php echo $row['url']; ?></td>
    </tr>
  <?php } ?>
  <input type="submit">
</form>
  </tbody>
</table> 