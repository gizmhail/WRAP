<?php


/**
 * Base class that represents a query for the 'PlayerSpecialization_has_Buff' table.
 *
 * 
 *
 * @method     PlayerspecializationHasBuffQuery orderByPlayerspecializationIdplayerspecialization($order = Criteria::ASC) Order by the PlayerSpecialization_idPlayerSpecialization column
 * @method     PlayerspecializationHasBuffQuery orderByBuffIdbuff($order = Criteria::ASC) Order by the Buff_idBuff column
 *
 * @method     PlayerspecializationHasBuffQuery groupByPlayerspecializationIdplayerspecialization() Group by the PlayerSpecialization_idPlayerSpecialization column
 * @method     PlayerspecializationHasBuffQuery groupByBuffIdbuff() Group by the Buff_idBuff column
 *
 * @method     PlayerspecializationHasBuffQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     PlayerspecializationHasBuffQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     PlayerspecializationHasBuffQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     PlayerspecializationHasBuffQuery leftJoinPlayerspecialization($relationAlias = null) Adds a LEFT JOIN clause to the query using the Playerspecialization relation
 * @method     PlayerspecializationHasBuffQuery rightJoinPlayerspecialization($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Playerspecialization relation
 * @method     PlayerspecializationHasBuffQuery innerJoinPlayerspecialization($relationAlias = null) Adds a INNER JOIN clause to the query using the Playerspecialization relation
 *
 * @method     PlayerspecializationHasBuffQuery leftJoinBuff($relationAlias = null) Adds a LEFT JOIN clause to the query using the Buff relation
 * @method     PlayerspecializationHasBuffQuery rightJoinBuff($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Buff relation
 * @method     PlayerspecializationHasBuffQuery innerJoinBuff($relationAlias = null) Adds a INNER JOIN clause to the query using the Buff relation
 *
 * @method     PlayerspecializationHasBuff findOne(PropelPDO $con = null) Return the first PlayerspecializationHasBuff matching the query
 * @method     PlayerspecializationHasBuff findOneOrCreate(PropelPDO $con = null) Return the first PlayerspecializationHasBuff matching the query, or a new PlayerspecializationHasBuff object populated from the query conditions when no match is found
 *
 * @method     PlayerspecializationHasBuff findOneByPlayerspecializationIdplayerspecialization(int $PlayerSpecialization_idPlayerSpecialization) Return the first PlayerspecializationHasBuff filtered by the PlayerSpecialization_idPlayerSpecialization column
 * @method     PlayerspecializationHasBuff findOneByBuffIdbuff(int $Buff_idBuff) Return the first PlayerspecializationHasBuff filtered by the Buff_idBuff column
 *
 * @method     array findByPlayerspecializationIdplayerspecialization(int $PlayerSpecialization_idPlayerSpecialization) Return PlayerspecializationHasBuff objects filtered by the PlayerSpecialization_idPlayerSpecialization column
 * @method     array findByBuffIdbuff(int $Buff_idBuff) Return PlayerspecializationHasBuff objects filtered by the Buff_idBuff column
 *
 * @package    propel.generator.wrap.om
 */
abstract class BasePlayerspecializationHasBuffQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BasePlayerspecializationHasBuffQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'wrap', $modelName = 'PlayerspecializationHasBuff', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new PlayerspecializationHasBuffQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    PlayerspecializationHasBuffQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof PlayerspecializationHasBuffQuery) {
			return $criteria;
		}
		$query = new PlayerspecializationHasBuffQuery();
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
	 * <code>
	 * $obj = $c->findPk(array(12, 34), $con);
	 * </code>
	 * @param     array[$PlayerSpecialization_idPlayerSpecialization, $Buff_idBuff] $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    PlayerspecializationHasBuff|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = PlayerspecializationHasBuffPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
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
	 * @return    PlayerspecializationHasBuffQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		$this->addUsingAlias(PlayerspecializationHasBuffPeer::PLAYERSPECIALIZATION_IDPLAYERSPECIALIZATION, $key[0], Criteria::EQUAL);
		$this->addUsingAlias(PlayerspecializationHasBuffPeer::BUFF_IDBUFF, $key[1], Criteria::EQUAL);
		
		return $this;
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    PlayerspecializationHasBuffQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		if (empty($keys)) {
			return $this->add(null, '1<>1', Criteria::CUSTOM);
		}
		foreach ($keys as $key) {
			$cton0 = $this->getNewCriterion(PlayerspecializationHasBuffPeer::PLAYERSPECIALIZATION_IDPLAYERSPECIALIZATION, $key[0], Criteria::EQUAL);
			$cton1 = $this->getNewCriterion(PlayerspecializationHasBuffPeer::BUFF_IDBUFF, $key[1], Criteria::EQUAL);
			$cton0->addAnd($cton1);
			$this->addOr($cton0);
		}
		
		return $this;
	}

	/**
	 * Filter the query on the PlayerSpecialization_idPlayerSpecialization column
	 * 
	 * @param     int|array $playerspecializationIdplayerspecialization The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PlayerspecializationHasBuffQuery The current query, for fluid interface
	 */
	public function filterByPlayerspecializationIdplayerspecialization($playerspecializationIdplayerspecialization = null, $comparison = null)
	{
		if (is_array($playerspecializationIdplayerspecialization) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(PlayerspecializationHasBuffPeer::PLAYERSPECIALIZATION_IDPLAYERSPECIALIZATION, $playerspecializationIdplayerspecialization, $comparison);
	}

	/**
	 * Filter the query on the Buff_idBuff column
	 * 
	 * @param     int|array $buffIdbuff The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PlayerspecializationHasBuffQuery The current query, for fluid interface
	 */
	public function filterByBuffIdbuff($buffIdbuff = null, $comparison = null)
	{
		if (is_array($buffIdbuff) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(PlayerspecializationHasBuffPeer::BUFF_IDBUFF, $buffIdbuff, $comparison);
	}

	/**
	 * Filter the query by a related Playerspecialization object
	 *
	 * @param     Playerspecialization $playerspecialization  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PlayerspecializationHasBuffQuery The current query, for fluid interface
	 */
	public function filterByPlayerspecialization($playerspecialization, $comparison = null)
	{
		return $this
			->addUsingAlias(PlayerspecializationHasBuffPeer::PLAYERSPECIALIZATION_IDPLAYERSPECIALIZATION, $playerspecialization->getIdplayerspecialization(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Playerspecialization relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PlayerspecializationHasBuffQuery The current query, for fluid interface
	 */
	public function joinPlayerspecialization($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Playerspecialization');
		
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
			$this->addJoinObject($join, 'Playerspecialization');
		}
		
		return $this;
	}

	/**
	 * Use the Playerspecialization relation Playerspecialization object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PlayerspecializationQuery A secondary query class using the current class as primary query
	 */
	public function usePlayerspecializationQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinPlayerspecialization($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Playerspecialization', 'PlayerspecializationQuery');
	}

	/**
	 * Filter the query by a related Buff object
	 *
	 * @param     Buff $buff  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PlayerspecializationHasBuffQuery The current query, for fluid interface
	 */
	public function filterByBuff($buff, $comparison = null)
	{
		return $this
			->addUsingAlias(PlayerspecializationHasBuffPeer::BUFF_IDBUFF, $buff->getIdbuff(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Buff relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PlayerspecializationHasBuffQuery The current query, for fluid interface
	 */
	public function joinBuff($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Buff');
		
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
			$this->addJoinObject($join, 'Buff');
		}
		
		return $this;
	}

	/**
	 * Use the Buff relation Buff object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    BuffQuery A secondary query class using the current class as primary query
	 */
	public function useBuffQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinBuff($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Buff', 'BuffQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     PlayerspecializationHasBuff $playerspecializationHasBuff Object to remove from the list of results
	 *
	 * @return    PlayerspecializationHasBuffQuery The current query, for fluid interface
	 */
	public function prune($playerspecializationHasBuff = null)
	{
		if ($playerspecializationHasBuff) {
			$this->addCond('pruneCond0', $this->getAliasedColName(PlayerspecializationHasBuffPeer::PLAYERSPECIALIZATION_IDPLAYERSPECIALIZATION), $playerspecializationHasBuff->getPlayerspecializationIdplayerspecialization(), Criteria::NOT_EQUAL);
			$this->addCond('pruneCond1', $this->getAliasedColName(PlayerspecializationHasBuffPeer::BUFF_IDBUFF), $playerspecializationHasBuff->getBuffIdbuff(), Criteria::NOT_EQUAL);
			$this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
	  }
	  
		return $this;
	}

} // BasePlayerspecializationHasBuffQuery
