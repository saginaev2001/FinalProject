<!DOCTYPE html>
<html lang="ru">
<head>
  <title></title>
</head>
<body>
  <?php
    $host = 'localhost';  // Хост, у нас все локально
    $user = 'root';    // Имя созданного вами пользователя
    $pass = ''; // Установленный вами пароль пользователю
    $db_name = 'shop';   // Имя базы данных
    $link = mysqli_connect($host, $user, $pass, $db_name); // Соединяемся с базой

    // Ругаемся, если соединение установить не удалось
    if (!$link) {
      echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
      exit;
    }

    //Если переменная Name передана
    if (isset($_POST["product"])) {
      //Если это запрос на обновление, то обновляем
      if (isset($_GET['red_id'])) {
        $sql = mysqli_query($link, "UPDATE `product` SET `id` = '{$_POST['id']}', `product` = '{$_POST['product']}', `model` = '{$_POST['model']}',`price` = '{$_POST['price']}' WHERE `id`={$_GET['red_id']}");
      } else {
        //Иначе вставляем данные, подставляя их в запрос
        $sql = mysqli_query($link, "INSERT INTO `product` (`id`, `model`, `product`, `price`) VALUES  ('{$_POST['id']}', '{$_POST['product']}', '{$_POST['model']}', '{$_POST['price']}')");
      }

      //Если вставка прошла успешно
      if ($sql) {
        echo '<p>Успешно!</p>';
      } else {
        echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
      }
    }

    //Удаляем, если что
    if (isset($_GET['del'])) {
      $sql = mysqli_query($link, "DELETE FROM `product` WHERE `id` = {$_GET['del']}");
      if ($sql) {
        echo "<p>Товар удален.</p>";
      } else {
        echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
      }
    }

    //Если передана переменная red, то надо обновлять данные. Для начала достанем их из БД
    if (isset($_GET['red_id'])) {
      $sql = mysqli_query($link, "SELECT `id`, `product`, `model`, `price` FROM `product` WHERE `id`={$_GET['red_id']}");
      $product = mysqli_fetch_array($sql);
    }
  ?>
  <form action="" method="post">
    <table>
      <tr>
        <td>Id:</td>
        <td><input type="text" name="id" value="<?= isset($_GET['id']) ? $product['id'] : ''; ?>"></td>
      </tr>
      <tr>
        <td>model:</td>
        <td><input type="text" name="product" value="<?= isset($_GET['product']) ? $product['product'] : ''; ?>"></td>
      </tr>
      <tr>
        <td>product:</td>
        <td><input type="text" name="model" value="<?= isset($_GET['model']) ? $product['model'] : ''; ?>"></td>
      </tr>

      <tr>
        <td>Цена:</td>
        <td><input type="text" name="price" size="3" value="<?= isset($_GET['price']) ? $product['price'] : ''; ?>"> руб.</td>
      </tr>
      <tr>
        <td colspan="2"><input type="submit" value="OK"></td>
      </tr>
    </table>
  </form>
  <?php
  //Получаем данные
  $sql = mysqli_query($link, 'SELECT `id`, `product`, `model`, `price` FROM `product`');
  while ($result = mysqli_fetch_array($sql)) {
    echo "<p>{$result['id']}) {$result['product']} - {$result['price']} ₽ - <a href='?del={$result['id']}'>Удалить</a> - <a href='?red={$result['id']}'>Редактировать</a></p>";
  }
  ?>
  <p><a href="?add=new">Добавить новый товар</a></p>
</body>
</html>