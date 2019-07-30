<template>
    <div>
        <a href="#" @click.prevent="$router.go(-1)">Back</a>
        <h3 class="my-4">W2</h3>
        <h5 class="my-4">Employer Information</h5>
        <div class="form-group row">
            <div class="col-12 col-sm">
                <label>Box B - Employer Identification Number (EIN):</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-12 col-sm">
                <label>Employer's Name:</label>
                <input type="text" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12 col-sm">
                <label>Employer's Address:</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-12 col-sm">
                <label>Employer's City:</label>
                <input type="text" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12 col-sm">
                <label>Employer's State:</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-12 col-sm">
                <label>Employer's Zip Code:</label>
                <input type="text" class="form-control">
            </div>
        </div>
        <h5 class="my-4">Federal Tax Information</h5>
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
        <div class="form-group row">
            <div class="col-12 col-sm-6">
                <label>Box 11 - Nonqualified Plans:</label>
                <input type="text" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12 col-sm">
                <label>Box 12</label>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12 col-sm">
                <label>Code:</label>
                <select class="form-control">
                    <option value="C">C: Group term life insurance</option>
                    <option value="D">D: 401(k) contributions</option>
                    <option value="J">J: Nontaxable sick pay</option>
                    <option value="AA">AA: Roth 401(k) contributions</option>
                    <option value="BB">BB: Roth 403(b) contributions</option>
                    <option value="DD">DD: Employer health coverage</option>
                    <option value="EE">EE: Roth 457(b) contributions</option>
                </select>
            </div>
            <div class="col-12 col-sm">
                <label>Amount:</label>
                <input type="text" class="form-control">
            </div>
        </div>
    </div>
</template>

<script>
export default {

}
</script>
