<?php

/**
 * Template part for displaying a section of front page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */

as_debug();
?>

<section class="section#6 my-5">
    <div class="container py-2">
        <?php
            for($i = 1; $i<5; $i++):
        ?>
        <!-- timeline item 1 -->
        <div class="row no-gutters">
            <div class="col-sm py-2">
                    <img src="https://www.frenviro.net/wp-content/uploads/2018/08/tank-150x150.jpg" alt="" class=" rounded-circle img-fluid">
            </div>
            <!-- timeline item 1 center dot -->
            <div class="col-sm-1 text-center flex-column d-none d-sm-flex">
                <div class="row h-50">
                    <div class="col">&nbsp;</div>
                    <div class="col">&nbsp;</div>
                </div>
                <h5 class="m-2">
                    <span class="badge badge-pill bg-light border">&nbsp;</span>
                </h5>
                <div class="row h-50">
                    <div class="col border-right">&nbsp;</div>
                    <div class="col">&nbsp;</div>
                </div>
            </div>
            <!-- timeline item 1 event content -->
            <div class="col-sm py-2">
                <div class="card">
                    <div class="card-body">
                        
                        <h4 class="card-title text-muted">New Hawaii Office!</h4>
                        
                    </div>
                </div>
            </div>
        </div>
        <!--/row-->
        <!-- timeline item 2 -->
        <div class="row no-gutters">
            <div class="col-sm py-2">
                <div class="card border-success shadow">
                    <div class="card-body">
                        <h4 class="card-title text-success">Don Kellar Receives PRISM 2017 Courage In Leadership Award</h4>
                    </div>
                </div>
            </div>
            <div class="col-sm-1 text-center flex-column d-none d-sm-flex">
                <div class="row h-50">
                    <div class="col border-right">&nbsp;</div>
                    <div class="col">&nbsp;</div>
                </div>
                <h5 class="m-2">
                    <span class="badge badge-pill bg-success">&nbsp;</span>
                </h5>
                <div class="row h-50">
                    <div class="col border-right">&nbsp;</div>
                    <div class="col">&nbsp;</div>
                </div>
            </div>
            <div class="col-sm">
            <img src="https://www.frenviro.net/wp-content/uploads/2018/08/tank-150x150.jpg" alt="" class=" rounded-circle img-fluid">

            </div>
        </div>
        <!--/row-->
        <?php
            endfor;
        ?>
    </div>
</section>