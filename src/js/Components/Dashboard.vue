<template>
    <div>
        <!-- example content  start -->
        <el-container>
            <el-header>
                <h1>This is the plugin main Dashboard</h1>
            </el-header>
            <el-main>
                <el-row>
                    <el-col>
                        <img width="300px" src="https://vuejs.org/images/logo.png" alt="vue">
                    </el-col>
                    <el-col>
                        <el-button type="primary" 
                            plain
                            size="small"
                            @click="reDirrect()"
                            >Powered by Vue.js. Learn More about Vue Js</el-button>
                    </el-col>
                </el-row>  
            </el-main>
        </el-container>
        <!-- example content end -->
    </div>
</template>
<script>
export default {
    name: 'Dashboard',
    data(){
        return {
            vueJs: 'https://vuejs.org/'
        }
    },
    methods: {
        reDirrect() {
          window.open(this.vueJs, "_blank");    
        }
    }
}
</script>

