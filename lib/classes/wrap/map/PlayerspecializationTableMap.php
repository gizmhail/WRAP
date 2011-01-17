<?php



/**
 * This class defines the structure of the 'PlayerSpecialization' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.wrap.map
 */
class PlayerspecializationTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'wrap.map.PlayerspecializationTableMap';

	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function initialize()
	{
	  // attributes
		$this->setName('PlayerSpecialization');
		$this->setPhpName('Playerspecialization');
		$this->setClassname('Playerspecialization');
		$this->setPackage('wrap');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('IDPLAYERSPECIALIZATION', 'Idplayerspecialization', 'INTEGER', true, null, null);
		$this->addForeignKey('PLAYER_IDPLAYER', 'PlayerIdplayer', 'INTEGER', 'Player', 'IDPLAYER', true, null, null);
		$this->addColumn('SPECIALIZATIONNAME', 'Specializationname', 'VARCHAR', false, 45, null);
		$this->addColumn('ROLE', 'Role', 'VARCHAR', false, 45, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Player', 'Player', RelationMap::MANY_TO_ONE, array('Player_idPlayer' => 'idPlayer', ), null, null);
    $this->addRelation('PlayerspecializationHasBuff', 'PlayerspecializationHasBuff', RelationMap::ONE_TO_MANY, array('idPlayerSpecialization' => 'PlayerSpecialization_idPlayerSpecialization', ), null, null);
	} // buildRelations()

} // PlayerspecializationTableMap
