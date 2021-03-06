<?php get_header(); ?>
<!-- ここからメインコンテンツ -->
<div class="col-md-10 ">
    <div class="ekimeihyou text-center mt-3 mb-5">
        <!-- <p class="h1 mx-auto text-center">Hello World</p> -->
        <img src="<?php echo get_template_directory_uri(); ?>/img/station/hobby.png" usemap="#ImageMap" alt="趣味ページ">

        <map name="ImageMap">
            <area shape="rect" coords="101,155,307,231" href="/work" alt="" />
            <area shape="rect" coords="104,240,231,274" href="/work" alt="" />
            <area shape="rect" coords="385,155,592,230" href="/book" alt="" />
            <area shape="rect" coords="477,241,591,277" href="/book" alt="" />
        </map>

    </div>



    <!-- 日付順でソート 今やっている趣味-->
    <div class="mx-auto pt-4">
        <div class="latest-coffee text-white  mb-4 ">
            <?php
                $args = array(
                    'post_type' => 'hobby',
                    'numberposts' => -1,
                    'post_status' => 'publish',
                    'orderby' => 'meta_value',
                    'meta_key' => 'hobby_start', //ACFのフィールド名
                    'order' => 'DESC',
                    'meta_query'=>array(
                        array(
                            'key'=>'hobbby-now',
                            'type'=>'CHAR',
                            'compare'=>'=',
                            'value'=>'now',
                        )
                    )
                );

                $posts = get_posts($args);

                if ( $posts ):
                    foreach( $posts as $post ): setup_postdata( $post );
                 
            ?>

            <div class="row border mx-5 my-4 py-4 rounded box-hobby">

                <!-- 画像 -->
                <div class="col-md-3 col-12">
                    <div class="work-img">
                        <?php 
                        $image = get_field('hobby_img');
                        $size = 'thumbnail_medium'; // (thumbnail, medium, large, full or custom size)
                        if( $image ) {
                            echo wp_get_attachment_image( $image, $size );
                        }
                        else{
                            // 画像なかったとき用
                            echo  wp_get_attachment_image( 126, $size );
                        }
   
                        ?>
                    </div>

                </div>



                <!-- 詳細情報 -->
                <div class="col-md-9 col-12">
                    <!-- <div class="text-decoration-none text-white row text-right"> -->
                    <div class="row">
                        <div class="col-md-8 col-12 h2">

                            <p><?php the_title(); ?></p>
                        </div>
                        <div class="col-md-4 col-12 mt-2">
                            <div class="detail  text-left">
                                <p class="text-warning">好き度:<?php the_field ( "hobby_depth" ); ?></p>

                            </div>

                        </div>
                    </div>
                    <div class=" row mt-3 ml-md-2 ">

                        <p><?php the_excerpt(); ?></p>
                    </div>


                </div>
            </div>
            <?php 
                    endforeach;
                endif;
                ?>


        </div>

    </div>


    <!-- 日付順でソート かつての趣味-->
    <div class="mx-auto pt-4">
        <div class="latest-coffee text-white  mb-4 ">
            <h1 class="text-center h2">今はやらなくなってしまった趣味</h1>
            <?php
                $args = array(
                    'post_type' => 'hobby',
                    'numberposts' => -1,
                    'post_status' => 'publish',
                    'orderby' => 'meta_value',
                    'meta_key' => 'hobby_start', //ACFのフィールド名
                    'order' => 'DESC',
                    'meta_query'=>array(
                        array(
                            'key'=>'hobbby-now',
                            'type'=>'CHAR',
                            'compare'=>'=',
                            'value'=>'old',
                        )
                    )
                );

                $posts = get_posts($args);

                if ( $posts ):
                    foreach( $posts as $post ): setup_postdata( $post );
                 
            ?>

            <div class="row border mx-5 my-4 py-4 rounded box-hobby">

                <!-- 画像 -->
                <div class="col-md-3 col-12">
                    <div class="work-img">
                        <?php 
                        $image = get_field('hobby_img');
                        $size = 'thumbnail_medium'; // (thumbnail, medium, large, full or custom size)
                        if( $image ) {
                            echo wp_get_attachment_image( $image, $size );
                        }
                        else{
                            // 画像なかったとき用
                            echo  wp_get_attachment_image( 126, $size );
                        }
   
                        ?>
                    </div>

                </div>



                <!-- 詳細情報 -->
                <div class="col-md-9 col-12">
                    <!-- <div class="text-decoration-none text-white row text-right"> -->
                    <div class="row">
                        <div class="col-md-8 col-12 h2">

                            <p><?php the_title(); ?></p>
                        </div>
                        <div class="col-md-4 col-12 mt-2">
                            <div class="detail  text-left">
                                <p class="text-warning">好き度:<?php the_field ( "hobby_depth" ); ?></p>

                            </div>

                        </div>
                    </div>
                    <div class=" row mt-3 ml-md-2 ">

                        <p><?php the_excerpt(); ?></p>
                    </div>


                </div>
            </div>
            <?php 
                    endforeach;
                endif;
                ?>


        </div>

    </div>

</div><!-- メインのcolのdiv閉じ -->



<?php get_sidebar(); ?>



<?php get_footer(); ?>