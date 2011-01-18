<?php


/**
 * Base class that represents a query for the 'Raid_has_Player' table.
 *
 * 
 *
 * @method     RaidHasPlayerQuery orderByRaidIdraid($order = Criteria::ASC) Order by the Raid_idRaid column
 * @method     RaidHasPlayerQuery orderByPlayerIdplayer($order = Criteria::ASC) Order by the Player_idPlayer column
 * @method     RaidHasPlayerQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     RaidHasPlayerQuery orderByInscription($order = Criteria::ASC) Order by the inscription column
 * @method     RaidHasPlayerQuery orderByHistory($order = Criteria::ASC) Order by the history column
 *
 * @method     RaidHasPlayerQuery groupByRaidIdraid() Group by the Raid_idRaid column
 * @method     RaidHasPlayerQuery groupByPlayerIdplayer() Group by the Player_idPlayer column
 * @method     RaidHasPlayerQuery groupByStatus() Group by the status column
 * @method     RaidHasPlayerQuery groupByInscription() Group by the inscription column
 * @method     RaidHasPlayerQuery groupByHistory() Group by the history column
 *
 * @method     RaidHasPlayerQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     RaidHasPlayerQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     RaidHasPlayerQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     RaidHasPlayerQuery leftJoinRaid($relationAlias = null) Adds a LEFT JOIN clause to the query using the Raid relation
 * @method     RaidHasPlayerQuery rightJoinRaid($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Raid relation
 * @method     RaidHasPlayerQuery innerJoinRaid($relationAlias = null) Adds a INNER JOIN clause to the query using the Raid relation
 *
 * @method     RaidHasPlayerQuery leftJoinPlayer($relationAlias = null) Adds a LEFT JOIN clause to the query using the Player relation
 * @method     RaidHasPlayerQuery rightJoinPlayer($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Player relation
 * @method     RaidHasPlayerQuery innerJoinPlayer($relationAlias = null) Adds a INNER JOIN clause to the query using the Player relation
 *
 * @method     RaidHasPlayer findOne(PropelPDO $con = null) Return the first RaidHasPlayer matching the query
 * @method     RaidHasPlayer findOneOrCreate(PropelPDO $con = null) Return the first RaidHasPlayer matching the query, or a new RaidHasPlayer object populated from the query conditions when no match is found
 *
 * @method     RaidHasPlayer findOneByRaidIdraid(int $Raid_idRaid) Return the first RaidHasPlayer filtered by the Raid_idRaid column
 * @method     RaidHasPlayer findOneByPlayerIdplayer(int $Player_idPlayer) Return the first RaidHasPlayer filtered by the Player_idPlayer column
 * @method     RaidHasPlayer findOneByStatus(string $status) Return the first RaidHasPlayer filtered by the status column
 * @method     RaidHasPlayer findOneByInscription(int $inscription) Return the first RaidHasPlayer filtered by the inscription column
 * @method     RaidHasPlayer findOneByHistory(string $history) Return the first RaidHasPlayer filtered by the history column
 *
 * @method     array findByRaidIdraid(int $Raid_idRaid) Return RaidHasPlayer objects filtered by the Raid_idRaid column
 * @method     array findByPlayerIdplayer(int $Player_idPlayer) Return RaidHasPlayer objects filtered by the Player_idPlayer column
 * @method     array findByStatus(string $status) Return RaidHasPlayer objects filtered by the status column
 * @method     array findByInscription(int $inscription) Return RaidHasPlayer objects filtered by the inscription column
 * @method     array findByHistory(string $history) Return RaidHasPlayer objects filtered by the history column
 *
 * @package    propel.generator.wrap.om
 */
abstract class BaseRaidHasPlayerQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseRaidHasPlayerQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'wrap', $modelName = 'RaidHasPlayer', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new RaidHasPlayerQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    RaidHasPlayerQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof RaidHasPlayerQuery) {
			return $criteria;
		}
		$query = new RaidHasPlayerQuery();
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
	 * @param     array[$Raid_idRaid, $Player_idPlayer] $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    RaidHasPlayer|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = RaidHasPlayerPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    RaidHasPlayerQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		$this->addUsingAlias(RaidHasPlayerPeer::RAID_IDRAID, $key[0], Criteria::EQUAL);
		$this->addUsingAlias(RaidHasPlayerPeer::PLAYER_IDPLAYER, $key[1], Criteria::EQUAL);
		
		return $this;
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    RaidHasPlayerQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		if (empty($keys)) {
			return $this->add(null, '1<>1', Criteria::CUSTOM);
		}
		foreach ($keys as $key) {
			$cton0 = $this->getNewCriterion(RaidHasPlayerPeer::RAID_IDRAID, $key[0], Criteria::EQUAL);
			$cton1 = $this->getNewCriterion(RaidHasPlayerPeer::PLAYER_IDPLAYER, $key[1], Criteria::EQUAL);
			$cton0->addAnd($cton1);
			$this->addOr($cton0);
		}
		
		return $this;
	}

	/**
	 * Filter the query on the Raid_idRaid column
	 * 
	 * @param     int|array $raidIdraid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RaidHasPlayerQuery The current query, for fluid interface
	 */
	public function filterByRaidIdraid($raidIdraid = null, $comparison = null)
	{
		if (is_array($raidIdraid) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(RaidHasPlayerPeer::RAID_IDRAID, $raidIdraid, $comparison);
	}

	/**
	 * Filter the query on the Player_idPlayer column
	 * 
	 * @param     int|array $playerIdplayer The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RaidHasPlayerQuery The current query, for fluid interface
	 */
	public function filterByPlayerIdplayer($playerIdplayer = null, $comparison = null)
	{
		if (is_array($playerIdplayer) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(RaidHasPlayerPeer::PLAYER_IDPLAYER, $playerIdplayer, $comparison);
	}

	/**
	 * Filter the query on the status column
	 * 
	 * @param     string $status The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RaidHasPlayerQuery The current query, for fluid interface
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
		return $this->addUsingAlias(RaidHasPlayerPeer::STATUS, $status, $comparison);
	}

	/**
	 * Filter the query on the inscription column
	 * 
	 * @param     int|array $inscription The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RaidHasPlayerQuery The current query, for fluid interface
	 */
	public function filterByInscription($inscription = null, $comparison = null)
	{
		if (is_array($inscription)) {
			$useMinMax = false;
			if (isset($inscription['min'])) {
				$this->addUsingAlias(RaidHasPlayerPeer::INSCRIPTION, $inscription['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($inscription['max'])) {
				$this->addUsingAlias(RaidHasPlayerPeer::INSCRIPTION, $inscription['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(RaidHasPlayerPeer::INSCRIPTION, $inscription, $comparison);
	}

	/**
	 * Filter the query on the history column
	 * 
	 * @param     string $history The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RaidHasPlayerQuery The current query, for fluid interface
	 */
	public function filterByHistory($history = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($history)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $history)) {
				$history = str_replace('*', '%', $history);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(RaidHasPlayerPeer::HISTORY, $history, $comparison);
	}

	/**
	 * Filter the query by a related Raid object
	 *
	 * @param     Raid $raid  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RaidHasPlayerQuery The current query, for fluid interface
	 */
	public function filterByRaid($raid, $comparison = null)
	{
		return $this
			->addUsingAlias(RaidHasPlayerPeer::RAID_IDRAID, $raid->getIdraid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Raid relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    RaidHasPlayerQuery The current query, for fluid interface
	 */
	public function joinRaid($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Raid');
		
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
			$this->addJoinObject($join, 'Raid');
		}
		
		return $this;
	}

	/**
	 * Use the Raid relation Raid object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    RaidQuery A secondary query class using the current class as primary query
	 */
	public function useRaidQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinRaid($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Raid', 'RaidQuery');
	}

	/**
	 * Filter the query by a related Player object
	 *
	 * @param     Player $player  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RaidHasPlayerQuery The current query, for fluid interface
	 */
	public function filterByPlayer($player, $comparison = null)
	{
		return $this
			->addUsingAlias(RaidHasPlayerPeer::PLAYER_IDPLAYER, $player->getIdplayer(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Player relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    RaidHasPlayerQuery The current query, for fluid interface
	 */
	public function joinPlayer($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Player');
		
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
			$this->addJoinObject($join, 'Player');
		}
		
		return $this;
	}

	/**
	 * Use the Player relation Player object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PlayerQuery A secondary query class using the current class as primary query
	 */
	public function usePlayerQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinPlayer($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Player', 'PlayerQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     RaidHasPlayer $raidHasPlayer Object to remove from the list of results
	 *
	 * @return    RaidHasPlayerQuery The current query, for fluid interface
	 */
	public function prune($raidHasPlayer = null)
	{
		if ($raidHasPlayer) {
			$this->addCond('pruneCond0', $this->getAliasedColName(RaidHasPlayerPeer::RAID_IDRAID), $raidHasPlayer->getRaidIdraid(), Criteria::NOT_EQUAL);
			$this->addCond('pruneCond1', $this->getAliasedColName(RaidHasPlayerPeer::PLAYER_IDPLAYER), $raidHasPlayer->getPlayerIdplayer(), Criteria::NOT_EQUAL);
			$this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
	  }
	  
		return $this;
	}

} // BaseRaidHasPlayerQuery
