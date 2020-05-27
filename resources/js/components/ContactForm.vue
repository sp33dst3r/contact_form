<template>
    <div>
        <div v-if="success" class="alert alert-success" role="alert">
            This is a success alert—check it out!
        </div>
        <div v-if="errors.length" class="alert alert-danger" role="alert">
            <div v-for="error in errors">
                {{ error }}
            </div>
        </div>
        <form @submit.prevent="sendForm()" name="contact">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" id="name">
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" name="phone" class="form-control" id="phone">
            </div>
            <div class="form-group">
                <label for="message">Message:</label>
                <textarea name="message" id="message" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                errors: [],
                success: false
            }
        },
        mounted() {

            console.log('ddd');

            /* var app = this;
            axios.get('/api/v1/companies')
                .then(function (resp) {
                    app.companies = resp.data;
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not load companies");
                }); */
        },
        methods: {
            sendForm(){
                console.log(this, 'msg sent');
                var self = this;

                var formData = new FormData(document.forms.contact)
                //return;
                axios({
                    method: 'post',
                    url: '/',
                    data: formData,
                })
                .then(function (response) {
                    //handle success
                    console.log(response);
                    if(response.data.success){
                        this.success = true;
                    }else{
                        console.log('ERROR');
                        self.errors = response.data.errors;
                        console.log(this.errors, "ERRORS");

                    }
                })
                .catch(function (response) {
                    //handle error
                    if(error){
                        console.log(error, "DDDD");

                        self.errors = response.errors;
                    }else{
                        console.log(response, 'ddd');

                    }
                    //console.log(response, "HERE");
                });

            },
            deleteEntry(id, index) {
                if (confirm("Do you really want to delete it?")) {
                    var app = this;
                    axios.delete('/api/v1/companies/' + id)
                        .then(function (resp) {
                            app.companies.splice(index, 1);
                        })
                        .catch(function (resp) {
                            alert("Could not delete company");
                        });
                }
            }
        }
    }
</script>
