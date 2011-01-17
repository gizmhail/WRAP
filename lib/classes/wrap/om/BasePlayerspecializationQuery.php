<?php


/**
 * Base class that represents a query for the 'PlayerSpecialization' table.
 *
 * 
 *
 * @method     PlayerspecializationQuery orderByIdplayerspecialization($order = Criteria::ASC) Order by the idPlayerSpecialization column
 * @method     PlayerspecializationQuery orderByPlayerIdplayer($order = Criteria::ASC) Order by the Player_idPlayer column
 * @method     PlayerspecializationQuery orderBySpecializationname($order = Criteria::ASC) Order by the specializationName column
 * @method     PlayerspecializationQuery orderByRole($order = Criteria::ASC) Order by the role column
 *
 * @method     PlayerspecializationQuery groupByIdplayerspecialization() Group by the idPlayerSpecialization column
 * @method     PlayerspecializationQuery groupByPlayerIdplayer() Group by the Player_idPlayer column
 * @method     PlayerspecializationQuery groupBySpecializationname() Group by the specializationName column
 * @method     PlayerspecializationQuery groupByRole() Group by the role column
 *
 * @method     PlayerspecializationQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     PlayerspecializationQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     PlayerspecializationQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     PlayerspecializationQuery leftJoinPlayer($relationAlias = null) Adds a LEFT JOIN clause to the query using the Player relation
 * @method     PlayerspecializationQuery rightJoinPlayer($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Player relation
 * @method     PlayerspecializationQuery innerJoinPlayer($relationAlias = null) Adds a INNER JOIN clause to the query using the Player relation
 *
 * @method     PlayerspecializationQuery leftJoinPlayerspecializationHasBuff($relationAlias = null) Adds a LEFT JOIN clause to the query using the PlayerspecializationHasBuff relation
 * @method     PlayerspecializationQuery rightJoinPlayerspecializationHasBuff($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PlayerspecializationHasBuff relation
 * @method     PlayerspecializationQuery innerJoinPlayerspecializationHasBuff($relationAlias = null) Adds a INNER JOIN clause to the query using the PlayerspecializationHasBuff relation
 *
 * @method     Playerspecialization findOne(PropelPDO $con = null) Return the first Playerspecialization matching the query
 * @method     Playerspecialization findOneOrCreate(PropelPDO $con = null) Return the first Playerspecialization matching the query, or a new Playerspecialization object populated from the query conditions when no match is found
 *
 * @method     Playerspecialization findOneByIdplayerspecialization(int $idPlayerSpecialization) Return the first Playerspecialization filtered by the idPlayerSpecialization column
 * @method     Playerspecialization findOneByPlayerIdplayer(int $Player_idPlayer) Return the first Playerspecialization filtered by the Player_idPlayer column
 * @method     Playerspecialization findOneBySpecializationname(string $specializationName) Return the first Playerspecialization filtered by the specializationName column
 * @method     Playerspecialization findOneByRole(string $role) Return the first Playerspecialization filtered by the role column
 *
 * @method     array findByIdplayerspecialization(int $idPlayerSpecialization) Return Playerspecialization objects filtered by the idPlayerSpecialization column
 * @method     array findByPlayerIdplayer(int $Player_idPlayer) Return Playerspecialization objects filtered by the Player_idPlayer column
 * @method     array findBySpecializationname(string $specializationName) Return Playerspecialization objects filtered by the specializationName column
 * @method     array findByRole(string $role) Return Playerspecialization objects filtered by the role column
 *
 * @package    propel.generator.wrap.om
 */
abstract class BasePlayerspecializationQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BasePlayerspecializationQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'wrap', $modelName = 'Playerspecialization', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new PlayerspecializationQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    PlayerspecializationQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof PlayerspecializationQuery) {
			return $criteria;
		}
		$query = new PlayerspecializationQuery();
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
	 * @return    Playerspecialization|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = PlayerspecializationPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    PlayerspecializationQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(PlayerspecializationPeer::IDPLAYERSPECIALIZATION, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    PlayerspecializationQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(PlayerspecializationPeer::IDPLAYERSPECIALIZATION, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the idPlayerSpecialization column
	 * 
	 * @param     int|array $idplayerspecialization The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PlayerspecializationQuery The current query, for fluid interface
	 */
	public function filterByIdplayerspecialization($idplayerspecialization = null, $comparison = null)
	{
		if (is_array($idplayerspecialization) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(PlayerspecializationPeer::IDPLAYERSPECIALIZATION, $idplayerspecialization, $comparison);
	}

	/**
	 * Filter the query on the Player_idPlayer column
	 * 
	 * @param     int|array $playerIdplayer The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PlayerspecializationQuery The current query, for fluid interface
	 */
	public function filterByPlayerIdplayer($playerIdplayer = null, $comparison = null)
	{
		if (is_array($playerIdplayer)) {
			$useMinMax = false;
			if (isset($playerIdplayer['min'])) {
				$this->addUsingAlias(PlayerspecializationPeer::PLAYER_IDPLAYER, $playerIdplayer['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($playerIdplayer['max'])) {
				$this->addUsingAlias(PlayerspecializationPeer::PLAYER_IDPLAYER, $playerIdplayer['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PlayerspecializationPeer::PLAYER_IDPLAYER, $playerIdplayer, $comparison);
	}

	/**
	 * Filter the query on the specializationName column
	 * 
	 * @param     string $specializationname The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PlayerspecializationQuery The current query, for fluid interface
	 */
	public function filterBySpecializationname($specializationname = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($specializationname)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $specializationname)) {
				$specializationname = str_replace('*', '%', $specializationname);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(PlayerspecializationPeer::SPECIALIZATIONNAME, $specializationname, $comparison);
	}

	/**
	 * Filter the query on the role column
	 * 
	 * @param     string $role The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PlayerspecializationQuery The current query, for fluid interface
	 */
	public function filterByRole($role = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($role)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $role)) {
				$role = str_replace('*', '%', $role);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(PlayerspecializationPeer::ROLE, $role, $comparison);
	}

	/**
	 * Filter the query by a related Player object
	 *
	 * @param     Player $player  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PlayerspecializationQuery The current query, for fluid interface
	 */
	public function filterByPlayer($player, $comparison = null)
	{
		return $this
			->addUsingAlias(PlayerspecializationPeer::PLAYER_IDPLAYER, $player->getIdplayer(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Player relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PlayerspecializationQuery The current query, for fluid interface
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
	 * Filter the query by a related PlayerspecializationHasBuff object
	 *
	 * @param     PlayerspecializationHasBuff $playerspecializationHasBuff  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PlayerspecializationQuery The current query, for fluid interface
	 */
	public function filterByPlayerspecializationHasBuff($playerspecializationHasBuff, $comparison = null)
	{
		return $this
			->addUsingAlias(PlayerspecializationPeer::IDPLAYERSPECIALIZATION, $playerspecializationHasBuff->getPlayerspecializationIdplayerspecialization(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the PlayerspecializationHasBuff relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PlayerspecializationQuery The current query, for fluid interface
	 */
	public function joinPlayerspecializationHasBuff($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('PlayerspecializationHasBuff');
		
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
			$this->addJoinObject($join, 'PlayerspecializationHasBuff');
		}
		
		return $this;
	}

	/**
	 * Use the PlayerspecializationHasBuff relation PlayerspecializationHasBuff object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PlayerspecializationHasBuffQuery A secondary query class using the current class as primary query
	 */
	public function usePlayerspecializationHasBuffQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinPlayerspecializationHasBuff($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'PlayerspecializationHasBuff', 'PlayerspecializationHasBuffQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Playerspecialization $playerspecialization Object to remove from the list of results
	 *
	 * @return    PlayerspecializationQuery The current query, for fluid interface
	 */
	public function prune($playerspecialization = null)
	{
		if ($playerspecialization) {
			$this->addUsingAlias(PlayerspecializationPeer::IDPLAYERSPECIALIZATION, $playerspecialization->getIdplayerspecialization(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BasePlayerspecializationQuery
