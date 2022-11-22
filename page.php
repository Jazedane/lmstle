<?php 
            $page = isset($_GET['page']) ? $_GET['page'] : 'class_main';
            if(!file_exists($page.".php")){
                include '404.html';
            }else{
            include $page.'.php';

            }
          ?>