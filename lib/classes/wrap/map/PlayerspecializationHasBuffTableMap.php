<?php



/**
 * This class defines the structure of the 'PlayerSpecialization_has_Buff' table.
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
class PlayerspecializationHasBuffTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'wrap.map.PlayerspecializationHasBuffTableMap';

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
		$this->setName('PlayerSpecialization_has_Buff');
		$this->setPhpName('PlayerspecializationHasBuff');
		$this->setClassname('PlayerspecializationHasBuff');
		$this->setPackage('wrap');
		$this->setUseIdGenerator(true);
		// columns
		$this->addForeignPrimaryKey('PLAYERSPECIALIZATION_IDPLAYERSPECIALIZATION', 'PlayerspecializationIdplayerspecialization', 'INTEGER' , 'PlayerSpecialization', 'IDPLAYERSPECIALIZATION', true, null, null);
		$this->addForeignPrimaryKey('BUFF_IDBUFF', 'BuffIdbuff', 'INTEGER' , 'Buff', 'IDBUFF', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Playerspecialization', 'Playerspecialization', RelationMap::MANY_TO_ONE, array('PlayerSpecialization_idPlayerSpecialization' => 'idPlayerSpecialization', ), null, null);
    $this->addRelation('Buff', 'Buff', RelationMap::MANY_TO_ONE, array('Buff_idBuff' => 'idBuff', ), null, null);
	} // buildRelations()

} // PlayerspecializationHasBuffTableMap
