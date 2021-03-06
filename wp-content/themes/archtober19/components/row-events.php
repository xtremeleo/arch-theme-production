<?php 
	$id = get_the_ID(); 
	$event_date = get_field('date', false, false);
	$as_date = new DateTime($event_date);
	$day_of_month = $as_date->format('j');
	$event_str = $as_date->format('Y-m-d');
	$event_unix = strtotime($event_str);
	$day_of_week = date("l", $event_unix);
	$today = new DateTime('today');
	$today_str = $today->format('Y-m-d');	
	# 2019-06-02

?><a class="index_section day_<?= $day_of_week ?> <?= ($event_str < $today_str && $today_str < '2019-11-01') ? 'day_recent' : '' ?>" href="<?= get_permalink(); ?>" data-eventtype='<?= get_terms_array_slug($id, 'event_type') ?>'>
		<h3 class="index_section_title section_six event_date">
			<?= $day_of_week ?>, Oct. <?= $day_of_month ?>
		</h3>
		<h3 class="index_section_title section_six event_title">
			<?= get_the_title(); ?>
		</h3>
		<h3 class="index_section_title section_six index_mobile_small">
			<span class="event_type index_mobile_small" data-event_type="<?= get_terms_str_slug($id, 'event_type'); ?>"><?= get_terms_str($id, 'event_type'); ?></span>
		</h3>
		<h3 class="index_section_title section_six index_mobile_small">
			<?= get_field('location'); ?>
		</h3>
		<h3 class="index_section_title section_six index_mobile_small event_time">
			<?php $event_time = str_replace(':00', '', (get_field('event_endtime')) ? str_replace(['am', 'pm'], '', get_field('event_time'))."–".get_field('event_endtime') : get_field('event_time'));   ?><?= $event_time ?>
		</h3>
		<h3 class="index_section_title section_six mobile_hide">
			<?php foreach (get_field('partner') as $partner): ?>
				<?= $partner->post_title.'<br>' ?>
			<?php endforeach; ?>
		</h3>
	<?php get_template_part('components/extra', 'icons') ?>
</a>