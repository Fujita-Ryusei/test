<?php
  $pdo = new PDO('mysql:dbname=todo; host=localhost;' ,'root','');
  $pdo->query('SET NAMES utf8;');

  function alldata($TodoName, $comment, $data) 
  {
    $stmt = $pdo->prepare('INSERT INTO task (TodoName, comment) VALUES (:TodoName,:comment)');
    /*
    構造
    データベース:todo => テーブル task => TodoName , comment
    */
    $stmt->execute([
      
      ':TodoName' => $TodoName,
      ':comment' => $comment
    ]);

    $data = $stmt->fetchAll();
    var_dump($data);
    unset($pdo);
  }