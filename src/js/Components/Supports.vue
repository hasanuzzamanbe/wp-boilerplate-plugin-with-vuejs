<template>
    <div>
        <!-- You can delete this sample data -->
       <el-container>
            <el-header>
                <h1>This is the plugin Support page</h1>
            </el-header>
            <el-main>
                <el-button type="info" plain @click="redirrestUrl()">For any kind of support you may knock to the developer</el-button> 
            </el-main>
        </el-container>
        <!-- end sample data -->
    </div>
</template>
<script>
export default {
    name: 'Supports',
    data() {
        return {
            Author: 'https://www.github.com/hasanuzzamanbe'
        }
    },
    methods:{
        redirrestUrl() {
            window.open(this.Author, "_blank");   
        }
    }
}
</script>

