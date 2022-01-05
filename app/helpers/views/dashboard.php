<?php

function generate_widget($title, $description, $link, $background, $icon, $backgroundColor=null, $color='white')
{
    return sprintf('
    <div class="col-lg-3 col-6">
        <div class="small-box %s" style="background-color: %s; color: %s">
            <div class="inner">
                <h3>%s</h3>
                <p class="text-uppercase">%s</p>
            </div>
            <div class="icon">
                <i class="%s"></i>
            </div>
            <a href="#" class="small-box-footer">
                %s <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>', $background, $backgroundColor, $color, $title, $description, $icon, $link);
}
