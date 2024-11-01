

<style type="text/css">
    #notification-bar 
    {
        background: <?php echo $this->options->bar_from_color(); ?>;
        background: -moz-linear-gradient(top, <?php echo $this->options->bar_from_color(); ?> 0%, <?php echo $this->options->bar_to_color(); ?> 100%);
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,<?php echo $this->options->bar_from_color(); ?>), color-stop(100%,<?php echo $this->options->bar_to_color(); ?>));
        background: -webkit-linear-gradient(top, <?php echo $this->options->bar_from_color(); ?> 0%,<?php echo $this->options->bar_to_color(); ?> 100%);
        background: -o-linear-gradient(top, <?php echo $this->options->bar_from_color(); ?> 0%,<?php echo $this->options->bar_to_color(); ?> 100%);
        background: -ms-linear-gradient(top, <?php echo $this->options->bar_from_color(); ?> 0%,<?php echo $this->options->bar_to_color(); ?> 100%);
        background: linear-gradient(to bottom, <?php echo $this->options->bar_from_color(); ?> 0%, <?php echo $this->options->bar_to_color(); ?> 100%);
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo $this->options->bar_from_color(); ?>', endColorstr='<?php echo $this->options->bar_to_color(); ?>',GradientType=0 );
    }

    #notification-bar div.socialtv-message
    {
        color: <?php echo $this->options->message_color(); ?>;
    }

    #notification-bar a.socialtv-button
    {
        background: <?php echo $this->options->button_from_color(); ?>;
        background: -moz-linear-gradient(top, <?php echo $this->options->button_from_color(); ?> 0%, <?php echo $this->options->button_to_color(); ?> 100%);
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,<?php echo $this->options->button_from_color(); ?>), color-stop(100%,<?php echo $this->options->button_to_color(); ?>));
        background: -webkit-linear-gradient(top, <?php echo $this->options->button_from_color(); ?> 0%,<?php echo $this->options->button_to_color(); ?> 100%);
        background: -o-linear-gradient(top, <?php echo $this->options->button_from_color(); ?> 0%,<?php echo $this->options->button_to_color(); ?> 100%);
        background: -ms-linear-gradient(top, <?php echo $this->options->button_from_color(); ?> 0%,<?php echo $this->options->button_to_color(); ?> 100%);
        background: linear-gradient(to bottom, <?php echo $this->options->button_from_color(); ?> 0%, <?php echo $this->options->button_to_color(); ?> 100%);
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo $this->options->button_from_color(); ?>', endColorstr='<?php echo $this->options->button_to_color(); ?>',GradientType=0 );

        color: <?php echo $this->options->button_text_color(); ?>;
    }

    #notification-bar-open-button
    {
        background-color: <?php echo $this->options->open_button_color(); ?>;
    }

    #notification-bar  div.socialtv-close 
    {
        border: 1px solid <?php echo $this->options->close_button_color(); ?>;
        background-color: <?php echo $this->options->close_button_color(); ?>;
        color: <?php echo $this->options->close_button_color_x(); ?>;
    }

    #notification-bar  div.socialtv-close:hover 
    {
        border: 1px solid <?php echo $this->options->close_button_color_hover(); ?>;
        background-color: <?php echo $this->options->close_button_color_hover(); ?>;
    }
</style>

<?php if ($this->options->display_button() && $this->options->button_action() == 2) { ?>
    <script type="text/javascript">
        function socialtv_notification_bar_button_action_script() {
            try {
    <?php echo $this->options->button_action_javascript(); ?>
            }
            catch (err) {
            }
        }
    </script>
<?php } ?>

<div id="notification-bar-spacer"  style="display: none; z-index: 999999;">
    <div id="notification-bar-open-button" class="<?php echo $this->options->position() == 1 ? 'top socialtv-bottom-shadow' : 'bottom socialtv-top-shadow'; ?>"></div>
    <div id="notification-bar" class="socialtv-fixed <?php if ($this->options->display_shadow()) echo $this->options->position() == 1 ? 'socialtv-bottom-shadow' : 'socialtv-top-shadow'; ?>">
        <?php if ($this->options->close_button()) { ?>
            <div class="socialtv-close" style="background-color: #CCCCCC; border: 1px solid #CCCCCC; top: 10px;">X</div>
        <?php } ?>
        <table border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td>
                    <div class="socialtv-message">
                        <?php echo $this->options->message(); ?>
                    </div>
                    <div>
                        <?php if ($this->options->display_button()) { ?>
                             <!-- <?php if ($this->options->button_action() == 1) { ?>
                                <a class="socialtv-button" href="<?php echo $this->options->button_action_url(); ?>"  target="<?php echo $this->options->button_action_new_tab() ? '_blank' : '_self'; ?>"><?php echo $this->options->button_text(); ?></a>
                            <?php } else ?>
                            <?php if ($this->options->button_action() == 2) { ?>
                                <a class="socialtv-button" onclick="javascript:socialtv_notification_bar_button_action_script();"><?php echo $this->options->button_text(); ?></a>
                            <?php } ?> -->
							
							<?php for ($i=1; $i<$this->options->buttons_count()+1; $i++) { ?>
							<?php $value = 'button_text_'.$i;?>
							<?php $URL = 'button_action_'.$i;?>
							
							
							<a href="#" class="change_tracker_URL socialtv-button" data-href="<?= $this->options->$URL() ?>"><?= $this->options->$value() ?></a>
							
							<?php } ?>
							<a href="#" class="close_current_video socialtv-button" style="display:none;">Close video</a>
                        <?php } ?>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</div>
<?php
$margin = $this->options->text_margin() * 10;
$height = $this->options->height() == 0 ? 34 : $this->options->height();
if ( is_admin_bar_showing() ) {
    $height = $height + 32;
}
$position = $this->options->position() == 1 ? 'padding-top: '.$height.'px' : 'padding-bottom: '.$height.'px';
//echo$position ;
//if ()
$width = 100 - ($margin * 2);

 ?>
<div id="socialstv_player" style="width:100%; padding:0px <?=$margin ?>%; height: 100%; <?=$position?>"></div>


<style type="text/css">
<?php echo $this->options->custom_css(); ?>
#socialstv_player {
	position: absolute;
    top: 0px;
}
</style>
