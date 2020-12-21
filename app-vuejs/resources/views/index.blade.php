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
                <button @click="getData(index)">Edit</button>
                <button @click="deleteData(index)">Delete</button>
            </li>
        </ol>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
<script>
    var app = new Vue({
        el: '#app',
        data: {
            inputId: "",
            inputName: "",
            operation: "add",
            users: [
                {
                    "name": "Muhammad Iqbal Mubarok"
                },
                {
                    "name": "Ruby Purwanti"
                },
                {
                    "name": "Faqih Muhammad"
                }
            ]
        },
        methods: {
            create: function() {
                this.users.push({"name":this.inputName});
                this.inputName = "";
            },
            deleteData: function(id) {
                if(confirm("anda yakin?")){
                    this.users.splice(id,1);
                }
            },
            getData: function(id) {
                this.inputName = this.users[id].name;
                this.operation = "update";
                this.inputId = id;
            },
            update: function(id) {
                this.users[id].name = this.inputName;
                this.operation = "add"
            }
        }
    })
</script>
</body>
</html>
