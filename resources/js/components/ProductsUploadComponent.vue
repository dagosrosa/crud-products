<template>
    <form action="/products" method="post" enctype="multipart/form-data">
        <input type="file" name="productJsonFile" id="fileToUpload" accept=".json">
        <input type="submit" value="Cadastrar" name="submit">
    </form>
</template>

<script>
    export default {
        mounted() {
            console.log('ProductsUploadComponent mounted')
        }
    }
</script>
