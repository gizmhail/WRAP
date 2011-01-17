<?php


/**
 * Base class that represents a query for the 'Raid' table.
 *
 * 
 *
 * @method     RaidQuery orderByIdraid($order = Criteria::ASC) Order by the idRaid column
 * @method     RaidQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     RaidQuery orderByRaidperiodIdraidperiod($order = Criteria::ASC) Order by the RaidPeriod_idRaidPeriod column
 * @method     RaidQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     RaidQuery orderByComment($order = Criteria::ASC) Order by the comment column
 * @method     RaidQuery orderByAnalysed($order = Criteria::ASC) Order by the analysed column
 *
 * @method     RaidQuery groupByIdraid() Group by the idRaid column
 * @method     RaidQuery groupByDate() Group by the date column
 * @method     RaidQuery groupByRaidperiodIdraidperiod() Group by the RaidPeriod_idRaidPeriod column
 * @method     RaidQuery groupByStatus() Group by the status column
 * @method     RaidQuery groupByComment() Group by the comment column
 * @method     RaidQuery groupByAnalysed() Group by the analysed column
 *
 * @method     RaidQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     RaidQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     RaidQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     RaidQuery leftJoinRaidperiod($relationAlias = null) Adds a LEFT JOIN clause to the query using the Raidperiod relation
 * @method     RaidQuery rightJoinRaidperiod($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Raidperiod relation
 * @method     RaidQuery innerJoinRaidperiod($relationAlias = null) Adds a INNER JOIN clause to the query using the Raidperiod relation
 *
 * @method     RaidQuery leftJoinLoot($relationAlias = null) Adds a LEFT JOIN clause to the query using the Loot relation
 * @method     RaidQuery rightJoinLoot($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Loot relation
 * @method     RaidQuery innerJoinLoot($relationAlias = null) Adds a INNER JOIN clause to the query using the Loot relation
 *
 * @method     RaidQuery leftJoinRaidHasPlayer($relationAlias = null) Adds a LEFT JOIN clause to the query using the RaidHasPlayer relation
 * @method     RaidQuery rightJoinRaidHasPlayer($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RaidHasPlayer relation
 * @method     RaidQuery innerJoinRaidHasPlayer($relationAlias = null) Adds a INNER JOIN clause to the query using the RaidHasPlayer relation
 *
 * @method     Raid findOne(PropelPDO $con = null) Return the first Raid matching the query
 * @method     Raid findOneOrCreate(PropelPDO $con = null) Return the first Raid matching the query, or a new Raid object populated from the query conditions when no match is found
 *
 * @method     Raid findOneByIdraid(int $idRaid) Return the first Raid filtered by the idRaid column
 * @method     Raid findOneByDate(string $date) Return the first Raid filtered by the date column
 * @method     Raid findOneByRaidperiodIdraidperiod(int $RaidPeriod_idRaidPeriod) Return the first Raid filtered by the RaidPeriod_idRaidPeriod column
 * @method     Raid findOneByStatus(string $status) Return the first Raid filtered by the status column
 * @method     Raid findOneByComment(string $comment) Return the first Raid filtered by the comment column
 * @method     Raid findOneByAnalysed(boolean $analysed) Return the first Raid filtered by the analysed column
 *
 * @method     array findByIdraid(int $idRaid) Return Raid objects filtered by the idRaid column
 * @method     array findByDate(string $date) Return Raid objects filtered by the date column
 * @method     array findByRaidperiodIdraidperiod(int $RaidPeriod_idRaidPeriod) Return Raid objects filtered by the RaidPeriod_idRaidPeriod column
 * @method     array findByStatus(string $status) Return Raid objects filtered by the status column
 * @method     array findByComment(string $comment) Return Raid objects filtered by the comment column
 * @method     array findByAnalysed(boolean $analysed) Return Raid objects filtered by the analysed column
 *
 * @package    propel.generator.wrap.om
 */
abstract class BaseRaidQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseRaidQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'wrap', $modelName = 'Raid', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new RaidQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    RaidQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof RaidQuery) {
			return $criteria;
		}
		$query = new RaidQuery();
		if (null !== $modelAlias) {
			$query->setModelAlias($modelAlias);
		}
		if ($criteria instanceof Criteria) {
			$query->mergeWith($criteria);
		}
		return $query;
	}

	/**
	 * Find object by primary key
	 * Use instance pooling to avoid a database query if the object exists
	 * <code>
	 * $obj  = $c->findPk(12, $con);
	 * </code>
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    Raid|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = RaidPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
			// the object is alredy in the instance pool
			return $obj;
		} else {
			// the object has not been requested yet, or the formatter is not an object formatter
			$criteria = $this->isKeepQuery() ? clone $this : $this;
			$stmt = $criteria
				->filterByPrimaryKey($key)
				->getSelectStatement($con);
			return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
		}
	}

	/**
	 * Find objects by primary key
	 * <code>
	 * $objs = $c->findPks(array(12, 56, 832), $con);
	 * </code>
	 * @param     array $keys Primary keys to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    PropelObjectCollection|array|mixed the list of results, formatted by the current formatter
	 */
	public function findPks($keys, $con = null)
	{	
		$criteria = $this->isKeepQuery() ? clone $this : $this;
		return $this
			->filterByPrimaryKeys($keys)
			->find($con);
	}

	/**
	 * Filter the query by primary key
	 *
	 * @param     mixed $key Primary key to use for the query
	 *
	 * @return    RaidQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(RaidPeer::IDRAID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    RaidQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(RaidPeer::IDRAID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the idRaid column
	 * 
	 * @param     int|array $idraid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RaidQuery The current query, for fluid interface
	 */
	public function filterByIdraid($idraid = null, $comparison = null)
	{
		if (is_array($idraid) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(RaidPeer::IDRAID, $idraid, $comparison);
	}

	/**
	 * Filter the query on the date column
	 * 
	 * @param     string $date The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RaidQuery The current query, for fluid interface
	 */
	public function filterByDate($date = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($date)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $date)) {
				$date = str_replace('*', '%', $date);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(RaidPeer::DATE, $date, $comparison);
	}

	/**
	 * Filter the query on the RaidPeriod_idRaidPeriod column
	 * 
	 * @param     int|array $raidperiodIdraidperiod The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RaidQuery The current query, for fluid interface
	 */
	public function filterByRaidperiodIdraidperiod($raidperiodIdraidperiod = null, $comparison = null)
	{
		if (is_array($raidperiodIdraidperiod)) {
			$useMinMax = false;
			if (isset($raidperiodIdraidperiod['min'])) {
				$this->addUsingAlias(RaidPeer::RAIDPERIOD_IDRAIDPERIOD, $raidperiodIdraidperiod['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($raidperiodIdraidperiod['max'])) {
				$this->addUsingAlias(RaidPeer::RAIDPERIOD_IDRAIDPERIOD, $raidperiodIdraidperiod['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(RaidPeer::RAIDPERIOD_IDRAIDPERIOD, $raidperiodIdraidperiod, $comparison);
	}

	/**
	 * Filter the query on the status column
	 * 
	 * @param     string $status The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RaidQuery The current query, for fluid interface
	 */
	public function filterByStatus($status = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($status)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $status)) {
				$status = str_replace('*', '%', $status);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(RaidPeer::STATUS, $status, $comparison);
	}

	/**
	 * Filter the query on the comment column
	 * 
	 * @param     string $comment The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RaidQuery The current query, for fluid interface
	 */
	public function filterByComment($comment = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($comment)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $comment)) {
				$comment = str_replace('*', '%', $comment);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(RaidPeer::COMMENT, $comment, $comparison);
	}

	/**
	 * Filter the query on the analysed column
	 * 
	 * @param     boolean|string $analysed The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RaidQuery The current query, for fluid interface
	 */
	public function filterByAnalysed($analysed = null, $comparison = null)
	{
		if (is_string($analysed)) {
			$analysed = in_array(strtolower($analysed), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(RaidPeer::ANALYSED, $analysed, $comparison);
	}

	/**
	 * Filter the query by a related Raidperiod object
	 *
	 * @param     Raidperiod $raidperiod  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RaidQuery The current query, for fluid interface
	 */
	public function filterByRaidperiod($raidperiod, $comparison = null)
	{
		return $this
			->addUsingAlias(RaidPeer::RAIDPERIOD_IDRAIDPERIOD, $raidperiod->getIdraidperiod(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Raidperiod relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    RaidQuery The current query, for fluid interface
	 */
	public function joinRaidperiod($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Raidperiod');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'Raidperiod');
		}
		
		return $this;
	}

	/**
	 * Use the Raidperiod relation Raidperiod object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    RaidperiodQuery A secondary query class using the current class as primary query
	 */
	public function useRaidperiodQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinRaidperiod($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Raidperiod', 'RaidperiodQuery');
	}

	/**
	 * Filter the query by a related Loot object
	 *
	 * @param     Loot $loot  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RaidQuery The current query, for fluid interface
	 */
	public function filterByLoot($loot, $comparison = null)
	{
		return $this
			->addUsingAlias(RaidPeer::IDRAID, $loot->getRaidIdraid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Loot relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    RaidQuery The current query, for fluid interface
	 */
	public function joinLoot($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Loot');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'Loot');
		}
		
		return $this;
	}

	/**
	 * Use the Loot relation Loot object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    LootQuery A secondary query class using the current class as primary query
	 */
	public function useLootQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinLoot($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Loot', 'LootQuery');
	}

	/**
	 * Filter the query by a related RaidHasPlayer object
	 *
	 * @param     RaidHasPlayer $raidHasPlayer  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RaidQuery The current query, for fluid interface
	 */
	public function filterByRaidHasPlayer($raidHasPlayer, $comparison = null)
	{
		return $this
			->addUsingAlias(RaidPeer::IDRAID, $raidHasPlayer->getRaidIdraid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the RaidHasPlayer relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    RaidQuery The current query, for fluid interface
	 */
	public function joinRaidHasPlayer($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('RaidHasPlayer');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'RaidHasPlayer');
		}
		
		return $this;
	}

	/**
	 * Use the RaidHasPlayer relation RaidHasPlayer object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    RaidHasPlayerQuery A secondary query class using the current class as primary query
	 */
	public function useRaidHasPlayerQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinRaidHasPlayer($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'RaidHasPlayer', 'RaidHasPlayerQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Raid $raid Object to remove from the list of results
	 *
	 * @return    RaidQuery The current query, for fluid interface
	 */
	public function prune($raid = null)
	{
		if ($raid) {
			$this->addUsingAlias(RaidPeer::IDRAID, $raid->getIdraid(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseRaidQuery
