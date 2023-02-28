<template>
    <div class="tabs">
        <div class="tab-list">
            <div
                v-for="(tab, index) in tabs"
                :key="index"
                @click="activeTab = index"
                :class="{ active: activeTab === index }"
            >
                {{ tab.label }}
            </div>
        </div>
        <div class="tab-content">
            <slot :name="tabs[activeTab].label"></slot>
        </div>
    </div>
</template>

<script>
import { ref } from "vue";

export default {
    setup(props, { slots }) {
        const activeTab = ref(0);
        const tabs = ref([]);

        const addTab = (tab) => {
            tabs.value.push(tab);
        };

        return { activeTab, tabs, addTab };
    },
};
</script>
<style scoped>
.tabs {
    display: flex;
    flex-direction: row;
    width: 100%;
}

.tab-list {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    margin: 0;
    padding: 0;
}

.tab-list div {
    margin: 0;
    padding: 10px;
    cursor: pointer;
}

.tab-list .active {
    background-color: #ccc;
}

.tab-content {
    flex: 1;
    padding: 10px;
}

.tab-panel {
    display: none;
}

.tab-panel.active {
    display: block;
}
</style>
