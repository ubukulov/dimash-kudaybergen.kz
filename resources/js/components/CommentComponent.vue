<template>
    <div>
        <div class="row">
            <div class="col-md-12">
                <div class="comment_form">
                    <form @submit.prevent="createComment()">
                        <div class="form-group">
                            <input type="text" class="form-control" v-model="email_or_phone" required placeholder="Email / Телефон">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" v-model="name" required placeholder="Ваше имя">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" v-model="comment" cols="30" required rows="4" placeholder="Ваши комментарии"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Комментировать</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        data() {
            return {
                email_or_phone: '',
                name: '',
                comment: ''
            }
        },
        props: {
            type: String,
            pcpId: Number
        },
        methods: {
            createComment() {
                axios.post('/comment/create', {
                    email: this.email_or_phone,
                    name: this.name,
                    comment: this.comment,
                    type: this.type,
                    pcp_id: this.pcpId
                })
                .then(res => {
                    console.log(res);
                    this.email_or_phone = '';
                    this.name = '';
                    this.comment = '';
                })
                .catch(err => {
                    console.log(err);
                })
            }
        },
        created() {
            //
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
