<?php
/*
  SocialTVs Notification Plugin
  

  SocialTVs Notification Plugin is distributed under the GNU General Public License, Version 3,
  June 2007. Copyright (C) 2007 Free Software Foundation, Inc., 51 Franklin
  St, Fifth Floor, Boston, MA 02110, USA

  THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
  ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
  WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
  DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR
  ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
  (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
  LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON
  ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
  (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
  SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 */

/**
 * Template for SocialTVs Notification Plugin
 * @author info@socialtvs.net
 */
?>

<?php @$this->options_page_header($this->__('SocialTVs Notification Bar Settings'), socialtv_Notification_Bar::OPTIONS_GROUP_NAME); ?>

<h3><?php echo $this->__('Display'); ?></h3>
<table class="form-table">
    <tr>
        <th scope="row">
            <?php echo $this->options->enabled_label(); ?>
        </th>
        <td>
            <input type="checkbox" name="<?php echo $this->options->enabled_name(); ?>" <?php echo $this->options->enabled() ? 'checked' : ''; ?> />
        </td>
    </tr>
    <tr>
        <th scope="row">
            <?php echo $this->options->position_label(); ?>
        </th>
        <td>
            <select name="<?php echo $this->options->position_name(); ?>">
                <option value="1" <?php echo $this->options->position() == '1' ? 'selected' : ''; ?>><?php echo $this->__('Top'); ?></option>
                <option value="2" <?php echo $this->options->position() == '2' ? 'selected' : ''; ?>><?php echo $this->__('Bottom'); ?></option>
            </select>
        </td>
    </tr>
    <tr>
        <th scope="row">
            <?php echo $this->options->fixed_position_label(); ?>
        </th>
        <td>
            <input type="checkbox" name="<?php echo $this->options->fixed_position_name(); ?>" <?php echo $this->options->fixed_position() ? 'checked' : ''; ?> />&#160;<span class="description"><?php echo $this->__('[Sticky Bar, bar will stay at position regardless of scrolling.]'); ?></span>
        </td>
    </tr>
    <tr>
        <th scope="row">
            <?php echo $this->options->display_scroll_label(); ?>
        </th>
        <td>
            <input type="checkbox" name="<?php echo $this->options->display_scroll_name(); ?>" <?php echo $this->options->display_scroll() ? 'checked' : ''; ?> />&#160;<span class="description"><?php echo $this->__('[Displays the bar on window scroll.]'); ?></span>
        </td>
    </tr>
    <tr>
        <th scope="row">
            <?php echo $this->options->display_scroll_offset_label(); ?>
        </th>
        <td>
            <input class="seconds" name="<?php echo $this->options->display_scroll_offset_name(); ?>" value="<?php echo $this->options->display_scroll_offset(); ?>" />&#160;<?php echo $this->__('px'); ?>&#160;<span class="description">[<?php echo $this->__('Number of pixels to be scrolled before the bar appears.'); ?>]</span>
        </td>
    </tr>
    <tr>
        <th scope="row">
            <?php echo $this->options->height_label(); ?>
        </th>
        <td>
            <input class="seconds" name="<?php echo $this->options->height_name(); ?>" value="<?php echo $this->options->height(); ?>" />&#160;<?php echo $this->__('px'); ?>&#160;<span class="description">[<?php echo $this->__('Set 0px to auto fit contents.'); ?>]</span>
        </td>
    </tr>
    <tr>
        <th scope="row">
            <?php echo $this->options->position_offset_label(); ?>
        </th>
        <td>
            <input class="seconds" name="<?php echo $this->options->position_offset_name(); ?>" value="<?php echo $this->options->position_offset(); ?>" />&#160;<?php echo $this->__('px'); ?>&#160;<span class="description">[<?php echo $this->__('(Top bar only) If you find the bar overlapping, try increasing this value. (eg. WordPress 3.8 Twenty Fourteen theme, set 48px)'); ?>]</span>
        </td>
    </tr>
    <tr>
        <th scope="row">
            <?php echo $this->options->display_after_label(); ?>
        </th>
        <td>
            <input class="seconds" name="<?php echo $this->options->display_after_name(); ?>" value="<?php echo $this->options->display_after(); ?>" />&#160;<?php echo $this->__('second(s)'); ?>&#160;<span class="description">[<?php echo $this->__('Set 0 second(s) to display immediately. Do not work in "Display on Scroll" mode.'); ?>]</span>
        </td>
    </tr>
    <tr>
        <th scope="row">
            <?php echo $this->options->animate_delay_label(); ?>
        </th>
        <td>
            <input class="seconds" name="<?php echo $this->options->animate_delay_name(); ?>" value="<?php echo $this->options->animate_delay(); ?>" />&#160;<?php echo $this->__('second(s)'); ?>&#160;<span class="description">[<?php echo $this->__('Set 0 second(s) for no animation.'); ?>]</span>
        </td>
    </tr>
    <tr>
        <th scope="row">
            <?php echo $this->options->close_button_label(); ?>
        </th>
        <td>
            <input type="checkbox" name="<?php echo $this->options->close_button_name(); ?>" <?php echo $this->options->close_button() ? 'checked' : ''; ?> />&#160;<span class="description"><?php echo $this->__('[Displays a close button at the top right corner of the bar.]'); ?></span>
        </td>
    </tr>
    <tr>
        <th scope="row">
            <?php echo $this->options->auto_close_after_label(); ?>
        </th>
        <td>
            <input class="seconds" name="<?php echo $this->options->auto_close_after_name(); ?>" value="<?php echo $this->options->auto_close_after(); ?>" />&#160;<?php echo $this->__('second(s)'); ?>&#160;<span class="description">[<?php echo $this->__('Set 0 second(s) to disable auto close. Do not work in "Display on Scroll" mode.'); ?>]</span>
        </td>
    </tr>
   
    <tr>
        <th scope="row">
            <?php echo $this->options->keep_closed_label(); ?>
        </th>
        <td>
            <input type="checkbox" name="<?php echo $this->options->keep_closed_name(); ?>" <?php echo $this->options->keep_closed() ? 'checked' : ''; ?> />&#160;<span class="description">[<?php echo $this->__('Once closed, bar will display closed on other pages.'); ?>]</span>
        </td>
    </tr>
    <!--<tr>
        <th scope="row">
            <?php echo $this->options->keep_closed_for_label(); ?>
        </th>
        <td>
            <input class="seconds" name="<?php echo $this->options->keep_closed_for_name(); ?>" value="<?php echo $this->options->keep_closed_for(); ?>" />&#160;<?php echo $this->__('day(s)'); ?>&#160;<span class="description">[<?php echo $this->__('Bar will be kept closed for the number of days specified from last closed date.'); ?>]</span>
        </td>
    </tr>-->
</table>

<h3><?php echo $this->__('Content'); ?></h3>
<table class="form-table">
    <tr>
        <th scope="row">
            <?php echo $this->options->message_label(); ?>
        </th>
        <td>
            <textarea rows="5" cols="75" name="<?php echo $this->options->message_name(); ?>"><?php echo $this->options->message(); ?></textarea>
            <br />
            <span class="description"><?php echo esc_html($this->__('[HTML tags are allowed. e.g. Add <br /> for break.]')); ?></span>
        </td>
    </tr>
    <tr>
        <th scope="row">
            <?php echo $this->options->display_button_label(); ?>
        </th>
        <td>
            <input type="checkbox" name="<?php echo $this->options->display_button_name(); ?>" <?php echo $this->options->display_button() ? 'checked' : ''; ?> />&#160;<span class="description"><?php echo $this->__('[Displays a button next to the message.]'); ?></span>
        </td>
    </tr>
	
	
	
	<tr>
        <th scope="row">
            <?php echo $this->options->buttons_count_label(); ?>
        </th>
        <td>
            
			<select  name="<?php echo $this->options->buttons_count_name(); ?>">
				<?php for ($i=1; $i<11; $i++) { ?>
					<option value="<?= $i ?>" <?php selected( $this->options->buttons_count(), $i ); ?>><?= $i ?></option>
				<?php } ?>
			</select>
			
        </td>
    </tr>
	
	<tr>
        <th scope="row">
            <?php echo $this->options->text_margin_label(); ?>
        </th>
        <td>
            
			<select  name="<?php echo $this->options->text_margin_name(); ?>">
				<?php for ($i=0; $i<4; $i++) { ?>
					<option value="<?php echo $i ?>" <?php selected( $this->options->text_margin(), $i ); ?>><?= $i*10 ?>%</option>
				<?php } ?>
			</select>
			
        </td>
    </tr>
	
	
	
	<?php for ($i=1; $i<$this->options->buttons_count()+1; $i++) { ?>
		<tr>
        <th scope="row">
			<?php $label = 'button_text_'.$i.'_label'; ?>
			<?php $name = 'button_text_'.$i.'_name'; ?>
			<?php $value = 'button_text_'.$i;?>
            <?php echo $this->options->$label(); ?>
        </th>
        <td>
            <input name="<?php echo $this->options->$name(); ?>" value="<?php echo $this->options->$value(); ?>" />
		</td>
		<tr>
        <th scope="row">
			<?php $label_URL = 'button_action_'.$i.'_label'; ?>
			<?php $name_URL = 'button_action_'.$i.'_name'; ?>
			<?php $value_URL = 'button_action_'.$i;?>
            <?php echo $this->options->$label_URL(); ?>
        </th>
        <td>
            <input name="<?php echo $this->options->$name_URL(); ?>" value="<?php echo $this->options->$value_URL(); ?>" />
		</td>
    </tr>
	<?php } ?>
	
    
   </table>

<h3><?php echo $this->__('Color'); ?></h3>
<table class="form-table">
    <tr>
        <th scope="row">
            <?php echo $this->__('Bar Color'); ?>
        </th>
        <td>
            <div class="color-selector-div">
                <div class="color-selector" color="<?php echo $this->options->bar_from_color(); ?>"></div>&#160;<span><?php echo $this->options->bar_from_color(); ?></span>
                <input type="hidden" name="<?php echo $this->options->bar_from_color_name(); ?>" value="<?php echo $this->options->bar_from_color(); ?>" />
            </div>
            <div class="color-selector-div">
                <div class="color-selector" color="<?php echo $this->options->bar_to_color(); ?>"></div>&#160;<span><?php echo $this->options->bar_to_color(); ?></span>
                <input type="hidden" name="<?php echo $this->options->bar_to_color_name(); ?>" value="<?php echo $this->options->bar_to_color(); ?>" />
            </div>
            <span class="description"><?php echo $this->__('[Select two different colors to create a gradient.]'); ?></span>
        </td>
    </tr>
    <tr>
        <th scope="row">
            <?php echo $this->options->message_color_label(); ?>
        </th>
        <td>
            <div class="color-selector" color="<?php echo $this->options->message_color(); ?>"></div>&#160;<span><?php echo $this->options->message_color(); ?></span>
            <input type="hidden" name="<?php echo $this->options->message_color_name(); ?>" value="<?php echo $this->options->message_color(); ?>" />
        </td>
    </tr>
    <tr>
        <th scope="row">
            <?php echo $this->__('Button Color'); ?>
        </th>
        <td>
            <div class="color-selector-div">
                <div class="color-selector" color="<?php echo $this->options->button_from_color(); ?>"></div>&#160;<span><?php echo $this->options->button_from_color(); ?></span>
                <input type="hidden" name="<?php echo $this->options->button_from_color_name(); ?>" value="<?php echo $this->options->button_from_color(); ?>" />
            </div>
            <div class="color-selector-div">
                <div class="color-selector" color="<?php echo $this->options->button_to_color(); ?>"></div>&#160;<span><?php echo $this->options->button_to_color(); ?></span>
                <input type="hidden" name="<?php echo $this->options->button_to_color_name(); ?>" value="<?php echo $this->options->button_to_color(); ?>" />
            </div>
            <span class="description"><?php echo $this->__('[Select two different colors to create a gradient.]'); ?></span>
        </td>
    </tr>
    <tr>
        <th scope="row">
            <?php echo $this->options->button_text_color_label(); ?>
        </th>
        <td>
            <div class="color-selector" color="<?php echo $this->options->button_text_color(); ?>"></div>&#160;<span><?php echo $this->options->button_text_color(); ?></span>
            <input type="hidden" name="<?php echo $this->options->button_text_color_name(); ?>" value="<?php echo $this->options->button_text_color(); ?>" />
        </td>
    </tr>
    <tr>
        <th scope="row">
            <?php echo $this->options->open_button_color_label(); ?>
        </th>
        <td>
            <div class="color-selector" color="<?php echo $this->options->open_button_color(); ?>"></div>&#160;<span><?php echo $this->options->open_button_color(); ?></span>
            <input type="hidden" name="<?php echo $this->options->open_button_color_name(); ?>" value="<?php echo $this->options->open_button_color(); ?>" />
        </td>
    </tr>
    <tr>
        <th scope="row">
            <?php echo $this->options->close_button_color_label(); ?>
        </th>
        <td>
            <div class="color-selector-div">
                <div class="color-selector" color="<?php echo $this->options->close_button_color(); ?>"></div>&#160;<span><?php echo $this->options->close_button_color(); ?></span>
                <input type="hidden" name="<?php echo $this->options->close_button_color_name(); ?>" value="<?php echo $this->options->close_button_color(); ?>" />
            </div>
            <div class="color-selector-div">
                <div class="color-selector" color="<?php echo $this->options->close_button_color_hover(); ?>"></div>&#160;<span><?php echo $this->options->close_button_color_hover(); ?></span>
                <input type="hidden" name="<?php echo $this->options->close_button_color_hover_name(); ?>" value="<?php echo $this->options->close_button_color_hover(); ?>" />
            </div>
            <div class="color-selector-div">
                <div class="color-selector" color="<?php echo $this->options->close_button_color_x(); ?>"></div>&#160;<span><?php echo $this->options->close_button_color_x(); ?></span>
                <input type="hidden" name="<?php echo $this->options->close_button_color_x_name(); ?>" value="<?php echo $this->options->close_button_color_x(); ?>" />
            </div>
            <span class="description"><?php echo $this->__('[Normal, Hover, X]'); ?></span>
        </td>
    </tr>
</table>



<?php
@$this->options_page_footer('notification-bar-plugin-settings/', 'notification-bar-plugin-faq/', array(array(
                'href' => 'http://socialtv.com/notification-bar-plugin-ideas/',
                'target' => '_blank',
                'text' => $this->__('Plugin Ideas')
        )));
?>

<script type="text/javascript">
    (function($) {
        function setColorPicker(div) {
            div.ColorPicker({
                color: div.attr('color'),
                onShow: function(colpkr) {
                    $(colpkr).fadeIn(500);
                    return false;
                }, onHide: function(colpkr) {
                    $(colpkr).fadeOut(500);
                    return false;
                },
                onChange: function(hsb, hex, rgb) {
                    div.css('backgroundColor', '#' + hex);
                    div.next().text('#' + hex).next().val('#' + hex);
                }
            }).css('backgroundColor', div.attr('color'));
        }

        $('#socialtvs-bar-options').find(".color-selector").each(function(i, e) {
            setColorPicker($(e));
        });

        $('#socialtvs-bar-options .pages-selection input[type="checkbox"]').change(function() {
            var values = [];
            var div = $(this).parent().parent().parent();
            div.find('input:checked').each(function(i, e) {
                values.push($(e).val());
            });
            div.children(":first").val(values.join());
        });
        
        $('#socialtvs-bar-options .roles-selection input[type="checkbox"]').change(function() {
            var values = [];
            var div = $(this).parent().parent().parent();
            div.find('input:checked').each(function(i, e) {
                values.push($(e).val());
            });
            div.children(":first").val(JSON.stringify(values));
        });
        
        $('#socialtvs-bar-options input.date').datepicker({
            'dateFormat' : 'yy-mm-dd'
        });

    })(jQuery);
</script>