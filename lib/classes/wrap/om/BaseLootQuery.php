<?php


/**
 * Base class that represents a query for the 'Loot' table.
 *
 * 
 *
 * @method     LootQuery orderByIdloot($order = Criteria::ASC) Order by the idLoot column
 * @method     LootQuery orderByRaidIdraid($order = Criteria::ASC) Order by the Raid_idRaid column
 * @method     LootQuery orderByPlayerIdplayer($order = Criteria::ASC) Order by the Player_idPlayer column
 * @method     LootQuery orderByLootname($order = Criteria::ASC) Order by the lootName column
 * @method     LootQuery orderByComment($order = Criteria::ASC) Order by the comment column
 * @method     LootQuery orderByIlvl($order = Criteria::ASC) Order by the ilvl column
 *
 * @method     LootQuery groupByIdloot() Group by the idLoot column
 * @method     LootQuery groupByRaidIdraid() Group by the Raid_idRaid column
 * @method     LootQuery groupByPlayerIdplayer() Group by the Player_idPlayer column
 * @method     LootQuery groupByLootname() Group by the lootName column
 * @method     LootQuery groupByComment() Group by the comment column
 * @method     LootQuery groupByIlvl() Group by the ilvl column
 *
 * @method     LootQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     LootQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     LootQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     LootQuery leftJoinRaid($relationAlias = null) Adds a LEFT JOIN clause to the query using the Raid relation
 * @method     LootQuery rightJoinRaid($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Raid relation
 * @method     LootQuery innerJoinRaid($relationAlias = null) Adds a INNER JOIN clause to the query using the Raid relation
 *
 * @method     LootQuery leftJoinPlayer($relationAlias = null) Adds a LEFT JOIN clause to the query using the Player relation
 * @method     LootQuery rightJoinPlayer($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Player relation
 * @method     LootQuery innerJoinPlayer($relationAlias = null) Adds a INNER JOIN clause to the query using the Player relation
 *
 * @method     Loot findOne(PropelPDO $con = null) Return the first Loot matching the query
 * @method     Loot findOneOrCreate(PropelPDO $con = null) Return the first Loot matching the query, or a new Loot object populated from the query conditions when no match is found
 *
 * @method     Loot findOneByIdloot(int $idLoot) Return the first Loot filtered by the idLoot column
 * @method     Loot findOneByRaidIdraid(int $Raid_idRaid) Return the first Loot filtered by the Raid_idRaid column
 * @method     Loot findOneByPlayerIdplayer(int $Player_idPlayer) Return the first Loot filtered by the Player_idPlayer column
 * @method     Loot findOneByLootname(string $lootName) Return the first Loot filtered by the lootName column
 * @method     Loot findOneByComment(string $comment) Return the first Loot filtered by the comment column
 * @method     Loot findOneByIlvl(int $ilvl) Return the first Loot filtered by the ilvl column
 *
 * @method     array findByIdloot(int $idLoot) Return Loot objects filtered by the idLoot column
 * @method     array findByRaidIdraid(int $Raid_idRaid) Return Loot objects filtered by the Raid_idRaid column
 * @method     array findByPlayerIdplayer(int $Player_idPlayer) Return Loot objects filtered by the Player_idPlayer column
 * @method     array findByLootname(string $lootName) Return Loot objects filtered by the lootName column
 * @method     array findByComment(string $comment) Return Loot objects filtered by the comment column
 * @method     array findByIlvl(int $ilvl) Return Loot objects filtered by the ilvl column
 *
 * @package    propel.generator.wrap.om
 */
abstract class BaseLootQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseLootQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'wrap', $modelName = 'Loot', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new LootQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    LootQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof LootQuery) {
			return $criteria;
		}
		$query = new LootQuery();
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
	 * @return    Loot|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = LootPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    LootQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(LootPeer::IDLOOT, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    LootQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(LootPeer::IDLOOT, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the idLoot column
	 * 
	 * @param     int|array $idloot The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    LootQuery The current query, for fluid interface
	 */
	public function filterByIdloot($idloot = null, $comparison = null)
	{
		if (is_array($idloot) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(LootPeer::IDLOOT, $idloot, $comparison);
	}

	/**
	 * Filter the query on the Raid_idRaid column
	 * 
	 * @param     int|array $raidIdraid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    LootQuery The current query, for fluid interface
	 */
	public function filterByRaidIdraid($raidIdraid = null, $comparison = null)
	{
		if (is_array($raidIdraid)) {
			$useMinMax = false;
			if (isset($raidIdraid['min'])) {
				$this->addUsingAlias(LootPeer::RAID_IDRAID, $raidIdraid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($raidIdraid['max'])) {
				$this->addUsingAlias(LootPeer::RAID_IDRAID, $raidIdraid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(LootPeer::RAID_IDRAID, $raidIdraid, $comparison);
	}

	/**
	 * Filter the query on the Player_idPlayer column
	 * 
	 * @param     int|array $playerIdplayer The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    LootQuery The current query, for fluid interface
	 */
	public function filterByPlayerIdplayer($playerIdplayer = null, $comparison = null)
	{
		if (is_array($playerIdplayer)) {
			$useMinMax = false;
			if (isset($playerIdplayer['min'])) {
				$this->addUsingAlias(LootPeer::PLAYER_IDPLAYER, $playerIdplayer['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($playerIdplayer['max'])) {
				$this->addUsingAlias(LootPeer::PLAYER_IDPLAYER, $playerIdplayer['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(LootPeer::PLAYER_IDPLAYER, $playerIdplayer, $comparison);
	}

	/**
	 * Filter the query on the lootName column
	 * 
	 * @param     string $lootname The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    LootQuery The current query, for fluid interface
	 */
	public function filterByLootname($lootname = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($lootname)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $lootname)) {
				$lootname = str_replace('*', '%', $lootname);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(LootPeer::LOOTNAME, $lootname, $comparison);
	}

	/**
	 * Filter the query on the comment column
	 * 
	 * @param     string $comment The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    LootQuery The current query, for fluid interface
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
		return $this->addUsingAlias(LootPeer::COMMENT, $comment, $comparison);
	}

	/**
	 * Filter the query on the ilvl column
	 * 
	 * @param     int|array $ilvl The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    LootQuery The current query, for fluid interface
	 */
	public function filterByIlvl($ilvl = null, $comparison = null)
	{
		if (is_array($ilvl)) {
			$useMinMax = false;
			if (isset($ilvl['min'])) {
				$this->addUsingAlias(LootPeer::ILVL, $ilvl['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($ilvl['max'])) {
				$this->addUsingAlias(LootPeer::ILVL, $ilvl['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(LootPeer::ILVL, $ilvl, $comparison);
	}

	/**
	 * Filter the query by a related Raid object
	 *
	 * @param     Raid $raid  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    LootQuery The current query, for fluid interface
	 */
	public function filterByRaid($raid, $comparison = null)
	{
		return $this
			->addUsingAlias(LootPeer::RAID_IDRAID, $raid->getIdraid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Raid relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    LootQuery The current query, for fluid interface
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
	 * @return    LootQuery The current query, for fluid interface
	 */
	public function filterByPlayer($player, $comparison = null)
	{
		return $this
			->addUsingAlias(LootPeer::PLAYER_IDPLAYER, $player->getIdplayer(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Player relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    LootQuery The current query, for fluid interface
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
	 * @param     Loot $loot Object to remove from the list of results
	 *
	 * @return    LootQuery The current query, for fluid interface
	 */
	public function prune($loot = null)
	{
		if ($loot) {
			$this->addUsingAlias(LootPeer::IDLOOT, $loot->getIdloot(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseLootQuery
