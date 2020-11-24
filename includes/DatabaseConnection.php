<?php
$pdo = new PDO('mysql:host=localhost;dbname=sismaed_odeon;charset=utf8;port=3306', 'sismaed_odeon', 'Sismaed_odeon_1234');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
