<template>
	<div class="container">
		<table class="w-full flex flex-row flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-5">
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
					<td class="border-grey-light border hover:bg-gray-100 p-3">{{product.title}}</td>
					<td class="border-grey-light border hover:bg-gray-100 p-3 truncate">{{product.type}}</td>
					<td class="border-grey-light border hover:bg-gray-100 p-3 truncate">{{product.rating}}</td>
					<td class="border-grey-light border hover:bg-gray-100 p-3 truncate">{{product.price}}</td>
					<td class="border-grey-light border hover:bg-gray-100 p-3 truncate">{{product.created_at | formatDate}}</td>
					<td class="border-grey-light border hover:bg-gray-100 p-3 flex space-x-4">
                        <div class=" text-blue-400 hover:text-blue-600 hover:font-medium cursor-pointer"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg></div>
                        <div class=" text-red-400 hover:text-red-600 hover:font-medium cursor-pointer"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg></div>
                    </td>
				</tr>
			</tbody>
		</table>
	</div>

</template>

<script>
    export default {
        data() {
            return {
            products: null
            }
        },

        methods: {
            getProducts() {
                axios.get('/products')
                .then(response=> (this.products = response.data))
                .catch(error=> console.log(error))
            }
        },

        mounted() {
            this.getProducts();
        }
    }
</script>
