<?php



/**
 * This class defines the structure of the 'Buff' table.
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
class BuffTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'wrap.map.BuffTableMap';

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
		$this->setName('Buff');
		$this->setPhpName('Buff');
		$this->setClassname('Buff');
		$this->setPackage('wrap');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('IDBUFF', 'Idbuff', 'INTEGER', true, null, null);
		$this->addColumn('ICON', 'Icon', 'VARCHAR', false, 1000, null);
		$this->addColumn('TEXT', 'Text', 'VARCHAR', false, 100, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('PlayerspecializationHasBuff', 'PlayerspecializationHasBuff', RelationMap::ONE_TO_MANY, array('idBuff' => 'Buff_idBuff', ), null, null);
	} // buildRelations()

} // BuffTableMap
