<?php



/**
 * This class defines the structure of the 'RaidPeriod' table.
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
class RaidperiodTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'wrap.map.RaidperiodTableMap';

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
		$this->setName('RaidPeriod');
		$this->setPhpName('Raidperiod');
		$this->setClassname('Raidperiod');
		$this->setPackage('wrap');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('IDRAIDPERIOD', 'Idraidperiod', 'INTEGER', true, null, null);
		$this->addColumn('STATUS', 'Status', 'VARCHAR', false, 45, null);
		$this->addColumn('ANALYSED', 'Analysed', 'BOOLEAN', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Raid', 'Raid', RelationMap::ONE_TO_MANY, array('idRaidPeriod' => 'RaidPeriod_idRaidPeriod', ), null, null);
	} // buildRelations()

} // RaidperiodTableMap
