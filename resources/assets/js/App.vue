<style lang="scss" scoped>

// Transition for routing
.fade-enter-active,
.fade-leave-active {
    transition: opacity .1s
}

.fade-enter,
.fade-leave-to {
    opacity: 0
}

</style>

<template>

<div class="container-fluid">
    <transition name="fade" mode="out-in">
        <router-view></router-view>
    </transition>
</div>

</template>

<script>

export default {

}

</script>
