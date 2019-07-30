<template>
    <div>
        <a href="#" @click.prevent="$router.go(-1)">Back</a>
        <h3 class="my-4">W2</h3>
        <div class="form-group row">
            <div class="col-12 col-sm">
                <label>Box 1 - Wages and Tips</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-12 col-sm">
                <label>Box 2 - Federal Income Tax Withheld</label>
                <input type="text" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12 col-sm">
                <label>Box 3 - Social Security Wages</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-12 col-sm">
                <label>Box 4 - Social Security Tax Withheld</label>
                <input type="text" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12 col-sm">
                <label>Box 5 - Medicare Wages and Tips</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-12 col-sm">
                <label>Box 6 - Medicare Tax Withheld</label>
                <input type="text" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12 col-sm">
                <label>Box 7 - Social Security Tips</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-12 col-sm">
                <label>Box 8 - Allocated Tips</label>
                <input type="text" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12 col-sm">
                <label>Box 9 - Verification Code (optional)</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-12 col-sm">
                <label>Box 10 - Dependent Care Benefits</label>
                <input type="text" class="form-control">
            </div>
        </div>
    </div>
</template>

<script>
export default {
  
    
}
</script>
