<template>
	<table class="table" id="bookTable"  @click="getEvent">
		<thead>
			<tr>
				<th>Titulo</th>
				<th>Autor</th>
				<th>stock</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			<!-- <tr v-for="(book, index) in books" :key="index">
				<td>{{ book.title }}</td>
				<td>{{ book.author.name }}</td>
				<td>{{ book.stock }}</td>
				<td>
					<button class="btn btn-success" @click="getBook(book)">Editar</button>
					<button class="btn btn-danger mx-3" @click="deletBook(book)">Eliminar</button>
				</td>
			</tr> -->
		</tbody>
	</table>
</template>


<script>
export default {
	data() {
		return {
			books: [],
			datatable: {}
		}
	},
	mounted() {
		// console.log(this.books_data);
		this.index()
	},
	methods: {
		async index() {
			this.mountDataTable()
		},
		async getBooks() {
			try {
				this.load = false
				const { data } = await axios.get('/Books/GetAllBooks')
				this.books = data.books
				this.load = true
			} catch (error) {
				console.error(error)
			}
			this.mountDataTable()
			},
			mountDataTable(){
			    this.datatable = $('#bookTable').DataTable({
					Processing: true,
					serverSide: true,
					ajax: {
						url: '/Books/GetAllBooksDataTable'
					},
					columns:[
						{data: 'title'},
						{data: 'author.name', searchable: false},
						{data: 'stock'},
						{data: 'action'}
                    ]
				})
			},
			getEvent(event){
				const button = event.target
				if(button.getAttribute('role') == 'edit'){
					this.getBook(button.getAttribute('data-id'))
				}

				if(button.getAttribute('role') == 'delete'){
					this.deletBook(button.getAttribute('data-id'))
				}
			},

		async getBook(book_id) {
			try {
				const { data } = await axios.get(`Books/GetABook/${book_id}`)
				this.$parent.editBook(data.book)
			} catch (error) {
				console.error(error)
			}
		},
		async deletBook(book_id) {
			try {
				const result = await swal.fire({
						icon: 'question',
						title: 'Quieres eliminar el libro?',
						showCancelButton: true,
						confirmButtonText: 'Si, eliminar'
					})
				if (!result.isConfirmed) return
				
				this.datatable.destroy();
				await axios.delete(`Books/DeleteBook/${book_id}`)
				this.index()
				swal.fire({
					icon: 'success',
					title: 'Buen trabajo',
					text: 'Libro eliminado'
				})
			} catch (error) {
				console.error(error)
			}
		}
	}
}
</script>