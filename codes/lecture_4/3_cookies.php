<?php
setcookie('hello', 'Hello World', time() + 10);

echo $_COOKIE["test-key"];
