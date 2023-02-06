<template>
	<div class="card mx-5 my-5">
		<div class="card-header d-flex justify-content-between">
			<h3>Libros</h3>
			<button class="btn btn-outline-warning ms-auto" @click="openModal">Crear libro</button>
		</div>

		<div class="card-body">
				<table-component ref="table" />
		
		</div>

		<section v-if="load_modal">
			<modal :book_data="book"/>
		</section>
	</div>
</template>

<script>
// import axios from 'axios'
import TableComponent from './Table.vue'
import Modal from './Modal.vue'
// import bootstrap from 'bootstrap';

export default {
	components: {
		TableComponent,
		Modal
	},

	data() {
		return {
			load_modal: false,
			modal: null,
			book: null
		}
	},
	
	methods: {
		
		openModal() {
			this.load_modal = true
			setTimeout(() => {
				this.modal = new bootstrap.Modal(document.getElementById('book_modal'), {
					Keyboard: false
				})
				this.modal.show()

				const modal = document.getElementById('book_modal')
				modal.addEventListener('hidden.bs.modal', () => {
					this.load_modal = false
					this.book = null
				})
			}, 200)
		},
        closeModal(){
	      this.modal.hide()
		  this.$refs.table.datatable.destroy()
		  this.$refs.table.index()
        },
		editBook(book){
          this.book = book
          this.openModal()
		}
	}
}
</script>
