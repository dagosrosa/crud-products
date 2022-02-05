<template>
    <div>
        <div class="min-w-screen h-screen animated fadeIn faster  fixed  left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-no-repeat bg-center bg-cover" id="modal-id">

            <div class="absolute bg-black opacity-80 inset-0 z-0"></div>
            <div class="w-full max-w-lg relative mx-auto my-auto rounded-xl shadow-lg  bg-white ">
                <div class="text-center border-b-2 p-3 bg-blue-400 border border-blue-400"> 
                    <span class="text-lg font-bold text-white">Edit product</span> 
                </div>
                <!--content-->
                <form class="flex flex-col items-center">
                    <div class="p-3">
                        <!--body-->
                        <div class="mb-4 md:flex md:justify-between">
                            <div class="mb-4 md:mr-2 md:mb-0">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="title">
                                    Title
                                </label>
                                <input
                                    v-model="product.title"
                                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="title"
                                    type="text"
                                    placeholder="Insert title"
                                    required
                                />
                            </div>
                            <div class="mb-4 md:mr-2 md:mb-0">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="title">
                                    Type
                                </label>
                                <input
                                    v-model="product.type"
                                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="type"
                                    type="text"
                                    placeholder="Insert type"
                                    required
                                />
                            </div>
                        </div>

                        <div class="mb-4 md:flex md:justify-between">
                            <div class="mb-4 md:mr-2 md:mb-0">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="rating">
                                    Rating
                                </label>
                                <input
                                    v-model="product.rating"
                                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="rating"
                                    type="number"
                                    placeholder="Insert rating"
                                    required
                                />
                            </div>
                            <div class="mb-4 md:mr-2 md:mb-0">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="price">
                                    Price
                                </label>
                                <input
                                    v-model="product.price"
                                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="price"
                                    type="text"
                                    placeholder="Insert price"
                                    required
                                />
                            </div>
                        </div>
                        <!--footer-->
                        <div class="p-3  mt-2 text-center space-x-4 md:block">
                            <button type="button" class="mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100" v-on:click="close()">
                                Cancel
                            </button>
                            <button type="button" class="mb-2 md:mb-0 bg-blue-400 border border-blue-400 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-blue-4000" v-on:click="editProduct()">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['product'],

        methods: {
			close() {
                this.$emit('listProducts');
			},

            editProduct() {
                    axios.put(`/products/${this.product.id}`, this.product)
                    .then(response=> (this.close()))
                    .catch(error=> console.log(error))
            }
        }
    }
</script>
