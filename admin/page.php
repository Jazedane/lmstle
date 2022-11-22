<?php 
            $page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
            if(!file_exists($page.".php")){
                include '404.html';
            }else{
            include $page.'.php';

            }
          ?>