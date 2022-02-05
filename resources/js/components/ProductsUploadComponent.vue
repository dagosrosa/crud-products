<template>
    <div>
        <div class="min-w-screen h-screen animated fadeIn faster  fixed  left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-no-repeat bg-center bg-cover" id="modal-id">

            <div class="absolute bg-black opacity-80 inset-0 z-0"></div>
            <div class="w-full max-w-lg relative mx-auto my-auto rounded-xl shadow-lg  bg-white ">
                <div class="text-center border-b-2 p-3 bg-teal-400 border border-teal-500"> 
                    <span class="text-lg font-bold text-white">Load your products file</span> 
                </div>
                <!--content-->
                <form class="flex flex-col items-center" action="/products" method="post" enctype="multipart/form-data">
                    <div class="p-3">
                        <!--body-->
                            <div class="relative h-40 rounded-lg border-dashed border-2 border-gray-200 bg-white flex justify-center items-center hover:cursor-pointer">
                                <div class="absolute">
                                        <div class="flex flex-col items-center "> 
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-400" v-bind:class="{'text-teal-400': selectedFile}" viewBox="0 0 20 20" fill="currentColor"><path d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" /><path d="M9 13h2v5a1 1 0 11-2 0v-5z" /></svg>
                                            <span class="block text-gray-400 font-normal" v-show="!selectedFile">Attach you files here</span>
                                            <span class="block text-teal-400 font-normal">{{selectedFile}}</span>
                                        </div>
                                </div> 
                                <input type="file" name="productJsonFile" id="fileToUpload" accept=".json" class="h-full w-full opacity-0 hover:cursor-pointer" v-on:change="getFileName($event)">
                            </div>
                        <div class="flex items-center justify-end space-x-1 text-sm subpixel-antialiased">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            <span class="block text-gray-400 font-normal">Accepted file type: .json only</span>
                        </div>
                        <!--footer-->
                        <div class="p-3  mt-2 text-center space-x-4 md:block">
                            <button type="button" class="mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100" v-on:click="close()">
                                Back
                            </button>
                            <button type="submit" class="mb-2 md:mb-0 bg-teal-400 border border-teal-500 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-teal-4000" :disabled="!selectedFile" v-bind:class="{'opacity-50 cursor-not-allowed': !selectedFile}">Load</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [''],

        data() {
            return {
                selectedFile: ''
            }
        },
        
        mounted() {
        },

        methods: {
			close() {
                this.selectedFile = '';
                this.$emit('listProducts');
			},

			getFileName(event) {
                this.selectedFile = event.target.value;
			}
        }
    }
</script>
