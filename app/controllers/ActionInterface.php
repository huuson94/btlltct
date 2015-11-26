<?php 
	interface ActionInterface{
		public function index();
		public function create();
		public function store();
		public function show($id);
		public function update($id);
		public function destroy($id);
		public function edit($id);

	}
