<?php
	include('requests.php');
	// NB : C'est du quick and dirty. Pas de test si pb accès item inexistant
	

	$app->get('/', function($req, $resp) {
		return buildResponse($resp, 'Ca maaaaarche !');
	});

	$app->get('/articles', function ($req, $resp) {
		$articles = getAllArticles();
		$ret = array();
		foreach ($articles as $val) {
			$item = $val;
			$item['id'] = $val['id'];
			$ret[] = $item;
		}
		return buildResponse($resp, $ret);
	});

	$app->get('/articles/{id}', function ($req, $resp, $args) {
		$article = getArticleByID($args['id']);

		$item = $article;
		$ret = $item;

		return buildResponse($resp, $ret);
	});

	$app->post('/articles', function ($req, $resp, $args) {
		$data = $req->getParsedBody();
		$data = $req->getParsedBody();
		createArticle($data);
		return $resp->withStatus(200);
	});

	$app->put('/articles/{id}', function ($req, $resp, $args) {
		$data = $req->getParsedBody();
		updateArticle($args['id'],$data);
		return $resp->withStatus(200);
	});

	$app->delete('/articles/{id}', function ($req, $resp, $args) {
		deleteArticle($args['id']);
		return $resp->withStatus(200);
	});

	// Fix "bug" (?) avec PUT vide (body non parsé)
	$app->addBodyParsingMiddleware();
	$app->run();

?>
