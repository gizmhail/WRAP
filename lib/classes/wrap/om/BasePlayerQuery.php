<?php


/**
 * Base class that represents a query for the 'Player' table.
 *
 * 
 *
 * @method     PlayerQuery orderByIdplayer($order = Criteria::ASC) Order by the idPlayer column
 * @method     PlayerQuery orderByPlayername($order = Criteria::ASC) Order by the playerName column
 * @method     PlayerQuery orderByTokencount($order = Criteria::ASC) Order by the tokenCount column
 * @method     PlayerQuery orderByGoldtokencount($order = Criteria::ASC) Order by the goldTokenCount column
 * @method     PlayerQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     PlayerQuery orderByInfo($order = Criteria::ASC) Order by the info column
 * @method     PlayerQuery orderByLastscan($order = Criteria::ASC) Order by the lastScan column
 *
 * @method     PlayerQuery groupByIdplayer() Group by the idPlayer column
 * @method     PlayerQuery groupByPlayername() Group by the playerName column
 * @method     PlayerQuery groupByTokencount() Group by the tokenCount column
 * @method     PlayerQuery groupByGoldtokencount() Group by the goldTokenCount column
 * @method     PlayerQuery groupByStatus() Group by the status column
 * @method     PlayerQuery groupByInfo() Group by the info column
 * @method     PlayerQuery groupByLastscan() Group by the lastScan column
 *
 * @method     PlayerQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     PlayerQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     PlayerQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     PlayerQuery leftJoinLoot($relationAlias = null) Adds a LEFT JOIN clause to the query using the Loot relation
 * @method     PlayerQuery rightJoinLoot($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Loot relation
 * @method     PlayerQuery innerJoinLoot($relationAlias = null) Adds a INNER JOIN clause to the query using the Loot relation
 *
 * @method     PlayerQuery leftJoinPlayerspecialization($relationAlias = null) Adds a LEFT JOIN clause to the query using the Playerspecialization relation
 * @method     PlayerQuery rightJoinPlayerspecialization($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Playerspecialization relation
 * @method     PlayerQuery innerJoinPlayerspecialization($relationAlias = null) Adds a INNER JOIN clause to the query using the Playerspecialization relation
 *
 * @method     PlayerQuery leftJoinRaidHasPlayer($relationAlias = null) Adds a LEFT JOIN clause to the query using the RaidHasPlayer relation
 * @method     PlayerQuery rightJoinRaidHasPlayer($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RaidHasPlayer relation
 * @method     PlayerQuery innerJoinRaidHasPlayer($relationAlias = null) Adds a INNER JOIN clause to the query using the RaidHasPlayer relation
 *
 * @method     Player findOne(PropelPDO $con = null) Return the first Player matching the query
 * @method     Player findOneOrCreate(PropelPDO $con = null) Return the first Player matching the query, or a new Player object populated from the query conditions when no match is found
 *
 * @method     Player findOneByIdplayer(int $idPlayer) Return the first Player filtered by the idPlayer column
 * @method     Player findOneByPlayername(string $playerName) Return the first Player filtered by the playerName column
 * @method     Player findOneByTokencount(int $tokenCount) Return the first Player filtered by the tokenCount column
 * @method     Player findOneByGoldtokencount(int $goldTokenCount) Return the first Player filtered by the goldTokenCount column
 * @method     Player findOneByStatus(string $status) Return the first Player filtered by the status column
 * @method     Player findOneByInfo(string $info) Return the first Player filtered by the info column
 * @method     Player findOneByLastscan(int $lastScan) Return the first Player filtered by the lastScan column
 *
 * @method     array findByIdplayer(int $idPlayer) Return Player objects filtered by the idPlayer column
 * @method     array findByPlayername(string $playerName) Return Player objects filtered by the playerName column
 * @method     array findByTokencount(int $tokenCount) Return Player objects filtered by the tokenCount column
 * @method     array findByGoldtokencount(int $goldTokenCount) Return Player objects filtered by the goldTokenCount column
 * @method     array findByStatus(string $status) Return Player objects filtered by the status column
 * @method     array findByInfo(string $info) Return Player objects filtered by the info column
 * @method     array findByLastscan(int $lastScan) Return Player objects filtered by the lastScan column
 *
 * @package    propel.generator.wrap.om
 */
abstract class BasePlayerQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BasePlayerQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'wrap', $modelName = 'Player', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new PlayerQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    PlayerQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof PlayerQuery) {
			return $criteria;
		}
		$query = new PlayerQuery();
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
	 * @return    Player|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = PlayerPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    PlayerQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(PlayerPeer::IDPLAYER, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    PlayerQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(PlayerPeer::IDPLAYER, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the idPlayer column
	 * 
	 * @param     int|array $idplayer The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PlayerQuery The current query, for fluid interface
	 */
	public function filterByIdplayer($idplayer = null, $comparison = null)
	{
		if (is_array($idplayer) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(PlayerPeer::IDPLAYER, $idplayer, $comparison);
	}

	/**
	 * Filter the query on the playerName column
	 * 
	 * @param     string $playername The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PlayerQuery The current query, for fluid interface
	 */
	public function filterByPlayername($playername = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($playername)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $playername)) {
				$playername = str_replace('*', '%', $playername);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(PlayerPeer::PLAYERNAME, $playername, $comparison);
	}

	/**
	 * Filter the query on the tokenCount column
	 * 
	 * @param     int|array $tokencount The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PlayerQuery The current query, for fluid interface
	 */
	public function filterByTokencount($tokencount = null, $comparison = null)
	{
		if (is_array($tokencount)) {
			$useMinMax = false;
			if (isset($tokencount['min'])) {
				$this->addUsingAlias(PlayerPeer::TOKENCOUNT, $tokencount['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($tokencount['max'])) {
				$this->addUsingAlias(PlayerPeer::TOKENCOUNT, $tokencount['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PlayerPeer::TOKENCOUNT, $tokencount, $comparison);
	}

	/**
	 * Filter the query on the goldTokenCount column
	 * 
	 * @param     int|array $goldtokencount The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PlayerQuery The current query, for fluid interface
	 */
	public function filterByGoldtokencount($goldtokencount = null, $comparison = null)
	{
		if (is_array($goldtokencount)) {
			$useMinMax = false;
			if (isset($goldtokencount['min'])) {
				$this->addUsingAlias(PlayerPeer::GOLDTOKENCOUNT, $goldtokencount['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($goldtokencount['max'])) {
				$this->addUsingAlias(PlayerPeer::GOLDTOKENCOUNT, $goldtokencount['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PlayerPeer::GOLDTOKENCOUNT, $goldtokencount, $comparison);
	}

	/**
	 * Filter the query on the status column
	 * 
	 * @param     string $status The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PlayerQuery The current query, for fluid interface
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
		return $this->addUsingAlias(PlayerPeer::STATUS, $status, $comparison);
	}

	/**
	 * Filter the query on the info column
	 * 
	 * @param     string $info The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PlayerQuery The current query, for fluid interface
	 */
	public function filterByInfo($info = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($info)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $info)) {
				$info = str_replace('*', '%', $info);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(PlayerPeer::INFO, $info, $comparison);
	}

	/**
	 * Filter the query on the lastScan column
	 * 
	 * @param     int|array $lastscan The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PlayerQuery The current query, for fluid interface
	 */
	public function filterByLastscan($lastscan = null, $comparison = null)
	{
		if (is_array($lastscan)) {
			$useMinMax = false;
			if (isset($lastscan['min'])) {
				$this->addUsingAlias(PlayerPeer::LASTSCAN, $lastscan['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($lastscan['max'])) {
				$this->addUsingAlias(PlayerPeer::LASTSCAN, $lastscan['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PlayerPeer::LASTSCAN, $lastscan, $comparison);
	}

	/**
	 * Filter the query by a related Loot object
	 *
	 * @param     Loot $loot  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PlayerQuery The current query, for fluid interface
	 */
	public function filterByLoot($loot, $comparison = null)
	{
		return $this
			->addUsingAlias(PlayerPeer::IDPLAYER, $loot->getPlayerIdplayer(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Loot relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PlayerQuery The current query, for fluid interface
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
	 * Filter the query by a related Playerspecialization object
	 *
	 * @param     Playerspecialization $playerspecialization  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PlayerQuery The current query, for fluid interface
	 */
	public function filterByPlayerspecialization($playerspecialization, $comparison = null)
	{
		return $this
			->addUsingAlias(PlayerPeer::IDPLAYER, $playerspecialization->getPlayerIdplayer(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Playerspecialization relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PlayerQuery The current query, for fluid interface
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
	 * Filter the query by a related RaidHasPlayer object
	 *
	 * @param     RaidHasPlayer $raidHasPlayer  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PlayerQuery The current query, for fluid interface
	 */
	public function filterByRaidHasPlayer($raidHasPlayer, $comparison = null)
	{
		return $this
			->addUsingAlias(PlayerPeer::IDPLAYER, $raidHasPlayer->getPlayerIdplayer(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the RaidHasPlayer relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PlayerQuery The current query, for fluid interface
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
	 * @param     Player $player Object to remove from the list of results
	 *
	 * @return    PlayerQuery The current query, for fluid interface
	 */
	public function prune($player = null)
	{
		if ($player) {
			$this->addUsingAlias(PlayerPeer::IDPLAYER, $player->getIdplayer(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BasePlayerQuery
