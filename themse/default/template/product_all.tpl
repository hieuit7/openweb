<div id="right">
    <script type="text/javascript">
        $(document).ready(function(){
            $('div.vtab').mouseover(function(){
                $(this).find(".vtab-marked-info").animate({
                    "right": "0%"
                },{
                    queue: false,
                    duration: 100
                });
            }).mouseout(function(){
                $(this).find(".vtab-marked-info").animate({
                    "right": "-50%"
                },{
                    queue: false,
                    duration: 100
                });
            });
        })
    </script>
    <div id="place-relate" class="pVTabUI">
        <div class="vtab-header">
            <div class="vtab-header-title"><!-- tieu de-->
                <h2>
                    <a href="index.php?module=view&opt=detail&id=<?php echo $id_cat; ?>"><?php if(!is_null($cat_name)) echo $cat_name; else echo "Tất cả sản phẩm."; ?></a><!--catogory product here-->
                </h2>
            </div><!--ket thuc tieu de-->
            <div class="view-all"><!--Xem tất cả sản phẩm-->
                <a href="/danh-muc-diem-giam-gia/1/cafe-kem-tra-sua">Xem tất cả</a>
            </div><!--Ket thuc xem tất cả sản phẩm-->
        </div>
        <div class="itab-content"><?php foreach($datas as $data){ 
                extract($data);?>
           <div class="vtab">
                <div class="vtab-img">
                    <div class="vtab-marked-info" style="right: -50%;">
                        <ul>
                            <li>
                                <span class="_view">267</span> Lượt xem
                            </li>
                            <li>
                                <span class="_love">0</span> Yêu thích
                            </li>
                            <li>
                                <span class="_checked">0</span> Đã đến
                            </li>
                            <li>
                                <span class="_wanna">0</span> Muốn đến
                            </li>
                        </ul>
                    </div>
                    <a title="<?php echo $name?>" href="index.php?module=view&opt=detail&id=<?php echo $id;?>" class="vtab-link">
                        <img alt="<?php echo $name?>" src="<?php echo $image?>"/>
                    </a>
                    <a href="index.php?module=view&opt=detail&id=<?php echo $id;?>" class="vtab-link-overlay">
                    </a>
                </div>
                
                <div class="vtab-name">
                    <h2>
                        <a href="index.php?module=view&opt=detail&id=<?php echo $id;?>"><?php echo $name;?></a>
                    </h2>
                </div>
                <div class="vtab-control">
                    <div class="vtab-c-cate">
                        <a href="index.php?module=view&opt=detail&id=<?php echo $id;?>"><?php echo $name;?></a>
                    </div>
                    <div class="vtab-c-place">
                        <a href="index.php?module=view&opt=detail&id=<?php echo $id;?>"><?php echo $price;?></a>
                    </div>
                </div>
           </div> <?php }?>
        </div>
    </div>
</div>
<div id="wap"><div class="content-left">sss</div></div>