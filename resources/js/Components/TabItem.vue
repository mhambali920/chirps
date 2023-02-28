<template>
    <div v-show="isActive" class="tab-panel">
        <slot></slot>
    </div>
</template>

<script>
import { ref } from "vue";

export default {
    props: {
        label: {
            type: String,
            required: true,
        },
    },
    setup(props, { slots, emit }) {
        const isActive = ref(false);

        emit("add-tab", { label: props.label });

        return { isActive };
    },
};
</script>
