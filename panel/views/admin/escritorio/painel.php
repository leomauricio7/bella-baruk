<?php
if (!empty($_SESSION['log_in_escritorio'])) {
  if (Dados::validaURLPageUser(Url::getURL(1))) {
    require_once  __DIR__ . '/painel/dashboard.php';
  } else {
    require_once __DIR__ . '../../404.php';
  }
} else {
  require_once __DIR__ . '../../404.php';
}
