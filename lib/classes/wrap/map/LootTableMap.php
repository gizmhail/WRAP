<?php



/**
 * This class defines the structure of the 'Loot' table.
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
class LootTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'wrap.map.LootTableMap';

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
		$this->setName('Loot');
		$this->setPhpName('Loot');
		$this->setClassname('Loot');
		$this->setPackage('wrap');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('IDLOOT', 'Idloot', 'INTEGER', true, null, null);
		$this->addForeignKey('RAID_IDRAID', 'RaidIdraid', 'INTEGER', 'Raid', 'IDRAID', true, null, null);
		$this->addForeignKey('PLAYER_IDPLAYER', 'PlayerIdplayer', 'INTEGER', 'Player', 'IDPLAYER', true, null, null);
		$this->addColumn('LOOTNAME', 'Lootname', 'VARCHAR', false, 200, null);
		$this->addColumn('COMMENT', 'Comment', 'LONGVARCHAR', false, null, null);
		$this->addColumn('ILVL', 'Ilvl', 'INTEGER', false, null, null);
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

} // LootTableMap
