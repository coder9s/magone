<?php

function magone_widget_feedbuner_form( $args, $instance, $widget_id, $widget_declaration) {
	$instance = magone_set_widget_instance($instance, $widget_declaration);
	magone_widget_common_header('follow-by-email misc followbyemail', $instance);	
	
	if (!$instance['uri']) :
		esc_html_e('Blank URI', 'magone');		
	else:
		if (strpos($instance['uri'], '/') !== false) {
			$instance['uri'] = substr(strrchr($instance['uri'], '/'), 1);
		}
		if (strpos($instance['uri'], '=') !== false) {
			$instance['uri'] = substr(strrchr($instance['uri'], '='), 1);
		}
		if (!$instance['uri']) :
			esc_html_e('Wrong URI', 'magone');
		else:
			if ($instance['description']): ?>
				<div class="desc"><?php echo $instance['description']; ?></div>
			<?php endif; ?>
			<div class="follow-by-email-inner">
				<form action="https://feedburner.google.com/fb/a/mailverify" method="post" onsubmit="window.open(&quot;https://feedburner.google.com/fb/a/mailverify?uri=<?php echo $instance['uri'] ?>&quot;, &quot;popupwindow&quot;, &quot;scrollbars=yes,width=550,height=520&quot;); return true" target="popupwindow">
					<table>
						<tbody>
							<tr>
								<td>
									<input class="follow-by-email-address" name="email" placeholder="<?php echo esc_attr($instance['placholder_text']); ?>" type="text">
								</td>
								<td>
									<input class="follow-by-email-submit" type="submit" value="<?php echo esc_attr($instance['submit_text']); ?>">
								</td>
							</tr>
						</tbody>
					</table>
					<input name="uri" type="hidden" value="<?php echo $instance['uri'] ?>">
					<input name="loc" type="hidden" value="<?php echo esc_attr(get_locale()); ?>">
				</form>
			</div><?php
		endif;
	endif;
	magone_widget_common_footer();
}