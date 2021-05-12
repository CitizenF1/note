<template>
    <div>
        <spin v-if="loading"></spin>
        <div v-else>
            <div class="uk-card uk-card-default uk-width-1-2@m">
            <div class="uk-card-header">
                <div class="uk-grid-small uk-flex-middle" uk-grid>
                    <div class="uk-width-auto">
                        <img class="uk-border-circle" width="40" height="40" src="#">
                    </div>
                    <div class="uk-width-expand">
                        <h3 class="uk-card-title uk-margin-remove-bottom">title</h3>
                        <p class="uk-text-meta uk-margin-remove-top"><time datetime=""></time></p>
                    </div>
                </div>
            </div>
            <div class="uk-card-body">
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Culpa, architecto maiores! Delectus distinctio esse quos repellendus harum, eveniet vel facilis natus numquam obcaecati iure beatae adipisci, assumenda qui nisi voluptatibus.</p>
            </div>
            <div class="uk-card-footer">
                <a href="#" class="uk-button-text">Reard</a>
            </div>
        </div>
        </div>

    </div>
</template>

<script>

import Spin from "../components/Spin";
import axios from 'axios';

    export default {
        components: {
            Spin
        },

        data: () => ({
            loading: true,
            notes: []
        }),

        mounted() {
            this.loadNotes();
        },

        methods: {
            loadNotes() {
                axios.get('/api/notes')
                .then(res => {
                    this.notes = res.data;
                })
            }
        }
    }


</script>

<style scoped>
    .uk-card {
        width: 40%;
        margin-right: 20px;
        margin-bottom: 20px;
    }
    .uk-card:last-child {
        margin-right: 0;
    }
</style>
