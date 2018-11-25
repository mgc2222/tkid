<?php if (!isset($webpage)) die('Direct access not allowed');  ?>
<!--Start Content-->
<div class="content mb-50">
    <div class="our-menu our-menu3">
        <div class="container">
        <?php 
            if ($dataView->productCategories != null)
            {
                $index = 1;
                $categoryTitle = '';
                $subCategoryTitle = '';
                $menuProductDetailContent = '';
                //echo'<pre>';print_r($dataView->productCategories);echo'</pre>';die;
                if(!is_array($dataView->productCategories)){
                    if($dataView->productCategories->parent_id){
                        $categoryTitle = $dataView->productCategories->parentRef->name;
                        $subCategoryTitle = $dataView->productCategories->name;
                    }
                    else{
                        $categoryTitle = $dataView->productCategories->name;
                        $subCategoryTitle = $dataView->productCategories->parentRef->name;
                    }

                    if(isset($dataView->productCategories->parentRef->Articles)){
                    ?>
                        <div class="col-md-12">
                            <div class="menu-sec">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="main-title">
                                            <span><?php echo $categoryTitle; ?></span>
                                            <h1 class="hidden"><?php echo $subCategoryTitle; ?></h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="menu-detail">
                                    
                    <?php
                        foreach ($dataView->productCategories->parentRef->Articles as $rowsParentArticleKey => $rowParentArticle) {
                    ?>
                                    <div class="col-md-6">
                                <?php
                                        if($rowParentArticle->default_image){

                                ?>
                                        <div class="col-md-3 product-image">
                                            <img src="<?php echo _SITE_ADMIN_URL.'render_product_image/'.$rowParentArticle->id.'/'.$rowParentArticle->default_image ;?>" alt="<?php echo $rowParentArticle->default_image ;?>">
                                        </div>
                                <?php
                                    }
                                ?>
                                        
                                        <div class="<?php echo ($rowParentArticle->default_image) ? 'col-md-9' : 'col-md-12' ?>  product-description">
                                            <div class="food-detail">
                                                <span class="title clearfix">
                                                <?php echo ($rowParentArticle->amount) ? ucfirst($rowParentArticle->name).' ('.$rowParentArticle->amount.$rowParentArticle->amount_unit.')' : ucfirst($rowParentArticle->name)?> 
                                                    <span class="price"><?php echo $rowParentArticle->price; ?></span>
                                                </span>
                                                <span class="tags"><?php echo $rowParentArticle->description ?></span>
                                            </div>
                                        </div>
                                    </div>
                    <?php
                        }
                    ?> 
                                    
                                </div> 
                            </div>
                        </div>
                <?php
                    }

                    if(isset($dataView->productCategories->Articles)){
                    ?>
                        <div class="col-md-12">
                            <div class="menu-sec">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="main-title">
                                            <span><?php echo ($subCategoryTitle == 'Main') ? $categoryTitle : $subCategoryTitle; ?></span>
                                            <h1 class="hidden"><?php echo $categoryTitle; ?></h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="menu-detail">
                                    
                    <?php
                        foreach ($dataView->productCategories->Articles as $rowsArticleKey => $rowsArticle) {
                    ?>
                                    <div class="col-md-6">
                                <?php
                                        if($rowsArticle->default_image){

                                ?>
                                        <div class="col-md-3 product-image">
                                            <img src="<?php echo _SITE_ADMIN_URL.'render_product_image/'.$rowsArticle->id.'/'.$rowsArticle->default_image ;?>" alt="<?php echo $rowsArticle->default_image ;?>">
                                        </div>
                                <?php
                                    }
                                ?>
                                        
                                        <div class="<?php echo ($rowsArticle->default_image) ? 'col-md-9' : 'col-md-12' ?>  product-description">
                                            <div class="food-detail">
                                                <span class="title clearfix">
                                                <?php echo ($rowsArticle->amount) ? ucfirst($rowsArticle->name).' ('.$rowsArticle->amount.$rowsArticle->amount_unit.')' : ucfirst($rowsArticle->name)?> 
                                                    <span class="price"><?php echo $rowsArticle->price; ?></span>
                                                </span>
                                                <span class="tags"><?php echo $rowsArticle->description ?></span>
                                            </div>
                                        </div>
                                    </div>
                    <?php
                        }
                    ?> 
                                    
                                </div> 
                            </div>
                        </div>
                <?php
                    }
                }
                else{


                    foreach ($dataView->productCategories as $rowKey=>&$row)
                    {

                        if(isset($row->parent_id)){
                            if($row->parent_id){
                                $categoryTitle = $row->parentRef->name;
                                $subCategoryTitle = $row->name;
                            }
                            else{
                                $categoryTitle = $row->name;
                                $subCategoryTitle = $row->parentRef->name;
                            }

                            if(isset($row->parentRef->Articles)){
                            ?>
                                <div class="col-md-12">
                                    <div class="menu-sec">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="main-title">
                                                    <span><?php echo $categoryTitle; ?></span>
                                                    <h1 class="hidden"><?php echo $subCategoryTitle; ?></h1>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="menu-detail">
                                            
                            <?php
                                foreach ($row->parentRef->Articles as $rowParentArticleKey => $rowArticle) {
                            ?>
                                        <div class="col-md-6">
                                        <?php
                                            if($rowArticle->default_image){

                                        ?>
                                                <div class="col-md-3 product-image">
                                                    <img src="<?php echo _SITE_ADMIN_URL.'render_product_image/'.$rowArticle->id.'/'.$rowArticle->default_image ;?>" alt="<?php echo $rowArticle->default_image ;?>">
                                                </div>
                                        <?php
                                            }
                                        ?>
                                            
                                                <div class="<?php echo ($rowArticle->default_image) ? 'col-md-9' : 'col-md-12' ?>  product-description">
                                                    <div class="food-detail">
                                                        <span class="title clearfix">
                                                        <?php echo ($rowArticle->amount) ? ucfirst($rowArticle->name).' ('.$rowArticle->amount.$rowArticle->amount_unit.')' : ucfirst($rowArticle->name) ?> 
                                                            <span class="price"><?php echo $rowArticle->price; ?></span>
                                                        </span>
                                                        <span class="tags"><?php echo $rowArticle->description ?></span>
                                                    </div>
                                                </div>
                                            </div>
                            <?php
                                }
                            ?> 
                                            
                                        </div> 
                                    </div>
                                </div>
                        <?php
                            }

                            if(isset($row->Articles)){
                            ?>
                                    <div class="col-md-12">
                                        <div class="menu-sec">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="main-title">
                                                        <span><?php echo ($subCategoryTitle == 'Main') ? $categoryTitle : $subCategoryTitle; ?></span>
                                                        <h1 class="hidden"><?php echo $categoryTitle; ?></h1>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="menu-detail">
                                                
                            <?php
                                foreach ($row->Articles as $articleKey => $article) {
                            ?>
                                                <div class="col-md-6">
                                                <?php
                                                    if($article->default_image){

                                                ?>
                                                        <div class="col-md-3 product-image">
                                                            <img src="<?php echo _SITE_ADMIN_URL.'render_product_image/'.$article->id.'/'.$article->default_image ;?>" alt="<?php echo $article->default_image ;?>">
                                                        </div>
                                                <?php
                                                    }
                                                ?>
                                                    
                                                    <div class="<?php echo ($article->default_image) ? 'col-md-9' : 'col-md-12' ?>  product-description">
                                                        <div class="food-detail">
                                                            <span class="title clearfix">
                                                                <?php echo ($article->amount) ? ucfirst($article->name).' ('.$article->amount.$article->amount_unit.')' : ucfirst($article->name) ?> 
                                                                <span class="price"><?php echo $article->price; ?></span>
                                                            </span>
                                                            <span class="tags"><?php echo $article->description ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                <?php
                                }
                                ?>
                                               
                                            </div>
                                        </div>
                                    </div>
                            <?php    
                            }
                        }
                        else{
                            if(is_array($row)){
                                foreach ($row as $categKey => $categ) {
                                    if($row[$categKey]->parent_id){
                                        $categoryTitle = $row[$categKey]->parentRef->name;
                                        $subCategoryTitle = $row[$categKey]->name;

                                    }
                                    else{
                                        $categoryTitle = $row[$categKey]->name;
                                        $subCategoryTitle = $row[$categKey]->parentRef->name;
                                    }
                                    //echo '<pre>'; print_r($categKey); echo '</pre>';
                                    if(isset($categ->Articles)){
                                    ?>
                                            <div class="col-md-12">
                                                <div class="menu-sec">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="main-title">
                                                                <span><?php echo ($subCategoryTitle == 'Main') ? $categoryTitle : $subCategoryTitle; ?></span>
                                                                <h1 class="hidden"><?php echo $categoryTitle; ?></h1>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="menu-detail">
                                                        
                                    <?php
                                        foreach ($categ->Articles as $categArticleKey => $categArticle) {
                                    ?>
                                                    <div class="col-md-6">
                                                <?php
                                                    if($categArticle->default_image){

                                                ?>
                                                        <div class="col-md-3 product-image">
                                                            <img src="<?php echo _SITE_ADMIN_URL.'render_product_image/'.$categArticle->id.'/'.$categArticle->default_image ;?>" alt="<?php echo $categArticle->default_image ;?>">
                                                        </div>
                                                <?php
                                                    }
                                                ?>
                                                    
                                                        <div class="<?php echo ($categArticle->default_image) ? 'col-md-9' : 'col-md-12' ?>  product-description">
                                                            <div class="food-detail">
                                                                <span class="title clearfix">
                                                                <?php echo ($categArticle->amount) ? ucfirst($categArticle->name).' ('.$categArticle->amount.$categArticle->amount_unit.')' : ucfirst($categArticle->name) ?> 
                                                                    <span class="price"><?php echo $categArticle->price; ?></span>
                                                                </span>
                                                                <span class="tags"><?php echo $categArticle->description ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                    <?php
                                        }
                                    ?> 
                                                        
                                                    </div> 
                                                </div>
                                            </div>
                                <?php
                                    }
                                
                                }
                               
                            }
                        }
            ?>
            <?php
                    }
                }
            }
        ?>
        </div>
    </div>
</div>
<!--End Content-->