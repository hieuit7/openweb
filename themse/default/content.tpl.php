<body>
<div id="content">
    <div id="header">
        
    </div><!--Header-->
    <div id="menu">
        <div class="menu_item">
            
        </div>
        
            <a>
                <?php
                    $themes->loadMenus();
                ?>
            
            
                <?php
                    session_start();
                    
                    if (!session_is_registered('user')) {
                        echo "Xin chào $user_status! <a href=\"index.php?module=logout\">Logout!</a>";
                        echo "<form method=\"post\" action=\"index.php?module=register\">
                                    <input name=\"reg\" type=\"submit\" value=\"Register\"/>
                                </form>
                                <form method=\"post\" action=\"index.php?module=login\">
                                    User
                                <input name=\"user\" type=\"text\"/>
                                    Password
                                <input name=\"passwd\" type=\"password\"/>
                                <input name=\"action_login\" type=\"hidden\" value=\"login\" />
                                <input name=\"submit\" type=\"submit\" value=\"Login\"/>
                                </form>
                                ";
                    } else {
                        session_start();
                        echo "Xin chào $user_name! <a href=\"index.php?module=logout\">Logout!</a>";
                    }
                ?>
            </a>
       

    </div><!--Menu-->
    <div id="c_body">
        <div id="left">
            <div class="menu_item">
                <?php
                    $menu = $themes->loadMenu();
                    if(is_array($menu)){
                    foreach($menu as $value){
                        echo '<div class="item">'.$value.'</div>';
                    }
                    }
                ?>
            </div>
            
        </div><!--Menu Left-->
        <div id="right">
            <p>
                <?php if(isset($_POST['action_login'])) {?>
                    <h4>
                        <?php
                            session_start();
                            if(!session_is_registered('user')){
                                echo "Login Failed";
                            }else{
                                echo "Hello".$_POST['action_login'];
                            }
                        ?>
                    </h4>
                <?php }else{echo "ok";}?>
                <a title="Rss" href="rss/channel.php" target="_blank">Rss</a>
                <?php //echo $message;
                    /*if (!isset($_GET['module']) && !isset($_GET['id'])) {
                        $i=1;
                        if(!is_null($products)){
                            foreach($product as $products){
                                echo "<div class=\"product\">".$products->getDetails($i)."</div>";
                                $i++;
                            }
                        }
                    } else if(isset($_GET['module'])&&($_GET['module'] == "register")){
                        include 'libs/modules/' . $_GET['module']. '.php';
                    } else {
                        include 'themse/default/header.tpl.php';
                        print( '<body>
                        <div>');
                        include 'libs/modules/' . $_GET['module'] . '.php';
                        
                        echo '</div>';
                   }*/
                   //echo $product_content;
                ?>
            </p>

        </div><!--Body-->
    </div><!--Content-->
    <div id="footer"></div>
</div>


</body>
</html>