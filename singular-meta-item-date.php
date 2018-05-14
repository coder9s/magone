<?php if ($p->args['show_date']): ?>
	<a class="entry-date published post-meta post-meta-date timestamp-link" href="<?php echo esc_url($p->link); ?>" rel="bookmark" title="<?php echo esc_attr(get_the_modified_date('c')); ?>>
		<i class="fa fa-clock-o"></i>
	<abbr class="updated" itemprop="datePublished" title="<?php echo esc_attr(get_the_modified_date() .' '. get_the_modified_time()); ?>">
			<span class="value">
				<?php 
				switch ($p->args['show_date']) {
					case 'pretty':
						echo sprintf( esc_html__( '%s ago', 'magone' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) );
						break;

					case 'short':
						if (get_option('date_format')) {
							echo get_the_date(str_replace('F', 'M', get_option('date_format')));
						}
						break;

					case 'time':
						echo $p->time;
						break;

					case 'date':
						echo $p->date;
						break;

					default:
						echo $p->date.' '.$p->time;
						break;
				}
				?>
			</span>
		</abbr>
	</a>
<?php endif;