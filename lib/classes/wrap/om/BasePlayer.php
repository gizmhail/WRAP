<?php


/**
 * Base class that represents a row from the 'Player' table.
 *
 * 
 *
 * @package    propel.generator.wrap.om
 */
abstract class BasePlayer extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'PlayerPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        PlayerPeer
	 */
	protected static $peer;

	/**
	 * The value for the idplayer field.
	 * @var        int
	 */
	protected $idplayer;

	/**
	 * The value for the playername field.
	 * @var        string
	 */
	protected $playername;

	/**
	 * The value for the tokencount field.
	 * @var        int
	 */
	protected $tokencount;

	/**
	 * The value for the goldtokencount field.
	 * @var        int
	 */
	protected $goldtokencount;

	/**
	 * The value for the status field.
	 * @var        string
	 */
	protected $status;

	/**
	 * The value for the info field.
	 * @var        string
	 */
	protected $info;

	/**
	 * The value for the lastscan field.
	 * @var        int
	 */
	protected $lastscan;

	/**
	 * The value for the main_idplayer field.
	 * @var        int
	 */
	protected $main_idplayer;

	/**
	 * @var        Player
	 */
	protected $aPlayerRelatedByMainIdplayer;

	/**
	 * @var        array Player[] Collection to store aggregation of Player objects.
	 */
	protected $collPlayersRelatedByIdplayer;

	/**
	 * @var        array Loot[] Collection to store aggregation of Loot objects.
	 */
	protected $collLoots;

	/**
	 * @var        array Playerspecialization[] Collection to store aggregation of Playerspecialization objects.
	 */
	protected $collPlayerspecializations;

	/**
	 * @var        array RaidHasPlayer[] Collection to store aggregation of RaidHasPlayer objects.
	 */
	protected $collRaidHasPlayers;

	/**
	 * Flag to prevent endless save loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInSave = false;

	/**
	 * Flag to prevent endless validation loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInValidation = false;

	/**
	 * Get the [idplayer] column value.
	 * 
	 * @return     int
	 */
	public function getIdplayer()
	{
		return $this->idplayer;
	}

	/**
	 * Get the [playername] column value.
	 * 
	 * @return     string
	 */
	public function getPlayername()
	{
		return $this->playername;
	}

	/**
	 * Get the [tokencount] column value.
	 * 
	 * @return     int
	 */
	public function getTokencount()
	{
		return $this->tokencount;
	}

	/**
	 * Get the [goldtokencount] column value.
	 * 
	 * @return     int
	 */
	public function getGoldtokencount()
	{
		return $this->goldtokencount;
	}

	/**
	 * Get the [status] column value.
	 * 
	 * @return     string
	 */
	public function getStatus()
	{
		return $this->status;
	}

	/**
	 * Get the [info] column value.
	 * 
	 * @return     string
	 */
	public function getInfo()
	{
		return $this->info;
	}

	/**
	 * Get the [lastscan] column value.
	 * 
	 * @return     int
	 */
	public function getLastscan()
	{
		return $this->lastscan;
	}

	/**
	 * Get the [main_idplayer] column value.
	 * 
	 * @return     int
	 */
	public function getMainIdplayer()
	{
		return $this->main_idplayer;
	}

	/**
	 * Set the value of [idplayer] column.
	 * 
	 * @param      int $v new value
	 * @return     Player The current object (for fluent API support)
	 */
	public function setIdplayer($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->idplayer !== $v) {
			$this->idplayer = $v;
			$this->modifiedColumns[] = PlayerPeer::IDPLAYER;
		}

		return $this;
	} // setIdplayer()

	/**
	 * Set the value of [playername] column.
	 * 
	 * @param      string $v new value
	 * @return     Player The current object (for fluent API support)
	 */
	public function setPlayername($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->playername !== $v) {
			$this->playername = $v;
			$this->modifiedColumns[] = PlayerPeer::PLAYERNAME;
		}

		return $this;
	} // setPlayername()

	/**
	 * Set the value of [tokencount] column.
	 * 
	 * @param      int $v new value
	 * @return     Player The current object (for fluent API support)
	 */
	public function setTokencount($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->tokencount !== $v) {
			$this->tokencount = $v;
			$this->modifiedColumns[] = PlayerPeer::TOKENCOUNT;
		}

		return $this;
	} // setTokencount()

	/**
	 * Set the value of [goldtokencount] column.
	 * 
	 * @param      int $v new value
	 * @return     Player The current object (for fluent API support)
	 */
	public function setGoldtokencount($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->goldtokencount !== $v) {
			$this->goldtokencount = $v;
			$this->modifiedColumns[] = PlayerPeer::GOLDTOKENCOUNT;
		}

		return $this;
	} // setGoldtokencount()

	/**
	 * Set the value of [status] column.
	 * 
	 * @param      string $v new value
	 * @return     Player The current object (for fluent API support)
	 */
	public function setStatus($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->status !== $v) {
			$this->status = $v;
			$this->modifiedColumns[] = PlayerPeer::STATUS;
		}

		return $this;
	} // setStatus()

	/**
	 * Set the value of [info] column.
	 * 
	 * @param      string $v new value
	 * @return     Player The current object (for fluent API support)
	 */
	public function setInfo($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->info !== $v) {
			$this->info = $v;
			$this->modifiedColumns[] = PlayerPeer::INFO;
		}

		return $this;
	} // setInfo()

	/**
	 * Set the value of [lastscan] column.
	 * 
	 * @param      int $v new value
	 * @return     Player The current object (for fluent API support)
	 */
	public function setLastscan($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->lastscan !== $v) {
			$this->lastscan = $v;
			$this->modifiedColumns[] = PlayerPeer::LASTSCAN;
		}

		return $this;
	} // setLastscan()

	/**
	 * Set the value of [main_idplayer] column.
	 * 
	 * @param      int $v new value
	 * @return     Player The current object (for fluent API support)
	 */
	public function setMainIdplayer($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->main_idplayer !== $v) {
			$this->main_idplayer = $v;
			$this->modifiedColumns[] = PlayerPeer::MAIN_IDPLAYER;
		}

		if ($this->aPlayerRelatedByMainIdplayer !== null && $this->aPlayerRelatedByMainIdplayer->getIdplayer() !== $v) {
			$this->aPlayerRelatedByMainIdplayer = null;
		}

		return $this;
	} // setMainIdplayer()

	/**
	 * Indicates whether the columns in this object are only set to default values.
	 *
	 * This method can be used in conjunction with isModified() to indicate whether an object is both
	 * modified _and_ has some values set which are non-default.
	 *
	 * @return     boolean Whether the columns in this object are only been set with default values.
	 */
	public function hasOnlyDefaultValues()
	{
		// otherwise, everything was equal, so return TRUE
		return true;
	} // hasOnlyDefaultValues()

	/**
	 * Hydrates (populates) the object variables with values from the database resultset.
	 *
	 * An offset (0-based "start column") is specified so that objects can be hydrated
	 * with a subset of the columns in the resultset rows.  This is needed, for example,
	 * for results of JOIN queries where the resultset row includes columns from two or
	 * more tables.
	 *
	 * @param      array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
	 * @param      int $startcol 0-based offset column which indicates which restultset column to start with.
	 * @param      boolean $rehydrate Whether this object is being re-hydrated from the database.
	 * @return     int next starting column
	 * @throws     PropelException  - Any caught Exception will be rewrapped as a PropelException.
	 */
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->idplayer = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->playername = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->tokencount = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->goldtokencount = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->status = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->info = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->lastscan = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
			$this->main_idplayer = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 8; // 8 = PlayerPeer::NUM_COLUMNS - PlayerPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Player object", $e);
		}
	}

	/**
	 * Checks and repairs the internal consistency of the object.
	 *
	 * This method is executed after an already-instantiated object is re-hydrated
	 * from the database.  It exists to check any foreign keys to make sure that
	 * the objects related to the current object are correct based on foreign key.
	 *
	 * You can override this method in the stub class, but you should always invoke
	 * the base method from the overridden method (i.e. parent::ensureConsistency()),
	 * in case your model changes.
	 *
	 * @throws     PropelException
	 */
	public function ensureConsistency()
	{

		if ($this->aPlayerRelatedByMainIdplayer !== null && $this->main_idplayer !== $this->aPlayerRelatedByMainIdplayer->getIdplayer()) {
			$this->aPlayerRelatedByMainIdplayer = null;
		}
	} // ensureConsistency

	/**
	 * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
	 *
	 * This will only work if the object has been saved and has a valid primary key set.
	 *
	 * @param      boolean $deep (optional) Whether to also de-associated any related objects.
	 * @param      PropelPDO $con (optional) The PropelPDO connection to use.
	 * @return     void
	 * @throws     PropelException - if this object is deleted, unsaved or doesn't have pk match in db
	 */
	public function reload($deep = false, PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("Cannot reload a deleted object.");
		}

		if ($this->isNew()) {
			throw new PropelException("Cannot reload an unsaved object.");
		}

		if ($con === null) {
			$con = Propel::getConnection(PlayerPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = PlayerPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aPlayerRelatedByMainIdplayer = null;
			$this->collPlayersRelatedByIdplayer = null;

			$this->collLoots = null;

			$this->collPlayerspecializations = null;

			$this->collRaidHasPlayers = null;

		} // if (deep)
	}

	/**
	 * Removes this object from datastore and sets delete attribute.
	 *
	 * @param      PropelPDO $con
	 * @return     void
	 * @throws     PropelException
	 * @see        BaseObject::setDeleted()
	 * @see        BaseObject::isDeleted()
	 */
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(PlayerPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				PlayerQuery::create()
					->filterByPrimaryKey($this->getPrimaryKey())
					->delete($con);
				$this->postDelete($con);
				$con->commit();
				$this->setDeleted(true);
			} else {
				$con->commit();
			}
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Persists this object to the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All modified related objects will also be persisted in the doSave()
	 * method.  This method wraps all precipitate database operations in a
	 * single transaction.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        doSave()
	 */
	public function save(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(PlayerPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			if ($isInsert) {
				$ret = $ret && $this->preInsert($con);
			} else {
				$ret = $ret && $this->preUpdate($con);
			}
			if ($ret) {
				$affectedRows = $this->doSave($con);
				if ($isInsert) {
					$this->postInsert($con);
				} else {
					$this->postUpdate($con);
				}
				$this->postSave($con);
				PlayerPeer::addInstanceToPool($this);
			} else {
				$affectedRows = 0;
			}
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Performs the work of inserting or updating the row in the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All related objects are also updated in this method.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        save()
	 */
	protected function doSave(PropelPDO $con)
	{
		$affectedRows = 0; // initialize var to track total num of affected rows
		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;

			// We call the save method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aPlayerRelatedByMainIdplayer !== null) {
				if ($this->aPlayerRelatedByMainIdplayer->isModified() || $this->aPlayerRelatedByMainIdplayer->isNew()) {
					$affectedRows += $this->aPlayerRelatedByMainIdplayer->save($con);
				}
				$this->setPlayerRelatedByMainIdplayer($this->aPlayerRelatedByMainIdplayer);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = PlayerPeer::IDPLAYER;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					if ($criteria->keyContainsValue(PlayerPeer::IDPLAYER) ) {
						throw new PropelException('Cannot insert a value for auto-increment primary key ('.PlayerPeer::IDPLAYER.')');
					}

					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows += 1;
					$this->setIdplayer($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows += PlayerPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collPlayersRelatedByIdplayer !== null) {
				foreach ($this->collPlayersRelatedByIdplayer as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLoots !== null) {
				foreach ($this->collLoots as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collPlayerspecializations !== null) {
				foreach ($this->collPlayerspecializations as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collRaidHasPlayers !== null) {
				foreach ($this->collRaidHasPlayers as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			$this->alreadyInSave = false;

		}
		return $affectedRows;
	} // doSave()

	/**
	 * Array of ValidationFailed objects.
	 * @var        array ValidationFailed[]
	 */
	protected $validationFailures = array();

	/**
	 * Gets any ValidationFailed objects that resulted from last call to validate().
	 *
	 *
	 * @return     array ValidationFailed[]
	 * @see        validate()
	 */
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	/**
	 * Validates the objects modified field values and all objects related to this table.
	 *
	 * If $columns is either a column name or an array of column names
	 * only those columns are validated.
	 *
	 * @param      mixed $columns Column name or an array of column names.
	 * @return     boolean Whether all columns pass validation.
	 * @see        doValidate()
	 * @see        getValidationFailures()
	 */
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	/**
	 * This function performs the validation work for complex object models.
	 *
	 * In addition to checking the current object, all related objects will
	 * also be validated.  If all pass then <code>true</code> is returned; otherwise
	 * an aggreagated array of ValidationFailed objects will be returned.
	 *
	 * @param      array $columns Array of column names to validate.
	 * @return     mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
	 */
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			// We call the validate method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aPlayerRelatedByMainIdplayer !== null) {
				if (!$this->aPlayerRelatedByMainIdplayer->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aPlayerRelatedByMainIdplayer->getValidationFailures());
				}
			}


			if (($retval = PlayerPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collPlayersRelatedByIdplayer !== null) {
					foreach ($this->collPlayersRelatedByIdplayer as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLoots !== null) {
					foreach ($this->collLoots as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collPlayerspecializations !== null) {
					foreach ($this->collPlayerspecializations as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collRaidHasPlayers !== null) {
					foreach ($this->collRaidHasPlayers as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	/**
	 * Retrieves a field from the object by name passed in as a string.
	 *
	 * @param      string $name name
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     mixed Value of field.
	 */
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PlayerPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	/**
	 * Retrieves a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @return     mixed Value of field at $pos
	 */
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getIdplayer();
				break;
			case 1:
				return $this->getPlayername();
				break;
			case 2:
				return $this->getTokencount();
				break;
			case 3:
				return $this->getGoldtokencount();
				break;
			case 4:
				return $this->getStatus();
				break;
			case 5:
				return $this->getInfo();
				break;
			case 6:
				return $this->getLastscan();
				break;
			case 7:
				return $this->getMainIdplayer();
				break;
			default:
				return null;
				break;
		} // switch()
	}

	/**
	 * Exports the object as an array.
	 *
	 * You can specify the key type of the array by passing one of the class
	 * type constants.
	 *
	 * @param     string  $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 *                    BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 *                    Defaults to BasePeer::TYPE_PHPNAME.
	 * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
	 * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
	 *
	 * @return    array an associative array containing the field names (as keys) and field values
	 */
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $includeForeignObjects = false)
	{
		$keys = PlayerPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getIdplayer(),
			$keys[1] => $this->getPlayername(),
			$keys[2] => $this->getTokencount(),
			$keys[3] => $this->getGoldtokencount(),
			$keys[4] => $this->getStatus(),
			$keys[5] => $this->getInfo(),
			$keys[6] => $this->getLastscan(),
			$keys[7] => $this->getMainIdplayer(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aPlayerRelatedByMainIdplayer) {
				$result['PlayerRelatedByMainIdplayer'] = $this->aPlayerRelatedByMainIdplayer->toArray($keyType, $includeLazyLoadColumns, true);
			}
		}
		return $result;
	}

	/**
	 * Sets a field from the object by name passed in as a string.
	 *
	 * @param      string $name peer name
	 * @param      mixed $value field value
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     void
	 */
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PlayerPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	/**
	 * Sets a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @param      mixed $value field value
	 * @return     void
	 */
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setIdplayer($value);
				break;
			case 1:
				$this->setPlayername($value);
				break;
			case 2:
				$this->setTokencount($value);
				break;
			case 3:
				$this->setGoldtokencount($value);
				break;
			case 4:
				$this->setStatus($value);
				break;
			case 5:
				$this->setInfo($value);
				break;
			case 6:
				$this->setLastscan($value);
				break;
			case 7:
				$this->setMainIdplayer($value);
				break;
		} // switch()
	}

	/**
	 * Populates the object using an array.
	 *
	 * This is particularly useful when populating an object from one of the
	 * request arrays (e.g. $_POST).  This method goes through the column
	 * names, checking to see whether a matching key exists in populated
	 * array. If so the setByName() method is called for that column.
	 *
	 * You can specify the key type of the array by additionally passing one
	 * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 * The default key type is the column's phpname (e.g. 'AuthorId')
	 *
	 * @param      array  $arr     An array to populate the object from.
	 * @param      string $keyType The type of keys the array uses.
	 * @return     void
	 */
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PlayerPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setIdplayer($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setPlayername($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTokencount($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setGoldtokencount($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setStatus($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setInfo($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setLastscan($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setMainIdplayer($arr[$keys[7]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(PlayerPeer::DATABASE_NAME);

		if ($this->isColumnModified(PlayerPeer::IDPLAYER)) $criteria->add(PlayerPeer::IDPLAYER, $this->idplayer);
		if ($this->isColumnModified(PlayerPeer::PLAYERNAME)) $criteria->add(PlayerPeer::PLAYERNAME, $this->playername);
		if ($this->isColumnModified(PlayerPeer::TOKENCOUNT)) $criteria->add(PlayerPeer::TOKENCOUNT, $this->tokencount);
		if ($this->isColumnModified(PlayerPeer::GOLDTOKENCOUNT)) $criteria->add(PlayerPeer::GOLDTOKENCOUNT, $this->goldtokencount);
		if ($this->isColumnModified(PlayerPeer::STATUS)) $criteria->add(PlayerPeer::STATUS, $this->status);
		if ($this->isColumnModified(PlayerPeer::INFO)) $criteria->add(PlayerPeer::INFO, $this->info);
		if ($this->isColumnModified(PlayerPeer::LASTSCAN)) $criteria->add(PlayerPeer::LASTSCAN, $this->lastscan);
		if ($this->isColumnModified(PlayerPeer::MAIN_IDPLAYER)) $criteria->add(PlayerPeer::MAIN_IDPLAYER, $this->main_idplayer);

		return $criteria;
	}

	/**
	 * Builds a Criteria object containing the primary key for this object.
	 *
	 * Unlike buildCriteria() this method includes the primary key values regardless
	 * of whether or not they have been modified.
	 *
	 * @return     Criteria The Criteria object containing value(s) for primary key(s).
	 */
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(PlayerPeer::DATABASE_NAME);
		$criteria->add(PlayerPeer::IDPLAYER, $this->idplayer);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getIdplayer();
	}

	/**
	 * Generic method to set the primary key (idplayer column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setIdplayer($key);
	}

	/**
	 * Returns true if the primary key for this object is null.
	 * @return     boolean
	 */
	public function isPrimaryKeyNull()
	{
		return null === $this->getIdplayer();
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of Player (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{
		$copyObj->setPlayername($this->playername);
		$copyObj->setTokencount($this->tokencount);
		$copyObj->setGoldtokencount($this->goldtokencount);
		$copyObj->setStatus($this->status);
		$copyObj->setInfo($this->info);
		$copyObj->setLastscan($this->lastscan);
		$copyObj->setMainIdplayer($this->main_idplayer);

		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getPlayersRelatedByIdplayer() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addPlayerRelatedByIdplayer($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getLoots() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addLoot($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getPlayerspecializations() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addPlayerspecialization($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getRaidHasPlayers() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addRaidHasPlayer($relObj->copy($deepCopy));
				}
			}

		} // if ($deepCopy)


		$copyObj->setNew(true);
		$copyObj->setIdplayer(NULL); // this is a auto-increment column, so set to default value
	}

	/**
	 * Makes a copy of this object that will be inserted as a new row in table when saved.
	 * It creates a new object filling in the simple attributes, but skipping any primary
	 * keys that are defined for the table.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @return     Player Clone of current object.
	 * @throws     PropelException
	 */
	public function copy($deepCopy = false)
	{
		// we use get_class(), because this might be a subclass
		$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	/**
	 * Returns a peer instance associated with this om.
	 *
	 * Since Peer classes are not to have any instance attributes, this method returns the
	 * same instance for all member of this class. The method could therefore
	 * be static, but this would prevent one from overriding the behavior.
	 *
	 * @return     PlayerPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new PlayerPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Player object.
	 *
	 * @param      Player $v
	 * @return     Player The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setPlayerRelatedByMainIdplayer(Player $v = null)
	{
		if ($v === null) {
			$this->setMainIdplayer(NULL);
		} else {
			$this->setMainIdplayer($v->getIdplayer());
		}

		$this->aPlayerRelatedByMainIdplayer = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Player object, it will not be re-added.
		if ($v !== null) {
			$v->addPlayerRelatedByIdplayer($this);
		}

		return $this;
	}


	/**
	 * Get the associated Player object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Player The associated Player object.
	 * @throws     PropelException
	 */
	public function getPlayerRelatedByMainIdplayer(PropelPDO $con = null)
	{
		if ($this->aPlayerRelatedByMainIdplayer === null && ($this->main_idplayer !== null)) {
			$this->aPlayerRelatedByMainIdplayer = PlayerQuery::create()->findPk($this->main_idplayer, $con);
			/* The following can be used additionally to
				 guarantee the related object contains a reference
				 to this object.  This level of coupling may, however, be
				 undesirable since it could result in an only partially populated collection
				 in the referenced object.
				 $this->aPlayerRelatedByMainIdplayer->addPlayersRelatedByIdplayer($this);
			 */
		}
		return $this->aPlayerRelatedByMainIdplayer;
	}

	/**
	 * Clears out the collPlayersRelatedByIdplayer collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addPlayersRelatedByIdplayer()
	 */
	public function clearPlayersRelatedByIdplayer()
	{
		$this->collPlayersRelatedByIdplayer = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collPlayersRelatedByIdplayer collection.
	 *
	 * By default this just sets the collPlayersRelatedByIdplayer collection to an empty array (like clearcollPlayersRelatedByIdplayer());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initPlayersRelatedByIdplayer()
	{
		$this->collPlayersRelatedByIdplayer = new PropelObjectCollection();
		$this->collPlayersRelatedByIdplayer->setModel('Player');
	}

	/**
	 * Gets an array of Player objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Player is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Player[] List of Player objects
	 * @throws     PropelException
	 */
	public function getPlayersRelatedByIdplayer($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collPlayersRelatedByIdplayer || null !== $criteria) {
			if ($this->isNew() && null === $this->collPlayersRelatedByIdplayer) {
				// return empty collection
				$this->initPlayersRelatedByIdplayer();
			} else {
				$collPlayersRelatedByIdplayer = PlayerQuery::create(null, $criteria)
					->filterByPlayerRelatedByMainIdplayer($this)
					->find($con);
				if (null !== $criteria) {
					return $collPlayersRelatedByIdplayer;
				}
				$this->collPlayersRelatedByIdplayer = $collPlayersRelatedByIdplayer;
			}
		}
		return $this->collPlayersRelatedByIdplayer;
	}

	/**
	 * Returns the number of related Player objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Player objects.
	 * @throws     PropelException
	 */
	public function countPlayersRelatedByIdplayer(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collPlayersRelatedByIdplayer || null !== $criteria) {
			if ($this->isNew() && null === $this->collPlayersRelatedByIdplayer) {
				return 0;
			} else {
				$query = PlayerQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByPlayerRelatedByMainIdplayer($this)
					->count($con);
			}
		} else {
			return count($this->collPlayersRelatedByIdplayer);
		}
	}

	/**
	 * Method called to associate a Player object to this object
	 * through the Player foreign key attribute.
	 *
	 * @param      Player $l Player
	 * @return     void
	 * @throws     PropelException
	 */
	public function addPlayerRelatedByIdplayer(Player $l)
	{
		if ($this->collPlayersRelatedByIdplayer === null) {
			$this->initPlayersRelatedByIdplayer();
		}
		if (!$this->collPlayersRelatedByIdplayer->contains($l)) { // only add it if the **same** object is not already associated
			$this->collPlayersRelatedByIdplayer[]= $l;
			$l->setPlayerRelatedByMainIdplayer($this);
		}
	}

	/**
	 * Clears out the collLoots collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addLoots()
	 */
	public function clearLoots()
	{
		$this->collLoots = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collLoots collection.
	 *
	 * By default this just sets the collLoots collection to an empty array (like clearcollLoots());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initLoots()
	{
		$this->collLoots = new PropelObjectCollection();
		$this->collLoots->setModel('Loot');
	}

	/**
	 * Gets an array of Loot objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Player is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Loot[] List of Loot objects
	 * @throws     PropelException
	 */
	public function getLoots($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collLoots || null !== $criteria) {
			if ($this->isNew() && null === $this->collLoots) {
				// return empty collection
				$this->initLoots();
			} else {
				$collLoots = LootQuery::create(null, $criteria)
					->filterByPlayer($this)
					->find($con);
				if (null !== $criteria) {
					return $collLoots;
				}
				$this->collLoots = $collLoots;
			}
		}
		return $this->collLoots;
	}

	/**
	 * Returns the number of related Loot objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Loot objects.
	 * @throws     PropelException
	 */
	public function countLoots(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collLoots || null !== $criteria) {
			if ($this->isNew() && null === $this->collLoots) {
				return 0;
			} else {
				$query = LootQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByPlayer($this)
					->count($con);
			}
		} else {
			return count($this->collLoots);
		}
	}

	/**
	 * Method called to associate a Loot object to this object
	 * through the Loot foreign key attribute.
	 *
	 * @param      Loot $l Loot
	 * @return     void
	 * @throws     PropelException
	 */
	public function addLoot(Loot $l)
	{
		if ($this->collLoots === null) {
			$this->initLoots();
		}
		if (!$this->collLoots->contains($l)) { // only add it if the **same** object is not already associated
			$this->collLoots[]= $l;
			$l->setPlayer($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Player is new, it will return
	 * an empty collection; or if this Player has previously
	 * been saved, it will retrieve related Loots from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Player.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Loot[] List of Loot objects
	 */
	public function getLootsJoinRaid($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = LootQuery::create(null, $criteria);
		$query->joinWith('Raid', $join_behavior);

		return $this->getLoots($query, $con);
	}

	/**
	 * Clears out the collPlayerspecializations collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addPlayerspecializations()
	 */
	public function clearPlayerspecializations()
	{
		$this->collPlayerspecializations = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collPlayerspecializations collection.
	 *
	 * By default this just sets the collPlayerspecializations collection to an empty array (like clearcollPlayerspecializations());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initPlayerspecializations()
	{
		$this->collPlayerspecializations = new PropelObjectCollection();
		$this->collPlayerspecializations->setModel('Playerspecialization');
	}

	/**
	 * Gets an array of Playerspecialization objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Player is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Playerspecialization[] List of Playerspecialization objects
	 * @throws     PropelException
	 */
	public function getPlayerspecializations($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collPlayerspecializations || null !== $criteria) {
			if ($this->isNew() && null === $this->collPlayerspecializations) {
				// return empty collection
				$this->initPlayerspecializations();
			} else {
				$collPlayerspecializations = PlayerspecializationQuery::create(null, $criteria)
					->filterByPlayer($this)
					->find($con);
				if (null !== $criteria) {
					return $collPlayerspecializations;
				}
				$this->collPlayerspecializations = $collPlayerspecializations;
			}
		}
		return $this->collPlayerspecializations;
	}

	/**
	 * Returns the number of related Playerspecialization objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Playerspecialization objects.
	 * @throws     PropelException
	 */
	public function countPlayerspecializations(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collPlayerspecializations || null !== $criteria) {
			if ($this->isNew() && null === $this->collPlayerspecializations) {
				return 0;
			} else {
				$query = PlayerspecializationQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByPlayer($this)
					->count($con);
			}
		} else {
			return count($this->collPlayerspecializations);
		}
	}

	/**
	 * Method called to associate a Playerspecialization object to this object
	 * through the Playerspecialization foreign key attribute.
	 *
	 * @param      Playerspecialization $l Playerspecialization
	 * @return     void
	 * @throws     PropelException
	 */
	public function addPlayerspecialization(Playerspecialization $l)
	{
		if ($this->collPlayerspecializations === null) {
			$this->initPlayerspecializations();
		}
		if (!$this->collPlayerspecializations->contains($l)) { // only add it if the **same** object is not already associated
			$this->collPlayerspecializations[]= $l;
			$l->setPlayer($this);
		}
	}

	/**
	 * Clears out the collRaidHasPlayers collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addRaidHasPlayers()
	 */
	public function clearRaidHasPlayers()
	{
		$this->collRaidHasPlayers = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collRaidHasPlayers collection.
	 *
	 * By default this just sets the collRaidHasPlayers collection to an empty array (like clearcollRaidHasPlayers());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initRaidHasPlayers()
	{
		$this->collRaidHasPlayers = new PropelObjectCollection();
		$this->collRaidHasPlayers->setModel('RaidHasPlayer');
	}

	/**
	 * Gets an array of RaidHasPlayer objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Player is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array RaidHasPlayer[] List of RaidHasPlayer objects
	 * @throws     PropelException
	 */
	public function getRaidHasPlayers($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collRaidHasPlayers || null !== $criteria) {
			if ($this->isNew() && null === $this->collRaidHasPlayers) {
				// return empty collection
				$this->initRaidHasPlayers();
			} else {
				$collRaidHasPlayers = RaidHasPlayerQuery::create(null, $criteria)
					->filterByPlayer($this)
					->find($con);
				if (null !== $criteria) {
					return $collRaidHasPlayers;
				}
				$this->collRaidHasPlayers = $collRaidHasPlayers;
			}
		}
		return $this->collRaidHasPlayers;
	}

	/**
	 * Returns the number of related RaidHasPlayer objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related RaidHasPlayer objects.
	 * @throws     PropelException
	 */
	public function countRaidHasPlayers(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collRaidHasPlayers || null !== $criteria) {
			if ($this->isNew() && null === $this->collRaidHasPlayers) {
				return 0;
			} else {
				$query = RaidHasPlayerQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByPlayer($this)
					->count($con);
			}
		} else {
			return count($this->collRaidHasPlayers);
		}
	}

	/**
	 * Method called to associate a RaidHasPlayer object to this object
	 * through the RaidHasPlayer foreign key attribute.
	 *
	 * @param      RaidHasPlayer $l RaidHasPlayer
	 * @return     void
	 * @throws     PropelException
	 */
	public function addRaidHasPlayer(RaidHasPlayer $l)
	{
		if ($this->collRaidHasPlayers === null) {
			$this->initRaidHasPlayers();
		}
		if (!$this->collRaidHasPlayers->contains($l)) { // only add it if the **same** object is not already associated
			$this->collRaidHasPlayers[]= $l;
			$l->setPlayer($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Player is new, it will return
	 * an empty collection; or if this Player has previously
	 * been saved, it will retrieve related RaidHasPlayers from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Player.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array RaidHasPlayer[] List of RaidHasPlayer objects
	 */
	public function getRaidHasPlayersJoinRaid($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = RaidHasPlayerQuery::create(null, $criteria);
		$query->joinWith('Raid', $join_behavior);

		return $this->getRaidHasPlayers($query, $con);
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->idplayer = null;
		$this->playername = null;
		$this->tokencount = null;
		$this->goldtokencount = null;
		$this->status = null;
		$this->info = null;
		$this->lastscan = null;
		$this->main_idplayer = null;
		$this->alreadyInSave = false;
		$this->alreadyInValidation = false;
		$this->clearAllReferences();
		$this->resetModified();
		$this->setNew(true);
		$this->setDeleted(false);
	}

	/**
	 * Resets all collections of referencing foreign keys.
	 *
	 * This method is a user-space workaround for PHP's inability to garbage collect objects
	 * with circular references.  This is currently necessary when using Propel in certain
	 * daemon or large-volumne/high-memory operations.
	 *
	 * @param      boolean $deep Whether to also clear the references on all associated objects.
	 */
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collPlayersRelatedByIdplayer) {
				foreach ((array) $this->collPlayersRelatedByIdplayer as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collLoots) {
				foreach ((array) $this->collLoots as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collPlayerspecializations) {
				foreach ((array) $this->collPlayerspecializations as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collRaidHasPlayers) {
				foreach ((array) $this->collRaidHasPlayers as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collPlayersRelatedByIdplayer = null;
		$this->collLoots = null;
		$this->collPlayerspecializations = null;
		$this->collRaidHasPlayers = null;
		$this->aPlayerRelatedByMainIdplayer = null;
	}

	/**
	 * Catches calls to virtual methods
	 */
	public function __call($name, $params)
	{
		if (preg_match('/get(\w+)/', $name, $matches)) {
			$virtualColumn = $matches[1];
			if ($this->hasVirtualColumn($virtualColumn)) {
				return $this->getVirtualColumn($virtualColumn);
			}
			// no lcfirst in php<5.3...
			$virtualColumn[0] = strtolower($virtualColumn[0]);
			if ($this->hasVirtualColumn($virtualColumn)) {
				return $this->getVirtualColumn($virtualColumn);
			}
		}
		return parent::__call($name, $params);
	}

} // BasePlayer
