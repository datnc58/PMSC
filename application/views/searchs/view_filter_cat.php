<div class="col block-head box-zone">
    <div class="col title-zone">
        <span class="col">
            <h2>Các sản phẩm của Thời trang</h2>
        </span>
        <span class="col">(Tìm thấy <?=count(@$lists);?> sản phẩm)</span>
    </div>
    <div class="float-right sort-zone">
        <div class="col box-sort">
            <select title="Sắp xếp theo" id="sort-select" class="list-sort">
                <option value="Default" selected="selected">Sắp xếp tùy chọn</option>
                <option value="new">Sản phẩm mới nhất</option>
                <option value="price-asc">Giá tăng dần</option>
                <option value="price-desc">Giá giảm dần</option>
                <option value="name">Tên A-&gt;Z</option>
            </select>
        </div>
        <!--<div class="col view-sort">
            <a href="index.html" title="Lưới" type="button" class="button-view grid active"></a>
            <a href="indexd1fd.html?view=list" title="Danh sách" type="button" class="button-view list "></a>
        </div>-->
    </div>
</div>
<div class="clear"></div>
<div id="_products">
    <div class="Wrap-product-catalog">
        <div class="col body-product-catalog-grid" id="cat-content">
<ul>
    <?php if(count($lists)) : ?>
    <?php ?>
    <?php foreach($lists as $list) : ?>
        <li data-active="1" data-hide="0">
            <div class="col product-catalog-item prod-item" data-pid="37549">
                <?php if($list->price > 0 && $list->price_sale > 0) :?>
                    <div class="cir-discount"><span>-<?=floor(100-($list->price_sale/$list->price)*100)?>%</span></div>
                <?php endif;?>
                <div class="list-product-thumb">
                    <span class="image-thumb">
                        <a href="<?=site_url($list->pro_alias);?>" title="<?=@$list->pro_name;?>">
                            <img src="<?=base_url('upload/img/products/'.$list->pro_dir.'/thumbnail_1_'.$list->pro_image)?>" alt="<?=@$list->pro_name;?>">
                        </a>
                    </span>
                </div>
                <div class="home-product-title">
                    <a href="<?=site_url($list->pro_alias);?>" title="<?=@$list->pro_name;?>"><?= LimitString(@$list->pro_name, 17, '...'); ?></a>
                </div>
                <div class="name-brand">
                    <?php if(isset($list->brand_name) && !empty($list->brand_name)){ ?>
                        <a href="<?=site_url($list->brand_alias);?>" class="brand-link" data-brand-id="<?=@$list->pro_id;?>" data-brand-alias="panasonic"><?=@$list->brand_name;?></a>
                    <?php } else { ?>
                        <br>
                    <?php } ?>
                </div>
                <div class="prod-rate catalog-m hidden">
                    <fieldset class="rating">
                        <input type="radio" id="star5" value="5"  />
                        <label class="full" for="star5" title="5 sao"></label>
                        <input type="radio" id="star4" value="4"  />
                        <label class="full" for="star4" title="4 sao"></label>
                        <input type="radio" id="star3" value="3"  checked='checked'  />
                        <label class="full" for="star3" title="3 sao"></label>
                        <input type="radio" id="star2" value="2"  />
                        <label class="full" for="star2" title="2 sao"></label>
                        <input type="radio" id="star1" value="1"  />
                        <label class="full" for="star1" title="1 sao"></label>
                    </fieldset>
                    <span>(3 đánh giá)</span>
                </div>
                <div class="list-product-price">
                    <span class="list-product-meta-price"><?php if(!empty($list->price_sale)) : ?><?php echo str_replace( ',', '.', number_format($list->price_sale) )?> đ <?php else : ?>Liên hệ<?php endif;?></span>
                    <?php if(!empty($list->price)) : ?><span class="list-product-old-price"><?php echo str_replace( ',', '.', number_format($list->price) )?>  đ</span><?php endif;?>
                </div>
                <div class="buy-now-button"><a class="txt-buy-now" data-pid="37549" href="<?=site_url(@$list->pro_alias);?>">Mua ngay</a></div>
            </div>

        </li>
    <?php endforeach;?>

</ul>
</div>
</div>
</div>
<div class="clearfix"></div>
<div class="center">
    <?=@$phantrang;?>
</div>
<?php else : ?>
    ...
<?php endif ;?>
<script type="text/javascript">
    function tieptheo(page){
        $.ajax({
            url: base_url() + 'search/filter',
            type: "POST",
            dateType: "html",
            data: {
                page:page,
                cat_id: $('#cat_id').val(),
                id_mucgia: $('#id_mucgia').val(),
                id_brand : $('#id_brand').val(),
                id_filter: $('#filter').val()
            },
            success: function (result) {
                $('#result').html(result);
            }
        });
    }
</script>