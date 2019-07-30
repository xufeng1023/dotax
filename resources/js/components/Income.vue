<template>
    <div>
        <a href="#" @click.prevent="$router.go(-1)">Back</a>
    	<h3 class="my-4">Income</h3>
    	<div class="list-group list-group-flush mb-4">
	  		<a href="#" class="list-group-item list-group-item-action" @click.prevent="to('w2')">W2</a>
		  	<a href="#" class="list-group-item list-group-item-action">1099</a>
		</div>
    	<button type="button" class="btn btn-primary" @click="nextPage()">Next</button>
    </div>
</template>

<script>
export default {
    methods: {
    	to(uri) {
    		this.$router.push('income/w2')
    	},
    	nextPage() {

    	}
    }
}
</script>
