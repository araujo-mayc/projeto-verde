<script setup>
import Message from 'primevue/message';

defineProps({
    message: {
        type: String,
    },
});
</script>

<template>
    <div v-show="message">
        <Message severity="error">{{ message }}</Message>
    </div>
</template>
