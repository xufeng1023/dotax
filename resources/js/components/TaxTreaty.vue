<template>
	<div>
        <a href="#" @click.prevent="$router.go(-1)">Back</a>
        <h3 class="mt-4">Claiming Tax Treaty Benefits</h3>
        <div class="text-muted">Congradulations, based on the information you provided, we think you will qualify for a tax treaty as a <strong>{{ $root.personal.job }}</strong>!</div>
        <div class="text-muted mb-4">We will need to gather a few information below to claim it!</div>
    </div>
</template>

<script>
	export default {
		data() {
			return {

			}
		}
	}
</script>