<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            Echo
                .join('chat')
                .here((users) => {
                    console.log('Sala de chat:', users);
                })
                .joining((user) => {
                    console.log(`${user.name} se unió al canal de chat`);
                })
                .leaving((user) => {
                    console.log(`${user.name} dejó el canal de chat`);
                })
                .listen('.messageIncoming', notify => {
                    console.log(notify);
                });
        }
    }
</script>
