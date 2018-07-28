<?php

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_manset',
		'title' => 'Manşet',
		'fields' => array (
			array (
				'key' => 'field_5b5c2f5307bb7',
				'label' => 'Manşet',
				'name' => 'manset',
				'type' => 'select',
				'instructions' => 'Manşette durmasını istiyorsanız seçin',
				'choices' => array (
					'evet' => 'Evet',
					'hayir' => 'Hayır',
				),
				'default_value' => 'hayir',
				'allow_null' => 1,
				'multiple' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'side',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => -2,
	));
}

