<?php



/**
 * This class defines the structure of the 'Raid_has_Player' table.
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
class RaidHasPlayerTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'wrap.map.RaidHasPlayerTableMap';

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
		$this->setName('Raid_has_Player');
		$this->setPhpName('RaidHasPlayer');
		$this->setClassname('RaidHasPlayer');
		$this->setPackage('wrap');
		$this->setUseIdGenerator(true);
		// columns
		$this->addForeignPrimaryKey('RAID_IDRAID', 'RaidIdraid', 'INTEGER' , 'Raid', 'IDRAID', true, null, null);
		$this->addForeignPrimaryKey('PLAYER_IDPLAYER', 'PlayerIdplayer', 'INTEGER' , 'Player', 'IDPLAYER', true, null, null);
		$this->addColumn('STATUS', 'Status', 'VARCHAR', false, 45, null);
		$this->addColumn('INSCRIPTION', 'Inscription', 'INTEGER', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Raid', 'Raid', RelationMap::MANY_TO_ONE, array('Raid_idRaid' => 'idRaid', ), null, null);
    $this->addRelation('Player', 'Player', RelationMap::MANY_TO_ONE, array('Player_idPlayer' => 'idPlayer', ), null, null);
	} // buildRelations()

} // RaidHasPlayerTableMap
