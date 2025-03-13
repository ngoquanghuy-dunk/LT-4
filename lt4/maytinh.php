<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $display = $_POST['display'] ?? '0';
    $input = $_POST['input'] ?? '';
    $action = $_POST['action'] ?? '';

    if ($action === 'clear') {
        $display = '0';
    } elseif ($action === 'delete') {
        $display = substr($display, 0, -1) ?: '0';
    } elseif ($action === 'calculate') {
        try {
            $display = eval("return $display;");
        } catch (Exception $e) {
            $display = 'Error';
        }
    } else {
        $display = $display === '0' ? $input : $display . $input;
    }
} else {
    $display = '0';
}
?>
<!DOCTYPE html>
<html lang="vi">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Máy Tính Cá Nhân</title>
    <link rel="stylesheet" href="./style.css" />
  </head>
  <body>
    <div class="calculator">
      <form method="POST">
        <div class="display" id="display"><?php echo htmlspecialchars($display); ?></div>
        <input type="hidden" name="display" value="<?php echo htmlspecialchars($display); ?>" />
        <div class="buttons">
          <button type="submit" name="action" value="clear">C</button>
          <button type="submit" name="action" value="delete">DEL</button>
          <button type="submit" name="input" value=".">.</button>
          <button type="submit" name="input" value="/">÷</button>
          <button type="submit" name="input" value="7">7</button>
          <button type="submit" name="input" value="8">8</button>
          <button type="submit" name="input" value="9">9</button>
          <button type="submit" name="input" value="*">×</button>
          <button type="submit" name="input" value="4">4</button>
          <button type="submit" name="input" value="5">5</button>
          <button type="submit" name="input" value="6">6</button>
          <button type="submit" name="input" value="-">−</button>
          <button type="submit" name="input" value="1">1</button>
          <button type="submit" name="input" value="2">2</button>
          <button type="submit" name="input" value="3">3</button>
          <button type="submit" name="input" value="+">+</button>
          <button type="submit" name="input" value="0">0</button>
          <button type="submit" name="action" value="calculate" class="equal">=</button>
        </div>
      </form>
    </div>
  </body>
</html>
