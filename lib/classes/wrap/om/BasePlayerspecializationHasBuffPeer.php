<?php


/**
 * Base static class for performing query and update operations on the 'PlayerSpecialization_has_Buff' table.
 *
 * 
 *
 * @package    propel.generator.wrap.om
 */
abstract class BasePlayerspecializationHasBuffPeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'wrap';

	/** the table name for this class */
	const TABLE_NAME = 'PlayerSpecialization_has_Buff';

	/** the related Propel class for this table */
	const OM_CLASS = 'PlayerspecializationHasBuff';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'wrap.PlayerspecializationHasBuff';

	/** the related TableMap class for this table */
	const TM_CLASS = 'PlayerspecializationHasBuffTableMap';
	
	/** The total number of columns. */
	const NUM_COLUMNS = 2;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;

	/** the column name for the PLAYERSPECIALIZATION_IDPLAYERSPECIALIZATION field */
	const PLAYERSPECIALIZATION_IDPLAYERSPECIALIZATION = 'PlayerSpecialization_has_Buff.PLAYERSPECIALIZATION_IDPLAYERSPECIALIZATION';

	/** the column name for the BUFF_IDBUFF field */
	const BUFF_IDBUFF = 'PlayerSpecialization_has_Buff.BUFF_IDBUFF';

	/**
	 * An identiy map to hold any loaded instances of PlayerspecializationHasBuff objects.
	 * This must be public so that other peer classes can access this when hydrating from JOIN
	 * queries.
	 * @var        array PlayerspecializationHasBuff[]
	 */
	public static $instances = array();


	/**
	 * holds an array of fieldnames
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
	 */
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('PlayerspecializationIdplayerspecialization', 'BuffIdbuff', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('playerspecializationIdplayerspecialization', 'buffIdbuff', ),
		BasePeer::TYPE_COLNAME => array (self::PLAYERSPECIALIZATION_IDPLAYERSPECIALIZATION, self::BUFF_IDBUFF, ),
		BasePeer::TYPE_RAW_COLNAME => array ('PLAYERSPECIALIZATION_IDPLAYERSPECIALIZATION', 'BUFF_IDBUFF', ),
		BasePeer::TYPE_FIELDNAME => array ('PlayerSpecialization_idPlayerSpecialization', 'Buff_idBuff', ),
		BasePeer::TYPE_NUM => array (0, 1, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('PlayerspecializationIdplayerspecialization' => 0, 'BuffIdbuff' => 1, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('playerspecializationIdplayerspecialization' => 0, 'buffIdbuff' => 1, ),
		BasePeer::TYPE_COLNAME => array (self::PLAYERSPECIALIZATION_IDPLAYERSPECIALIZATION => 0, self::BUFF_IDBUFF => 1, ),
		BasePeer::TYPE_RAW_COLNAME => array ('PLAYERSPECIALIZATION_IDPLAYERSPECIALIZATION' => 0, 'BUFF_IDBUFF' => 1, ),
		BasePeer::TYPE_FIELDNAME => array ('PlayerSpecialization_idPlayerSpecialization' => 0, 'Buff_idBuff' => 1, ),
		BasePeer::TYPE_NUM => array (0, 1, )
	);

	/**
	 * Translates a fieldname to another type
	 *
	 * @param      string $name field name
	 * @param      string $fromType One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                         BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @param      string $toType   One of the class type constants
	 * @return     string translated name of the field.
	 * @throws     PropelException - if the specified name could not be found in the fieldname mappings.
	 */
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	/**
	 * Returns an array of field names.
	 *
	 * @param      string $type The type of fieldnames to return:
	 *                      One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                      BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     array A list of field names
	 */

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	/**
	 * Convenience method which changes table.column to alias.column.
	 *
	 * Using this method you can maintain SQL abstraction while using column aliases.
	 * <code>
	 *		$c->addAlias("alias1", TablePeer::TABLE_NAME);
	 *		$c->addJoin(TablePeer::alias("alias1", TablePeer::PRIMARY_KEY_COLUMN), TablePeer::PRIMARY_KEY_COLUMN);
	 * </code>
	 * @param      string $alias The alias for the current table.
	 * @param      string $column The column name for current table. (i.e. PlayerspecializationHasBuffPeer::COLUMN_NAME).
	 * @return     string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(PlayerspecializationHasBuffPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	/**
	 * Add all the columns needed to create a new object.
	 *
	 * Note: any columns that were marked with lazyLoad="true" in the
	 * XML schema will not be added to the select list and only loaded
	 * on demand.
	 *
	 * @param      Criteria $criteria object containing the columns to add.
	 * @param      string   $alias    optional table alias
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function addSelectColumns(Criteria $criteria, $alias = null)
	{
		if (null === $alias) {
			$criteria->addSelectColumn(PlayerspecializationHasBuffPeer::PLAYERSPECIALIZATION_IDPLAYERSPECIALIZATION);
			$criteria->addSelectColumn(PlayerspecializationHasBuffPeer::BUFF_IDBUFF);
		} else {
			$criteria->addSelectColumn($alias . '.PLAYERSPECIALIZATION_IDPLAYERSPECIALIZATION');
			$criteria->addSelectColumn($alias . '.BUFF_IDBUFF');
		}
	}

	/**
	 * Returns the number of rows matching criteria.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @return     int Number of matching rows.
	 */
	public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
	{
		// we may modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(PlayerspecializationHasBuffPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			PlayerspecializationHasBuffPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		$criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

		if ($con === null) {
			$con = Propel::getConnection(PlayerspecializationHasBuffPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
		// BasePeer returns a PDOStatement
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}
	/**
	 * Method to select one object from the DB.
	 *
	 * @param      Criteria $criteria object used to create the SELECT statement.
	 * @param      PropelPDO $con
	 * @return     PlayerspecializationHasBuff
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = PlayerspecializationHasBuffPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	/**
	 * Method to do selects.
	 *
	 * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
	 * @param      PropelPDO $con
	 * @return     array Array of selected Objects
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelect(Criteria $criteria, PropelPDO $con = null)
	{
		return PlayerspecializationHasBuffPeer::populateObjects(PlayerspecializationHasBuffPeer::doSelectStmt($criteria, $con));
	}
	/**
	 * Prepares the Criteria object and uses the parent doSelect() method to execute a PDOStatement.
	 *
	 * Use this method directly if you want to work with an executed statement durirectly (for example
	 * to perform your own object hydration).
	 *
	 * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
	 * @param      PropelPDO $con The connection to use
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 * @return     PDOStatement The executed PDOStatement object.
	 * @see        BasePeer::doSelect()
	 */
	public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(PlayerspecializationHasBuffPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			PlayerspecializationHasBuffPeer::addSelectColumns($criteria);
		}

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		// BasePeer returns a PDOStatement
		return BasePeer::doSelect($criteria, $con);
	}
	/**
	 * Adds an object to the instance pool.
	 *
	 * Propel keeps cached copies of objects in an instance pool when they are retrieved
	 * from the database.  In some cases -- especially when you override doSelect*()
	 * methods in your stub classes -- you may need to explicitly add objects
	 * to the cache in order to ensure that the same objects are always returned by doSelect*()
	 * and retrieveByPK*() calls.
	 *
	 * @param      PlayerspecializationHasBuff $value A PlayerspecializationHasBuff object.
	 * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
	 */
	public static function addInstanceToPool(PlayerspecializationHasBuff $obj, $key = null)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if ($key === null) {
				$key = serialize(array((string) $obj->getPlayerspecializationIdplayerspecialization(), (string) $obj->getBuffIdbuff()));
			} // if key === null
			self::$instances[$key] = $obj;
		}
	}

	/**
	 * Removes an object from the instance pool.
	 *
	 * Propel keeps cached copies of objects in an instance pool when they are retrieved
	 * from the database.  In some cases -- especially when you override doDelete
	 * methods in your stub classes -- you may need to explicitly remove objects
	 * from the cache in order to prevent returning objects that no longer exist.
	 *
	 * @param      mixed $value A PlayerspecializationHasBuff object or a primary key value.
	 */
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof PlayerspecializationHasBuff) {
				$key = serialize(array((string) $value->getPlayerspecializationIdplayerspecialization(), (string) $value->getBuffIdbuff()));
			} elseif (is_array($value) && count($value) === 2) {
				// assume we've been passed a primary key
				$key = serialize(array((string) $value[0], (string) $value[1]));
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or PlayerspecializationHasBuff object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
				throw $e;
			}

			unset(self::$instances[$key]);
		}
	} // removeInstanceFromPool()

	/**
	 * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
	 *
	 * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
	 * a multi-column primary key, a serialize()d version of the primary key will be returned.
	 *
	 * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
	 * @return     PlayerspecializationHasBuff Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
	 * @see        getPrimaryKeyHash()
	 */
	public static function getInstanceFromPool($key)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if (isset(self::$instances[$key])) {
				return self::$instances[$key];
			}
		}
		return null; // just to be explicit
	}
	
	/**
	 * Clear the instance pool.
	 *
	 * @return     void
	 */
	public static function clearInstancePool()
	{
		self::$instances = array();
	}
	
	/**
	 * Method to invalidate the instance pool of all tables related to PlayerSpecialization_has_Buff
	 * by a foreign key with ON DELETE CASCADE
	 */
	public static function clearRelatedInstancePool()
	{
	}

	/**
	 * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
	 *
	 * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
	 * a multi-column primary key, a serialize()d version of the primary key will be returned.
	 *
	 * @param      array $row PropelPDO resultset row.
	 * @param      int $startcol The 0-based offset for reading from the resultset row.
	 * @return     string A string version of PK or NULL if the components of primary key in result array are all null.
	 */
	public static function getPrimaryKeyHashFromRow($row, $startcol = 0)
	{
		// If the PK cannot be derived from the row, return NULL.
		if ($row[$startcol] === null && $row[$startcol + 1] === null) {
			return null;
		}
		return serialize(array((string) $row[$startcol], (string) $row[$startcol + 1]));
	}

	/**
	 * Retrieves the primary key from the DB resultset row 
	 * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
	 * a multi-column primary key, an array of the primary key columns will be returned.
	 *
	 * @param      array $row PropelPDO resultset row.
	 * @param      int $startcol The 0-based offset for reading from the resultset row.
	 * @return     mixed The primary key of the row
	 */
	public static function getPrimaryKeyFromRow($row, $startcol = 0)
	{
		return array((int) $row[$startcol], (int) $row[$startcol + 1]);
	}
	
	/**
	 * The returned array will contain objects of the default type or
	 * objects that inherit from the default.
	 *
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function populateObjects(PDOStatement $stmt)
	{
		$results = array();
	
		// set the class once to avoid overhead in the loop
		$cls = PlayerspecializationHasBuffPeer::getOMClass(false);
		// populate the object(s)
		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = PlayerspecializationHasBuffPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = PlayerspecializationHasBuffPeer::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				PlayerspecializationHasBuffPeer::addInstanceToPool($obj, $key);
			} // if key exists
		}
		$stmt->closeCursor();
		return $results;
	}
	/**
	 * Populates an object of the default type or an object that inherit from the default.
	 *
	 * @param      array $row PropelPDO resultset row.
	 * @param      int $startcol The 0-based offset for reading from the resultset row.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 * @return     array (PlayerspecializationHasBuff object, last column rank)
	 */
	public static function populateObject($row, $startcol = 0)
	{
		$key = PlayerspecializationHasBuffPeer::getPrimaryKeyHashFromRow($row, $startcol);
		if (null !== ($obj = PlayerspecializationHasBuffPeer::getInstanceFromPool($key))) {
			// We no longer rehydrate the object, since this can cause data loss.
			// See http://www.propelorm.org/ticket/509
			// $obj->hydrate($row, $startcol, true); // rehydrate
			$col = $startcol + PlayerspecializationHasBuffPeer::NUM_COLUMNS;
		} else {
			$cls = PlayerspecializationHasBuffPeer::OM_CLASS;
			$obj = new $cls();
			$col = $obj->hydrate($row, $startcol);
			PlayerspecializationHasBuffPeer::addInstanceToPool($obj, $key);
		}
		return array($obj, $col);
	}

	/**
	 * Returns the number of rows matching criteria, joining the related Playerspecialization table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinPlayerspecialization(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(PlayerspecializationHasBuffPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			PlayerspecializationHasBuffPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(PlayerspecializationHasBuffPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(PlayerspecializationHasBuffPeer::PLAYERSPECIALIZATION_IDPLAYERSPECIALIZATION, PlayerspecializationPeer::IDPLAYERSPECIALIZATION, $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}


	/**
	 * Returns the number of rows matching criteria, joining the related Buff table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinBuff(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(PlayerspecializationHasBuffPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			PlayerspecializationHasBuffPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(PlayerspecializationHasBuffPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(PlayerspecializationHasBuffPeer::BUFF_IDBUFF, BuffPeer::IDBUFF, $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}


	/**
	 * Selects a collection of PlayerspecializationHasBuff objects pre-filled with their Playerspecialization objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of PlayerspecializationHasBuff objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinPlayerspecialization(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		PlayerspecializationHasBuffPeer::addSelectColumns($criteria);
		$startcol = (PlayerspecializationHasBuffPeer::NUM_COLUMNS - PlayerspecializationHasBuffPeer::NUM_LAZY_LOAD_COLUMNS);
		PlayerspecializationPeer::addSelectColumns($criteria);

		$criteria->addJoin(PlayerspecializationHasBuffPeer::PLAYERSPECIALIZATION_IDPLAYERSPECIALIZATION, PlayerspecializationPeer::IDPLAYERSPECIALIZATION, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = PlayerspecializationHasBuffPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = PlayerspecializationHasBuffPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = PlayerspecializationHasBuffPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				PlayerspecializationHasBuffPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = PlayerspecializationPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = PlayerspecializationPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = PlayerspecializationPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					PlayerspecializationPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (PlayerspecializationHasBuff) to $obj2 (Playerspecialization)
				$obj2->addPlayerspecializationHasBuff($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of PlayerspecializationHasBuff objects pre-filled with their Buff objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of PlayerspecializationHasBuff objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinBuff(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		PlayerspecializationHasBuffPeer::addSelectColumns($criteria);
		$startcol = (PlayerspecializationHasBuffPeer::NUM_COLUMNS - PlayerspecializationHasBuffPeer::NUM_LAZY_LOAD_COLUMNS);
		BuffPeer::addSelectColumns($criteria);

		$criteria->addJoin(PlayerspecializationHasBuffPeer::BUFF_IDBUFF, BuffPeer::IDBUFF, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = PlayerspecializationHasBuffPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = PlayerspecializationHasBuffPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = PlayerspecializationHasBuffPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				PlayerspecializationHasBuffPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = BuffPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = BuffPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = BuffPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					BuffPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (PlayerspecializationHasBuff) to $obj2 (Buff)
				$obj2->addPlayerspecializationHasBuff($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Returns the number of rows matching criteria, joining all related tables
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(PlayerspecializationHasBuffPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			PlayerspecializationHasBuffPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(PlayerspecializationHasBuffPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(PlayerspecializationHasBuffPeer::PLAYERSPECIALIZATION_IDPLAYERSPECIALIZATION, PlayerspecializationPeer::IDPLAYERSPECIALIZATION, $join_behavior);

		$criteria->addJoin(PlayerspecializationHasBuffPeer::BUFF_IDBUFF, BuffPeer::IDBUFF, $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}

	/**
	 * Selects a collection of PlayerspecializationHasBuff objects pre-filled with all related objects.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of PlayerspecializationHasBuff objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		PlayerspecializationHasBuffPeer::addSelectColumns($criteria);
		$startcol2 = (PlayerspecializationHasBuffPeer::NUM_COLUMNS - PlayerspecializationHasBuffPeer::NUM_LAZY_LOAD_COLUMNS);

		PlayerspecializationPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (PlayerspecializationPeer::NUM_COLUMNS - PlayerspecializationPeer::NUM_LAZY_LOAD_COLUMNS);

		BuffPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (BuffPeer::NUM_COLUMNS - BuffPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(PlayerspecializationHasBuffPeer::PLAYERSPECIALIZATION_IDPLAYERSPECIALIZATION, PlayerspecializationPeer::IDPLAYERSPECIALIZATION, $join_behavior);

		$criteria->addJoin(PlayerspecializationHasBuffPeer::BUFF_IDBUFF, BuffPeer::IDBUFF, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = PlayerspecializationHasBuffPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = PlayerspecializationHasBuffPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = PlayerspecializationHasBuffPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				PlayerspecializationHasBuffPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

			// Add objects for joined Playerspecialization rows

			$key2 = PlayerspecializationPeer::getPrimaryKeyHashFromRow($row, $startcol2);
			if ($key2 !== null) {
				$obj2 = PlayerspecializationPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = PlayerspecializationPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					PlayerspecializationPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 loaded

				// Add the $obj1 (PlayerspecializationHasBuff) to the collection in $obj2 (Playerspecialization)
				$obj2->addPlayerspecializationHasBuff($obj1);
			} // if joined row not null

			// Add objects for joined Buff rows

			$key3 = BuffPeer::getPrimaryKeyHashFromRow($row, $startcol3);
			if ($key3 !== null) {
				$obj3 = BuffPeer::getInstanceFromPool($key3);
				if (!$obj3) {

					$cls = BuffPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					BuffPeer::addInstanceToPool($obj3, $key3);
				} // if obj3 loaded

				// Add the $obj1 (PlayerspecializationHasBuff) to the collection in $obj3 (Buff)
				$obj3->addPlayerspecializationHasBuff($obj1);
			} // if joined row not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Returns the number of rows matching criteria, joining the related Playerspecialization table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptPlayerspecialization(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(PlayerspecializationHasBuffPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			PlayerspecializationHasBuffPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(PlayerspecializationHasBuffPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(PlayerspecializationHasBuffPeer::BUFF_IDBUFF, BuffPeer::IDBUFF, $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}


	/**
	 * Returns the number of rows matching criteria, joining the related Buff table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptBuff(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(PlayerspecializationHasBuffPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			PlayerspecializationHasBuffPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(PlayerspecializationHasBuffPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(PlayerspecializationHasBuffPeer::PLAYERSPECIALIZATION_IDPLAYERSPECIALIZATION, PlayerspecializationPeer::IDPLAYERSPECIALIZATION, $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}


	/**
	 * Selects a collection of PlayerspecializationHasBuff objects pre-filled with all related objects except Playerspecialization.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of PlayerspecializationHasBuff objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptPlayerspecialization(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		PlayerspecializationHasBuffPeer::addSelectColumns($criteria);
		$startcol2 = (PlayerspecializationHasBuffPeer::NUM_COLUMNS - PlayerspecializationHasBuffPeer::NUM_LAZY_LOAD_COLUMNS);

		BuffPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (BuffPeer::NUM_COLUMNS - BuffPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(PlayerspecializationHasBuffPeer::BUFF_IDBUFF, BuffPeer::IDBUFF, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = PlayerspecializationHasBuffPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = PlayerspecializationHasBuffPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = PlayerspecializationHasBuffPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				PlayerspecializationHasBuffPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Buff rows

				$key2 = BuffPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = BuffPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = BuffPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					BuffPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (PlayerspecializationHasBuff) to the collection in $obj2 (Buff)
				$obj2->addPlayerspecializationHasBuff($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of PlayerspecializationHasBuff objects pre-filled with all related objects except Buff.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of PlayerspecializationHasBuff objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptBuff(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		PlayerspecializationHasBuffPeer::addSelectColumns($criteria);
		$startcol2 = (PlayerspecializationHasBuffPeer::NUM_COLUMNS - PlayerspecializationHasBuffPeer::NUM_LAZY_LOAD_COLUMNS);

		PlayerspecializationPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (PlayerspecializationPeer::NUM_COLUMNS - PlayerspecializationPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(PlayerspecializationHasBuffPeer::PLAYERSPECIALIZATION_IDPLAYERSPECIALIZATION, PlayerspecializationPeer::IDPLAYERSPECIALIZATION, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = PlayerspecializationHasBuffPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = PlayerspecializationHasBuffPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = PlayerspecializationHasBuffPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				PlayerspecializationHasBuffPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Playerspecialization rows

				$key2 = PlayerspecializationPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = PlayerspecializationPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = PlayerspecializationPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					PlayerspecializationPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (PlayerspecializationHasBuff) to the collection in $obj2 (Playerspecialization)
				$obj2->addPlayerspecializationHasBuff($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}

	/**
	 * Returns the TableMap related to this peer.
	 * This method is not needed for general use but a specific application could have a need.
	 * @return     TableMap
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	/**
	 * Add a TableMap instance to the database for this peer class.
	 */
	public static function buildTableMap()
	{
	  $dbMap = Propel::getDatabaseMap(BasePlayerspecializationHasBuffPeer::DATABASE_NAME);
	  if (!$dbMap->hasTable(BasePlayerspecializationHasBuffPeer::TABLE_NAME))
	  {
	    $dbMap->addTableObject(new PlayerspecializationHasBuffTableMap());
	  }
	}

	/**
	 * The class that the Peer will make instances of.
	 *
	 * If $withPrefix is true, the returned path
	 * uses a dot-path notation which is tranalted into a path
	 * relative to a location on the PHP include_path.
	 * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
	 *
	 * @param      boolean $withPrefix Whether or not to return the path with the class name
	 * @return     string path.to.ClassName
	 */
	public static function getOMClass($withPrefix = true)
	{
		return $withPrefix ? PlayerspecializationHasBuffPeer::CLASS_DEFAULT : PlayerspecializationHasBuffPeer::OM_CLASS;
	}

	/**
	 * Method perform an INSERT on the database, given a PlayerspecializationHasBuff or Criteria object.
	 *
	 * @param      mixed $values Criteria or PlayerspecializationHasBuff object containing data that is used to create the INSERT statement.
	 * @param      PropelPDO $con the PropelPDO connection to use
	 * @return     mixed The new primary key.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(PlayerspecializationHasBuffPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria(); // build Criteria from PlayerspecializationHasBuff object
		}

		if ($criteria->containsKey(PlayerspecializationHasBuffPeer::PLAYERSPECIALIZATION_IDPLAYERSPECIALIZATION) && $criteria->keyContainsValue(PlayerspecializationHasBuffPeer::PLAYERSPECIALIZATION_IDPLAYERSPECIALIZATION) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.PlayerspecializationHasBuffPeer::PLAYERSPECIALIZATION_IDPLAYERSPECIALIZATION.')');
		}


		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		try {
			// use transaction because $criteria could contain info
			// for more than one table (I guess, conceivably)
			$con->beginTransaction();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollBack();
			throw $e;
		}

		return $pk;
	}

	/**
	 * Method perform an UPDATE on the database, given a PlayerspecializationHasBuff or Criteria object.
	 *
	 * @param      mixed $values Criteria or PlayerspecializationHasBuff object containing data that is used to create the UPDATE statement.
	 * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(PlayerspecializationHasBuffPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity

			$comparison = $criteria->getComparison(PlayerspecializationHasBuffPeer::PLAYERSPECIALIZATION_IDPLAYERSPECIALIZATION);
			$value = $criteria->remove(PlayerspecializationHasBuffPeer::PLAYERSPECIALIZATION_IDPLAYERSPECIALIZATION);
			if ($value) {
				$selectCriteria->add(PlayerspecializationHasBuffPeer::PLAYERSPECIALIZATION_IDPLAYERSPECIALIZATION, $value, $comparison);
			} else {
				$selectCriteria->setPrimaryTableName(PlayerspecializationHasBuffPeer::TABLE_NAME);
			}

			$comparison = $criteria->getComparison(PlayerspecializationHasBuffPeer::BUFF_IDBUFF);
			$value = $criteria->remove(PlayerspecializationHasBuffPeer::BUFF_IDBUFF);
			if ($value) {
				$selectCriteria->add(PlayerspecializationHasBuffPeer::BUFF_IDBUFF, $value, $comparison);
			} else {
				$selectCriteria->setPrimaryTableName(PlayerspecializationHasBuffPeer::TABLE_NAME);
			}

		} else { // $values is PlayerspecializationHasBuff object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	/**
	 * Method to DELETE all rows from the PlayerSpecialization_has_Buff table.
	 *
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(PlayerspecializationHasBuffPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(PlayerspecializationHasBuffPeer::TABLE_NAME, $con, PlayerspecializationHasBuffPeer::DATABASE_NAME);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			PlayerspecializationHasBuffPeer::clearInstancePool();
			PlayerspecializationHasBuffPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Method perform a DELETE on the database, given a PlayerspecializationHasBuff or Criteria object OR a primary key value.
	 *
	 * @param      mixed $values Criteria or PlayerspecializationHasBuff object or primary key or array of primary keys
	 *              which is used to create the DELETE statement
	 * @param      PropelPDO $con the connection to use
	 * @return     int 	The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
	 *				if supported by native driver or if emulated using Propel.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	 public static function doDelete($values, PropelPDO $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(PlayerspecializationHasBuffPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			// invalidate the cache for all objects of this type, since we have no
			// way of knowing (without running a query) what objects should be invalidated
			// from the cache based on this Criteria.
			PlayerspecializationHasBuffPeer::clearInstancePool();
			// rename for clarity
			$criteria = clone $values;
		} elseif ($values instanceof PlayerspecializationHasBuff) { // it's a model object
			// invalidate the cache for this single object
			PlayerspecializationHasBuffPeer::removeInstanceFromPool($values);
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria(self::DATABASE_NAME);
			// primary key is composite; we therefore, expect
			// the primary key passed to be an array of pkey values
			if (count($values) == count($values, COUNT_RECURSIVE)) {
				// array is not multi-dimensional
				$values = array($values);
			}
			foreach ($values as $value) {
				$criterion = $criteria->getNewCriterion(PlayerspecializationHasBuffPeer::PLAYERSPECIALIZATION_IDPLAYERSPECIALIZATION, $value[0]);
				$criterion->addAnd($criteria->getNewCriterion(PlayerspecializationHasBuffPeer::BUFF_IDBUFF, $value[1]));
				$criteria->addOr($criterion);
				// we can invalidate the cache for this single PK
				PlayerspecializationHasBuffPeer::removeInstanceFromPool($value);
			}
		}

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; // initialize var to track total num of affected rows

		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			PlayerspecializationHasBuffPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Validates all modified columns of given PlayerspecializationHasBuff object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param      PlayerspecializationHasBuff $obj The object to validate.
	 * @param      mixed $cols Column name or array of column names.
	 *
	 * @return     mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate(PlayerspecializationHasBuff $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(PlayerspecializationHasBuffPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(PlayerspecializationHasBuffPeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach ($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		return BasePeer::doValidate(PlayerspecializationHasBuffPeer::DATABASE_NAME, PlayerspecializationHasBuffPeer::TABLE_NAME, $columns);
	}

	/**
	 * Retrieve object using using composite pkey values.
	 * @param      int $playerspecialization_idplayerspecialization
	 * @param      int $buff_idbuff
	 * @param      PropelPDO $con
	 * @return     PlayerspecializationHasBuff
	 */
	public static function retrieveByPK($playerspecialization_idplayerspecialization, $buff_idbuff, PropelPDO $con = null) {
		$_instancePoolKey = serialize(array((string) $playerspecialization_idplayerspecialization, (string) $buff_idbuff));
 		if (null !== ($obj = PlayerspecializationHasBuffPeer::getInstanceFromPool($_instancePoolKey))) {
 			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(PlayerspecializationHasBuffPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
		$criteria = new Criteria(PlayerspecializationHasBuffPeer::DATABASE_NAME);
		$criteria->add(PlayerspecializationHasBuffPeer::PLAYERSPECIALIZATION_IDPLAYERSPECIALIZATION, $playerspecialization_idplayerspecialization);
		$criteria->add(PlayerspecializationHasBuffPeer::BUFF_IDBUFF, $buff_idbuff);
		$v = PlayerspecializationHasBuffPeer::doSelect($criteria, $con);

		return !empty($v) ? $v[0] : null;
	}
} // BasePlayerspecializationHasBuffPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BasePlayerspecializationHasBuffPeer::buildTableMap();

