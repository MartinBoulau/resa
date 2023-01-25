<?php
    include('connect.php');
    function getAllArticles(){
        global $connexion;
        $articles = [];
		$sql = 'SELECT id,nom,dispo,date FROM articles';
		$stmt= $connexion->query($sql);
		while($row = $stmt->fetch()){
            $article = ['id' => intval($row['id']), 'nom' => $row['nom'], 'dispo' => intval($row['dispo']), 'date' => strtotime($row['date'])];
			array_push($articles, $article);
		}

        return $articles;
    }
    function getArticleByID($id){
        global $connexion;
        $sql = 'SELECT id,nom,dispo,date FROM articles WHERE id=:id';
        $stmt = $connexion->prepare($sql);
        $stmt->execute([':id'=>$id]);
		if ($row = $stmt->fetch()) {
		    $article = ['id' => intval($row['id']), 'nom' => $row['nom'], 'dispo' => intval($row['dispo']), 'date' => strtotime($row['date'])];
		}
        return $article;
    }

    function createArticle($data){
        global $connexion;
        $sql = 'INSERT INTO articles(nom,dispo,date) VALUES (:nom,:dispo,:date)';
        $stmt = $connexion->prepare($sql);
        $stmt->execute([':nom' => $data['nom'], ':dispo' => $data['dispo'], ':date' => $data['date']]);
    }

    function updateArticle($id,$data){
        global $connexion;
        $sql = 'UPDATE articles SET nom=:nom, dispo=:dispo, date=:date WHERE id=:id';
        $stmt = $connexion->prepare($sql);
        $stmt->execute([':id' => $id, ':nom' => $data['nom'], ':dispo' => $data['dispo'], ':date' => $data['date']]);
    }

    function deleteArticle($id){
        global $connexion;
        $sql = 'DELETE FROM articles WHERE id=:id';
        $stmt = $connexion->prepare($sql);
        $stmt->execute([':id' => $id]);
    }



?>