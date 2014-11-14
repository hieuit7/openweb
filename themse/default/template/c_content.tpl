<div id="right">
            <p>
                <?php if(isset($_POST['action_login'])) {?>
                    <h4>
                        <?php echo "sads";
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

</div>
<div id="right-fix">s</div>