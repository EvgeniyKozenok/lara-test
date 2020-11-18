<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Token Management</div>

                    <div class="card-body">
                        <clients/>
                        <authorized-clients/>
                        <personal-access-tokens/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    import Clients from './passport/Clients';
    import AuthorizedClients from './passport/AuthorizedClients';
    import PersonalAccessTokens from './passport/PersonalAccessTokens';

    export default {
        components: {Clients, AuthorizedClients, PersonalAccessTokens},
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
