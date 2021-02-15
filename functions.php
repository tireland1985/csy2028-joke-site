<?php
function findJoke($pdo, $id) {
    $stmt = $pdo->prepare('SELECT * FROM joke WHERE id = :id');
    $values = [
        'id' => $id
    ];
    $stmt->execute($values);
    return $stmt->fetch();
}

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

function findAllJokes($pdo){
    $sql = 'SELECT * FROM joke';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $jokes = $stmt->fetchAll();
    return $jokes;
}