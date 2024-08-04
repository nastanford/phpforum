<?php

spl_autoload_register(function ($class) {
  // Convert namespace separators to directory separators
  $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

  // Set the base directory for your classes
  $baseDir = __DIR__ . DIRECTORY_SEPARATOR;

  // The full path to the file
  $file = $baseDir . $class . '.php';

  // If the file exists, require it
  if (file_exists($file)) {
    require_once $file;
  }
});
