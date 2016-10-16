<?php

namespace App\Controller;

use App\Model\Book;
use App\Model\Member;
use App\Model\Borrow;

class BorrowsController {

	public function index() {

		$Borrow = new Borrow();
		$borrows = $Borrow->all();

		require APP . "view/_templates/header.php";
		require APP . "view/borrows/index.php";
		require APP . "view/_templates/footer.php";
	}

	public function create() {

		$Book = new Book();
		$Member = new Member();

		$books = $Book->all();
		$members = $Member->all();

		require APP . "view/_templates/header.php";
		require APP . "view/borrows/create.php";
		require APP . "view/_templates/footer.php";
	}

	public function store() {


		// Cek apakah ini POST request, jika buka redirect ke error
		if (empty($_POST)) header('location: ' . URL . 'error');

		$params = $_POST;

		$Borrow = new Borrow();
		$isAdded = $Borrow->add($params);

		if ($isAdded) header('location: ' . URL . 'borrows'); else
			header('location: ' . URL . 'error');

	}

}