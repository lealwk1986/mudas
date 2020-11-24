<?php
namespace FrameWork;

class DatabaseTable {
	private $pdo;
	private $table;
	private $primaryKey;
	private $className;
	private $constructorArgs;

	public function __construct(\PDO $pdo, string $table, string $primaryKey, string $className = '\stdClass', array $constructorArgs = []) {
		$this->pdo = $pdo;
		$this->table = $table;
		$this->primaryKey = $primaryKey;
		$this->className = $className;
		$this->constructorArgs = $constructorArgs;
	}
    
    private function processDates($fields) {
		foreach ($fields as $key => $value) {
			if ($value instanceof \DateTime) {
				$fields[$key] = $value->format('Y-m-d');
			}
		}

		return $fields;
	}

	private function query($sql, $parameters = []) {
		$query = $this->pdo->prepare($sql);
		$query->execute($parameters);
		return $query;
	}	
    
	private function insert($fields) {
		$query = 'INSERT INTO `' . $this->table . '` (';

		foreach ($fields as $key => $value) {
			$query .= '`' . $key . '`,';
		}

		$query = rtrim($query, ',');

		$query .= ') VALUES (';


		foreach ($fields as $key => $value) {
			$query .= ':' . $key . ',';
		}

		$query = rtrim($query, ',');

		$query .= ')';

		$fields = $this->processDates($fields);

		$this->query($query, $fields);

		return $this->pdo->lastInsertId();
	}

	private function update($fields) {
		$query = ' UPDATE `' . $this->table .'` SET ';

		foreach ($fields as $key => $value) {
			$query .= '`' . $key . '` = :' . $key . ',';
		}

		$query = rtrim($query, ',');

		$query .= ' WHERE `' . $this->primaryKey . '` = :primaryKey';

		//Set the :primaryKey variable
		$fields['primaryKey'] = $fields[$this->primaryKey];

		$fields = $this->processDates($fields);

		$this->query($query, $fields);
	}    

	public function total() {
		$query = $this->query('SELECT COUNT(*) FROM `' . $this->table . '`');
		$row = $query->fetch();
		return $row[0];
	}

	public function findById($value) {
		$query = 'SELECT * FROM `' . $this->table . '` WHERE `' . $this->primaryKey . '` = :value';

		$parameters = [
			'value' => $value
		];

		$query = $this->query($query, $parameters);

		return $query->fetchObject($this->className, $this->constructorArgs);
	}

 	public function find($column, $value) {
		$query = 'SELECT * FROM ' . $this->table . ' WHERE ' . $column . ' = :value';

		$parameters = [
			'value' => $value
		];

		$query = $this->query($query, $parameters);

		return $query->fetchAll(\PDO::FETCH_CLASS, $this->className, $this->constructorArgs);
	}
    
    public function findLessThan($column, $value) {
		$query = 'SELECT * FROM ' . $this->table . ' WHERE ' . $column . ' <= :value';

		$parameters = [
			'value' => $value
		];

		$query = $this->query($query, $parameters);

		return $query->fetchAll(\PDO::FETCH_CLASS, $this->className, $this->constructorArgs);
	}
    
    public function findGreaterThan($column, $value) {
		$query = 'SELECT * FROM ' . $this->table . ' WHERE ' . $column . ' <= :value';

		$parameters = [
			'value' => $value
		];

		$query = $this->query($query, $parameters);

		return $query->fetchAll(\PDO::FETCH_CLASS, $this->className, $this->constructorArgs);
	}    
    
    public function findOrder($column, $value,$columO, $crit) {
		$query = 'SELECT * FROM ' . $this->table . ' WHERE ' . $column . ' = :value' . ' ORDER BY '. $columO . ' ' . $crit;

		$parameters = [
			'value' => $value
		];

		$query = $this->query($query, $parameters);

		return $query->fetchAll(\PDO::FETCH_CLASS, $this->className, $this->constructorArgs);
	}
    
	public function find2($column, $value, $column2, $value2 ) {
		$query = 'SELECT * FROM ' . $this->table . ' WHERE ' . $column . ' = :value'.' AND '. $column2 . ' = :value2' ;

		$parameters = [
			'value' => $value,
            'value2' => $value2
		];

		$query = $this->query($query, $parameters);

		return $query->fetchAll(\PDO::FETCH_CLASS, $this->className, $this->constructorArgs);
	}    
    
    public function find3($column, $value, $column2, $value2, $column3, $value3 ) {
		$query = 'SELECT * FROM ' . $this->table . ' WHERE ' . $column . ' = :value'.' AND '. $column2 . ' = :value2'.' AND '. $column3 . ' = :value3' ;

		$parameters = [
			'value' => $value,
            'value2' => $value2,
            'value3' => $value3
		];

		$query = $this->query($query, $parameters);

		return $query->fetchAll(\PDO::FETCH_CLASS, $this->className, $this->constructorArgs);
	}    
  
	public function delete($id ) {
		$parameters = [':id' => $id];

		$this->query('DELETE FROM `' . $this->table . '` WHERE `' . $this->primaryKey . '` = :id', $parameters);
	}
    
	public function deleteWhere($column, $value) {
		$query = 'DELETE FROM ' . $this->table . ' WHERE ' . $column . ' = :value';

		$parameters = [
			'value' => $value
		];

		$query = $this->query($query, $parameters);
	}
        
    public function deleteWhere2($column1, $value1, $column2, $value2) {
		$query = 'DELETE FROM ' . $this->table . ' WHERE ' . $column1 . ' = :value1'. ' AND '. $column2 . ' = :value2';

		$parameters = [
			'value1' => $value1,
            'value2' => $value2
		];

		$query = $this->query($query, $parameters);
	}
    
    public function deleteWhere3($column1, $value1, $column2, $value2, $column3, $value3) {
		$query = 'DELETE FROM ' . $this->table . ' WHERE ' . $column1 . ' = :value1'. ' AND '. $column2 . ' = :value2'. ' AND '. $column3 . ' = :value3';

		$parameters = [
			'value1' => $value1,
            'value2' => $value2,
            'value3' => $value3
		];

		$query = $this->query($query, $parameters);
	}
    
	public function findAll() {
		$result = $this->query('SELECT * FROM ' . $this->table);

		return $result->fetchAll(\PDO::FETCH_CLASS, $this->className, $this->constructorArgs);
	}
    
    public function findAllOrder($colum, $crit) {
		$result = $this->query('SELECT * FROM ' . $this->table . ' ORDER BY '. $colum . ' ' . $crit);

		return $result->fetchAll(\PDO::FETCH_CLASS, $this->className, $this->constructorArgs);
	}

	public function save($record) {
		$entity = new $this->className(...$this->constructorArgs);

		try {
			if ($record[$this->primaryKey] == '') {
				$record[$this->primaryKey] = null;
			}
			$insertId = $this->insert($record);

			$entity->{$this->primaryKey} = $insertId;
		}
		catch (\PDOException $e) {
			$this->update($record);
		}

		foreach ($record as $key => $value) {
			if (!empty($value)) {
				$entity->$key = $value;	
			}			
		}

		return $entity;	
	}
    
    public function maxId(){
        $query = $this->query('SELECT MAX(id) FROM `' . $this->table . '`');
		$row = $query->fetch();
		return $row[0];
 
    }
    
    public function agrupar($columB, $columnS, $columnF, $value){
        $query = 'SELECT `'.$columB.'`, SUM(`'.$columnS.'`) AS `'.$columnS.'` FROM `' . $this->table . '` WHERE `'.$columnF.'` = :value'.' GROUP BY `'.$columB.'`' ;
        $parameters = [
			'value' => $value
		];
        $query = $this->query($query, $parameters);
        $result=$query->fetchAll();
		$MAtriz = [];
		foreach ($result as $data) {
			$MAtriz[] = [
                $data[$columB],
				$data[$columnS]
			];

		}

        return $MAtriz;

    }
    
    public function agruparMenor($columB, $columnS, $columnF, $value, $columnM){
         $query = 'SELECT `'.$columB.'`, `'.$columnM.'`, SUM(`'.$columnS.'`) AS `'.$columnS.'` FROM `' . $this->table. '` WHERE `'.$columnF.'` = :value' .'` GROUP BY `'.$columB.'`' ;

        $parameters = [
		];
        $query = $this->query($query, $parameters);
        $result=$query->fetchAll(\PDO::FETCH_CLASS, $this->className, $this->constructorArgs);
		
        $MAtriz = [];
		foreach ($result as $data) {
            if($data->$columnS<=$data->$columnM){
			$MAtriz[] = $data;
            }

		}

        return $MAtriz;

    }
    
    public function agruparTodoMenor($columB, $columnS, $columnM){
         $query = 'SELECT `'.$columB.'`, `'.$columnM.'`, SUM(`'.$columnS.'`) AS `'.$columnS.'` FROM `' . $this->table .'` GROUP BY `'.$columB.'`' ;

        $parameters = [
		];
        $query = $this->query($query, $parameters);
        $result=$query->fetchAll(\PDO::FETCH_CLASS, $this->className, $this->constructorArgs);
		
        $MAtriz = [];
		foreach ($result as $data) {
            if($data->$columnS<=$data->$columnM){
			$MAtriz[] = $data;
            }

		}

        return $MAtriz;

    }
    
    public function findByDateRange($column, $value, $value2 ){
		$query = 'SELECT * FROM ' . $this->table . ' WHERE ' . $column . ' BETWEEN  :value  AND  :value2 ORDER BY '  . $column . ' DESC';

		$parameters = [
			'value' => $value,
            'value2' => $value2
		];

		$query = $this->query($query, $parameters);

		return $query->fetchAll(\PDO::FETCH_CLASS, $this->className, $this->constructorArgs);
	}  
    
    public function findByDateRange2($column, $value, $column2, $value2, $value3 ){
		$query = 'SELECT * FROM ' . $this->table . ' WHERE ' . $column . ' = :value' . ' AND '. $column2 . ' BETWEEN  :value2  AND  :value3 ORDER BY '  . $column2 . ' DESC';

		$parameters = [
            'value' => $value,
			'value2' => $value2,
            'value3' => $value3
		];

		$query = $this->query($query, $parameters);

		return $query->fetchAll(\PDO::FETCH_CLASS, $this->className, $this->constructorArgs);
	} 
    
    public function findByDateRange3($column, $value, $column2, $value2, $value3, $column4, $value4 ){
		$query = 'SELECT * FROM ' . $this->table . ' WHERE ' . $column . ' = :value' . ' AND ' . $column4 . ' = :value4' . ' AND '. $column2 . ' BETWEEN  :value2  AND  :value3 ORDER BY '  . $column2 . ' DESC';

		$parameters = [
            'value' => $value,
			'value2' => $value2,
            'value3' => $value3,
            'value4' => $value4
		];

		$query = $this->query($query, $parameters);

		return $query->fetchAll(\PDO::FETCH_CLASS, $this->className, $this->constructorArgs);
	} 
}