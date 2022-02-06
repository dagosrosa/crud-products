<template>
    <div>
        <div class="min-w-screen h-screen animated fadeIn faster  fixed  left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-no-repeat bg-center bg-cover" id="modal-id">

            <div class="absolute bg-black opacity-80 inset-0 z-0"></div>
            <div class="w-full max-w-lg relative mx-auto my-auto rounded-xl shadow-lg  bg-white ">
                <div class="text-center border-b-2 p-3 bg-red-400 border border-red-500"> 
                    <span class="text-lg font-bold text-white">Delete product</span> 
                </div>
                <!--content-->
                <form class="flex flex-col items-center">
                    <div class="p-3">
                        <!--body-->
                            <h1 class="text-xl mb-4 font-bold text-slate-500 text-center">Do you want delete "{{product.title}}"?</h1>
                        <!--footer-->
                        <div class="p-3  mt-2 text-center space-x-4 md:block">
                            <button type="button" class="mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100" v-on:click="close()">
                                Cancel
                            </button>
                            <button type="button" class="mb-2 md:mb-0 bg-red-400 border border-red-500 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-red-4000" v-on:click="deleteProduct()">Yes, delete!</button>
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

            deleteProduct() {
                    axios.delete(`/products/${this.product.id}`)
                    .then(response=> (this.close()))
                    .catch(error=> console.log(error))
            }
        }
    }
</script>
