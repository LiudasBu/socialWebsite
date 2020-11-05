<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" v-text="definition"></div>

                    <div class="card-body">
                        <button class="btn btn-primary" @click="findDefinition" v-text="buttonText"></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
 export default {
        props: ['userId', 'follows'],

        mounted() {
            console.log('Component mounted.')
        },

        data: function () {
            return {
                text: "Press when you have highlighted the text",
            }
        },

        methods: {
            findDefinition() {
                axios.get('/words/' + window.getSelection().toString())
                    .then(response => {
                        this.text = response.data;
                    });
            }
        },

        computed: {
            buttonText() {
                return 'Find Definition';
            },

            definition() {
                return this.text;
            }
        }
    }
</script>
