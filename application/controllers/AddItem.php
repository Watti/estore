<?php
class AddItem  extends CI_Controller
{

	public function index()
	{
		$this->load->model("ItemModel");
		$items = $this->ItemModel->getItems();
		$data["item"] = $items;
		$this->load->view('AddItem', $data);
	}
	
}	