<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Vue.js</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

</head>
<body>
	
	<div id="todolist">
		<div class="container p-5">
			<h1 class="mb-3">ToDo List</h1>
			<div class="input-group mb-5 w-50">
				<input type="text" class="form-control" v-model="todosForm"> 
				<div class="input-group-append" v-if="isEdit">
			    	<button class="btn btn-success" id="edit-todos" v-on:click="updateTodos">Update ToDos</button>
			  	</div>
			  	<div class="input-group-append" v-else="">
			    	<button class="btn btn-primary" id="add-todos" v-on:click="addTodos">Tambah ToDos</button>
			  	</div>
		  	</div>
			<table class="table">
				<thead>
					<tr>
						<th style="width: 6%">No</th>
						<th style="width: 70%">ToDos</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<tr v-for="(todo, index) in todos">
						<td>{{ index+1 }}</td>
						<td>{{ todo }}</td> 
						<td>
							<button class="btn btn-info" v-on:click="editTodos(index)">Edit</button> 
							<button class="btn btn-danger" v-on:click="deleteTodos(index)">Delete</button>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	
	<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

	<script>

		var vm = new Vue({
		
			el: "#todolist", 
			data: {
				todosForm: '', 
			  	isEdit: false, 
				edited: '',
			  	todos: [
				  	'Kerjain PR',
				  	'Ngoding',
				  	'Buka Puasa dengan Kurma',
				  	'Nonton Film di Bioskop',
				  	'Tidur yang pules',
				  	'Mimpi yang indah'
			  	], 
			},
			methods: {
				addTodos: function() { 
					this.todos.push(this.todosForm); 
					this.todosForm = ''; 
				},

				editTodos: function(index) {
					this.todosForm = this.todos[index];
					this.edited = index;
					this.isEdit = true; 
				},

				updateTodos: function() { 
					this.todos[this.edited] = this.todosForm; 
					this.edited = '';
					this.todosForm = ''; 
					this.isEdit = false;
				},

				deleteTodos: function(index) {
					this.todos.splice(index, 1);
				}
			}

		
		});

	</script>

</body>
</html>