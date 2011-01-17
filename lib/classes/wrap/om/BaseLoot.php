<?php


/**
 * Base class that represents a row from the 'Loot' table.
 *
 * 
 *
 * @package    propel.generator.wrap.om
 */
abstract class BaseLoot extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'LootPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        LootPeer
	 */
	protected static $peer;

	/**
	 * The value for the idloot field.
	 * @var        int
	 */
	protected $idloot;

	/**
	 * The value for the raid_idraid field.
	 * @var        int
	 */
	protected $raid_idraid;

	/**
	 * The value for the player_idplayer field.
	 * @var        int
	 */
	protected $player_idplayer;

	/**
	 * The value for the lootname field.
	 * @var        string
	 */
	protected $lootname;

	/**
	 * The value for the comment field.
	 * @var        string
	 */
	protected $comment;

	/**
	 * The value for the ilvl field.
	 * @var        int
	 */
	protected $ilvl;

	/**
	 * @var        Raid
	 */
	protected $aRaid;

	/**
	 * @var        Player
	 */
	protected $aPlayer;

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
	 * Get the [idloot] column value.
	 * 
	 * @return     int
	 */
	public function getIdloot()
	{
		return $this->idloot;
	}

	/**
	 * Get the [raid_idraid] column value.
	 * 
	 * @return     int
	 */
	public function getRaidIdraid()
	{
		return $this->raid_idraid;
	}

	/**
	 * Get the [player_idplayer] column value.
	 * 
	 * @return     int
	 */
	public function getPlayerIdplayer()
	{
		return $this->player_idplayer;
	}

	/**
	 * Get the [lootname] column value.
	 * 
	 * @return     string
	 */
	public function getLootname()
	{
		return $this->lootname;
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
	 * Get the [ilvl] column value.
	 * 
	 * @return     int
	 */
	public function getIlvl()
	{
		return $this->ilvl;
	}

	/**
	 * Set the value of [idloot] column.
	 * 
	 * @param      int $v new value
	 * @return     Loot The current object (for fluent API support)
	 */
	public function setIdloot($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->idloot !== $v) {
			$this->idloot = $v;
			$this->modifiedColumns[] = LootPeer::IDLOOT;
		}

		return $this;
	} // setIdloot()

	/**
	 * Set the value of [raid_idraid] column.
	 * 
	 * @param      int $v new value
	 * @return     Loot The current object (for fluent API support)
	 */
	public function setRaidIdraid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->raid_idraid !== $v) {
			$this->raid_idraid = $v;
			$this->modifiedColumns[] = LootPeer::RAID_IDRAID;
		}

		if ($this->aRaid !== null && $this->aRaid->getIdraid() !== $v) {
			$this->aRaid = null;
		}

		return $this;
	} // setRaidIdraid()

	/**
	 * Set the value of [player_idplayer] column.
	 * 
	 * @param      int $v new value
	 * @return     Loot The current object (for fluent API support)
	 */
	public function setPlayerIdplayer($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->player_idplayer !== $v) {
			$this->player_idplayer = $v;
			$this->modifiedColumns[] = LootPeer::PLAYER_IDPLAYER;
		}

		if ($this->aPlayer !== null && $this->aPlayer->getIdplayer() !== $v) {
			$this->aPlayer = null;
		}

		return $this;
	} // setPlayerIdplayer()

	/**
	 * Set the value of [lootname] column.
	 * 
	 * @param      string $v new value
	 * @return     Loot The current object (for fluent API support)
	 */
	public function setLootname($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->lootname !== $v) {
			$this->lootname = $v;
			$this->modifiedColumns[] = LootPeer::LOOTNAME;
		}

		return $this;
	} // setLootname()

	/**
	 * Set the value of [comment] column.
	 * 
	 * @param      string $v new value
	 * @return     Loot The current object (for fluent API support)
	 */
	public function setComment($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->comment !== $v) {
			$this->comment = $v;
			$this->modifiedColumns[] = LootPeer::COMMENT;
		}

		return $this;
	} // setComment()

	/**
	 * Set the value of [ilvl] column.
	 * 
	 * @param      int $v new value
	 * @return     Loot The current object (for fluent API support)
	 */
	public function setIlvl($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->ilvl !== $v) {
			$this->ilvl = $v;
			$this->modifiedColumns[] = LootPeer::ILVL;
		}

		return $this;
	} // setIlvl()

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

			$this->idloot = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->raid_idraid = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->player_idplayer = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->lootname = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->comment = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->ilvl = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 6; // 6 = LootPeer::NUM_COLUMNS - LootPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Loot object", $e);
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

		if ($this->aRaid !== null && $this->raid_idraid !== $this->aRaid->getIdraid()) {
			$this->aRaid = null;
		}
		if ($this->aPlayer !== null && $this->player_idplayer !== $this->aPlayer->getIdplayer()) {
			$this->aPlayer = null;
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
			$con = Propel::getConnection(LootPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = LootPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aRaid = null;
			$this->aPlayer = null;
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
			$con = Propel::getConnection(LootPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				LootQuery::create()
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
			$con = Propel::getConnection(LootPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				LootPeer::addInstanceToPool($this);
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

			if ($this->aRaid !== null) {
				if ($this->aRaid->isModified() || $this->aRaid->isNew()) {
					$affectedRows += $this->aRaid->save($con);
				}
				$this->setRaid($this->aRaid);
			}

			if ($this->aPlayer !== null) {
				if ($this->aPlayer->isModified() || $this->aPlayer->isNew()) {
					$affectedRows += $this->aPlayer->save($con);
				}
				$this->setPlayer($this->aPlayer);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = LootPeer::IDLOOT;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					if ($criteria->keyContainsValue(LootPeer::IDLOOT) ) {
						throw new PropelException('Cannot insert a value for auto-increment primary key ('.LootPeer::IDLOOT.')');
					}

					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows += 1;
					$this->setIdloot($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows += LootPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
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

			if ($this->aRaid !== null) {
				if (!$this->aRaid->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aRaid->getValidationFailures());
				}
			}

			if ($this->aPlayer !== null) {
				if (!$this->aPlayer->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aPlayer->getValidationFailures());
				}
			}


			if (($retval = LootPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
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
		$pos = LootPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getIdloot();
				break;
			case 1:
				return $this->getRaidIdraid();
				break;
			case 2:
				return $this->getPlayerIdplayer();
				break;
			case 3:
				return $this->getLootname();
				break;
			case 4:
				return $this->getComment();
				break;
			case 5:
				return $this->getIlvl();
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
		$keys = LootPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getIdloot(),
			$keys[1] => $this->getRaidIdraid(),
			$keys[2] => $this->getPlayerIdplayer(),
			$keys[3] => $this->getLootname(),
			$keys[4] => $this->getComment(),
			$keys[5] => $this->getIlvl(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aRaid) {
				$result['Raid'] = $this->aRaid->toArray($keyType, $includeLazyLoadColumns, true);
			}
			if (null !== $this->aPlayer) {
				$result['Player'] = $this->aPlayer->toArray($keyType, $includeLazyLoadColumns, true);
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
		$pos = LootPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setIdloot($value);
				break;
			case 1:
				$this->setRaidIdraid($value);
				break;
			case 2:
				$this->setPlayerIdplayer($value);
				break;
			case 3:
				$this->setLootname($value);
				break;
			case 4:
				$this->setComment($value);
				break;
			case 5:
				$this->setIlvl($value);
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
		$keys = LootPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setIdloot($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setRaidIdraid($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPlayerIdplayer($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setLootname($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setComment($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setIlvl($arr[$keys[5]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(LootPeer::DATABASE_NAME);

		if ($this->isColumnModified(LootPeer::IDLOOT)) $criteria->add(LootPeer::IDLOOT, $this->idloot);
		if ($this->isColumnModified(LootPeer::RAID_IDRAID)) $criteria->add(LootPeer::RAID_IDRAID, $this->raid_idraid);
		if ($this->isColumnModified(LootPeer::PLAYER_IDPLAYER)) $criteria->add(LootPeer::PLAYER_IDPLAYER, $this->player_idplayer);
		if ($this->isColumnModified(LootPeer::LOOTNAME)) $criteria->add(LootPeer::LOOTNAME, $this->lootname);
		if ($this->isColumnModified(LootPeer::COMMENT)) $criteria->add(LootPeer::COMMENT, $this->comment);
		if ($this->isColumnModified(LootPeer::ILVL)) $criteria->add(LootPeer::ILVL, $this->ilvl);

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
		$criteria = new Criteria(LootPeer::DATABASE_NAME);
		$criteria->add(LootPeer::IDLOOT, $this->idloot);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getIdloot();
	}

	/**
	 * Generic method to set the primary key (idloot column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setIdloot($key);
	}

	/**
	 * Returns true if the primary key for this object is null.
	 * @return     boolean
	 */
	public function isPrimaryKeyNull()
	{
		return null === $this->getIdloot();
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of Loot (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{
		$copyObj->setRaidIdraid($this->raid_idraid);
		$copyObj->setPlayerIdplayer($this->player_idplayer);
		$copyObj->setLootname($this->lootname);
		$copyObj->setComment($this->comment);
		$copyObj->setIlvl($this->ilvl);

		$copyObj->setNew(true);
		$copyObj->setIdloot(NULL); // this is a auto-increment column, so set to default value
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
	 * @return     Loot Clone of current object.
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
	 * @return     LootPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new LootPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Raid object.
	 *
	 * @param      Raid $v
	 * @return     Loot The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setRaid(Raid $v = null)
	{
		if ($v === null) {
			$this->setRaidIdraid(NULL);
		} else {
			$this->setRaidIdraid($v->getIdraid());
		}

		$this->aRaid = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Raid object, it will not be re-added.
		if ($v !== null) {
			$v->addLoot($this);
		}

		return $this;
	}


	/**
	 * Get the associated Raid object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Raid The associated Raid object.
	 * @throws     PropelException
	 */
	public function getRaid(PropelPDO $con = null)
	{
		if ($this->aRaid === null && ($this->raid_idraid !== null)) {
			$this->aRaid = RaidQuery::create()->findPk($this->raid_idraid, $con);
			/* The following can be used additionally to
				 guarantee the related object contains a reference
				 to this object.  This level of coupling may, however, be
				 undesirable since it could result in an only partially populated collection
				 in the referenced object.
				 $this->aRaid->addLoots($this);
			 */
		}
		return $this->aRaid;
	}

	/**
	 * Declares an association between this object and a Player object.
	 *
	 * @param      Player $v
	 * @return     Loot The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setPlayer(Player $v = null)
	{
		if ($v === null) {
			$this->setPlayerIdplayer(NULL);
		} else {
			$this->setPlayerIdplayer($v->getIdplayer());
		}

		$this->aPlayer = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Player object, it will not be re-added.
		if ($v !== null) {
			$v->addLoot($this);
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
	public function getPlayer(PropelPDO $con = null)
	{
		if ($this->aPlayer === null && ($this->player_idplayer !== null)) {
			$this->aPlayer = PlayerQuery::create()->findPk($this->player_idplayer, $con);
			/* The following can be used additionally to
				 guarantee the related object contains a reference
				 to this object.  This level of coupling may, however, be
				 undesirable since it could result in an only partially populated collection
				 in the referenced object.
				 $this->aPlayer->addLoots($this);
			 */
		}
		return $this->aPlayer;
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->idloot = null;
		$this->raid_idraid = null;
		$this->player_idplayer = null;
		$this->lootname = null;
		$this->comment = null;
		$this->ilvl = null;
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
		} // if ($deep)

		$this->aRaid = null;
		$this->aPlayer = null;
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

} // BaseLoot
