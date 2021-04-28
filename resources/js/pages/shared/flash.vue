<template>
    <div>
        <div
            v-if="$page.props.flash.success"
            class="bg-green-100   rounded-b text-teal-900 px-4 py-3 shadow-md flex justify-between my-6"
            role="alert"
        >
            <div>
                {{ $page.props.flash.success }}
            </div>
            <div @click="$page.props.flash.success = false">&times;</div>
        </div>
        <div
            v-if="$page.props.flash.danger"
            class="bg-red-100   rounded-b text-teal-900 px-4 py-3 shadow-md flex justify-between my-6"
            role="alert"
        >
            <div>
                {{ $page.props.flash.danger }}
            </div>
            <div @click="$page.props.flash.danger = false">&times;</div>
        </div>
    </div>
</template>
