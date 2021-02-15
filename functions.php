<?php
function insertJoke($pdo, $joke){
    $sql = 'INSERT INTO joke (joketext, jokedate) VALUES (:joketext, :jokedate)';
    $stmt = $pdo->prepare($sql);

    $stmt->execute($joke);
}

function deleteJoke($pdo, $id){
    $stmt = $pdo->prepare('DELETE FROM joke WHERE id = :id');
    $values = ['id' => $id];
    $stmt->execute($values);
}

function updateJoke($pdo, $joke, $field, $value) {
    $sql = 'UPDATE joke SET joketext = :joketext WHERE ' . $field . ' = :value';
    $stmt = $pdo->prepare($sql);
    $joke['value'] = $value;

    $stmt->execute($joke);
}

function find($pdo, $table, $field, $value){
    $stmt = $pdo->prepare('SELECT * FROM ' . $table . ' WHERE ' . $field . ' = :value');
    $values = [
        'value' => $value
    ];
    $stmt->execute($values);
    return $stmt->fetchAll();
}

function findAll ($pdo, $table){
    $stmt = $pdo->prepare('SELECT * FROM ' . $table );
    $stmt->execute();
    return $stmt->fetchAll();
}

function insert($pdo, $table, $record){
    // generic insert function that should work for any table/ schema
    $keys = array_keys($record);

    $values = implode(', ', $keys);
    $placeholderValues = implode(', :', $keys);

    $query = 'INSERT INTO ' . $table . ' (' . $values . ') VALUES (:' . $placeholderValues . ')';
    $stmt = $pdo->prepare($query);

    $stmt->execute($record);
}

function update($pdo, $table, $record, $primaryKey){
    // generic / reusable update function, $table is table name, $record is ... , $primaryKey is for use in the where clause
    $query = 'UPDATE ' . $table . ' SET ';

    $parameters = []; // will store the key values (column name, placeholder, data)
    foreach ($record as $key => $value){
        $parameters[] = $key . ' = :' . $key;
    }

    $query .= implode(', ', $parameters);
    $query .= ' WHERE ' . $primaryKey . '= :primaryKey';

    $record['primaryKey'] = $record[$primaryKey];

    $stmt = $pdo->prepare($query);
    $stmt->execute($record);
}

function delete($pdo, $table, $field, $value){
    $stmt = $pdo->prepare('DELETE FROM ' . $table . 'WHERE ' . $field . ' = :value');
    $data = [
        'value' => $value
    ];
    $stmt->execute($data);
}