<?php



/**
 * This class defines the structure of the 'Player' table.
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
class PlayerTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'wrap.map.PlayerTableMap';

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
		$this->setName('Player');
		$this->setPhpName('Player');
		$this->setClassname('Player');
		$this->setPackage('wrap');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('IDPLAYER', 'Idplayer', 'INTEGER', true, null, null);
		$this->addColumn('PLAYERNAME', 'Playername', 'VARCHAR', false, 100, null);
		$this->addColumn('TOKENCOUNT', 'Tokencount', 'INTEGER', false, null, null);
		$this->addColumn('GOLDTOKENCOUNT', 'Goldtokencount', 'INTEGER', false, null, null);
		$this->addColumn('STATUS', 'Status', 'VARCHAR', false, 45, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Loot', 'Loot', RelationMap::ONE_TO_MANY, array('idPlayer' => 'Player_idPlayer', ), null, null);
    $this->addRelation('Playerspecialization', 'Playerspecialization', RelationMap::ONE_TO_MANY, array('idPlayer' => 'Player_idPlayer', ), null, null);
    $this->addRelation('RaidHasPlayer', 'RaidHasPlayer', RelationMap::ONE_TO_MANY, array('idPlayer' => 'Player_idPlayer', ), null, null);
	} // buildRelations()

} // PlayerTableMap
