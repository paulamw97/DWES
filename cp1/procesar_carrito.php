<?php

  if(isset($_POST['ordenador']) && !is_null($_POST['ordenador'])){
    setcookie("ordenador",$_POST['numero1'],time()+86400);
    if($_COOKIE['teclado']==null){
      setcookie("teclado",0,time()+86400);
    }
    if($_COOKIE['raton']==null){
      setcookie("raton",0,time()+86400);
    }
    if($_COOKIE['pantalla']==null){
      setcookie("pantalla",0,time()+86400);
    }
  }

  else if(isset($_POST['teclado']) && !is_null($_POST['teclado'])){
    setcookie("teclado",$_POST['numero2'],time()+86400);
    if($_COOKIE['ordenador']==null){
      setcookie("ordenador",0,time()+86400);
    }
    if($_COOKIE['raton']==null){
      setcookie("raton",0,time()+86400);
    }
    if($_COOKIE['pantalla']==null){
      setcookie("pantalla",0,time()+86400);
    }
  }

  else if(isset($_POST['raton']) && !is_null($_POST['raton'])){
    setcookie("raton",$_POST['numero3'],time()+86400);
    if($_COOKIE['ordenador']==null){
      setcookie("ordenador",0,time()+86400);
    }
    if($_COOKIE['teclado']==null){
      setcookie("teclado",0,time()+86400);
    }
    if($_COOKIE['pantalla']==null){
      setcookie("pantalla",0,time()+86400);
    }
  }

  else if(isset($_POST['pantalla']) && !is_null($_POST['pantalla'])){
    setcookie("pantalla",$_POST['numero4'],time()+86400);
    if($_COOKIE['ordenador']==null){
      setcookie("ordenador",0,time()+86400);
    }
    if($_COOKIE['teclado']==null){
      setcookie("teclado",0,time()+86400);
    }
    if($_COOKIE['raton']==null){
      setcookie("raton",0,time()+86400);
    }
  }

  else{
    if($_COOKIE['ordenador']==null){
      setcookie("ordenador",0,time()+86400);
    }
    if($_COOKIE['teclado']==null){
      setcookie("teclado",0,time()+86400);
    }
    if($_COOKIE['raton']==null){
      setcookie("raton",0,time()+86400);
    }
    if($_COOKIE['pantalla']==null){
      setcookie("pantalla",0,time()+86400);
    }  
  }

  //Llamamos al carrito
  header('Location:carrito.php');
?>
