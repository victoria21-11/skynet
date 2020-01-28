<div class="alert alert-danger" v-if="errors.{{ $model }}">
    <template v-for="item in errors.{{ $model }}">
        @{{ item }}
    </template>
</div>
