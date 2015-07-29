<?php

class ToDo {
	
	// an array that stores our todo item

	private $data;

	// constructor

	public function __construct($par) {
		if(is_array($par)) {
			$this->data = $par;
		}

	}

	// magic method called when data object is echoed

	public function __toString() {

	return

	<li id="todo-' . $this->data['id'] . '" class="todo">   
	<div class="text">'.$this->data['text'].'</div>

                <div class="actions">
                    <a href="" class="edit">Edit</a>
                    <a href="" class="delete">Delete</a>
                </div>

            </li>';
    }
	}



}