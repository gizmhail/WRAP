<?php


/**
 * Base class that represents a row from the 'Raid' table.
 *
 * 
 *
 * @package    propel.generator.wrap.om
 */
abstract class BaseRaid extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'RaidPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        RaidPeer
	 */
	protected static $peer;

	/**
	 * The value for the idraid field.
	 * @var        int
	 */
	protected $idraid;

	/**
	 * The value for the date field.
	 * @var        int
	 */
	protected $date;

	/**
	 * The value for the raidperiod_idraidperiod field.
	 * @var        int
	 */
	protected $raidperiod_idraidperiod;

	/**
	 * The value for the status field.
	 * @var        string
	 */
	protected $status;

	/**
	 * The value for the comment field.
	 * @var        string
	 */
	protected $comment;

	/**
	 * The value for the location field.
	 * @var        string
	 */
	protected $location;

	/**
	 * The value for the armoryid field.
	 * @var        string
	 */
	protected $armoryid;

	/**
	 * The value for the analysed field.
	 * @var        boolean
	 */
	protected $analysed;

	/**
	 * @var        Raidperiod
	 */
	protected $aRaidperiod;

	/**
	 * @var        array Loot[] Collection to store aggregation of Loot objects.
	 */
	protected $collLoots;

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
	 * Get the [idraid] column value.
	 * 
	 * @return     int
	 */
	public function getIdraid()
	{
		return $this->idraid;
	}

	/**
	 * Get the [date] column value.
	 * 
	 * @return     int
	 */
	public function getDate()
	{
		return $this->date;
	}

	/**
	 * Get the [raidperiod_idraidperiod] column value.
	 * 
	 * @return     int
	 */
	public function getRaidperiodIdraidperiod()
	{
		return $this->raidperiod_idraidperiod;
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
	 * Get the [comment] column value.
	 * 
	 * @return     string
	 */
	public function getComment()
	{
		return $this->comment;
	}

	/**
	 * Get the [location] column value.
	 * 
	 * @return     string
	 */
	public function getLocation()
	{
		return $this->location;
	}

	/**
	 * Get the [armoryid] column value.
	 * 
	 * @return     string
	 */
	public function getArmoryid()
	{
		return $this->armoryid;
	}

	/**
	 * Get the [analysed] column value.
	 * 
	 * @return     boolean
	 */
	public function getAnalysed()
	{
		return $this->analysed;
	}

	/**
	 * Set the value of [idraid] column.
	 * 
	 * @param      int $v new value
	 * @return     Raid The current object (for fluent API support)
	 */
	public function setIdraid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->idraid !== $v) {
			$this->idraid = $v;
			$this->modifiedColumns[] = RaidPeer::IDRAID;
		}

		return $this;
	} // setIdraid()

	/**
	 * Set the value of [date] column.
	 * 
	 * @param      int $v new value
	 * @return     Raid The current object (for fluent API support)
	 */
	public function setDate($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->date !== $v) {
			$this->date = $v;
			$this->modifiedColumns[] = RaidPeer::DATE;
		}

		return $this;
	} // setDate()

	/**
	 * Set the value of [raidperiod_idraidperiod] column.
	 * 
	 * @param      int $v new value
	 * @return     Raid The current object (for fluent API support)
	 */
	public function setRaidperiodIdraidperiod($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->raidperiod_idraidperiod !== $v) {
			$this->raidperiod_idraidperiod = $v;
			$this->modifiedColumns[] = RaidPeer::RAIDPERIOD_IDRAIDPERIOD;
		}

		if ($this->aRaidperiod !== null && $this->aRaidperiod->getIdraidperiod() !== $v) {
			$this->aRaidperiod = null;
		}

		return $this;
	} // setRaidperiodIdraidperiod()

	/**
	 * Set the value of [status] column.
	 * 
	 * @param      string $v new value
	 * @return     Raid The current object (for fluent API support)
	 */
	public function setStatus($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->status !== $v) {
			$this->status = $v;
			$this->modifiedColumns[] = RaidPeer::STATUS;
		}

		return $this;
	} // setStatus()

	/**
	 * Set the value of [comment] column.
	 * 
	 * @param      string $v new value
	 * @return     Raid The current object (for fluent API support)
	 */
	public function setComment($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->comment !== $v) {
			$this->comment = $v;
			$this->modifiedColumns[] = RaidPeer::COMMENT;
		}

		return $this;
	} // setComment()

	/**
	 * Set the value of [location] column.
	 * 
	 * @param      string $v new value
	 * @return     Raid The current object (for fluent API support)
	 */
	public function setLocation($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->location !== $v) {
			$this->location = $v;
			$this->modifiedColumns[] = RaidPeer::LOCATION;
		}

		return $this;
	} // setLocation()

	/**
	 * Set the value of [armoryid] column.
	 * 
	 * @param      string $v new value
	 * @return     Raid The current object (for fluent API support)
	 */
	public function setArmoryid($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->armoryid !== $v) {
			$this->armoryid = $v;
			$this->modifiedColumns[] = RaidPeer::ARMORYID;
		}

		return $this;
	} // setArmoryid()

	/**
	 * Set the value of [analysed] column.
	 * 
	 * @param      boolean $v new value
	 * @return     Raid The current object (for fluent API support)
	 */
	public function setAnalysed($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->analysed !== $v) {
			$this->analysed = $v;
			$this->modifiedColumns[] = RaidPeer::ANALYSED;
		}

		return $this;
	} // setAnalysed()

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

			$this->idraid = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->date = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->raidperiod_idraidperiod = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->status = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->comment = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->location = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->armoryid = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->analysed = ($row[$startcol + 7] !== null) ? (boolean) $row[$startcol + 7] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 8; // 8 = RaidPeer::NUM_COLUMNS - RaidPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Raid object", $e);
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

		if ($this->aRaidperiod !== null && $this->raidperiod_idraidperiod !== $this->aRaidperiod->getIdraidperiod()) {
			$this->aRaidperiod = null;
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
			$con = Propel::getConnection(RaidPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = RaidPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aRaidperiod = null;
			$this->collLoots = null;

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
			$con = Propel::getConnection(RaidPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				RaidQuery::create()
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
			$con = Propel::getConnection(RaidPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				RaidPeer::addInstanceToPool($this);
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

			if ($this->aRaidperiod !== null) {
				if ($this->aRaidperiod->isModified() || $this->aRaidperiod->isNew()) {
					$affectedRows += $this->aRaidperiod->save($con);
				}
				$this->setRaidperiod($this->aRaidperiod);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = RaidPeer::IDRAID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					if ($criteria->keyContainsValue(RaidPeer::IDRAID) ) {
						throw new PropelException('Cannot insert a value for auto-increment primary key ('.RaidPeer::IDRAID.')');
					}

					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows += 1;
					$this->setIdraid($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows += RaidPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collLoots !== null) {
				foreach ($this->collLoots as $referrerFK) {
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

			if ($this->aRaidperiod !== null) {
				if (!$this->aRaidperiod->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aRaidperiod->getValidationFailures());
				}
			}


			if (($retval = RaidPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collLoots !== null) {
					foreach ($this->collLoots as $referrerFK) {
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
		$pos = RaidPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getIdraid();
				break;
			case 1:
				return $this->getDate();
				break;
			case 2:
				return $this->getRaidperiodIdraidperiod();
				break;
			case 3:
				return $this->getStatus();
				break;
			case 4:
				return $this->getComment();
				break;
			case 5:
				return $this->getLocation();
				break;
			case 6:
				return $this->getArmoryid();
				break;
			case 7:
				return $this->getAnalysed();
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
		$keys = RaidPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getIdraid(),
			$keys[1] => $this->getDate(),
			$keys[2] => $this->getRaidperiodIdraidperiod(),
			$keys[3] => $this->getStatus(),
			$keys[4] => $this->getComment(),
			$keys[5] => $this->getLocation(),
			$keys[6] => $this->getArmoryid(),
			$keys[7] => $this->getAnalysed(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aRaidperiod) {
				$result['Raidperiod'] = $this->aRaidperiod->toArray($keyType, $includeLazyLoadColumns, true);
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
		$pos = RaidPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setIdraid($value);
				break;
			case 1:
				$this->setDate($value);
				break;
			case 2:
				$this->setRaidperiodIdraidperiod($value);
				break;
			case 3:
				$this->setStatus($value);
				break;
			case 4:
				$this->setComment($value);
				break;
			case 5:
				$this->setLocation($value);
				break;
			case 6:
				$this->setArmoryid($value);
				break;
			case 7:
				$this->setAnalysed($value);
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
		$keys = RaidPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setIdraid($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDate($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setRaidperiodIdraidperiod($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setStatus($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setComment($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setLocation($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setArmoryid($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setAnalysed($arr[$keys[7]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(RaidPeer::DATABASE_NAME);

		if ($this->isColumnModified(RaidPeer::IDRAID)) $criteria->add(RaidPeer::IDRAID, $this->idraid);
		if ($this->isColumnModified(RaidPeer::DATE)) $criteria->add(RaidPeer::DATE, $this->date);
		if ($this->isColumnModified(RaidPeer::RAIDPERIOD_IDRAIDPERIOD)) $criteria->add(RaidPeer::RAIDPERIOD_IDRAIDPERIOD, $this->raidperiod_idraidperiod);
		if ($this->isColumnModified(RaidPeer::STATUS)) $criteria->add(RaidPeer::STATUS, $this->status);
		if ($this->isColumnModified(RaidPeer::COMMENT)) $criteria->add(RaidPeer::COMMENT, $this->comment);
		if ($this->isColumnModified(RaidPeer::LOCATION)) $criteria->add(RaidPeer::LOCATION, $this->location);
		if ($this->isColumnModified(RaidPeer::ARMORYID)) $criteria->add(RaidPeer::ARMORYID, $this->armoryid);
		if ($this->isColumnModified(RaidPeer::ANALYSED)) $criteria->add(RaidPeer::ANALYSED, $this->analysed);

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
		$criteria = new Criteria(RaidPeer::DATABASE_NAME);
		$criteria->add(RaidPeer::IDRAID, $this->idraid);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getIdraid();
	}

	/**
	 * Generic method to set the primary key (idraid column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setIdraid($key);
	}

	/**
	 * Returns true if the primary key for this object is null.
	 * @return     boolean
	 */
	public function isPrimaryKeyNull()
	{
		return null === $this->getIdraid();
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of Raid (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{
		$copyObj->setDate($this->date);
		$copyObj->setRaidperiodIdraidperiod($this->raidperiod_idraidperiod);
		$copyObj->setStatus($this->status);
		$copyObj->setComment($this->comment);
		$copyObj->setLocation($this->location);
		$copyObj->setArmoryid($this->armoryid);
		$copyObj->setAnalysed($this->analysed);

		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getLoots() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addLoot($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getRaidHasPlayers() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addRaidHasPlayer($relObj->copy($deepCopy));
				}
			}

		} // if ($deepCopy)


		$copyObj->setNew(true);
		$copyObj->setIdraid(NULL); // this is a auto-increment column, so set to default value
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
	 * @return     Raid Clone of current object.
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
	 * @return     RaidPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new RaidPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Raidperiod object.
	 *
	 * @param      Raidperiod $v
	 * @return     Raid The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setRaidperiod(Raidperiod $v = null)
	{
		if ($v === null) {
			$this->setRaidperiodIdraidperiod(NULL);
		} else {
			$this->setRaidperiodIdraidperiod($v->getIdraidperiod());
		}

		$this->aRaidperiod = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Raidperiod object, it will not be re-added.
		if ($v !== null) {
			$v->addRaid($this);
		}

		return $this;
	}


	/**
	 * Get the associated Raidperiod object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Raidperiod The associated Raidperiod object.
	 * @throws     PropelException
	 */
	public function getRaidperiod(PropelPDO $con = null)
	{
		if ($this->aRaidperiod === null && ($this->raidperiod_idraidperiod !== null)) {
			$this->aRaidperiod = RaidperiodQuery::create()->findPk($this->raidperiod_idraidperiod, $con);
			/* The following can be used additionally to
				 guarantee the related object contains a reference
				 to this object.  This level of coupling may, however, be
				 undesirable since it could result in an only partially populated collection
				 in the referenced object.
				 $this->aRaidperiod->addRaids($this);
			 */
		}
		return $this->aRaidperiod;
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
	 * If this Raid is new, it will return
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
					->filterByRaid($this)
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
					->filterByRaid($this)
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
			$l->setRaid($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Raid is new, it will return
	 * an empty collection; or if this Raid has previously
	 * been saved, it will retrieve related Loots from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Raid.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Loot[] List of Loot objects
	 */
	public function getLootsJoinPlayer($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = LootQuery::create(null, $criteria);
		$query->joinWith('Player', $join_behavior);

		return $this->getLoots($query, $con);
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
	 * If this Raid is new, it will return
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
					->filterByRaid($this)
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
					->filterByRaid($this)
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
			$l->setRaid($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Raid is new, it will return
	 * an empty collection; or if this Raid has previously
	 * been saved, it will retrieve related RaidHasPlayers from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Raid.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array RaidHasPlayer[] List of RaidHasPlayer objects
	 */
	public function getRaidHasPlayersJoinPlayer($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = RaidHasPlayerQuery::create(null, $criteria);
		$query->joinWith('Player', $join_behavior);

		return $this->getRaidHasPlayers($query, $con);
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->idraid = null;
		$this->date = null;
		$this->raidperiod_idraidperiod = null;
		$this->status = null;
		$this->comment = null;
		$this->location = null;
		$this->armoryid = null;
		$this->analysed = null;
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
			if ($this->collLoots) {
				foreach ((array) $this->collLoots as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collRaidHasPlayers) {
				foreach ((array) $this->collRaidHasPlayers as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collLoots = null;
		$this->collRaidHasPlayers = null;
		$this->aRaidperiod = null;
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

} // BaseRaid
