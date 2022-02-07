<template>
	<div>
		<products-upload-component v-if="action == 'upload'" v-on:listProducts="closeAll()"></products-upload-component>
		<product-edit-component v-if="action == 'edit'" v-on:listProducts="closeAll()" :product="product"></product-edit-component>
		<product-delete-component v-if="action == 'delete'" v-on:listProducts="closeAll()" :product="product"></product-delete-component>

		<div class="container">
			<div class="flex items-center justify-between mt-3 mb-3 pt-3 pb-3 border-b-2 border-teal-400 flex-wrap">
				<h1 class="text-2xl font-semibold text-slate-500">Registered products</h1>
				<div v-if="products.length" v-on:click="uploadProduct()">
					<a href="#" class="inline-block text-sm px-4 py-2 flex items-center space-x-2 leading-none border rounded border border-indigo-600 hover:border-transparent hover:text-teal-400 hover:bg-white lg:mt-0">
						<span class="text-slate-500">Load products</span>
						<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-teal-400 border border-indigo-600 rounded-full" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" /></svg>
					</a>
				</div>
			</div>
			<form class="w-full max-w-sm mb-3">
				<div class="flex items-center border-b border-teal-400 py-2">
					<input class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="number" placeholder="Insert productId" aria-label="Full name" v-model="productId">
					<button class="flex-shrink-0 bg-teal-400 hover:bg-teal-700 border-teal-400 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded" type="button" v-on:click="getProduct()">
						Send
					</button>
				</div>
			</form>
			<table class="w-full flex flex-row flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg">
				<thead class="text-white">
					<tr class="bg-teal-400 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0" v-for="product in products">
						<th class="p-3 text-left">Title</th>
						<th class="p-3 text-left">Type</th>
						<th class="p-3 text-left">Rating</th>
						<th class="p-3 text-left">Price</th>
						<th class="p-3 text-left">Created</th>
						<th class="p-3 text-left" width="110px">Actions</th>
					</tr>
				</thead>
				<tbody class="flex-1 sm:flex-none">
					<tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0" v-for="product in products">
						<td class="border-grey-light border hover:bg-gray-100 p-3 truncate font-light text-slate-500">{{product.title}}</td>
						<td class="border-grey-light border hover:bg-gray-100 p-3 truncate font-light text-slate-500">{{product.type}}</td>
						<td class="border-grey-light border hover:bg-gray-100 p-3 truncate font-light text-slate-500">{{product.rating}}</td>
						<td class="border-grey-light border hover:bg-gray-100 p-3 truncate font-light text-slate-500">{{product.price | currency}}</td>
						<td class="border-grey-light border hover:bg-gray-100 p-3 truncate font-light text-slate-500">{{product.created_at | formatDate}}</td>
						<td class="border-grey-light border hover:bg-gray-100 p-3 flex space-x-4">
							<div class="hover:text-blue-400 hover:font-medium cursor-pointer" title="Edit" v-on:click="editProduct(product)"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 cursor-pointer bg-blue-400 border rounded-full hover:bg-gray-100" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg></div>
							<div class="hover:text-red-400 hover:font-medium cursor-pointer" title="Remove"v-on:click="removeProduct(product)"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 cursor-pointer bg-red-400  border rounded-full hover:bg-gray-100" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg></div>
						</td>
					</tr>
					<tr v-if="!products.length">
						<td colspan="6">
							<div class="flex justify-center items-center font-semibold p-3 space-x-1">
								<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-teal-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
								<span>No data to display.</span>
									<a href="#" class="inline-block text-sm px-4 py-2 leading-none text-teal-400 border-teal-400 hover:border-transparent hover:text-teal hover:bg-white lg:mt-0" v-on:click="uploadProduct()">Load your products file!</a>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</template>

<script>
	import ProductsUploadComponent from './ProductsUploadComponent.vue';
	import ProductEditComponent from './ProductEditComponent.vue';
	import ProductDeleteComponent from './ProductDeleteComponent.vue';

    export default {
		component:{
			'products-upload-component': ProductsUploadComponent,
			'product-edit-component': ProductEditComponent,
			'product-delete-component': ProductDeleteComponent,
		},

        data() {
            return {
            	products: [],
				action: 'list',
				product: {},
				productId: null,
				error: null
            }
        },

        methods: {
            getProducts() {
				let url = '/products';

				if (this.productId) {
					url = `/products/${this.productId}`;
				}

                axios.get(url)
                .then(response=> (this.products = response.data))
                .catch(error=> {
					this.error = error;
					this.products = [];
				})
            },

            getProduct() {
				this.getProducts();
            },

			uploadProduct() {
				this.action = 'upload';
			},

			closeAll() {
				this.action = 'list';
				this.getProducts();
			},

			editProduct(product) {
				this.action = 'edit';
				this.product = product;
			},

			removeProduct(product) {
				this.action = 'delete';
				this.product = product;
			}
        },

        mounted() {
            this.getProducts();
        }
    }
</script>
