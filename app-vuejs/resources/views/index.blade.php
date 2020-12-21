<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tugas Ajax Request</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    <div id="app">
        <div id="input-data">
            <input type="text" name="name" v-model="inputName"/>
            <button v-if="operation === 'add'" @click="create">@{{operation}}</button>
            <button v-else @click="update(inputId)">@{{operation}}</button>
        </div>
        <ol>
            <li v-for="(user,index) in users">
                @{{ user.name }}
                <button @click="getData(user.id)">Edit</button>
                <button @click="deleteData(user.id)">Delete</button>
            </li>
        </ol>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue-resource@1.5.1"></script>
<script>
    var app = new Vue({
        el: '#app',
        data: {
            inputId: "",
            inputName: "",
            operation: "add",
            users: []
        },
        methods: {
            getAllData: function() {
                this.$http.get('/api/users').then(response => {
                    this.users = response.body.data;
                }, response => {
                    // error callback
                });
            },
            create: function() {
                this.$http.post('/api/users', {"name":this.inputName}).then(response => {
                    this.getAllData();
                    this.inputName = "";
                }, response => {
                    // error callback
                });
            },
            deleteData: function(id) {
                if(confirm("anda yakin?")){
                    this.$http.delete('/api/users/'+id).then(response => {
                        this.getAllData();
                    }, response => {
                        // error callback
                    });
                }
            },
            getData: function(id) {
                this.$http.get('/api/users/'+id).then(response => {
                    this.inputName = response.body.data.name;
                    this.operation = "update";
                    this.inputId = id;
                }, response => {
                    // error callback
                });
            },
            update: function(id) {
                this.$http.put('/api/users/'+id, {"name":this.inputName}).then(response => {
                    this.getAllData();
                    this.operation = "add";
                    this.inputName = "";
                }, response => {
                    // error callback
                });
            }
        },
        mounted: function(){
            this.$http.get('/api/users').then(response => {
                this.users = response.body.data;
            }, response => {
                // error callback
            });
        }
    })
</script>
</body>
</html>
