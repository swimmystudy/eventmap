<?php
class EditEventCache extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 * @access public
 */
	public $description = '';

/**
 * Actions to be performed
 *
 * @var array $migration
 * @access public
 */
	public $migration = array(
		'up' => array(
			'create_field' => array(
				'event_cache' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
					),
				),
			),
			'alter_field' => array(
				'event_cache' => array(
					'event_id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8', 'key' => 'primary'),
				),
			),
			'drop_field' => array(
				'event_cache' => array('', 'indexes' => array('PRIMARY')),
			),
		),
		'down' => array(
			'drop_field' => array(
				'event_cache' => array('id', 'indexes' => array('PRIMARY')),
			),
			'alter_field' => array(
				'event_cache' => array(
					'event_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
				),
			),
			'create_field' => array(
				'event_cache' => array(
					'indexes' => array(
						'PRIMARY' => array(),
					),
				),
			),
		),
	);

/**
 * Before migration callback
 *
 * @param string $direction, up or down direction of migration process
 * @return boolean Should process continue
 * @access public
 */
	public function before($direction) {
		return true;
	}

/**
 * After migration callback
 *
 * @param string $direction, up or down direction of migration process
 * @return boolean Should process continue
 * @access public
 */
	public function after($direction) {
		return true;
	}
}
