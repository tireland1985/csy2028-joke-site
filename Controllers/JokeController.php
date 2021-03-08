<?php
class JokeController {
    private $jokesTable;

    public function __construct($jokesTable){
        $this->jokesTable = $jokesTable;
    }

    public function list(){
        $jokes = $this->jokesTable->findAll();

        return ['template' => 'list.html.php',
                'title' => 'Joke List',
                'variables' => [
                    'jokes' => $jokes
                ]
                ];
    }

    public function delete(){
        $this->jokesTable->delete($_POST['id']);

        header('location: /list');
    }

    public function home(){
        $joke = $this->jokesTable->find('id', 1);

        return [
            'template' => 'home.html.php',
            'title' => 'Internet Joke Database',
            'variables' => ['joke' => $joke[0]]
        ];
    }

    public function edit(){
        if (isset($_POST['joke'])) {
            $date = new DateTime();

            $joke = $_POST['joke'];
            $joke['jokedate'] = $date->format('Y-m-d H:i:s');
	
            $this->jokesTable->save($joke);
        
            header('location: /list');
        }
        else {
        
            if (isset($_GET['id'])){
                $result = $this->jokesTable->find('id', $_GET['id']);
                $joke = $result[0];
            }
            else { 
                $joke = false;
            }
            return [
                'template' => 'editjoke.html.php',
                'title' => 'Edit Joke',
                'variables' => ['joke' => $joke]
            ];
        }
    }
}