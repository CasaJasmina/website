<?php if (!defined('FW')) {
	die('Forbidden');
}

$options = array(
	'background_color' => array(
		'type' => 'color-picker',
		'label' => __('Background Color', 'fw'),
		'desc' => __('Please select the background color', 'fw'),
	),
	'background_image' => array(
		'type' => 'background-image',
		'label' => __('Background Image', 'fw'),
		'desc' => __('Please select the background image', 'fw'),
		'choices' => array(//	in future may will set predefined images
		)
	),
	'extra_class' => array(
		'type' => 'text',
		'label' => __('Extra CSS class', 'fw'),
		'desc' => __('You can specify an extra class', 'fw'),
	),
	'video' => array(
		'type'  => 'text',
		'label' => __('Background Video', 'fw'),
		'desc'  => __('Insert Video URL to embed this video', 'fw'),
	)
);
