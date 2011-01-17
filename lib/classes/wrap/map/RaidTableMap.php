<?php



/**
 * This class defines the structure of the 'Raid' table.
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
class RaidTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'wrap.map.RaidTableMap';

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
		$this->setName('Raid');
		$this->setPhpName('Raid');
		$this->setClassname('Raid');
		$this->setPackage('wrap');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('IDRAID', 'Idraid', 'INTEGER', true, null, null);
		$this->addColumn('DATE', 'Date', 'VARCHAR', false, 45, null);
		$this->addForeignKey('RAIDPERIOD_IDRAIDPERIOD', 'RaidperiodIdraidperiod', 'INTEGER', 'RaidPeriod', 'IDRAIDPERIOD', true, null, null);
		$this->addColumn('STATUS', 'Status', 'VARCHAR', false, 45, null);
		$this->addColumn('COMMENT', 'Comment', 'LONGVARCHAR', false, null, null);
		$this->addColumn('ANALYSED', 'Analysed', 'BOOLEAN', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Raidperiod', 'Raidperiod', RelationMap::MANY_TO_ONE, array('RaidPeriod_idRaidPeriod' => 'idRaidPeriod', ), null, null);
    $this->addRelation('Loot', 'Loot', RelationMap::ONE_TO_MANY, array('idRaid' => 'Raid_idRaid', ), null, null);
    $this->addRelation('RaidHasPlayer', 'RaidHasPlayer', RelationMap::ONE_TO_MANY, array('idRaid' => 'Raid_idRaid', ), null, null);
	} // buildRelations()

} // RaidTableMap
